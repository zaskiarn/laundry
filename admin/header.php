<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'login') {
	header('Location: ../index.php?pesan=belum_login');
	exit;
}

$namaAdmin = isset($_SESSION['username']) && $_SESSION['username'] !== ''
	? $_SESSION['username']
	: 'admin';

$halamanAktif = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
	<head>
        <script type="text/javascript" src="../assets/js/jquery.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
		<style>
			.header-admin {
				min-height: 55px;
				margin-bottom: 0;
				border: 0;
				border-radius: 0;
				background: #252a34;
				box-shadow: 0 2px 8px rgba(0, 0, 0, 0.18);
			}

			.header-admin .navbar-brand {
				height: 55px;
				padding: 18px 20px;
				color: #e5e7eb;
				font-size: 19px;
				font-weight: 400;
			}

			.header-admin .navbar-brand:hover,
			.header-admin .navbar-brand:focus {
				color: #fff;
				background: #303744;
			}

			.header-admin .navbar-nav > li > a {
				height: 55px;
				padding: 18px 16px;
				color: #c5cbd5;
				font-size: 15px;
			}

			.header-admin .navbar-nav > li > a:hover,
			.header-admin .navbar-nav > li > a:focus,
			.header-admin .navbar-nav > .active > a {
				color: #fff;
				background: #303744;
			}

			.header-admin .navbar-nav > .active > a {
				border-bottom: 3px solid #5bc0de;
			}

			.header-admin .navbar-nav.navbar-right > li > a {
				color: #c5cbd5;
			}

			.header-admin .navbar-nav .glyphicon {
				margin-right: 5px;
				color: #8ecae6;
			}

			@media (min-width: 768px) {
				.header-admin .navbar-nav > .dropdown:hover > .dropdown-menu {
					display: block;
				}

				.header-admin .navbar-nav > .dropdown:hover > a {
					color: #fff;
					background: #303744;
				}
			}

			@media (max-width: 767px) {
				.header-admin .navbar-brand,
				.header-admin .navbar-nav > li > a {
					height: auto;
				}

				.header-admin .navbar-nav > li > a {
					padding: 14px 20px;
				}
			}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-inverse header-admin">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-admin" aria-expanded="false">
						<span class="sr-only">Buka navigasi</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">LAUNDRY</a>
				</div>

				<div class="collapse navbar-collapse" id="menu-admin">
					<ul class="nav navbar-nav">
						<li class="<?php echo $halamanAktif === 'index.php' ? 'active' : ''; ?>">
							<a href="index.php"><span class="glyphicon glyphicon-home"></span>Dashboard</a>
						</li>
						<li class="<?php echo $halamanAktif === 'pelanggan.php' ? 'active' : ''; ?>">
							<a href="pelanggan.php"><span class="glyphicon glyphicon-user"></span>Pelanggan</a>
						</li>
						<li class="<?php echo $halamanAktif === 'transaksi.php' ? 'active' : ''; ?>">
							<a href="transaksi.php"><span class="glyphicon glyphicon-random"></span>Transaksi</a>
						</li>
						<li class="<?php echo $halamanAktif === 'laporan.php' ? 'active' : ''; ?>">
							<a href="laporan.php"><span class="glyphicon glyphicon-list-alt"></span>Laporan</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<span class="glyphicon glyphicon-wrench"></span>Pengaturan <span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="pengaturan_harga.php"><span class="glyphicon glyphicon-usd"></span>Pengaturan Harga</a></li>
								<li><a href="ubah_password.php"><span class="glyphicon glyphicon-lock"></span>Ganti Password</a></li>
							</ul>
						</li>
						<li class="<?php echo $halamanAktif === 'logout.php' ? 'active' : ''; ?>">
							<a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Log Out</a>
						</li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Halo, <strong><?php echo $_SESSION['username']; ?></strong> !</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</body>
</html>