<?php
    global $koneksi;
    include '../koneksi.php';
    $id = $_GET['id'];
    mysqli_query($koneksi, "delete from pelanggan where pelanggan_id='$id'");

    echo "<script type='text/javascript'>alert('Data akan dihapus');
    window.location.href='pelanggan.php'; </script>";
?>