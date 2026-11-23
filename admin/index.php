<?php 
    // Menghubungkan halaman admin dengan database
    include '../koneksi.php';

    // Mengakses variabel koneksi database
    global $koneksi;

    // Memanggil file header untuk menampilkan bagian atas halaman admin
    include 'header.php'
?>

<div class="container">
    <div class="alert alert-info text-center">
        <h4 style="margin-bottom: 0px"><b>Selamat Datang </b>di Sistem Informasi Laundry</h4>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h4>Dashboard</h4>
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="panel-primary">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-user"></i>
                                <span class="pull-right">
                                    <?php
                                        // Mengambil seluruh data pelanggan dari database
                                        $pelanggan = mysqli_query($koneksi, "select * from pelanggan");

                                        // Menghitung dan menampilkan jumlah seluruh pelanggan
                                        echo mysqli_num_rows($pelanggan);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Pelanggan
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-retweet"></i>
                                <span class="pull-right">
                                    <?php
                                        // Mengambil data transaksi dengan status 0 (sedang diproses)
                                        $proses = mysqli_query($koneksi, "select * from transaksi where transaksi_status='0'");

                                        // Menghitung dan menampilkan jumlah cucian yang sedang diproses
                                        echo mysqli_num_rows($proses);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Cucian Diproses
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel-info">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-info-sign"></i>
                                <span class="pull-right">
                                    <?php
                                        // Mengambil data transaksi dengan status 1 (siap diambil)
                                        $proses = mysqli_query($koneksi, "select * from transaksi where transaksi_status='1'");

                                        // Menghitung dan menampilkan jumlah cucian yang siap diambil
                                        echo mysqli_num_rows($proses);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Cucian Siap Diambil
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel-success">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-ok-circle"></i>
                                <span class="pull-right">
                                    <?php
                                        // Menghubungkan kembali halaman dengan database
                                        include '../koneksi.php';

                                        // Mengambil data transaksi dengan status 2 (selesai)
                                        $proses = mysqli_query($koneksi, "select * from transaksi where transaksi_status='2'");

                                        // Menghitung dan menampilkan jumlah cucian yang telah selesai
                                        echo mysqli_num_rows($proses);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Cucian Selesai
                        </div>
                    </div>
                </div>

            </div>
        </div>
            <p>Selamat datang di halaman dashboard admin.</p>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h1>Riwayat Transaksi Terakhir</h1>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="0%">No</th>
                    <th>Invoice</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Berat (kg)</th>
                    <th>Tgl. Selesai</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
                <?php
                    // Mengambil 10 transaksi terakhir beserta data pelanggan
                    // Data diurutkan berdasarkan ID transaksi dari yang terbaru
                    $data = mysqli_query($koneksi, "select * from pelanggan, transaksi where pelanggan.pelanggan_id = transaksi.pelanggan_id order by transaksi_id desc limit 10");

                    // Menentukan nomor urut awal untuk daftar transaksi
                    $no = 1;

                    // Mengambil dan menampilkan data transaksi satu per satu
                    while ($d=mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td> 
                        <!-- Menampilkan nomor urut transaksi dan menambah nomor untuk baris berikutnya -->
                        <?php echo $no++;?>
                    <td>
                        <!-- Menampilkan nomor invoice berdasarkan ID transaksi -->
                        INVOICE-<?php echo $d['transaksi_id']; ?>
                    </td>
                    <td>
                        <!-- Menampilkan tanggal transaksi -->
                        <?php echo $d['transaksi_tgl']; ?>
                    </td>
                    <td>
                        <!-- Menampilkan nama pelanggan yang melakukan transaksi -->
                        <?php echo $d['pelanggan_nama']; ?>
                    </td>
                    <td>
                        <!-- Menampilkan berat cucian pelanggan dalam kilogram -->
                        <?php echo $d['transaksi_berat']; ?>
                    </td>
                    <td>
                        <!-- Menampilkan tanggal perkiraan atau waktu selesai transaksi yang tersimpan -->
                        <?php echo $d['transaksi_tgl_selesai']; ?>
                    </td>
                    <td>
                        <!-- Menampilkan harga transaksi dalam format mata uang Rupiah -->
                        <?php
                            echo "Rp.".number_format($d['transaksi_harga']);
                            ",-";
                        ?>
                    </td>
                    <td>
                        <?php
                            // Memeriksa status transaksi untuk menentukan keterangan cucian
                            if ($d['transaksi_status']=="0") {
                                echo "<div class='label
                                    label-warning'>PROSES</div>";

                            // Menampilkan status cucian jika sudah siap diambil
                            } elseif ($d['transaksi_status']=="1") {
                                echo "<div class='label
                                    label-info'>DICUCI</div>";

                            // Menampilkan status cucian jika sudah selesai
                            } elseif ($d['transaksi_status']=="2") {
                                echo "<div class='label
                                    label-success'>SELESAI</div>";
                            }
                        ?>
                    </td>
                <?php
                // Mengakhiri perulangan untuk menampilkan riwayat transaksi
                }
                ?>
            </table>
        </div>
    </div>
</div>

<?php
// Memanggil file footer untuk menampilkan bagian bawah halaman admin
include 'footer.php';
?>