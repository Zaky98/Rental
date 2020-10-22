<?php  include '../template_user/header.php'; ?> 
<body class="text-center"><br><br>
<div class="mx-auto" style="width: 200px;">
  <div class="card" style="width: 24rem;">
    <img src="../images/banner2.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
      <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control form-control-lg" id="exampleInputPassword1">
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
      </div>
  </div>  
</div>
</body>


<?php  include '../template_user/footer.php'; ?> 
