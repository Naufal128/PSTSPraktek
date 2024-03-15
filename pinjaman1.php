<?php 
include("database.php");
?>

<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:login.php?pesan=belumlogin");
}else{ 
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Peminjaman</title>
  </head>
  <body>
  <?php 
        include("navbar1.php");

        // Fetch data from the database
        $query = "SELECT * FROM peminjaman";
        $result = mysqli_query($dbconnect, $query);
    ?>

<div class="container">
  <br>
<h1>List Peminjaman</h1>
<br>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th> 
      <th scope="col">Tanggal Pinjam</th>
      <th scope="col">Tanggal Kembali</th> 
      <th scope="col">Nama Buku</th>
      <th scope="col">Jumlah</th> 
    </tr>
  </thead>
  <tbody>
    <?php
      $i = 1;
      while($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th> 
      <td><?php echo $row['tgl_pinjam']; ?></td>
      <td><?php echo $row['tgl_kembali']; ?></td> 
      <td><?php echo $row['nama_buku']; ?></td>
      <td><?php echo $row['jumlah']; ?></td> 
    </tr>
    <?php } ?>
  </tbody>
</table> 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>