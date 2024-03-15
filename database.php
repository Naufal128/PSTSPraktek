<?php
define('DB_HOST', '127.0.0.1:3307');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'invntarisbarang');

$dbconnect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 
    function ceklogin($username,$password){
		global $dbconnect; 
		$usrnm = $username;
		$pass = $password;		
		$hasil = mysqli_query($dbconnect,"Select * from user where username='$usrnm' and password=('$pass')");
		$cek = mysqli_num_rows($hasil);
		if($cek > 0 ){
            $query = mysqli_fetch_array($hasil);
            $_SESSION['id_user'] = $query['id_user'];
            $_SESSION['username'] = $query['username'];
            $_SESSION['role'] = $query['role'];
			return true;		
        }
		else {
			return false;
		}	
	}

	function updatepengguna($id, $username, $password, $role, $token) {
		global $dbconnect; 

		$query = "UPDATE user SET username='$username', password='$password', role='$role', token='$token' WHERE id='$id'";
	
		if (mysqli_query($dbconnect, $query)) {
			return true;
		} else {
			return false;
		}
	}

	function ambilpeminjaman($dbconnect, $id) {
		$peminjaman = array(); 

		$query = "SELECT * FROM peminjaman WHERE id = $id";
		$result = mysqli_query($dbconnect, $query);
	
		if(mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_assoc($result);
			
			$peminjaman['id'] = $row['id'];
			$peminjaman['tgl_pinjam'] = $row['tgl_pinjam'];
			$peminjaman['tgl_kembali'] = $row['tgl_kembali'];
			$peminjaman['nama_buku'] = $row['nama_buku'];
			$peminjaman['jumlah'] = $row['jumlah'];
		}
	
		return $peminjaman;
	}
?> 