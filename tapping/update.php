<?php
	include("connection.php");
	
	// Mengatur zona waktu
	date_default_timezone_set('Asia/Jakarta');

	// Menyimpan input yang diterima pada variabel
	$id_kartu = $_POST['id_kartu'];
	$w_tutup  = date('Y-m-d H:i:s');

	// Menyimpan data ke tabel pada database
	$query    = mysqli_query($connect, "UPDATE tb_tap SET waktu_tutup = '$w_tutup', status_akses = 'Ditutup' WHERE id_kartu = '$id_kartu' AND status_akses = 'Dibuka'");
?>