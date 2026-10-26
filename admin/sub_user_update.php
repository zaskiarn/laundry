<?php
    include '../koneksi.php';
    global $koneksi;
    
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_md5 = md5($password);

    mysqli_query($koneksi, "update admin set username='$username', password='$password_md5' where id='$id'");
    
    echo "<script type='text/javascript'>alert('Data berhasil diubah');
    window.location.href='sub_user.php';</script>";

?>