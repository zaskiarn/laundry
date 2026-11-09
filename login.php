<?php 
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$password_md5 = md5($password);

$data = mysqli_query($koneksi, "select * from admin where username = '$username' and password = '$password_md5'");

$cek = mysqli_num_rows($data);

if($cek > 0){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:admin/index.php");
}else{
    header("location:login_form.php?pesan=gagal");
}
?>