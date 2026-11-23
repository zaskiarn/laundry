<?php 
// Memulai session untuk menyimpan status login pengguna
session_start();

// Menghubungkan file login.php dengan database
include 'koneksi.php';

// Mengambil username yang dikirim dari formulir login
$username = $_POST['username'];

// Mengambil password yang dikirim dari formulir login
$password = $_POST['password'];

// Mengubah password menjadi hash menggunakan MD5
$password_md5 = md5($password);

// Memeriksa kecocokan username dan password dengan data pada tabel admin
$data = mysqli_query($koneksi, "select * from admin where username = '$username' and password = '$password_md5'");

// Menghitung jumlah data admin yang cocok dengan username dan password
$cek = mysqli_num_rows($data);

// Memeriksa apakah data login ditemukan
if($cek > 0){

    // Menyimpan username ke dalam session
    $_SESSION['username'] = $username;

    // Menyimpan status login pengguna ke dalam session
    $_SESSION['status'] = "login";

    // Mengarahkan pengguna ke halaman dashboard admin jika login berhasil
    header("location:admin/index.php");
    
}else{

    // Mengarahkan kembali ke halaman login jika username atau password salah
    header("location:login_form.php?pesan=gagal");
}
?>