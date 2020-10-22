<?php  include '../template_user/header.php'; ?> 
<body class="text-center"><br><br>
    <div class="mx-auto" style="width: 200px;">
        <div class="card" style="width: 24rem;">
            <img src="../images/banner2.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
        
            <form action="" name="form">
                    <div class="form-signin">
                        <h1 class="text-center">Daftar</h1>

                        <label for="nama_lengkap">Nama:</label>
                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukkan Nama Depan">
                        
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" placeholder="Masukkan Email Anda">
                        
                        <label for="nohp">No HP:</label>
                        <input type="text" class="form-control" name="nomor_hp" placeholder="Masukkan No HP Anda">
                        
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                        <br>
                        <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin : </label>
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-Laki
                                    <input type="radio" name="jenis_kelamin" value="Perempuan">Perempuann
                        </div>


                        <button type="submit" class="btn btn-block btn-info">Daftar</button>
                    </div>
                </div>
        </form>
        </div>
        </div>
    </div>  
</body>


<?php  include '../template_user/footer.php'; ?> 
