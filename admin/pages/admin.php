<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$dbname = 'movie_db';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

function createThumbnail($sourcePath, $thumbPath, $maxWidth = 150) {
    list($origWidth, $origHeight, $imageType) = getimagesize($sourcePath);
    if (!$origWidth || !$origHeight) {
        throw new RuntimeException("Cannot get image size for $sourcePath.");
    }

    $ratio = $origHeight / $origWidth;
    $newWidth  = $maxWidth;
    $newHeight = $maxWidth * $ratio;

    switch ($imageType) {
        case IMAGETYPE_JPEG:
            $sourceImage = imagecreatefromjpeg($sourcePath);
            break;
        case IMAGETYPE_PNG:
            $sourceImage = imagecreatefrompng($sourcePath);
            break;
        case IMAGETYPE_GIF:
            $sourceImage = imagecreatefromgif($sourcePath);
            break;
        default:
            throw new RuntimeException("Unsupported image type for thumbnail.");
    }

    $thumbImage = imagecreatetruecolor($newWidth, $newHeight);

    if ($imageType == IMAGETYPE_PNG || $imageType == IMAGETYPE_GIF) {
        imagecolortransparent($thumbImage, imagecolorallocate($thumbImage, 0, 0, 0));
        imagealphablending($thumbImage, false);
        imagesavealpha($thumbImage, true);
    }

    imagecopyresampled($thumbImage, $sourceImage, 0, 0, 0, 0,
                       $newWidth, $newHeight, $origWidth, $origHeight);

    switch ($imageType) {
        case IMAGETYPE_JPEG:
            imagejpeg($thumbImage, $thumbPath, 90);
            break;
        case IMAGETYPE_PNG:
            imagepng($thumbImage, $thumbPath);
            break;
        case IMAGETYPE_GIF:
            imagegif($thumbImage, $thumbPath);
            break;
    }

    imagedestroy($sourceImage);
    imagedestroy($thumbImage);
}

function handleImageUpload($fileInputName = 'image') {
    if (!isset($_FILES[$fileInputName]) || $_FILES[$fileInputName]['error'] === UPLOAD_ERR_NO_FILE) {
        return [null, null];
    }

    if ($_FILES[$fileInputName]['error'] !== UPLOAD_ERR_OK) {
        throw new RuntimeException('Image upload error code: ' . $_FILES[$fileInputName]['error']);
    }

    $uploadsDir  = __DIR__ . '/uploads';
    $thumbsDir   = __DIR__ . '/uploads/thumbs';
    if (!is_dir($uploadsDir)) {
        mkdir($uploadsDir, 0777, true);
    }
    if (!is_dir($thumbsDir)) {
        mkdir($thumbsDir, 0777, true);
    }

    $ext  = pathinfo($_FILES[$fileInputName]['name'], PATHINFO_EXTENSION);
    $uniq = 'movie_' . time() . '_' . mt_rand(1000,9999);
    $filename = $uniq . '.' . strtolower($ext);

    $targetFile = $uploadsDir . '/' . $filename;
    $thumbFile  = $thumbsDir  . '/' . $filename;

    if (!move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $targetFile)) {
        throw new RuntimeException('Failed to move uploaded file.');
    }

    createThumbnail($targetFile, $thumbFile);


    $relativePath      = 'uploads/' . $filename;
    $relativeThumbPath = 'uploads/thumbs/' . $filename;

    return [$relativePath, $relativeThumbPath];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['add_movie'])) {
        $title        = $_POST['title']        ?? '';
        $genre        = $_POST['genre']        ?? '';
        $release_date = $_POST['release_date'] ?? '';

        list($imagePath, $thumbPath) = handleImageUpload('image');

        $sql = "INSERT INTO movies (title, genre, release_date, image_path, thumbnail_path)
                VALUES (:title, :genre, :release_date, :image_path, :thumb_path)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':release_date', $release_date);
        $stmt->bindParam(':image_path', $imagePath);
        $stmt->bindParam(':thumb_path', $thumbPath);
        $stmt->execute();

        header("Location: admin.php");
        exit;
    }

    if (isset($_POST['edit_movie'])) {
        $id           = $_POST['id'];
        $title        = $_POST['title']        ?? '';
        $genre        = $_POST['genre']        ?? '';
        $release_date = $_POST['release_date'] ?? '';

        list($newPath, $newThumb) = handleImageUpload('image');

        if ($newPath !== null && $newThumb !== null) {
            $sql = "
                UPDATE movies
                SET title = :title,
                    genre = :genre,
                    release_date = :release_date,
                    image_path = :image_path,
                    thumbnail_path = :thumb_path
                WHERE id = :id
            ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':image_path', $newPath);
            $stmt->bindParam(':thumb_path', $newThumb);
        } else {
            $sql = "
                UPDATE movies
                SET title = :title,
                    genre = :genre,
                    release_date = :release_date
                WHERE id = :id
            ";
            $stmt = $conn->prepare($sql);
        }

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':release_date', $release_date);
        $stmt->execute();

        header("Location: admin.php");
        exit;
    }

    if (isset($_POST['delete_movie'])) {
        $id = $_POST['id'];

        $stmt = $conn->prepare("SELECT image_path, thumbnail_path FROM movies WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $oldPaths = $stmt->fetch(PDO::FETCH_ASSOC);

        // Delete DB row
        $stmt = $conn->prepare("DELETE FROM movies WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Remove files from disk
        if (!empty($oldPaths['image_path']) && file_exists(__DIR__ . '/' . $oldPaths['image_path'])) {
            unlink(__DIR__ . '/' . $oldPaths['image_path']);
        }
        if (!empty($oldPaths['thumbnail_path']) && file_exists(__DIR__ . '/' . $oldPaths['thumbnail_path'])) {
            unlink(__DIR__ . '/' . $oldPaths['thumbnail_path']);
        }

        header("Location: admin.php");
        exit;
    }

    // DELETE SELECTED MOVIES (BULK)
    if (isset($_POST['delete_selected'])) {
        if (!empty($_POST['selected_movies']) && is_array($_POST['selected_movies'])) {
            $selected_movies = $_POST['selected_movies'];

            // 1) Fetch all image paths for these IDs, so we can remove them from disk
            $placeholders = implode(',', array_fill(0, count($selected_movies), '?'));
            $sqlSelect = "SELECT image_path, thumbnail_path FROM movies WHERE id IN ($placeholders)";
            $stmtSel = $conn->prepare($sqlSelect);
            $stmtSel->execute($selected_movies);
            $pathsToDelete = $stmtSel->fetchAll(PDO::FETCH_ASSOC);

            // 2) Delete from DB
            $sqlDel = "DELETE FROM movies WHERE id IN ($placeholders)";
            $stmtDel = $conn->prepare($sqlDel);
            $stmtDel->execute($selected_movies);

            // 3) Remove files from disk if found
            foreach ($pathsToDelete as $paths) {
                if (!empty($paths['image_path']) && file_exists(__DIR__ . '/' . $paths['image_path'])) {
                    unlink(__DIR__ . '/' . $paths['image_path']);
                }
                if (!empty($paths['thumbnail_path']) && file_exists(__DIR__ . '/' . $paths['thumbnail_path'])) {
                    unlink(__DIR__ . '/' . $paths['thumbnail_path']);
                }
            }
        }
        header("Location: admin.php");
        exit;
    }
}

/**************************************************
 * 4. Fetch Movies for Display
 **************************************************/
$stmt = $conn->query("SELECT * FROM movies ORDER BY id ASC");
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Movie Backoffice</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f4f4f9;
      color: #333;
    }
    h1 {
      text-align: center;
      color: #444;
      margin-bottom: 20px;
    }
    .action-buttons {
      text-align: center;
      margin-bottom: 20px;
    }
    .action-buttons button {
      padding: 10px 20px;
      margin: 5px;
      border: none;
      border-radius: 5px;
      background-color: #007bff;
      color: white;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .action-buttons button:hover {
      background-color: #0056b3;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background-color: white;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    table, th, td {
      border: 1px solid #ddd;
    }
    th, td {
      padding: 12px;
      text-align: left;
    }
    th {
      background-color: #007bff;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    tr:hover {
      background-color: #f1f1f1;
    }
    .modal {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center; align-items: center;
    }
    .modal-content {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      width: 300px;
      animation: slideIn 0.3s ease;
    }
    @keyframes slideIn {
      from { transform: translateY(-50px); opacity: 0; }
      to   { transform: translateY(0);     opacity: 1; }
    }
    .modal-content h2 {
      margin-top: 0;
    }
    .modal-content form label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    .modal-content form input[type="text"],
    .modal-content form input[type="date"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    .modal-content form button {
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      background-color: #007bff;
      color: white;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .modal-content form button[type="button"] {
      background-color: #6c757d;
    }
    .modal-content form button:hover {
      background-color: #0056b3;
    }
    .modal-content form button[type="button"]:hover {
      background-color: #5a6268;
    }
    .checkbox-cell {
      text-align: center;
    }
    .checkbox-cell input {
      cursor: pointer;
    }
    .thumb {
      max-width: 80px;
      max-height: 80px;
      border-radius: 5px;
      cursor: zoom-in; /* Indicates clickable for zoom */
    }
    
    /* Zoom Modal */
    #zoomModal {
      display: none; /* Hidden by default */
      position: fixed;
      z-index: 9999; /* On top */
      left: 0; top: 0;
      width: 100%; height: 100%;
      overflow: auto; /* Enable scroll if needed */
      background-color: rgba(0,0,0,0.8);
      justify-content: center; align-items: center;
    }
    #zoomModalContent {
      margin: auto;
      max-width: 90%;
      max-height: 90%;
      position: relative;
    }
    #zoomModalContent img {
      width: 100%; /* Make the image fit the container */
      height: auto;
      display: block;
      border-radius: 5px;
    }
    .closeZoom {
      position: absolute;
      top: 10px; right: 15px;
      color: #fff;
      font-size: 30px;
      font-weight: bold;
      cursor: pointer;
    }
    .closeZoom:hover {
      color: #ccc;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <h1>Admin Movie Backoffice</h1>

  <div class="action-buttons">
    <button onclick="openAddMovieModal()">Add Movie</button>
    <button onclick="deleteSelectedMovies()">Delete Selected</button>
  </div>

  <!-- Hidden form for bulk delete -->
  <form id="deleteSelectedForm" method="POST" action="admin.php" style="display: none;">
    <input type="hidden" name="delete_selected" value="1">
    <input type="hidden" id="selectedMoviesInput" name="selected_movies[]">
  </form>

  <table id="movieTable">
    <thead>
      <tr>
        <th class="checkbox-cell"><input type="checkbox" id="selectAll"></th>
        <th>ID</th>
        <th>Title</th>
        <th>Genre</th>
        <th>Release Date</th>
        <th>Thumbnail</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($movies)): ?>
        <?php foreach ($movies as $movie): ?>
        <tr>
          <td class="checkbox-cell">
            <input type="checkbox" class="movie-checkbox" value="<?= $movie['id'] ?>">
          </td>
          <td><?= $movie['id'] ?></td>
          <td><?= htmlspecialchars($movie['title'], ENT_QUOTES) ?></td>
          <td><?= htmlspecialchars($movie['genre'], ENT_QUOTES) ?></td>
          <td><?= $movie['release_date'] ?></td>
          <td>
            <?php if (!empty($movie['thumbnail_path']) && file_exists(__DIR__ . '/' . $movie['thumbnail_path'])): ?>
              <!-- Thumbnail (clickable to zoom) -->
              <img 
                src="<?= $movie['thumbnail_path'] ?>" 
                alt="Movie Thumbnail" 
                class="thumb"
                onclick="zoomImage('<?= $movie['image_path'] ?>')"
              />
            <?php else: ?>
              <em>No thumbnail</em>
            <?php endif; ?>
          </td>
          <td>
            <!-- "Edit" button triggers JS to open Edit Modal -->
            <button onclick="editMovie(
              <?= $movie['id'] ?>,
              '<?= htmlspecialchars($movie['title'], ENT_QUOTES) ?>',
              '<?= htmlspecialchars($movie['genre'], ENT_QUOTES) ?>',
              '<?= $movie['release_date'] ?>'
            )">
              Edit
            </button>
            <!-- "Delete" button triggers JS to confirm and post to this file -->
            <button onclick="deleteMovie(<?= $movie['id'] ?>)">Delete</button>
          </td>
        </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="7">No movies found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>

  <!-- Add Movie Modal -->
  <div id="addMovieModal" class="modal">
    <div class="modal-content">
      <h2>Add Movie</h2>
      <!-- enctype for file uploads -->
      <form id="addMovieForm" method="POST" action="admin.php" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" required>

        <label for="releaseDate">Release Date:</label>
        <input type="date" id="releaseDate" name="release_date" required>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" />

        <button type="submit" name="add_movie">Save</button>
        <button type="button" onclick="closeAddMovieModal()">Cancel</button>
      </form>
    </div>
  </div>

  <!-- Edit Movie Modal -->
  <div id="editMovieModal" class="modal">
    <div class="modal-content">
      <h2>Edit Movie</h2>
      <form id="editMovieForm" method="POST" action="admin.php" enctype="multipart/form-data">
        <input type="hidden" name="id" id="editMovieId">

        <label for="editTitle">Title:</label>
        <input type="text" id="editTitle" name="title" required>

        <label for="editGenre">Genre:</label>
        <input type="text" id="editGenre" name="genre" required>

        <label for="editReleaseDate">Release Date:</label>
        <input type="date" id="editReleaseDate" name="release_date" required>

        <label for="editImage">Image (Upload new to replace):</label>
        <input type="file" id="editImage" name="image" accept="image/*" />

        <button type="submit" name="edit_movie">Update</button>
        <button type="button" onclick="closeEditMovieModal()">Cancel</button>
      </form>
    </div>
  </div>

  <!-- Zoom Modal (for full-size image) -->
  <div id="zoomModal" onclick="closeZoomModal()">
    <div id="zoomModalContent">
      <span class="closeZoom" onclick="closeZoomModal()">&times;</span>
      <img id="zoomedImage" src="" alt="Full Image">
    </div>
  </div>

  <script>
    // ========== MODAL HANDLING (Add / Edit) ==========
    function openAddMovieModal() {
      document.getElementById('addMovieModal').style.display = 'flex';
    }
    function closeAddMovieModal() {
      document.getElementById('addMovieModal').style.display = 'none';
    }

    function openEditMovieModal() {
      document.getElementById('editMovieModal').style.display = 'flex';
    }
    function closeEditMovieModal() {
      document.getElementById('editMovieModal').style.display = 'none';
    }

    function editMovie(id, title, genre, releaseDate) {
      document.getElementById('editMovieId').value = id;
      document.getElementById('editTitle').value = title;
      document.getElementById('editGenre').value = genre;
      document.getElementById('editReleaseDate').value = releaseDate;
      openEditMovieModal();
    }

    // ========== DELETE SINGLE ==========
    function deleteMovie(id) {
      if (confirm(`Are you sure you want to delete movie with ID ${id}?`)) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'admin.php';

        const deleteMovieInput = document.createElement('input');
        deleteMovieInput.type = 'hidden';
        deleteMovieInput.name = 'delete_movie';
        deleteMovieInput.value = '1';
        form.appendChild(deleteMovieInput);

        const idInput = document.createElement('input');
        idInput.type = 'hidden';
        idInput.name = 'id';
        idInput.value = id;
        form.appendChild(idInput);

        document.body.appendChild(form);
        form.submit();
      }
    }

    // ========== BULK DELETE HANDLING ==========
    // "Select All" checkbox
    document.getElementById('selectAll').addEventListener('change', function() {
      const checkboxes = document.querySelectorAll('.movie-checkbox');
      checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
      });
    });

    // "Delete Selected" button
    function deleteSelectedMovies() {
      const checkboxes = document.querySelectorAll('.movie-checkbox:checked');
      if (checkboxes.length === 0) {
        alert('No movies selected.');
        return;
      }
      if (!confirm('Are you sure you want to delete the selected movies?')) {
        return;
      }

      const selectedIds = [];
      checkboxes.forEach(checkbox => {
        selectedIds.push(checkbox.value);
      });

      document.getElementById('selectedMoviesInput').value = selectedIds.join(',');
      document.getElementById('deleteSelectedForm').submit();
    }

    function zoomImage(fullImagePath) {
      if (!fullImagePath) return;

      document.getElementById('zoomedImage').src = fullImagePath;
      document.getElementById('zoomModal').style.display = 'flex';
    }

    function closeZoomModal() {
      document.getElementById('zoomModal').style.display = 'none';
    }
  </script>
</body>
</html>
