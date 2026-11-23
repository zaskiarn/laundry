<?php
    // Memulai session pengguna
    session_start();

    // Menghapus seluruh data session pengguna
    session_destroy();

    // Mengarahkan pengguna kembali ke halaman utama
    // dengan parameter pesan logout
    header("location:../index.php?pesan=logout");
?>