<?php  
	session_start();
	echo "<script>alert('Apakah Anda Yakin Akan Keluar ?')</script>";
	unset($_SESSION['username']);
	session_destroy();
	header('location:index.php');
?>