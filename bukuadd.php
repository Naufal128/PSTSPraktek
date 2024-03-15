<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Buku</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 50px;
        } 
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Tambah New Buku</h2>
        <form method="post" action="insert_buku.php"> <!-- Update form action to point to the script for adding data -->
            <div class="mb-3">
                <label for="nama_buku" class="form-label">Nama Buku:</label>
                <input type="text" class="form-control" name="nama_buku" required>
            </div>
            <div class="mb-3">
                <label for="kode_buku" class="form-label">Kode Buku:</label>
                <input type="text" class="form-control" name="kode_buku" required>
            </div>
            <div class="mb-3">
                <label for="publisher" class="form-label">Publisher:</label>
                <input type="text" class="form-control" name="publisher" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author:</label>
                <input type="text" class="form-control" name="author" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok:</label>
                <input type="text" class="form-control" name="stok" required>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-outline-info" value="Tambah">
            </div>
        </form> 
        <a href="buku.php" class="btn btn-outline-secondary">Kembali Ke List Buku</a>
    </div>

    <!-- Optional: Add Bootstrap JS and Popper.js scripts if needed -->
    <!-- <script src="path/to/popper.js"></script>
         <script src="path/to/bootstrap.js"></script> -->
</body>
</html>