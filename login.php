<?php
	if (isset($_POST['login'])) {
		session_start();
		include 'koneksi.php';
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' and '$password' = '$password'");
		$hasil = mysqli_fetch_assoc($query);
		if ($hasil != NULL) {
			$username = $hasil['username'];
			$nama	=	$hasil['nama'];
			$gambar	=	$hasil['gambar'];
			$status	=	$hasil['status'];
			if ($status == '1') {
				$_SESSION['username'] = $username;
				$_SESSION['nama'] = $nama;
				$_SESSION['gambar'] = $gambar;
				header('location:halaman_admin.php');
			}else{
				$_SESSION['username'] = $username;
				$_SESSION['nama'] = $nama;
				$_SESSION['gambar'] = $gambar;
				header('location:index.php');
			}
		}else{
			echo '<script language="javascript">alert("username/password anda salah!"); document.location="index.php";</script>';
		}
	}
?>