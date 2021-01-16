<?php
	// Membuat variabel koneksi
	$host     = "localhost";
	$username = "root";
	$password = "";
	$database = "db_pinjamruang";

	// Menyambungkan ke database
	$connect  = mysqli_connect($host, $username, $password, $database);

	if($connect)
	{
		echo "Berhasil terhubung ke database";
	}
	else
	{
		echo "Gagal terhubung ke database";
	}
?>