<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $hal; ?> · Aplikasi Peminjaman Kelas</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-datepicker.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/linearicons.min.css'); ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> 
	<link rel="icon" href="<?php echo base_url('assets/img/form.png'); ?>">
	<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js'); ?>"></script>
</head>
<body>
	<div class="container-fluid">
		<!-- Baris Menubar dan Dropdown Profil -->
		<div class="row menubar-bg">
			<div class="col-sm-1 col-sm-1-offset"></div>
			<div class="col-sm-7 menubar"><?php echo $menubar; ?></div>
			<div class="col-sm-3"><?php echo $dropdown; ?></div>
		</div>

		<!-- Baris Judul -->
		<div class="row">
			<div class="col-sm-1 col-sm-1-offset"></div>
			<div class="col-sm-10 title-pg">
				<div class="main-title"><?php echo $hal; ?></div>

				<?php if($hal == "Kelola Akun Pengguna"): ?>
				<div class="button-add">
				    <a href="" data-toggle="modal" data-target="#buatuser" data-backdrop="static"><i class="fas fa-user-plus"></i></a>
				</div>
				<?php endif; ?>

				<?php if($hal == "Kelola Data Ruangan"): ?>
				<div class="button-add">
				    <a href="" data-toggle="modal" data-target="#buatruangan" data-backdrop="static"><i class="fas fa-plus-circle"></i></a>
				</div>
				<?php endif; ?>

				<?php if($hal == "Data Peminjaman"): ?>
					<?php if($this->session->userdata('level') == "Bagian Umum" OR $this->session->userdata('level') == "Pengguna Ruangan"): ?>
					<div class="button-add">
					    <a href="" data-toggle="modal" data-target="#ajukanpinjam" data-backdrop="static"><i class="fas fa-plus-circle"></i></a>
					</div>
					<?php endif; ?>

					<?php if($this->session->userdata('level') == "Bagian Umum"): ?>
					<div class="button-datapick">
						<a href="" data-toggle="modal" data-target="#lap-peminjaman" data-backdrop="static">Pilih Rentang Waktu</a>
					</div>
					<?php endif; ?>
				<?php endif; ?>

				<?php if($hal == "Riwayat Akses Ruangan"): ?>
					<?php if($this->session->userdata('level') == "Bagian Umum"): ?>
					<div class="button-datapick">
						<a href="<?php echo base_url('dashboard/unduh-akses-ruangan'); ?>"><span class="lnr lnr-download"></span> Unduh Data</a>
					</div>
					<?php endif; ?>
				<?php endif; ?>

				<?php if($hal == "Laporan Peminjaman"): ?>
					<?php if($this->session->userdata('level') == "Bagian Umum"): ?>
					<div class="button-datapick">
						<a href="" data-toggle="modal" data-target="#unduh-lap-peminjaman" data-backdrop="static"><span class="lnr lnr-download"></span> Unduh Data</a>
					</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>

		<!-- Baris Konten -->
		<div class="row">
			<div class="col-sm-1 col-sm-1-offset"></div>
			<div class="col-sm-10 outer-main"><div class="main"><?php echo $content; ?></div></div>
		</div>

		<!-- Baris Copyright -->
		<div class="row footer">
			<div class="col-sm-12">&copy; 2018-<?php echo date('Y'); ?> Pinjam Kelas · Ahmad Rivaldy S</div>
		</div>
	</div>
</body>
</html>