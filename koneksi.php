<?php
    // Menghubungkan aplikasi dengan database MySQL
    // localhost = alamat server database
    // root = username database
    // "" = password database (kosong)
    // laundry = nama database
    $koneksi = mysqli_connect("localhost","root","","laundry");
    
    // Memeriksa apakah koneksi ke database mengalami kesalahan
    if (mysqli_connect_errno()) {
        // Menampilkan pesan jika koneksi database gagal
        echo "Koneksi Database Gagal:" . mysqli_connect_error();
    }
?>