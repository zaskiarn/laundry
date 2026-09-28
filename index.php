<?php
include 'koneksi.php';

$harga_per_kilo = 6000;
$query_harga = mysqli_query($koneksi, "SELECT * FROM harga LIMIT 1");
if ($query_harga && mysqli_num_rows($query_harga) > 0) {
    $data_harga = mysqli_fetch_assoc($query_harga);
    if (isset($data_harga['harga_per_kilo'])) {
        $harga_per_kilo =$data_harga['harga_per_kilo'];
    }
}

$query_pelanggan = mysqli_query($koneksi, "SELECT pelanggan_nama, pelanggan_alamat FROM pelanggan LIMIT 6");
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreshClean Laundry - Layanan Cuci Kiloan Profesional</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #0284c7;
            --primary-hover: #0369a1;
            --secondary-color: #38bdf8;
            --dark-color: #0f172a;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #334155;
            background-color: #ffffff;
            overflow-x: hidden;
        }

        .navbar-custom {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.4rem;
            color: var(--primary-color) !important;
        }

        .nav-link {
            font-weight: 600;
            color: #475569 !important;
            margin: 0 6px;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .hero-section {
            padding: 140px 0 80px;
            background: radial-gradient(circle at 10% 20%, rgba(56, 189, 248, 0.08) 0%, rgba(255, 255, 255, 1) 90%);
        }

        .hero-badge {
            background-color: #e0f2fe;
            color: var(--primary-color);
            font-size: 0.875rem;
            font-weight: 700;
            padding: 6px 16px;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 20px;
        }

        .hero-title {
            font-weight: 800;
            font-size: 2.8rem;
            line-height: 1.25;
            color: var(--dark-color);
        }

        .hero-title span {
            color: var(--primary-color);
        }

        .card-custom {
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            transition: all 0.3s ease;
            background: #ffffff;
        }

        .card-custom:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
            border-color: var(--secondary-color);
        }

        .icon-box {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            background: #e0f2fe;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 18px;
        }

        .step-number {
            width: 40px;
            height: 40px;
            background-color: var(--primary-color);
            color: white;
            font-weight: 800;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .pakaian-badge {
            background-color: #f8fafc;
            color: #334155;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 10px 20px;
            border-radius: 50px; /* Bikin melengkung penuh (pill shape) */
            border: 1px solid #e2e8f0;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
        }

        .pakaian-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: inline-block;
        }

        .pakaian-badge:hover {
            background-color: #e0f2fe;
            color: var(--primary-color);
            border-color: var(--secondary-color);
        }

        .avatar-box {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background-color: #e0f2fe;
            color: var(--primary-color);
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .pricing-card {
            background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
            color: white;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 25px -5px rgba(2, 132, 199, 0.3);
        }

        .btn-brand {
            background-color: var(--primary-color);
            color: white;
            font-weight: 700;
            padding: 10px 24px;
            border-radius: 50px;
            border: none;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-brand:hover {
            background-color: var(--primary-hover);
            color: white;
            box-shadow: 0 10px 15px -3px rgba(2, 132, 199, 0.3);
        }

        .contact-card {
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 24px;
            background: #ffffff;
            transition: all 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 20px -5px rgba(0, 0, 0, 0.05);
            border-color: var(--secondary-color);
        }

        .contact-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #e0f2fe;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .btn-whatsapp {
            background-color: #25d366;
            color: white;
            font-weight: 700;
            border-radius: 50px;
            padding: 12px 28px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-whatsapp:hover {
            background-color: #128c7e;
            color: white;
            box-shadow: 0 8px 15px -3px rgba(37, 211, 102, 0.3);
        }

        footer {
            background-color: var(--dark-color);
            color: #94a3b8;
            padding: 50px 0 25px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <i class="fa-solid fa-jug-detergent"></i>
                <span>FreshClean</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pakaian">Jenis Pakaian</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <a href="login_form.php" class="btn btn-brand btn-sm">
                            <i class="fa-solid fa-right-to-bracket me-2"></i>Login Admin
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="beranda" class="hero-section">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="hero-badge"><i class="fa-solid fa-sparkles me-2"></i>Sistem Layanan Laundry Kiloan</span>
                    <h1 class="hero-title mb-4">Pakaian Bersih, Rapi & <span>Wangi Tahan Lama</span></h1>
                    <p class="lead text-secondary mb-4">Percayakan pengerjaan cucian harian Anda kepada kami. Diproses cepat, higienis, dan rapi menggunakan pewangi pilihan.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="#harga" class="btn btn-brand btn-lg">Cek Tarif Kiloan</a>
                        <a href="#alur" class="btn btn-outline-secondary btn-lg rounded-pill fw-bold text-decoration-none">Cara Order</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-left">
                    <img src="https://images.unsplash.com/photo-1545173168-9f1947eebb7f?auto=format&fit=crop&w=800&q=80" alt="Laundry Service" class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <section id="alur" class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center max-w-xl mx-auto mb-5" data-aos="fade-up">
                <span class="text-primary fw-bold text-uppercase tracking-wider">Langkah Mudah</span>
                <h2 class="fw-bold fs-1 mt-1">Alur Pelayanan Laundry</h2>
                <p class="text-secondary">Proses praktis dan transparan dari awal hingga pakaian siap digunakan.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card card-custom p-4 h-100">
                        <div class="step-number">1</div>
                        <h4 class="fw-bold mb-2">Penimbangan & Catat</h4>
                        <p class="text-secondary mb-0">Pakaian diantar ke outlet, ditimbang secara transparan, dan dicatat per jenis pakaian ke dalam sistem.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card card-custom p-4 h-100">
                        <div class="step-number">2</div>
                        <h4 class="fw-bold mb-2">Pencucian & Setrika</h4>
                        <p class="text-secondary mb-0">Dicuci bersih dengan mesin higienis, dikeringkan, dan disetrika uap hingga rapi serta wangi.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card card-custom p-4 h-100">
                        <div class="step-number">3</div>
                        <h4 class="fw-bold mb-2">Siap Diambil</h4>
                        <p class="text-secondary mb-0">Pakaian dikemas rapi dalam plastik pelindung dan siap diambil oleh pelanggan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pakaian" class="py-5">
        <div class="container py-4">
            <div class="text-center max-w-xl mx-auto mb-5" data-aos="fade-up">
                <span class="text-primary fw-bold text-uppercase tracking-wider">Layanan Pakaian</span>
                <h2 class="fw-bold fs-1 mt-1">Jenis Pakaian Yang Kami Layani</h2>
                <p class="text-secondary">Segala jenis pakaian harian hingga pakaian khusus diproses dengan perawatan tepat.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="card card-custom p-4 h-100 text-center">
                        <div class="icon-box mx-auto mb-3">
                            <i class="fa-solid fa-shirt"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Atasan & Kemeja</h5>
                        <p class="text-muted small mb-0">Kaos, Kemeja Polos/Batik, Baju Warna/Putih, Blouse, & Polo</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="card card-custom p-4 h-100 text-center">
                        <div class="icon-box mx-auto mb-3">
                            <i class="fa-solid fa-socks"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Bawahan & Celana</h5>
                        <p class="text-muted small mb-0">Celana Jeans, Pendek, Panjang, Kulot, & Rok/Skirt</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="card card-custom p-4 h-100 text-center">
                        <div class="icon-box mx-auto mb-3">
                            <i class="fa-solid fa-vest"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Outer & Jaket</h5>
                        <p class="text-muted small mb-0">Jaket Parasut, Sweater, Cardigan, Jas, & Blazer</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="card card-custom p-4 h-100 text-center">
                        <div class="icon-box mx-auto mb-3">
                            <i class="fa-solid fa-person-dress"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Gaun & Dress</h5>
                        <p class="text-muted small mb-0">Dress, Gaun Malam, Gamis, Abaya, & Pakaian Muslim</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="pelanggan" class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center max-w-xl mx-auto mb-5" data-aos="fade-up">
                <span class="text-primary fw-bold text-uppercase tracking-wider">Kepercayaan Pelanggan</span>
                <h2 class="fw-bold fs-1 mt-1">Pernah Laundry Di Sini!</h2>
                <p class="text-secondary">Beberapa dari banyak pelanggan setia yang telah mempercayakan pakaian mereka kepada kami.</p>
            </div>
            <div class="row g-4">
                <?php if ($query_pelanggan && mysqli_num_rows($query_pelanggan) > 0): ?>
                    <?php 
                    $delay = 100;
                    while ($pelanggan = mysqli_fetch_assoc($query_pelanggan)): 
                        $inisial = strtoupper(substr($pelanggan['pelanggan_nama'], 0, 1));
                    ?>
                        <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="<?= $delay; ?>">
                            <div class="card card-custom p-4 h-100 d-flex flex-row align-items-center gap-3">
                                <div class="avatar-box flex-shrink-0"><?= $inisial; ?></div>
                                <div>
                                    <h5 class="fw-bold mb-1 text-dark"><?= htmlspecialchars($pelanggan['pelanggan_nama']); ?></h5>
                                    <p class="text-muted small mb-1"><i class="fa-solid fa-location-dot me-1 text-primary"></i><?= htmlspecialchars($pelanggan['pelanggan_alamat']); ?></p>
                                    <div class="text-warning small">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php 
                        $delay += 100;
                    endwhile; 
                    ?>
                <?php else: ?>
                    <div class="col-12 text-center text-muted">
                        <p>Belum ada data pelanggan.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="keunggulan" class="py-5">
        <div class="container py-4">
            <div class="text-center max-w-xl mx-auto mb-5" data-aos="fade-up">
                <span class="text-primary fw-bold text-uppercase tracking-wider">Kualitas Terjamin</span>
                <h2 class="fw-bold fs-1 mt-1">Mengapa Memilih Layanan Kami?</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card card-custom p-4 h-100">
                        <div class="icon-box"><i class="fa-solid fa-soap"></i></div>
                        <h4 class="fw-bold mb-3">Deterjen & Parfum Premium</h4>
                        <p class="text-secondary mb-0">Menggunakan bahan pembersih pilihan yang efektif menghilangkan noda tanpa merusak serat pakaian.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card card-custom p-4 h-100">
                        <div class="icon-box"><i class="fa-solid fa-shield-halved"></i></div>
                        <h4 class="fw-bold mb-3">1 Mesin 1 Pelanggan</h4>
                        <p class="text-secondary mb-0">Pakaian Anda diproses terpisah dan tidak dicampur dengan pelanggan lain demi menjaga higienitas.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card card-custom p-4 h-100">
                        <div class="icon-box"><i class="fa-solid fa-clock"></i></div>
                        <h4 class="fw-bold mb-3">Pengerjaan Tepat Waktu</h4>
                        <p class="text-secondary mb-0">Estimasi pengerjaan rapi dan siap diambil sesuai dengan janji waktu yang disepakati.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="harga" class="py-5 bg-light">
        <div class="container py-4">
            <div class="row align-items-center gy-5">
                <div class="col-lg-5" data-aos="fade-right">
                    <span class="text-primary fw-bold text-uppercase tracking-wider">Tarif Hemat</span>
                    <h2 class="fw-bold fs-1 mt-1 mb-4">Harga Terjangkau Untuk Hasil Maksimal</h2>
                    <p class="text-secondary mb-4">Layanan cuci komplit bersih, kering, setrika, dan wangi tanpa biaya tambahan tersembunyi.</p>
                    <ul class="list-unstyled d-flex flex-column gap-3 mb-4">
                        <li class="d-flex align-items-center gap-3"><i class="fa-solid fa-circle-check text-success fs-5"></i><span class="fw-semibold">Cuci + Kering + Setrika Uap</span></li>
                        <li class="d-flex align-items-center gap-3"><i class="fa-solid fa-circle-check text-success fs-5"></i><span class="fw-semibold">Pencatatan Rincian Pakaian</span></li>
                        <li class="d-flex align-items-center gap-3"><i class="fa-solid fa-circle-check text-success fs-5"></i><span class="fw-semibold">Packing Plastik Rapi & Higienis</span></li>
                    </ul>
                </div>
                <div class="col-lg-6 offset-lg-1" data-aos="fade-left">
                    <div class="pricing-card text-center">
                        <span class="badge bg-white text-primary px-3 py-2 rounded-pill fw-bold mb-3">Paket Cuci Kiloan</span>
                        <h1 class="display-3 fw-bold mb-0">Rp <?= number_format($harga_per_kilo, 0, ',', '.'); ?></h1>
                        <p class="opacity-75 mb-4">per kilogram (Kg)</p>
                        <hr class="my-4 opacity-25">
                        <p class="mb-0"><i class="fa-solid fa-clock me-2"></i>Estimasi Selesai 1-2 Hari Kerja</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kontak" class="py-5">
        <div class="container py-4">
            <div class="text-center max-w-xl mx-auto mb-5" data-aos="fade-up">
                <span class="text-primary fw-bold text-uppercase tracking-wider">Layanan Pelanggan</span>
                <h2 class="fw-bold fs-1 mt-1">Hubungi Contact Person Kami</h2>
                <p class="text-secondary">Punya pertanyaan seputar layanan atau status cucian? Tim kami siap membantu Anda.</p>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-card h-100 d-flex align-items-center gap-3">
                        <div class="contact-icon">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                        <div>
                            <span class="text-muted small d-block">WhatsApp / Fast Response</span>
                            <a href="https://wa.me/6281234567890" target="_blank" class="fw-bold text-dark text-decoration-none">+62 812-3456-7890</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-card h-100 d-flex align-items-center gap-3">
                        <div class="contact-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <span class="text-muted small d-block">Telepon Outlet</span>
                            <a href="tel:0215550199" class="fw-bold text-dark text-decoration-none">(021) 555-0199</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-card h-100 d-flex align-items-center gap-3">
                        <div class="contact-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <span class="text-muted small d-block">Email Resmi</span>
                            <a href="mailto:info@freshcleanlaundry.com" class="fw-bold text-dark text-decoration-none">info@freshclean.com</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="contact-card h-100 d-flex align-items-center gap-3">
                        <div class="contact-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <span class="text-muted small d-block">Lokasi Outlet</span>
                            <span class="fw-bold text-dark d-block">Jl. Merdeka No. 123</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4 p-md-5 bg-light rounded-4 border text-center" data-aos="fade-up">
                <h3 class="fw-bold mb-2">Ingin Cek Status Cepat via WhatsApp?</h3>
                <p class="text-secondary mb-4">Klik tombol di bawah untuk terhubung langsung dengan admin kami.</p>
                <a href="https://wa.me/6281234567890?text=Halo%20FreshClean%20Laundry,%20saya%20ingin%20tanya%20seputar%20layanan%20laundry" target="_blank" class="btn btn-whatsapp btn-lg">
                    <i class="fa-brands fa-whatsapp fs-4"></i>
                    <span>Chat WhatsApp Sekarang</span>
                </a>
            </div>
        </div>
    </section>

    <footer>
        <div class="container text-center">
            <p class="mb-0">&copy; 2026 FreshClean Laundry. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
    </script>
</body>
</html>