<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $nama_buku = $_POST['nama_buku'];
    $jumlah = $_POST['jumlah'];
    
    $query = "INSERT INTO peminjaman (tgl_pinjam, tgl_kembali, nama_buku, jumlah) 
              VALUES ('$tgl_pinjam', '$tgl_kembali', '$nama_buku', '$jumlah')";

    if (mysqli_query($dbconnect, $query)) {
        
        header("Location: member.php");
        exit();
    } else {
        
        echo "Error: " . $query . "<br>" . mysqli_error($dbconnect);
    }
}

// Query to get the list of available books
$available_books_query = "SELECT nama_buku FROM buku";
$available_books_result = mysqli_query($dbconnect, $available_books_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Peminjaman</title>
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
        <h2 class="mb-4">Peminjaman Buku</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="tgl_pinjam" class="form-label">Tanggal Pinjam:</label>
                <input type="date" class="form-control" name="tgl_pinjam" required>
            </div>
            <div class="mb-3">
                <label for="tgl_kembali" class="form-label">Tanggal Kembali:</label>
                <input type="date" class="form-control" name="tgl_kembali" required>
            </div>
            <div class="mb-3">
                <label for="nama_buku" class="form-label">Buku:</label>
                <select class="form-control" name="nama_buku" required>
                    <option value="">Pilih Buku</option>
                    <?php while ($row = mysqli_fetch_assoc($available_books_result)) { ?>
                        <option value="<?php echo $row['nama_buku']; ?>"><?php echo $row['nama_buku']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah:</label>
                <input type="text" class="form-control" name="jumlah" required>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-outline-info" value="Pinjam">
            </div>
        </form> 
        <a href="member.php" class="btn btn-outline-secondary">Kembali ke Halaman Utama</a>
    </div>

    <!-- Optional: Add Bootstrap JS and Popper.js scripts if needed -->
    <!-- <script src="path/to/popper.js"></script>
         <script src="path/to/bootstrap.js"></script> -->
</body>
</html>