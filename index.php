<?php  
	include ("koneksi.php");
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Bootstrap Link -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>TI4B RENTAL</title>
</head>
<body>


<!-- Navbar -->
<div class="container-fluid bg-dark">
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
	  <a class="navbar-brand" href="#"><b><img src="img/car.png" height="40px"> TI4B BUKA RENTAL </b></a>
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
	          PROFILE
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_tanggungan">TANGGUNGAN</a>
	          <a class="dropdown-item" href="payment.php">Payment</a>
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

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
    	<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    	<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    	<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
  	<div class="carousel-item active">
    	<img class="d-block w-100" src="img/lambo-orange.jpg" alt="First slide">
    	<div class="carousel-caption d-none d-md-block">
    		<h5>Lamborghini</h5>
    		<p>Best Supercar Brand</p>
    		<button class="btn btn-primary btn-lg">Shop now</button>
  		</div>
    </div>
    <div class="carousel-item">
    	<img class="d-block w-100" src="img/ferrari.jpg" alt="Second slide">
    	<div class="carousel-caption d-none d-md-block">
    		<h5>Ferrari</h5>
    		<p>Best Supercar Brand</p>
    		<button class="btn btn-primary btn-lg">Shop now</button>
  		</div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/bugatti2.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
    		<h5>Bugatti</h5>
    		<p>Best Supercar Brand</p>
    		<button class="btn btn-primary btn-lg">Shop now</button>
  		</div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container-fluid offer pt-3 pb-3 bg-green d-none d-md-block">
	<div class="container">
		<div class="row">
			<div class="col-md-4 m-right">
				<h4>TI4B BUKA RENTAL</h4>
				<p>MOBIL TERBAIK</p>
			</div>
			<div class="col-md-4 m-right">
				<h4>HUBUNGI KAMI</h4>
				<p>+62 81333974122</p>
			</div>
			<div class="col-md-4 m-right">
				<h4>ALAMAT</h4>
				<p>Perum Bumi Asri Sengkaling . Malang</p>
			</div>
		</div>
	</div>
</div>

<br>
<!-- List Mobil -->
<div class="container">
	<div class="col-lg-12">
		<div class="row">
			<?php
				require_once 'koneksi.php';  
				$query  = mysqli_query($conn, "SELECT * FROM mobil where sewa=0");
				while($hasil  = mysqli_fetch_assoc($query)) {
			?>
			<div class="col-lg-4 col-md-6 mb-4">
	        	<div class="card h-100">
	            	<img class="card-img-top" src="img/<?php echo $hasil['gambar']?>" alt="">
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
	                	
	                	<br><br>
	                	<a href="penyewaan.php?id=<?php echo $hasil['id'];?>"><button class="btn btn-primary">Sewa</button></a>
	                </div>
	            	<div class="card-footer">
	            		<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
	            	</div>
	            </div>
	        </div>
	    <?php } ?>
		</div>
	</div>
</div>


<!-- LOGIN MODAL -->
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLabel">SILAHKAN LOGIN</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<div class="modal-body">
                <div class="row">
                    <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                        	<li><a class="btn btn-primary btn-sm" href="#login" data-toggle="tab" style="border: 1px;">Login</a></li>
                            <li><a class="btn btn-success btn-sm" href="#daftar" data-toggle="tab" style="border: 1px;">Daftar</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="login">
                                <form class="form-signin" action="login.php" method="post" enctype="multipart/form-data">
									<input name="username" type="username" id="username" class="form-control" placeholder="Username" required="" autofocus="">
									<br>
									<input name="password" type="password" id="password" class="form-control" placeholder="Password" required="">
									<br>
									<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
								</form>
                            </div>
                            <div class="tab-pane" id="daftar">
                                <form method="post" action="proses_simpan_user.php?aksi=Tambah" enctype="multipart/form-data">
								    <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username">
								    <br>
								    <input type="text" id="password" name="password" class="form-control" placeholder="Masukkan Password">
								    <br>
								    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama">
								    <br>
								    <label for="gambar">Upload Gambar</label>
								    <input type="file" name="gambar" id="gambar">
								    <br>
								    <br>
								    <center>
								    <input type="submit" value="Simpan" class="btn btn-md btn-primary">
								    <a href="index.php"><input type="button" value="Batal" class="btn btn-md btn-primary"></a>
								    </center>
							    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    	</div>
  	</div>
</div>

<!-- EDIT DATA MODAL -->
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
				<form action="proses_simpan_user.php?aksi=Edit&id=<?php echo $hasil['id']?>" method="post" enctype="multipart/form-data">
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
				    <a href="index.php"><input type="button" value="Batal" class="btn btn-md btn-primary"></a>
					</center>
				</form>
      		</div>
      	</div>
    </div>
</div>

<!-- Modal Details Mobil -->
<div class="modal fade" id="modal_tanggungan" tabindex="-1" role="dialog" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
      			<h5>TANGGUNGAN</h5>
      			<button type="button" class="close" data-dismiss="modal" aria-label="close">
      				<span aria-hidden="true">&times;</span>
      			</button>
      		</div>
      		<div class="modal-body">
      		</div>
      	</div>
    </div>
</div>


	<!-- Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>