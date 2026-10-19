<?php
    include '../koneksi.php';
    global $koneksi;

    $nama = $_POST['nama'];
    $hp = $_POST['hp'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "insert into pelanggan values('','$nama','$hp','$alamat')");

    header("location:pelanggan.php");
?>