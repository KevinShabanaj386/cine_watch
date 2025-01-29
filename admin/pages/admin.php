<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Movie Controller</title>
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
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
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
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .modal-content h2 {
            margin-top: 0;
        }
        .modal-content form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .modal-content form input {
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
    </style>
</head>
<body>
    <h1>Admin Movie Controller</h1>

    <!-- Movie Action Buttons -->
    <div class="action-buttons">
        <button onclick="openAddMovieModal()">Add Movie</button>
        <button onclick="openEditMovieModal()">Edit Movie</button>
        <button onclick="deleteSelectedMovies()">Delete Selected</button>
    </div>

    <!-- Movie Table List -->
    <table id="movieTable">
        <thead>
            <tr>
                <th class="checkbox-cell"><input type="checkbox" id="selectAll"></th>
                <th>ID</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Release Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Static Data -->
            <tr>
                <td class="checkbox-cell"><input type="checkbox" class="movie-checkbox" data-id="1"></td>
                <td>1</td>
                <td>Inception</td>
                <td>Sci-Fi</td>
                <td>2010-07-16</td>
                <td>
                    <button onclick="editMovie(1)">Edit</button>
                    <button onclick="deleteMovie(1)">Delete</button>
                </td>
            </tr>
            <tr>
                <td class="checkbox-cell"><input type="checkbox" class="movie-checkbox" data-id="2"></td>
                <td>2</td>
                <td>The Dark Knight</td>
                <td>Action</td>
                <td>2008-07-18</td>
                <td>
                    <button onclick="editMovie(2)">Edit</button>
                    <button onclick="deleteMovie(2)">Delete</button>
                </td>
            </tr>
            <!-- Dynamic data will be populated here using JavaScript or server-side rendering -->
        </tbody>
    </table>

    <!-- Add Movie Modal -->
    <div id="addMovieModal" class="modal">
        <div class="modal-content">
            <h2>Add Movie</h2>
            <form id="addMovieForm">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
                <label for="genre">Genre:</label>
                <input type="text" id="genre" name="genre" required>
                <label for="releaseDate">Release Date:</label>
                <input type="date" id="releaseDate" name="releaseDate" required>
                <button type="submit">Save</button>
                <button type="button" onclick="closeAddMovieModal()">Cancel</button>
            </form>
        </div>
    </div>

    <!-- Edit Movie Modal -->
    <div id="editMovieModal" class="modal">
        <div class="modal-content">
            <h2>Edit Movie</h2>
            <form id="editMovieForm">
                <input type="hidden" id="editMovieId" name="id">
                <label for="editTitle">Title:</label>
                <input type="text" id="editTitle" name="title" required>
                <label for="editGenre">Genre:</label>
                <input type="text" id="editGenre" name="genre" required>
                <label for="editReleaseDate">Release Date:</label>
                <input type="date" id="editReleaseDate" name="releaseDate" required>
                <button type="submit">Update</button>
                <button type="button" onclick="closeEditMovieModal()">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        // JavaScript Functions for Modals and Actions
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

        function editMovie(movieId) {
            // Fetch movie details by ID (e.g., from an API or static data)
            const movie = {
                id: movieId,
                title: "Inception", // Example data
                genre: "Sci-Fi",
                releaseDate: "2010-07-16"
            };

            // Populate the edit form
            document.getElementById('editMovieId').value = movie.id;
            document.getElementById('editTitle').value = movie.title;
            document.getElementById('editGenre').value = movie.genre;
            document.getElementById('editReleaseDate').value = movie.releaseDate;

            openEditMovieModal();
        }

        function deleteMovie(movieId) {
            if (confirm(`Are you sure you want to delete movie with ID ${movieId}?`)) {
                // Perform delete action (e.g., send a request to the server)
                alert(`Movie with ID ${movieId} deleted.`);
                // Refresh the table or remove the row dynamically
            }
        }

        // Handle form submissions
        document.getElementById('addMovieForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const title = document.getElementById('title').value;
            const genre = document.getElementById('genre').value;
            const releaseDate = document.getElementById('releaseDate').value;

            // Perform save action (e.g., send data to the server)
            alert(`Movie added: ${title}, ${genre}, ${releaseDate}`);
            closeAddMovieModal();
        });

        document.getElementById('editMovieForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const id = document.getElementById('editMovieId').value;
            const title = document.getElementById('editTitle').value;
            const genre = document.getElementById('editGenre').value;
            const releaseDate = document.getElementById('editReleaseDate').value;

            // Perform update action (e.g., send data to the server)
            alert(`Movie updated: ID ${id}, ${title}, ${genre}, ${releaseDate}`);
            closeEditMovieModal();
        });

        // Select All Checkbox Functionality
        document.getElementById('selectAll').addEventListener('change', function () {
            const checkboxes = document.querySelectorAll('.movie-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        // Delete Selected Movies Functionality
        function deleteSelectedMovies() {
            const selectedMovies = [];
            const checkboxes = document.querySelectorAll('.movie-checkbox:checked');
            checkboxes.forEach(checkbox => {
                selectedMovies.push(checkbox.getAttribute('data-id'));
            });

            if (selectedMovies.length === 0) {
                alert('No movies selected.');
                return;
            }

            if (confirm(`Are you sure you want to delete the selected movies?`)) {
                alert(`Movies with IDs ${selectedMovies.join(', ')} deleted.`);
            }
        }
    </script>
</body>
</html>