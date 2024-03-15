<?php 
include("database.php");
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nama_buku = $_POST['nama_buku'];
    $kode_buku = $_POST['kode_buku'];
    $publisher = $_POST['publisher'];
    $author = $_POST['author'];
    $stok = $_POST['stok']; 
    $query = "INSERT INTO buku (nama_buku, kode_buku, publisher, author, stok) VALUES ('$nama_buku', '$kode_buku', '$publisher', '$author', '$stok')";

    if (mysqli_query($dbconnect, $query)) {
        
        header("Location: buku.php");
        exit();
    } else {
        
        echo "Error: " . $query . "<br>" . mysqli_error($dbconnect);
    }
} else {
    
    header("Location: buku.php");
    exit();
}
?>