<?php
    include 'header.php';
?>
<div class = "container">
    <br><br><br>
    <div class = "col-md-5 col-md-offset-3">
        <div class = "panel">
            <div class = "panel-heading">
                <h4>Tambah Pelanggan Baru</h4>
            </div>
            <div class = "panel-body">
                <form method = "post" action = "pelanggan_aksi.php">
                    <div class = "form-group">
                        <Label>Nama</Label>
                        <input type = "text" name = "nama" class="form-control">
                    </div>
                    <div class = "form-group">
                        <Label>HP</Label>
                        <input type = "number" name = "hp" class="form-control">
                    </div>
                    <div class = "form-group">
                        <Label>Alamat</Label>
                        <input type = "text" name = "alamat" class="form-control">
                    </div>
                    <br>
                    <input type = "submit" class ="btn btn-primary" value="Simpan">
                </form>
            </div>
        </div>
    </div>
</div>