<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$dbname = 'cineWhatch';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

/**
 * Create a thumbnail from a given image file.
 */
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

    // Preserve transparency for PNG/GIF
    if ($imageType == IMAGETYPE_PNG || $imageType == IMAGETYPE_GIF) {
        imagecolortransparent($thumbImage, imagecolorallocate($thumbImage, 0, 0, 0));
        imagealphablending($thumbImage, false);
        imagesavealpha($thumbImage, true);
    }

    imagecopyresampled(
        $thumbImage,
        $sourceImage,
        0, 0, 0, 0,
        $newWidth,
        $newHeight,
        $origWidth,
        $origHeight
    );

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

/**
 * Handle the file upload for an image, creating a thumbnail as well.
 */
function handleImageUpload($fileInputName = 'image') {
    if (!isset($_FILES[$fileInputName]) || $_FILES[$fileInputName]['error'] === UPLOAD_ERR_NO_FILE) {
        // No file was uploaded
        return null;
    }

    if ($_FILES[$fileInputName]['error'] !== UPLOAD_ERR_OK) {
        throw new RuntimeException('Image upload error code: ' . $_FILES[$fileInputName]['error']);
    }

    // Paths
    $uploadsDir = __DIR__ . '/dist/images/movie-play';
    $thumbsDir  = __DIR__ . '/dist/images/movie-play/thumbs';

    // Ensure directories exist
    if (!is_dir($uploadsDir)) {
        if (!mkdir($uploadsDir, 0777, true)) {
            throw new RuntimeException("Failed to create directory: $uploadsDir");
        }
    }
    if (!is_dir($thumbsDir)) {
        if (!mkdir($thumbsDir, 0777, true)) {
            throw new RuntimeException("Failed to create directory: $thumbsDir");
        }
    }

    // Generate a unique filename
    $ext  = pathinfo($_FILES[$fileInputName]['name'], PATHINFO_EXTENSION);
    $uniq = 'movie_' . time() . '_' . mt_rand(1000, 9999);
    $filename = $uniq . '.' . strtolower($ext);

    $targetFile = $uploadsDir . '/' . $filename;       // full image
    $thumbFile  = $thumbsDir  . '/' . $filename;       // thumbnail

    // Move the uploaded file to the target location
    if (!move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $targetFile)) {
        throw new RuntimeException('Failed to move uploaded file.');
    }

    // Create thumbnail
    createThumbnail($targetFile, $thumbFile);

    // We only store the main image path in the DB, not the thumbnail
    // Let's store a *relative* path for the main image
    $relativePath = 'dist/images/movie-play/' . $filename;

    return $relativePath;
}

/**
 * Handle incoming POST requests (Add, Edit, Delete, Bulk-Delete).
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. ADD MOVIE
    if (isset($_POST['add_movie'])) {
        $title       = $_POST['title']        ?? '';
        $description = $_POST['description']  ?? '';
        $languages   = $_POST['languages']    ?? '';
        $ratings     = $_POST['ratings']      ?? '';
        $genre       = $_POST['genre']        ?? '';
        $releaseDate = $_POST['release_date'] ?? '';

        // Handle image upload
        $imagePath = handleImageUpload('image');

        // Insert into DB
        $sql = "INSERT INTO movies (
                    title,
                    image,
                    description,
                    release_date,
                    languages,
                    ratings,
                    genre
                ) VALUES (
                    :title,
                    :image,
                    :description,
                    :release_date,
                    :languages,
                    :ratings,
                    :genre
                )";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':title',        $title);
        $stmt->bindParam(':image',        $imagePath);
        $stmt->bindParam(':description',  $description);
        $stmt->bindParam(':release_date', $releaseDate);
        $stmt->bindParam(':languages',    $languages);
        $stmt->bindParam(':ratings',      $ratings);
        $stmt->bindParam(':genre',        $genre);
        $stmt->execute();

        header("Location: admin.php");
        exit;
    }

    // 2. EDIT MOVIE
    if (isset($_POST['edit_movie'])) {
        $id          = $_POST['id'];
        $title       = $_POST['title']        ?? '';
        $description = $_POST['description']  ?? '';
        $languages   = $_POST['languages']    ?? '';
        $ratings     = $_POST['ratings']      ?? '';
        $genre       = $_POST['genre']        ?? '';
        $releaseDate = $_POST['release_date'] ?? '';

        // See if a new image was uploaded
        $newImage = handleImageUpload('image');

        if ($newImage !== null) {
            // Update including the new image
            $sql = "
                UPDATE movies
                   SET title = :title,
                       image = :image,
                       description = :description,
                       release_date = :release_date,
                       languages = :languages,
                       ratings = :ratings,
                       genre = :genre
                 WHERE id = :id
            ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':image', $newImage);

            // Before updating, remove old file from disk if you want:
            // 1) fetch old path from DB
            $oldStmt = $conn->prepare("SELECT image FROM movies WHERE id = :id");
            $oldStmt->bindParam(':id', $id);
            $oldStmt->execute();
            $oldImage = $oldStmt->fetchColumn();

            // 2) if exists on disk, remove it. (Optional step)
            if ($oldImage && file_exists(__DIR__ . '/' . $oldImage)) {
                unlink(__DIR__ . '/' . $oldImage);
                // Also remove the old thumbnail, if you want:
                $oldThumb = str_replace('movie-play/', 'movie-play/thumbs/', $oldImage);
                if (file_exists(__DIR__ . '/' . $oldThumb)) {
                    unlink(__DIR__ . '/' . $oldThumb);
                }
            }
        } else {
            // Update without changing the image
            $sql = "
                UPDATE movies
                   SET title = :title,
                       description = :description,
                       release_date = :release_date,
                       languages = :languages,
                       ratings = :ratings,
                       genre = :genre
                 WHERE id = :id
            ";
            $stmt = $conn->prepare($sql);
        }

        $stmt->bindParam(':title',       $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':release_date',$releaseDate);
        $stmt->bindParam(':languages',   $languages);
        $stmt->bindParam(':ratings',     $ratings);
        $stmt->bindParam(':genre',       $genre);
        $stmt->bindParam(':id',          $id);
        $stmt->execute();

        header("Location: admin.php");
        exit;
    }

    // 3. DELETE MOVIE
    if (isset($_POST['delete_movie'])) {
        $id = $_POST['id'];

        // Get old image path to delete from disk
        $stmt = $conn->prepare("SELECT image FROM movies WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $oldImage = $stmt->fetchColumn();

        // Delete row from DB
        $stmt = $conn->prepare("DELETE FROM movies WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Remove file(s) from disk
        if ($oldImage && file_exists(__DIR__ . '/' . $oldImage)) {
            unlink(__DIR__ . '/' . $oldImage);

            // Also remove the thumbnail if it exists
            $oldThumb = str_replace('movie-play/', 'movie-play/thumbs/', $oldImage);
            if (file_exists(__DIR__ . '/' . $oldThumb)) {
                unlink(__DIR__ . '/' . $oldThumb);
            }
        }

        header("Location: admin.php");
        exit;
    }

    // 4. DELETE SELECTED MOVIES
    if (isset($_POST['delete_selected'])) {
        if (!empty($_POST['selected_movies']) && is_array($_POST['selected_movies'])) {
            // If the form sent a single hidden input with comma-separated IDs,
            // you might need to explode them. Adjust as needed.
            // For now, we assume it's an array of IDs.
            $selected_movies = $_POST['selected_movies'];

            $placeholders = implode(',', array_fill(0, count($selected_movies), '?'));

            // 4a) Get their images
            $sqlSelect = "SELECT image FROM movies WHERE id IN ($placeholders)";
            $stmtSel = $conn->prepare($sqlSelect);
            $stmtSel->execute($selected_movies);
            $imagesToDelete = $stmtSel->fetchAll(PDO::FETCH_COLUMN);

            // 4b) Delete rows from DB
            $sqlDel = "DELETE FROM movies WHERE id IN ($placeholders)";
            $stmtDel = $conn->prepare($sqlDel);
            $stmtDel->execute($selected_movies);

            // 4c) Delete files from disk
            foreach ($imagesToDelete as $img) {
                if ($img && file_exists(__DIR__ . '/' . $img)) {
                    unlink(__DIR__ . '/' . $img);
                }
                // Also remove the thumbnail
                $thumbPath = str_replace('movie-play/', 'movie-play/thumbs/', $img);
                if (file_exists(__DIR__ . '/' . $thumbPath)) {
                    unlink(__DIR__ . '/' . $thumbPath);
                }
            }
        }
        header("Location: admin.php");
        exit;
    }
}

// Fetch all movies for display
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
      font-family: Arial, sans-serif;
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
      color: #fff;
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
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    table, th, td {
      border: 1px solid #ddd;
    }
    th, td {
      padding: 12px;
      text-align: left;
      vertical-align: top;
    }
    th {
      background-color: #007bff;
      color: #fff;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    tr:hover {
      background-color: #f1f1f1;
    }
    .checkbox-cell {
      text-align: center;
      vertical-align: middle;
    }
    .checkbox-cell input {
      cursor: pointer;
    }
    .thumb {
      max-width: 80px;
      max-height: 80px;
      border-radius: 5px;
      cursor: zoom-in;
    }
    .desc-cell {
      max-width: 250px;
      white-space: pre-wrap; /* so \n or large text wraps properly */
    }

    /* Modal styling */
    .modal {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center; align-items: center;
    }
    .modal-content {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      width: 400px;
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
    .modal-content form input[type="date"],
    .modal-content form textarea {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    .modal-content form textarea {
      resize: vertical;
    }
    .modal-content form button {
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .modal-content form button[type="button"] {
      background-color: #6c757d;
      margin-left: 10px;
    }
    .modal-content form button:hover {
      background-color: #0056b3;
    }
    .modal-content form button[type="button"]:hover {
      background-color: #5a6268;
    }

    /* Zoom modal */
    #zoomModal {
      display: none;
      position: fixed;
      z-index: 9999;
      left: 0; top: 0;
      width: 100%; height: 100%;
      overflow: auto;
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
      width: 100%;
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
      user-select: none;
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

<!-- Hidden form for bulk-delete -->
<form id="deleteSelectedForm" method="POST" action="admin.php" style="display: none;">
  <input type="hidden" name="delete_selected" value="1">
  <!-- This hidden input will store the IDs of selected movies -->
  <input type="hidden" id="selectedMoviesInput" name="selected_movies[]">
</form>

<table id="movieTable">
  <thead>
    <tr>
      <th class="checkbox-cell"><input type="checkbox" id="selectAll"></th>
      <th>ID</th>
      <th>Title</th>
      <th>Description</th>
      <th>Release Date</th>
      <th>Languages</th>
      <th>Ratings</th>
      <th>Genre</th>
      <th>Image</th>
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
          <td class="desc-cell"><?= nl2br(htmlspecialchars($movie['description'], ENT_QUOTES)) ?></td>
          <td><?= htmlspecialchars($movie['release_date'], ENT_QUOTES) ?></td>
          <td><?= htmlspecialchars($movie['languages'], ENT_QUOTES) ?></td>
          <td><?= htmlspecialchars($movie['ratings'], ENT_QUOTES) ?></td>
          <td><?= htmlspecialchars($movie['genre'], ENT_QUOTES) ?></td>
          <td>
            <?php
              // Derive the thumbnail path (if it exists)
              if (!empty($movie['image']) && file_exists(__DIR__ . '/' . $movie['image'])) {
                  $thumbnailPath = str_replace('movie-play/', 'movie-play/thumbs/', $movie['image']);
                  if (file_exists(__DIR__ . '/' . $thumbnailPath)) {
                      // Show the thumbnail
                      echo '<img src="' . $thumbnailPath . '" 
                                 alt="Movie Thumbnail"
                                 class="thumb"
                                 onclick="zoomImage(\'' . $movie['image'] . '\')" />';
                  } else {
                      // If no separate thumbnail found, just display the main image or "No thumbnail"
                      echo '<img src="' . $movie['image'] . '" 
                                 alt="Movie Image"
                                 class="thumb"
                                 onclick="zoomImage(\'' . $movie['image'] . '\')" />';
                  }
              } else {
                  echo '<em>No image</em>';
              }
            ?>
          </td>
          <td>
            <button onclick="editMovie(
              <?= $movie['id'] ?>,
              '<?= htmlspecialchars($movie['title'], ENT_QUOTES) ?>',
              `<?= htmlspecialchars($movie['description'], ENT_QUOTES) ?>`,
              '<?= $movie['release_date'] ?>',
              '<?= htmlspecialchars($movie['languages'], ENT_QUOTES) ?>',
              '<?= htmlspecialchars($movie['ratings'], ENT_QUOTES) ?>',
              '<?= htmlspecialchars($movie['genre'], ENT_QUOTES) ?>'
            )">
              Edit
            </button>
            <button onclick="deleteMovie(<?= $movie['id'] ?>)">Delete</button>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr><td colspan="10">No movies found.</td></tr>
    <?php endif; ?>
  </tbody>
</table>

<!-- ADD MOVIE MODAL -->
<div id="addMovieModal" class="modal">
  <div class="modal-content">
    <h2>Add Movie</h2>
    <form id="addMovieForm" method="POST" action="admin.php" enctype="multipart/form-data">
      <label for="title">Title:</label>
      <input type="text" id="title" name="title" required>

      <label for="description">Description:</label>
      <textarea id="description" name="description" rows="3"></textarea>

      <label for="languages">Languages:</label>
      <input type="text" id="languages" name="languages">

      <label for="ratings">Ratings:</label>
      <input type="text" id="ratings" name="ratings">

      <label for="genre">Genre:</label>
      <input type="text" id="genre" name="genre">

      <label for="releaseDate">Release Date:</label>
      <input type="date" id="releaseDate" name="release_date">

      <label for="image">Image:</label>
      <input type="file" id="image" name="image" accept="image/*">

      <div style="margin-top:10px;">
        <button type="submit" name="add_movie">Save</button>
        <button type="button" onclick="closeAddMovieModal()">Cancel</button>
      </div>
    </form>
  </div>
</div>

<!-- EDIT MOVIE MODAL -->
<div id="editMovieModal" class="modal">
  <div class="modal-content">
    <h2>Edit Movie</h2>
    <form id="editMovieForm" method="POST" action="admin.php" enctype="multipart/form-data">
      <!-- Hidden field for ID -->
      <input type="hidden" name="id" id="editMovieId">

      <label for="editTitle">Title:</label>
      <input type="text" id="editTitle" name="title" required>

      <label for="editDescription">Description:</label>
      <textarea id="editDescription" name="description" rows="3"></textarea>

      <label for="editLanguages">Languages:</label>
      <input type="text" id="editLanguages" name="languages">

      <label for="editRatings">Ratings:</label>
      <input type="text" id="editRatings" name="ratings">

      <label for="editGenre">Genre:</label>
      <input type="text" id="editGenre" name="genre">

      <label for="editReleaseDate">Release Date:</label>
      <input type="date" id="editReleaseDate" name="release_date">

      <label for="editImage">Image (Upload new to replace):</label>
      <input type="file" id="editImage" name="image" accept="image/*">

      <div style="margin-top:10px;">
        <button type="submit" name="edit_movie">Update</button>
        <button type="button" onclick="closeEditMovieModal()">Cancel</button>
      </div>
    </form>
  </div>
</div>

<!-- ZOOM IMAGE MODAL -->
<div id="zoomModal" onclick="closeZoomModal()">
  <div id="zoomModalContent">
    <span class="closeZoom" onclick="closeZoomModal()">&times;</span>
    <img id="zoomedImage" src="" alt="Full Image">
  </div>
</div>

<script>
  // Show Add Modal
  function openAddMovieModal() {
    document.getElementById('addMovieModal').style.display = 'flex';
  }
  // Hide Add Modal
  function closeAddMovieModal() {
    document.getElementById('addMovieModal').style.display = 'none';
  }

  // Show Edit Modal
  function openEditMovieModal() {
    document.getElementById('editMovieModal').style.display = 'flex';
  }
  // Hide Edit Modal
  function closeEditMovieModal() {
    document.getElementById('editMovieModal').style.display = 'none';
  }

  // Pre-fill and open the Edit Movie modal
  function editMovie(
    id,
    title,
    description,
    releaseDate,
    languages,
    ratings,
    genre
  ) {
    document.getElementById('editMovieId').value      = id;
    document.getElementById('editTitle').value        = title;
    document.getElementById('editDescription').value  = description;
    document.getElementById('editReleaseDate').value  = releaseDate;
    document.getElementById('editLanguages').value    = languages;
    document.getElementById('editRatings').value      = ratings;
    document.getElementById('editGenre').value        = genre;

    openEditMovieModal();
  }

  // Single Delete
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

  // Select/Deselect All
  document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.movie-checkbox');
    checkboxes.forEach(cb => {
      cb.checked = this.checked;
    });
  });

  // Bulk Delete
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
    checkboxes.forEach(cb => selectedIds.push(cb.value));

    // Put these IDs into the hidden input (comma-separated)
    document.getElementById('selectedMoviesInput').value = selectedIds.join(',');
    document.getElementById('deleteSelectedForm').submit();
  }

  // Zoom Image
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
