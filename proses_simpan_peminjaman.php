<?php
require_once "koneksi.php";
session_start();
$aksi = $_GET['aksi'];
$id_mobil = $_GET['id_mobil'];
$peminjam = $_SESSION['username'];
$id = $_GET['id'];
$tgl_pinjam = $_POST['tanggal_pinjam'];
$tgl_kembail = $_POST['tanggal_kembali'];
$tgl_pengembalian = $_POST['tanggal_pengembalian'];
$query  = mysqli_query($conn,"SELECT * FROM mobil where id='$id_mobil'");
$hasil  = mysqli_fetch_assoc($query);
$harga = $hasil['harga'];
function hitungHari($awal,$akhir){
  $tglAwal = strtotime($awal);
  $tglAkhir = strtotime($akhir);
  $jeda = abs($tglAkhir - $tglAwal);
return floor($jeda/(60*60*24));
}
$jml_hari = hitungHari($tgl_pinjam, $tgl_kembail);
$totalharga = $harga * $jml_hari;
mysqli_query($conn, "UPDATE mobil SET sewa = 1 where id='$id_mobil'");


if ($aksi == 'Tambah') {
    $query = "INSERT INTO peminjaman VALUES('".$id."', '".$tgl_pinjam."', '".$tgl_kembail."', '".$tgl_pengembalian ."', '".$peminjam."', '".$id_mobil."', '".$totalharga."')";
    $sql = mysqli_query($conn, $query);
    if($sql){ 
      header("location: penyewaan.php"); 
    }else{
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='penyewaan.php'>Kembali Ke Form</a>";
    }
    header('location:index.php');
}elseif ($aksi == 'Edit') {
  move_uploaded_file($tmp, $path);
  $query = mysqli_query($conn, "UPDATE peminjaman SET 
            tanggal_pinjam = '$tgl_pinjam',
            tanggal_kembali = '$tgl_kembail',
            tanggal_pengembalian   = '$tgl_pengembalian'
              WHERE id = '$id'");
  header('location:halaman_admin.php');

}elseif ($aksi == 'Hapus') {
  $query = mysqli_query($conn, "DELETE from peminjaman where id = '$id'");
  header('location:halaman_admin.php');
}
?>