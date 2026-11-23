<?php
    include 'header.php';
    include '../koneksi.php';
    global $koneksi;
?>

<div class = "container">
    <div class = "panel">
            <div class = "panel-heading">
                <h4>Edit Transaksi</h4>
            </div>
            <div class = "panel-body">
            <div class = "col-md-8 col-md-offset-2">
                <a href = "transaksi.php" class="btn btn-sm btn-info pull-right">Kembali</a>
                <br><br>

                <?php
                    $id = $_GET['id'];
                    $transaksi = mysqli_query($koneksi, "select * from transaksi where transaksi_id = '$id'");
                    while ($t = mysqli_fetch_array($transaksi)) {
                ?>
                <?php
                    $pakaian_query = mysqli_query($koneksi, "select * from pakaian where transaksi_id = '$id'");
                    $daftar_pakaian = [];
                    while($row_p = mysqli_fetch_array($pakaian_query)) {
                    $daftar_pakaian[] = $row_p;
                    }
                ?>

                <form method = "post" action = "transaksi_update.php">
                    <div class = "form-group">
                        <input type="hidden" name="id" value="<?php echo $t['transaksi_id'];?>">
                        <Label>Pelanggan</Label>
                        <select class = "form-control" name = "pelanggan" required="required">
                            <option value = "">
                                Pelanggan</option>
                            <?php
                                $data = mysqli_query($koneksi,"select * from pelanggan");
                            
                                while ($d=mysqli_fetch_array($data)){
                            ?>

                            <option
                            <?php
                                if($d['pelanggan_id']==$t['pelanggan_id'])
                                {
                                    echo "selected='selected'";
                                }
                            ?>
                                value="<?php echo $d['pelanggan_id'];?>">
                                <?php  echo $d['pelanggan_nama']; ?>
                            </option>

                            <?php 
                                }
                            ?>
                        </select>
                    </div>
                    <div class = "form-group">
                        <Label>Berat</Label>
                        <input type = "number" name = "berat" class="form-control" placeholder="Masukkan Berat Cuciam" required = "required" value="<?php echo $t['transaksi_berat'];?>">
                    </div>
                    <div class = "form-group">
                        <Label>Tanggal Selesai</Label>
                        <input type = "date" name = "tgl_selesai" class="form-control" required = "required" value="<?php echo $t['transaksi_tgl_selesai'];?>">
                    </div>
                    <br>
                    <table class = "table table-boordered table-striped">
                        <tr>
                            <th>Jenis Pakaian</th>
                            <th width ="20%">Jumlah</th>
                        </tr>
                        <?php
                            $jumlah_data = count($daftar_pakaian);
                            $jml_baris = $jumlah_data > 6 ? $jumlah_data : 6;
                            for ($i = 0; $i < $jml_baris; $i++) {
                                $jenis = isset($daftar_pakaian[$i]) ? $daftar_pakaian[$i]['pakaian_jenis'] : '';
                                $jumlah = isset($daftar_pakaian[$i]) ? $daftar_pakaian[$i]['pakaian_jumlah'] : '';
                        ?>
                        <tr>
                            <td><input type = "text" name="jenis_pakaian[]" class = "form-control" value="<?php echo $jenis; ?>"></td>
                            <td><input type = "number" name="jumlah_pakaian[]" class = "form-control" value="<?php echo $jumlah; ?>"></td>
                        </tr>
                        <?php
                            }
                        ?>
                        </table>
                        <br>
                        <input type = "submit" class = "btn btn-primary"value = "Simpan">
                </form>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>