<?php
	include("connection.php");

	// Mengatur zona waktu
	date_default_timezone_set('Asia/Jakarta');

	// Menyimpan input yang diterima pada variabel
	$id_kartu = $_POST['id_kartu'];
	$ruangan  = $_POST['nama_ruangan'];
	$w_akses  = date('Y-m-d H:i:s');

	// Menyimpan data ke tabel pada database
	$query    = mysqli_query($connect, "INSERT INTO tb_tap (id_kartu, nama_ruangan, waktu_akses) VALUES ('$id_kartu', '$ruangan', '$w_akses')");
?>