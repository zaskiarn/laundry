<?php
    include 'header.php';
?>
<div class = "container">
    <br><br><br>
    <div class = "col-md-5 col-md-offset-3">
        <div class = "panel">
            <div class = "panel-heading">
                <h4>Edit User</h4>
            </div>
            <div class = "panel-body">

                <?php
                    global $koneksi;
                    include '../koneksi.php';

                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi, "select * from admin where id='$id'");

                    while($d=mysqli_fetch_array($data)){
                ?>

                <form method = "post" action = "sub_user_update.php">
                    <div class = "form-group">
                        <Label>Username</Label>
                        <input type = "hidden" name = "id" value=
                        "<?php echo $d['id']; ?>">
                        
                        <input type = "text" class="form-control" name = "username" value=
                        "<?php echo $d['username']; ?>">
                    </div>
                    <div class = "form-group">
                        <Label>Password</Label>
                        <input type = "password" name = "password" class="form-control" value=
                        "<?php echo $d['password']; ?>">
                    </div>
                    <br>
                    <input type = "submit" class ="btn btn-primary" value="Simpan">
                </form>

                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>