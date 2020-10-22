<?php 
	include ('koneksi.php');
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
	<title>Racing Centre</title>
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
</div><br><br><br>

<!-- FORM Penyewaan -->
<div class="contaner">
	<center><h4>Tn. <?php echo $_SESSION['nama']; ?></h4></center><hr>
	<center><div class="col-12 col-lg-8">
		<form action="proses_simpan_peminjaman.php?aksi=Tambah&id=null&id_mobil=<?php echo $_GET['id']?>" method="post" enctype="multipart/form-data">
			<label for="username">Tanggal Sewa</label>
			<input type="date" id="tanggal_pinjam" name="tanggal_pinjam" class="form-control">
			<br>
			<label for="username">Tanggal Kembali</label>
			<input type="date" id="tanggal_kembali" name="tanggal_kembali" class="form-control">
			<br>
			<input type="submit" value="Sewa" class="btn btn-md btn-primary">
		    <a href="index.php"><input type="button" value="Batal" class="btn btn-md btn-primary"></a>
		</form>
	</div></center>
</div>



	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
