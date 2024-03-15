<?php 
include("database.php");
 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 

    $id = $_POST['id'];
    $nama_buku = $_POST['nama_buku'];
    $kode_buku = $_POST['kode_buku'];
    $publisher = $_POST['publisher'];
    $author = $_POST['author'];
    $stok = $_POST['stok'];
 
    $query = "UPDATE buku SET nama_buku='$nama_buku', kode_buku='$kode_buku', publisher='$publisher', author='$author', stok='$stok' WHERE id='$id'";

    if (mysqli_query($dbconnect, $query)) { 

        header("Location: buku.php");
        exit();
    } else { 

        echo "Error: " . $query . "<br>" . mysqli_error($dbconnect);
    }
}
 
if(isset($_GET['id'])){ 

    $id = $_GET['id'];
    $query = "SELECT * FROM buku WHERE id='$id'";
    $result = mysqli_query($dbconnect, $query);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
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
        <h2 class="mb-4">Edit Buku</h2>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="mb-3">
                <label for="nama_buku" class="form-label">Nama Buku:</label>
                <input type="text" class="form-control" name="nama_buku" value="<?php echo $row['nama_buku']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="kode_buku" class="form-label">Kode Buku:</label>
                <input type="text" class="form-control" name="kode_buku" value="<?php echo $row['kode_buku']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="publisher" class="form-label">Publisher:</label>
                <input type="text" class="form-control" name="publisher" value="<?php echo $row['publisher']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author:</label>
                <input type="text" class="form-control" name="author" value="<?php echo $row['author']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok:</label>
                <input type="text" class="form-control" name="stok" value="<?php echo $row['stok']; ?>" required>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-outline-info" value="Update">
            </div>
        </form> 
        <a href="buku.php" class="btn btn-outline-secondary">Kembali Ke List Buku</a>
    </div>

    <!-- Optional: Add Bootstrap JS and Popper.js scripts if needed -->
    <!-- <script src="path/to/popper.js"></script>
         <script src="path/to/bootstrap.js"></script> -->
</body>
</html>