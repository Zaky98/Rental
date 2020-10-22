<?php
require_once "koneksi.php";
$aksi = $_GET['aksi'];

$id = $_GET['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];  
$foto = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
$path = "img/".$foto;

if ($aksi == 'Tambah') {
  if(move_uploaded_file($tmp, $path)){ 
    $query = "INSERT INTO users VALUES('".$id."', '".$username."', '".$password."', '".$nama ."', '".$foto."')";
    $sql = mysqli_query($conn, $query);
    if($sql){ 
      header("location: index.php"); 
    }else{
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='simpan.php'>Kembali Ke Form</a>";
    }
  }else{
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='simpan.php'>Kembali Ke Form</a>";
  }
}elseif ($aksi == 'Edit') {
  move_uploaded_file($tmp, $path);
  if($foto == NULL){
    $query = mysqli_query($conn, "UPDATE users SET 
              username = '$username',
              password = '$password',
              nama   = '$nama'
                WHERE id = '$id'");
   
    if($query != NULL ){
      echo "<script>alert('Data Berhasil Diupdate')</script>";
        header('location:index.php');
    }
  }else{
    $query = mysqli_query($conn, "UPDATE users SET
              username = '$username',
              password = '$password',
              nama   = '$nama',
              gambar  = '$foto'
                WHERE id = '$id'");
    if($query != NULL){
      echo "<script>alert('Data Berhasil Diupdate')</script>";
        header('location:index.php');
    }
  }
}elseif ($aksi == 'Hapus') {
  $query = mysqli_query($conn, "DELETE from users where id = '$id'");
  header('location:index.php');
}
?>