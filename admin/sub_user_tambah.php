<?php
    include 'header.php';
?>
<div class = "container">
    <br><br><br>
    <div class = "col-md-5 col-md-offset-3">
        <div class = "panel">
            <div class = "panel-heading">
                <h4>Tambah User Baru</h4>
            </div>
            <div class = "panel-body">
                <form method = "post" action = "sub_user_aksi.php">
                    <div class = "form-group">
                        <Label>Username</Label>
                        <input type = "text" name = "username" class="form-control">
                    </div>
                    <div class = "form-group">
                        <Label>Password</Label>
                        <input type = "password" name = "password" class="form-control">
                    </div>
                    <br>
                    <input type = "submit" class ="btn btn-primary" value="Simpan">
                </form>
            </div>
        </div>
    </div>
</div>