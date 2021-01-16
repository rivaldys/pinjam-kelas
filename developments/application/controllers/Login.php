<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('model_login');
	}

	public function index()
	{
		$halaman ['hal'] = "Halaman Login";
		$this->load->view('pages/login', $halaman);
	}

	public function proses()
	{
		// Memeriksa data login apakah sesuai dengan database
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		
		$simpan		= array(
			'username'	=> $username,
			'password'	=> md5($password)
			);

		$periksa	= $this->model_login->periksa_login('tb_user', $simpan);
		
		// Menyimpan session login
		if ($periksa->num_rows() > 0)
		{
			$baris 	= $periksa->row_array();

			$sesi	= array(
				'namalengkap'  => $baris['fullname'],
				'level'        => $baris['level'],
				'status-masuk' => 'masuk'
				);

			$this->session->set_userdata($sesi);

			redirect('dashboard');
		}
		else
		{
			echo "Username atau password salah!";
		}
	}
}