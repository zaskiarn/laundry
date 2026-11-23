<html>
    <head>
        <title>Sistem informasi Laundry</title>

        <!-- Menghubungkan file CSS Bootstrap untuk mengatur tampilan halaman -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

        <!-- Menghubungkan library jQuery -->
        <script type="text/javascript" src="assets/js/jquery.js"></script>

        <!-- Menghubungkan file JavaScript Bootstrap -->
        <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    </head>

    <body style="background: #f0f0f0;">
        <br><br><br><br>

        <center>
            <h2>SISTEM INFORMASI LAUNDRY <br></h2>
        </center>

        <br><br><br><br>

        <div class="container">
            <div class="col-md-4 col-md-offset-4">

                <?php
                    // Memeriksa apakah terdapat parameter pesan pada URL
                    if (isset($_GET['pesan'])) {

                        // Menampilkan pesan jika login gagal
                        if ($_GET['pesan'] == "gagal") {
                            echo "<div class='alert alert-danger'>Login gagal! Username atau Password salah</div>";

                        // Menampilkan pesan jika pengguna berhasil logout
                        } elseif ($_GET['pesan'] == "logout") {
                            echo "<div class='alert alert-info'>Anda berhasil logout</div>";

                        // Menampilkan pesan jika pengguna belum login
                        } elseif ($_GET['pesan'] == "belum_login") {
                            echo "<div class='alert alert-danger'>Anda harus login untuk mengakses halaman admin</div>";
                        }
                    }
                ?>

                <form action="login.php" method="post">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="form-group">

                                <label>Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>

                            <div class="form-group">

                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <input type="submit" class="btn btn-primary" value="Login">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>