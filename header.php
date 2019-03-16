<?php
session_start();
include 'session.php';
include 'koneksi.php';
include 'format-tanggal.php';
$qy_user = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM admin WHERE username = '$_SESSION[username]'"));
$tahun = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tahun_ajar WHERE aktif = 'Ya'"));

	function randomString($length = 5) {
		$str = "";
		$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
		}
		return $str;
	}

?>

<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Sistem Penilaian Asisten Praktikum</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<!-- <link rel="stylesheet" href="assets/css/demo.css"> -->
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<!-- dataTable -->
	<link rel="stylesheet" href="assets/vendor/datatables/dataTables.bootstrap4.min.css">
	<script src="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" charset="utf-8"></script>
	<script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" charset="utf-8"></script>

	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

</head>

<body oncontextmenu="return false">
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="dashboard-admin"><img src="assets/img/logo-baru1.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div id="navbar-menu">
				<ul class="nav navbar-nav navbar-left" style="color:white">
					<li class="">
						<a style="color:white" class="update-pro" href="dashboard-admin" title="Home"><i class="lnr lnr-home"></i> <span>Home</span></a>
					</li>
					<li class="dropdown">
						<a style="color:white" href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown" title="Setting">
							<i class="lnr lnr-cog"></i> <span>Settings</span>
						</a>
						<ul class="dropdown-menu notifications">
							<li><a href="mahasiswa" class="notification-item"></span>Data Mahasiswa</a></li>
							<li><a href="tahun-ajar" class="notification-item"></span>Tahun Akademik</a></li>
							<li><a href="jurusan" class="notification-item"></span>Program Studi</a></li>
							<li><a href="Kelas" class="notification-item"></span>Kelas</a></li>
							<li><a href="matkul" class="notification-item"></span>Mata Kuliah</a></li>
							<li><a href="setting" class="notification-item"></span>Kriteria Penilaian</a></li>
							<li><a href="bantuan" class="notification-item"></span>Bantuan</a></li>
						</ul>
					</li>
					<li class="">
						<a style="color:white" class="update-pro" href="asisten" title="Asisten"><i class="lnr lnr-users"></i> <span>Asisten Praktikum</span></a>
					</li>
					<li class="">
						<a style="color:white" class="update-pro" href="asisten-kelas" title="Asisten Kelas"><i class="lnr lnr-user"></i> <span>Asisten Praktikum Kelas</span></a>
					</li>
					<li class="dropdown">
						<a style="color:white" href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown" title="Nilai Asisten">
							<i class="lnr lnr-thumbs-up"></i> <span>Nilai Asisten</span>
						</a>
						<ul class="dropdown-menu notifications">
							<li><a href="nilai-terbaik" class="notification-item"></span>Data Nilai Terbaik</a></li>
							<li><a href="nilai-favorit" class="notification-item"></span>Data Nilai Favorit</a></li>
						</ul>
					</li>
				</ul>
			</div>

			<div class="container-fluid">
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">

						<li class="dropdown">
							<?php if($qy_user['foto'] == ''){ ?>
							<a style="color:white" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="images/avatar0.jpg" class="img-circle" alt="Avatar"> <span><?= $qy_user['nama']; ?> (<?= $qy_user['jabatan']; ?>)</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<?php }else{ ?>
							<a style="color:white" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="images/<?= $qy_user['foto']; ?>" class="img-circle" alt="Avatar"> <span><?= $qy_user['nama']; ?> (<?= $qy_user['jabatan']; ?>)</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<?php } ?>
							<ul class="dropdown-menu">
								<li><a href="list-admin"><i class="lnr lnr-user"></i> <span>Manage Acount</span></a></li>
								<li><a href="ubah-password"><i class="lnr lnr-cog"></i> <span>Change Password</span></a></li>
								<li><a href="keluar"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
