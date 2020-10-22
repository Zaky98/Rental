<?php  

require_once "koneksi.php";
$id = $_GET['id'];
$id_mobil = $_GET['id_mobil'];

mysqli_query($conn, "UPDATE mobil SET sewa=0 where id='$id_mobil'");
mysqli_query($conn, "DELETE FROM peminjaman where id = '$id'");
header('location:halaman_admin.php');


?>