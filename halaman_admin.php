<?php 
	include ("koneksi.php");
	session_start();
	if(!isset($_SESSION['username'])){
		echo '<script language="javascript">alert("Anda harus Login!"); document.location="index.php";</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Bootstrap Link -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>WELCOME ADMIN</title>
</head>
<body>

<div class="container-fluid bg-dark">
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
	  <a class="navbar-brand" href="#"><b><img src="img/car.png" height="40px"> SPORT RENT</b></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="logout.php">Logout</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Dropdown
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_edit">Action</a>
	          <a class="dropdown-item" href="#">Another action</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Something else here</a>
	        </div>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link disabled" href="#">Disabled</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	    	<ul class="nav navbar-nav ml-auto list-inline">
	    		<li class="nav-item">
	    			<div class="col-md-3" style="color: white"><i class="fa fa-user-o" aria-hidden="true"></i>
						<?php 
							require_once "koneksi.php";
							if(!isset($_SESSION['username'])) {
								echo "Account ";
							}else{
								echo $_SESSION['nama'];
							} 
						?>
					</div>
	    		</li>
	    		<li class="nav-item">
	    			<div class="col-md-3">
	    				<?php  
							require_once "koneksi.php";
							if(!isset($_SESSION['username'])) {
								echo '<a href="#" class="text-primary" data-toggle="modal" data-target="#modal_login">Login</a>';
							}else{
								echo '<a href="#" class="text-primary" data-toggle="modal" data-target="#modal_edit">Edit</a>';
								echo " ";
								echo '<a href="logout.php" class="text-primary">Logout</a>';
							}
		    			?>
	    			</div>
	    		</li>
	    		<li class="nav-item">
	    			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	     			<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
	    		</li>
	    	</ul>
	    </form>
	  </div>
	</nav>
</div>
<br><br><br><br>

<!-- List Mobil -->
<div class="container">
	<h2 class="text-muted">LIST MOBIL</h2>
	<a href="#modal_tambah_mobil" data-toggle="modal"><button class="btn btn-primary btn-sm" >TAMBAH MOBIL</button></a><hr>
	<div class="col-lg-12">
		<div class="row">
			<?php
				require_once 'koneksi.php';  
				$query  = mysqli_query($conn,"SELECT * FROM mobil");
				while($hasil  = mysqli_fetch_assoc($query)) {
			?>
			<div class="col-lg-4 col-md-6 mb-4">
	        	<div class="card h-100">
	            	<a href="#modal_mobil" data-toggle="modal" data="id=<?php echo $hasil['id']; ?>"><img class="card-img-top" src="img/<?php echo $hasil['gambar']?>" alt=""></a>
	        		<div class="card-body">
	                	<h4 class="card-title">
	                		<?php echo $hasil['merk']; ?>
	                	</h4>
	                	Type : <?php echo $hasil['type']; ?><br>
	                	<h5>Rp. <?php echo $hasil['harga']; ?>/hari</h5>
	                	<p class="card-text"><?php echo $hasil['deskripsi']; ?></p>
	                	Status : <?php if ($hasil['sewa'] == 0) {
	                		echo "Belum Disewakan";
	                	}else{
	                		echo "Telah Disewakan";
	                	} 
	                	?>

	                	<?php
								echo $_SESSION['nama'];
								?>
	                	<br><br>
	                	<a href="edit_mobil.php?id=<?php echo $hasil['id'];?>"><button class="btn btn-primary">UBAH</button></a>
	                	<a href="proses_simpan_mobil.php?aksi=Hapus&id=<?php echo $hasil['id'];?>" class="btn btn-warning" style="color: white;">HAPUS</a>
	                </div>
	            	<div class="card-footer">
	            		<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
	            	</div>
	            </div>
	        </div>
	    <?php } ?>
		</div>
	</div>
	<hr>
</div>

<!-- LIST PEMINJAM -->
<div class="container">
	<h2 class="text-muted">LIST PEMINJAM</h2><hr>
	<div class="col-lg-12">
		<div class="row">
			<?php
				require_once 'koneksi.php';  
				$query2  = mysqli_query($conn, "SELECT a.id, a.peminjam, a.tanggal_pinjam, a.tanggal_kembali, c.gambar, b.type, a.pinjam_mobil FROM peminjaman a inner join mobil b on a.pinjam_mobil = b.id inner join users c on a.peminjam = c.username");
				function hitungHari($awal,$akhir){
					$tglAwal = strtotime($awal);
					$tglAkhir = strtotime($akhir);
					$jeda = abs($tglAkhir - $tglAwal);
					return floor($jeda/(60*60*24));
				}
				while($hasil2  = mysqli_fetch_assoc($query2)) {
			?>
			<div class="col-lg-4 col-md-6 mb-4">
	        	<div class="card h-100">
	            	<img class="card-img-top" src="img/<?php echo $hasil2['gambar']?>" alt="" height="300px">
	        		<div class="card-body">
	                	<h4 class="card-title">
	                		<?php echo $hasil2['peminjam']; ?>
	                	</h4>
	                	Yang Dipinjam : <br> <b><?php echo $hasil2['type']; ?></b> <br>
	                	Tanggal Pinjam : <?php echo $hasil2['tanggal_pinjam']; ?><br>
	                	Tanggal Kembali : <?php echo $hasil2['tanggal_kembali']; ?><br>
	                	<?php $jml_hari = hitungHari($hasil2['tanggal_pinjam'], $hasil2['tanggal_kembali']); ?>
	                	Dipinjam : <?php echo $jml_hari; ?> Hari <br><br>
	                	<a href="proses_pengembalian.php?id=<?php echo $hasil2['id'];?>&id_mobil=<?php echo $hasil2['pinjam_mobil'];?>"><button class="btn btn-primary">KEMBALI</button></a>
	                </div>
	            	<div class="card-footer">
	            		SPORT RENT
	            	</div>
	            </div>
	        </div>
	    <?php } ?>
		</div>
	</div>
</div>

<!-- MODAL EDIT USER -->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
      			<h5>EDIT PROFILE</h5>
      			<button type="button" class="close" data-dismiss="modal" aria-label="close">
      				<span aria-hidden="true">&times;</span>
      			</button>
      		</div>
      		<div class="modal-body">
      			<?php
					require_once "koneksi.php";
					$query = mysqli_query($conn, "SELECT * FROM users where username='".$_SESSION['username']."'");
					$hasil = mysqli_fetch_assoc($query);
				?>
				<form action="proses_simpan_admin.php?aksi=Edit&id=<?php echo $hasil['id']?>" method="post" enctype="multipart/form-data">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username" value="<?php echo $hasil['username']?>">
					<br>
					<label for="password">Password</label>
				    <input type="text" id="password" name="password" class="form-control" placeholder="Masukkan Password" value="<?php echo $hasil['password']?>">
				    <br>
				    <label for="nama">Nama</label>
				    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama" value="<?php echo $hasil['nama']?>">
				    <br>
				    <label for="gambar">Upload Gambar</label><br>
				    <input type="file" name="gambar" id="gambar">
				    <br>
				    Gambar Sekarang
				 	<br>
				    <img src="img/<?php echo $hasil['gambar']?>" height="100px">
				    <br>
				    <br>
				    <center>
				    <input type="submit" value="Simpan" class="btn btn-md btn-primary">
				    <a href="halaman_admin.php"><input type="button" value="Batal" class="btn btn-md btn-primary"></a>
					</center>
				</form>
      		</div>
      	</div>
    </div>
</div>

<!-- MODAL TAMBAH MOBIL -->
<div class="modal fade" id="modal_tambah_mobil" tabindex="-1" role="dialog" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
      			<h4>Tambahkan Mobil</h4>
      		</div>
      		<div class="modal-body">
                <form method="post" action="proses_simpan_mobil.php?aksi=Tambah&id=null&sewa=0" enctype="multipart/form-data">
					<input type="text" id="merk" name="merk" class="form-control" placeholder="Masukkan Merk">
					<br>
				    <input type="text" id="type" name="type" class="form-control" placeholder="Masukkan Type">
				    <br>
				    <input type="text" name="harga" id="harga" class="form-control" placeholder="Masukkan Harga Sewa">
				    <br>
				    <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan Deskripsi">
				    <br>
				    <label for="gambar">Upload Gambar</label>
				    <input type="file" name="gambar" id="gambar">
				    <br>
				    <br>
				    <center>
				    <input type="submit" value="Simpan" class="btn btn-md btn-primary">
				    <a href="halaman_admin.php"><input type="button" value="Batal" class="btn btn-md btn-primary"></a>
				    </center>
			    </form>
      		</div>
      	</div>
    </div>
</div>




	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>