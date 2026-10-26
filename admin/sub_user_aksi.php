<?php
    include '../koneksi.php';
    global $koneksi;

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_md5 = md5($password);

    mysqli_query($koneksi, "insert into admin values('','$username','$password_md5','1')");

    header("location:sub_user.php");
?>