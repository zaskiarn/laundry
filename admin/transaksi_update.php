<?php
    include '../koneksi.php';
    global $koneksi;
    
    $id = $_POST['id'];
    $pelanggan = $_POST['pelanggan'];
    $berat = $_POST['berat'];
    $tgl_selesai = $_POST['tgl_selesai'];
    
    $jenis_pakaian = $_POST['jenis_pakaian'];
    $jumlah_pakaian = $_POST['jumlah_pakaian'];

    mysqli_query($koneksi, "UPDATE transaksi SET pelanggan_id='$pelanggan', transaksi_berat='$berat', transaksi_tgl_selesai='$tgl_selesai' WHERE transaksi_id='$id'");

    mysqli_query($koneksi, "DELETE FROM pakaian WHERE transaksi_id='$id'");

    for ($i = 0; $i < count($jenis_pakaian); $i++) {
        if (!empty(trim($jenis_pakaian[$i]))) {
            $jenis = mysqli_real_escape_string($koneksi, $jenis_pakaian[$i]);
            $jumlah = mysqli_real_escape_string($koneksi, $jumlah_pakaian[$i]);
            
            mysqli_query($koneksi, "INSERT INTO pakaian (transaksi_id, pakaian_jenis, pakaian_jumlah) VALUES ('$id', '$jenis', '$jumlah')");
        }
    }

    echo "<script type='text/javascript'> alert('Data berhasil diubah');
        window.location.href='transaksi.php';</script>";
?>