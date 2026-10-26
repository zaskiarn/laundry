<?php
    global $koneksi;
    include '../koneksi.php';
    $id = $_GET['id'];
    mysqli_query($koneksi, "delete from admin where id='$id'");

    echo "<script type='text/javascript'>alert('Data akan dihapus');
    window.location.href='sub_user.php'; </script>";
?>