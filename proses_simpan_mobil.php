<?php
require_once "koneksi.php";
$aksi = $_GET['aksi'];

$id = $_GET['id'];
$sewa = $_GET['sewa'];
$merk = $_POST['merk'];
$type = $_POST['type'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi']; 
$foto = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
$path = "img/".$foto;

if ($aksi == 'Tambah') {
  if(move_uploaded_file($tmp, $path)){ 
    $query = "INSERT INTO mobil VALUES('".$id."', '".$merk."', '".$type."', '".$harga ."', '".$deskripsi ."', '".$foto."', '".$sewa."')";
    $sql = mysqli_query($conn, $query);
    if($sql){ 
      header("location: halaman_admin.php"); 
    }else{
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='halaman_admin.php'>Kembali Ke Form</a>";
    }
  }else{
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='halaman_admin.php'>Kembali Ke Form</a>";
  }
}elseif ($aksi == 'Edit') {
  move_uploaded_file($tmp, $path);
  if($foto == NULL){
    $query = mysqli_query($conn, "UPDATE mobil SET 
              merk = '$merk',
              type = '$type',
              harga   = '$harga',
              deskripsi = '$deskripsi'
                WHERE id = '$id'");
   
    if($query != NULL ){
      echo "<script>alert('Data Berhasil Diupdate')</script>";
        header('location:halaman_admin.php');
    }
  }else{
    $query = mysqli_query($conn, "UPDATE mobil SET
              merk = '$merk',
              type = '$type',
              harga   = '$harga',
              deskripsi = '$deskripsi',
              gambar  = '$foto'
                WHERE id = '$id'");
    if($query != NULL){
      echo "<script>alert('Data Berhasil Diupdate')</script>";
        header('location:halaman_admin.php');
    }
  }
}elseif ($aksi == 'Hapus') {
  $query = mysqli_query($conn, "DELETE from mobil where id = '$id'");
  header('location:halaman_admin.php');
}
?>