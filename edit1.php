<?php 
include("database.php");

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "SELECT * FROM peminjaman WHERE id = $id";
    $result = mysqli_query($dbconnect, $query);
    
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result); 
        $tgl_pinjam = $row['tgl_pinjam'];
        $tgl_kembali = $row['tgl_kembali'];
        $nama_buku = $row['nama_buku'];
        $jumlah = $row['jumlah'];
    } else {
        echo "Data not found";
        exit();
    }
} else {
    echo "Invalid request";
    exit();
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $nama_buku = $_POST['nama_buku'];
    $jumlah = $_POST['jumlah'];
 
    $query = "UPDATE peminjaman SET tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali', nama_buku='$nama_buku', jumlah='$jumlah' WHERE id='$id'";
    $result = mysqli_query($dbconnect, $query);

    if ($result) { 
        header("Location: pinjaman.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($dbconnect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Peminjaman</title>
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
        <h2 class="mb-4">Edit Data Peminjaman</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="tgl_pinjam" class="form-label">Tanggal Pinjam:</label>
                <input type="date" class="form-control" name="tgl_pinjam" value="<?php echo $tgl_pinjam; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tgl_kembali" class="form-label">Tanggal Kembali:</label>
                <input type="date" class="form-control" name="tgl_kembali" value="<?php echo $tgl_kembali; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama_buku" class="form-label">Nama Buku:</label>
                <input type="text" class="form-control" name="nama_buku" value="<?php echo $nama_buku; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah:</label>
                <input type="text" class="form-control" name="jumlah" value="<?php echo $jumlah; ?>" required>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-outline-info" value="Update">
            </div>
        </form> 
        <a href="pinjaman.php" class="btn btn-outline-secondary">Kembali ke List Peminjaman</a>
    </div>

    <!-- Optional: Add Bootstrap JS and Popper.js scripts if needed -->
    <!-- <script src="path/to/popper.js"></script>
         <script src="path/to/bootstrap.js"></script> -->
</body>
</html>