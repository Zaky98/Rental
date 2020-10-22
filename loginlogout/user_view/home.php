<?php  include '../template_user/header.php'; ?> 
        <body>
        <?php  include '../template_user/navbar.php'; ?> 


        <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active img-fluid position-relative">
				<img src="../images/banner2.jpeg" class="d-block w-100"  >
				<div class="carousel-caption d-none d-md-block">
					<h2>First slide label</h2>
					<h4>Nulla vitae elit libero, a pharetra augue mollis interdum.</h4>
				</div>
			</div>
			<div class="carousel-item img-fluid position-relative">
				<img src="../images/bumble1.jpg" class="d-block w-100" width="100%" height="100%">
				<div class="carousel-caption d-none d-md-block">
					<h2>Second slide label</h2>
					<h4>Nulla vitae elit libero, a pharetra augue mollis interdum.</h4>
				</div>
			</div>
			<div class="carousel-item img-fluid position-relative">
				<img src="../images/lambo2.jpeg" class="d-block w-100" width="100%" height="100%">
				<div class="carousel-caption d-none d-md-block">
					<h2>Third slide label</h2>
					<h4>Nulla vitae elit libero, a pharetra augue mollis interdum.</h4>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>  <br>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<div class="row">
				<div class="col-sm-4"> 
					<div class="form-group">
						<label for="exampleFormControlSelect1">Lokasi</label>
						<select class="form-control" id="exampleFormControlSelect1">
							<option>Lowokwaru</option>
							<option>Klojen</option>
						</select>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for="exampleFormControlSelect1">Lokasi</label>
						<input class=form-control />
					</div>
				</div>
				<div class="col-sm">
					One of three columns
				</div>
			</div>
			<button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button>
		</div>
	</div>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        </body>

  <?php  include '../template_user/footer.php'; ?> 

