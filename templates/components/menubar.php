<?php

/*
|--------------------------------------------------------------------------
| Limitasi Hak Akses Menubar
|--------------------------------------------------------------------------
|
| Membatasi menu yang bisa diakses oleh user 
| berdasarkan tingkatan akses yang dimiliki.
|
*/

// Level Akses Bagian Umum (Admin)
if($this->session->userdata('level') == "Bagian Umum")
{
	$this->load->view('components/menubar-admin');
}

// Level Akses Biro Pendidikan (Admin)
if($this->session->userdata('level') == "Biro Pendidikan")
{
	$this->load->view('components/menubar-user');
}

// Level Akses Kabag/Kaprodi (Admin)
if($this->session->userdata('level') == "Kabag/Kaprodi")
{
	$this->load->view('components/menubar-user');
}

// Level Akses User
if($this->session->userdata('level') == "Pengguna Ruangan")
{
	$this->load->view('components/menubar-user');
}

?>