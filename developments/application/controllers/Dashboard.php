<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Dashboard extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		// Memanggil library untuk templating halaman
		$this->load->library('template');

		// Pemeriksaan session masuk (login)
		if($this->session->userdata('status-masuk') != 'masuk')
		{
			redirect(base_url());
		}

		// Memanggil Model
		$this->load->model('model_user');
		$this->load->model('model_ruangan');
		$this->load->model('model_peminjaman');
		$this->load->model('model_tap');
	}

	public function index()
	{
		$halaman ['hal'] = "Beranda";
		$this->template->utama('pages/halaman-beranda', $halaman);
	}


	/*
	|-----------------------------------------------------------------
	| Fitur CRUD User
	|-----------------------------------------------------------------
	*/

	public function akun_pengguna()
	{
		// Membatasi level pengguna yang dapat mengakses halaman
		if($this->session->userdata('level') != "Bagian Umum")
		{
			redirect(base_url('dashboard'));
		}

		// Memanggil fungsi lihat data pada Model User
		$query   = $this->model_user->tampil()->result_array();

		// Data disimpan sementara pada array
		$halaman = array
		(
			'tb'   => $query,
			'hal'  => 'Kelola Akun Pengguna'
		);

		$this->template->utama('pages/halaman-user', $halaman);
	}

	public function buat_user()
	{
		// Menerima input, lalu disimpan pada variabel-variabel berikut
		$fullname = $this->input->post('fullname');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level    = $this->input->post('level');
		
		// Data yang akan disimpan/dibuat
		$data     = array
		(
			'fullname' => $fullname,
			'username' => $username,
			'password' => md5($password),
			'level'    => $level
		);

		$query    = $this->model_user->buat($data);

		if ($query)
		{
			redirect(base_url('dashboard/akun-pengguna'));
		}
		else
		{
			echo "Proses penambahan data gagal.";
		}
	}

	public function perbarui_user()
	{
		// Menerima input, lalu disimpan pada variabel-variabel berikut
		$fullname = $this->input->post('fullname');
		$username = $this->input->post('username');
		$level    = $this->input->post('level');
		
		// Data yang akan diperbarui
		$data     = array
		(
			'fullname' => $fullname,
			'level'    => $level
		);

		// Username digunakan sebagai pengenal data mana yang akan diperbarui
		$where    = array('username' => $username);

		$query    = $this->model_user->perbarui($data, $where);

		if ($query)
		{
			redirect(base_url('dashboard/akun-pengguna'));
		}
		else
		{
			echo "Proses pengubahan data gagal.";
		}
	}

	public function hapus_user()
	{
		// Menerima input, lalu disimpan pada variabel-variabel berikut
		$username = $this->input->post('username');

		// Username digunakan sebagai pengenal data mana yang akan dihapus
		$where   = array('username' => $username);

		$query   = $this->model_user->hapus($where);

		if($query)
		{
			redirect(base_url('dashboard/akun-pengguna'));
		}
		else
		{
			echo "Proses penghapusan data gagal.";
		}
	}


	/*
	|-----------------------------------------------------------------
	| Fitur CRUD Ruangan
	|-----------------------------------------------------------------
	*/

	public function data_ruangan()
	{
		// Membatasi level pengguna yang dapat mengakses halaman
		if($this->session->userdata('level') != "Bagian Umum")
		{
			redirect(base_url('dashboard'));
		}

		// Memanggil fungsi lihat data pada Model Ruangan
		$query   = $this->model_ruangan->tampil()->result_array();

		// Data disimpan sementara pada array
		$halaman = array
		(
			'tb'   => $query,
			'hal'  => 'Kelola Data Ruangan'
		);

		$this->template->utama('pages/halaman-ruangan', $halaman);
	}

	public function buat_ruangan()
	{
		// Menerima input, lalu disimpan pada variabel-variabel berikut
		$id_ruangan  = $this->input->post('id_ruangan');
		$namaruangan = $this->input->post('nama_ruangan');
		
		// Data yang akan disimpan/dibuat
		$data     = array
		(
			'id_ruangan'   => $id_ruangan,
			'nama_ruangan' => $namaruangan
		);

		$query    = $this->model_ruangan->buat($data);

		if ($query)
		{
			redirect(base_url('dashboard/data-ruangan'));
		}
		else
		{
			echo "Proses penambahan data gagal.";
		}
	}

	public function perbarui_ruangan()
	{
		// Menerima input, lalu disimpan pada variabel-variabel berikut
		$id_ruangan  = $this->input->post('id_ruangan');
		$namaruangan = $this->input->post('nama_ruangan');
		
		// Data yang akan diperbarui
		$data     = array('nama_ruangan' => $namaruangan);

		// ID ruangan digunakan sebagai pengenal data mana yang akan diperbarui
		$where    = array('id_ruangan' => $id_ruangan);

		$query    = $this->model_ruangan->perbarui($data, $where);

		if ($query)
		{
			redirect(base_url('dashboard/data-ruangan'));
		}
		else
		{
			echo "Proses pengubahan data gagal.";
		}
	}

	public function hapus_ruangan()
	{
		// Menerima input, lalu disimpan pada variabel-variabel berikut
		$id_ruangan = $this->input->post('id_ruangan');

		// ID ruangan digunakan sebagai pengenal data mana yang akan dihapus
		$where   = array('id_ruangan' => $id_ruangan);

		$query   = $this->model_ruangan->hapus($where);

		if($query)
		{
			redirect(base_url('dashboard/data-ruangan'));
		}
		else
		{
			echo "Proses penghapusan data gagal.";
		}
	}


	/*
	|-----------------------------------------------------------------
	| Fitur CRUD Peminjaman
	|-----------------------------------------------------------------
	*/

	public function data_peminjaman()
	{
		// Memanggil fungsi lihat data pada Model Peminjaman dan Model Ruangan
		if($this->session->userdata('level') == "Pengguna Ruangan")
		{
			// Nama peminjam digunakan sebagai pengenal data mana yang akan ditampilkan
			$where = array('peminjam' => $this->session->userdata('namalengkap'));

			$query = $this->model_peminjaman->tampil_detail($where)->result_array();
		}
		else
		{
			$query = $this->model_peminjaman->tampil()->result_array();
		}
		
		$query_b = $this->model_ruangan->tampil()->result_array();
		$query_c = $this->model_peminjaman->tampil_id()->result_array();

		// Data disimpan sementara pada array
		$halaman = array
		(
			'tb'          => $query,
			'tb_ruangan'  => $query_b,
			'tb_idpinjam' => $query_c,
			'hal'         => 'Data Peminjaman'
		);

		$this->template->utama('pages/halaman-peminjaman', $halaman);
	}

	public function laporan_peminjaman()
	{
		// Membatasi level pengguna yang dapat mengakses halaman
		if($this->session->userdata('level') != "Bagian Umum")
		{
			redirect(base_url('dashboard'));
		}

		// Menerima input, lalu disimpan pada variabel-variabel berikut
		$tgl_awal  = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');

		// Mencegah halaman diakses langsung melalui tautan dengan kondisi data yang kosong
		if(empty($tgl_awal && $tgl_akhir))
		{
			redirect(base_url('dashboard/data-peminjaman'));
		}

		// Tanggal awal dan akhir digunakan sebagai pengenal data mana yang akan ditampilkan
		$where = array
		(
			'waktu_pengajuan >=' => $tgl_awal,
			'waktu_pengajuan <=' => $tgl_akhir
		);

		$query     = $this->model_peminjaman->tampil_detail($where)->result_array();

		// Data disimpan sementara pada array
		$halaman = array
		(
			'tb'            => $query,
			'tanggal_awal'  => $tgl_awal,
			'tanggal_akhir' => $tgl_akhir,
			'hal'           => 'Laporan Peminjaman'
		);

		$this->template->utama('pages/halaman-laporan', $halaman);
	}

	public function pinjam_ruang()
	{
		// Menerima input, lalu disimpan pada variabel-variabel berikut
		$id_peminjaman = $this->input->post('id_peminjaman');
		$peminjam      = $this->input->post('peminjam');
		$w_pengajuan   = $this->input->post('waktu_pengajuan');
		$keterangan    = $this->input->post('keterangan');
		$nama_ruangan  = $this->input->post('nama_ruangan');
		
		// Data yang akan disimpan/dibuat
		$data_isi = array
		(
			'id_peminjaman'    => $id_peminjaman,
			'peminjam'         => $peminjam,
			'waktu_pengajuan'  => $w_pengajuan,
			'keterangan'       => $keterangan,
			'ruangan_dipinjam' => $nama_ruangan,
			'verifikasi_bp'    => '-',
			'verifikasi_kabag' => '-',
			'status_pinjam'    => 'Menunggu'
		);

		$query    = $this->model_peminjaman->buat($data_isi);


		// Pengubahan status pada tabel ruangan dari "Tersedia" menjadi "Menunggu"
		// Data yang akan diperbarui
		$data     = array('status' => 'Menunggu');

		// Nama ruangan digunakan sebagai pengenal data mana yang akan diperbarui
		$where    = array('nama_ruangan' => $nama_ruangan);

		$query_ruangan = $this->model_ruangan->perbarui($data, $where);

		if ($query && $query_ruangan)
		{
			redirect(base_url('dashboard/data-peminjaman'));
		}
		else
		{
			echo "Proses penambahan data gagal.";
		}
	}

	public function perbarui_peminjaman()
	{
		// Menerima input, lalu disimpan pada variabel-variabel berikut
		$id_peminjaman = $this->input->post('id_peminjaman');
		$keterangan    = $this->input->post('keterangan');
		
		// Data yang akan diperbarui
		$data  = array('keterangan' => $keterangan);

		// ID peminjaman digunakan sebagai pengenal data mana yang akan diperbarui
		$where = array('id_peminjaman' => $id_peminjaman);

		$query = $this->model_peminjaman->perbarui($data, $where);

		if ($query)
		{
			redirect(base_url('dashboard/data-peminjaman'));
		}
		else
		{
			echo "Proses pengubahan data gagal.";
		}
	}

	public function verifikasi_bp()
	{
		// Menerima input, lalu disimpan pada variabel-variabel berikut
		$id_peminjaman = $this->input->post('id_peminjaman');
		
		// Pengubahan status pada tabel peminjaman dari "-" menjadi "OK"
		// Data yang akan diperbarui
		$data = array
		(
			'verifikasi_bp'     => 'OK'
		);

		// ID peminjaman digunakan sebagai pengenal data mana yang akan diperbarui
		$where    = array('id_peminjaman' => $id_peminjaman);

		$query    = $this->model_peminjaman->perbarui($data, $where);

		if ($query)
		{
			redirect(base_url('dashboard/data-peminjaman'));
		}
		else
		{
			echo "Proses pengubahan data gagal.";
		}
	}

	public function verifikasi_kabag()
	{
		// Menerima input, lalu disimpan pada variabel-variabel berikut
		$id_peminjaman = $this->input->post('id_peminjaman');
		
		// Pengubahan status pada tabel peminjaman dari "-" menjadi "OK"
		// Data yang akan diperbarui
		$data = array
		(
			'verifikasi_kabag'     => 'OK'
		);

		// ID peminjaman digunakan sebagai pengenal data mana yang akan diperbarui
		$where    = array('id_peminjaman' => $id_peminjaman);

		$query    = $this->model_peminjaman->perbarui($data, $where);

		if ($query)
		{
			redirect(base_url('dashboard/data-peminjaman'));
		}
		else
		{
			echo "Proses pengubahan data gagal.";
		}
	}

	public function setujui_peminjaman()
	{
		// Menerima input, lalu disimpan pada variabel-variabel berikut
		$id_peminjaman = $this->input->post('id_peminjaman');
		$w_penyetujuan = $this->input->post('waktu_penyetujuan');
		$id_ruangan    = $this->input->post('id_ruangan');
		
		// Pengubahan status pada tabel peminjaman dari "Menunggu" menjadi "Disetujui"
		// Data yang akan diperbarui
		$data_isi = array
		(
			'waktu_penyetujuan' => $w_penyetujuan,
			'status_pinjam'     => 'Disetujui'
		);

		// ID peminjaman digunakan sebagai pengenal data mana yang akan diperbarui
		$where    = array('id_peminjaman' => $id_peminjaman);

		$query    = $this->model_peminjaman->perbarui($data_isi, $where);


		// Pengubahan status pada tabel ruangan dari "Menunggu" menjadi "Sedang digunakan"
		// Data yang akan diperbarui
		$data     = array('status' => 'Sedang digunakan');

		// ID ruangan digunakan sebagai pengenal data mana yang akan diperbarui
		$where    = array('id_ruangan' => $id_ruangan);

		$query_ruangan = $this->model_ruangan->perbarui($data, $where);

		if ($query && $query_ruangan)
		{
			redirect(base_url('dashboard/data-peminjaman'));
		}
		else
		{
			echo "Proses pengubahan data gagal.";
		}
	}

	public function batalkan_peminjaman()
	{
		// Menerima input, lalu disimpan pada variabel-variabel berikut
		$id_peminjaman = $this->input->post('id_peminjaman');
		$w_pembatalan  = $this->input->post('waktu_pembatalan');
		$id_ruangan    = $this->input->post('id_ruangan');
		
		// Pengubahan status pada tabel peminjaman dari "Menunggu" menjadi "Dibatalkan"
		// Data yang akan diperbarui
		$data_isi = array
		(
			'waktu_pembatalan' => $w_pembatalan,
			'status_pinjam'    => 'Dibatalkan'
		);

		// ID peminjaman digunakan sebagai pengenal data mana yang akan diperbarui
		$where    = array('id_peminjaman' => $id_peminjaman);

		$query    = $this->model_peminjaman->perbarui($data_isi, $where);


		// Pengubahan status pada tabel ruangan dari "Menunggu" menjadi "Tersedia"
		// Data yang akan diperbarui
		$data     = array('status' => 'Tersedia');

		// ID ruangan digunakan sebagai pengenal data mana yang akan diperbarui
		$where    = array('id_ruangan' => $id_ruangan);

		$query_ruangan = $this->model_ruangan->perbarui($data, $where);

		if ($query && $query_ruangan)
		{
			redirect(base_url('dashboard/data-peminjaman'));
		}
		else
		{
			echo "Proses pengubahan data gagal.";
		}
	}

	public function selesaikan_peminjaman()
	{
		// Menerima input, lalu disimpan pada variabel-variabel berikut
		$id_peminjaman  = $this->input->post('id_peminjaman');
		$w_pengembalian = $this->input->post('waktu_pengembalian');
		$id_ruangan     = $this->input->post('id_ruangan');
		
		// Pengubahan status pada tabel peminjaman dari "Disetujui" menjadi "Selesai"
		// Data yang akan diperbarui
		$data_isi = array
		(
			'waktu_pengembalian' => $w_pengembalian,
			'status_pinjam'      => 'Selesai'
		);

		// ID peminjaman digunakan sebagai pengenal data mana yang akan diperbarui
		$where    = array('id_peminjaman' => $id_peminjaman);

		$query    = $this->model_peminjaman->perbarui($data_isi, $where);


		// Pengubahan status pada tabel ruangan dari "Sedang digunakan" menjadi "Tersedia"
		// Data yang akan diperbarui
		$data     = array('status' => 'Tersedia');

		// ID ruangan digunakan sebagai pengenal data mana yang akan diperbarui
		$where    = array('id_ruangan' => $id_ruangan);

		$query_ruangan = $this->model_ruangan->perbarui($data, $where);

		if ($query && $query_ruangan)
		{
			redirect(base_url('dashboard/data-peminjaman'));

		}
		else
		{
			echo "Proses pengubahan data gagal.";
		}
	}

	public function hapus_peminjaman()
	{
		// Menerima input dan lalu disimpan pada variabel-variabel berikut
		$id_peminjaman = $this->input->post('id_peminjaman');

		// ID peminjaman digunakan sebagai pengenal data mana yang akan dihapus
		$where = array('id_peminjaman' => $id_peminjaman);

		$query = $this->model_peminjaman->hapus($where);

		if ($query)
		{
			redirect(base_url('dashboard/data-peminjaman'));
		}
		else
		{
			echo "Proses penghapusan data gagal.";
		}
	}


	/*
	|-----------------------------------------------------------------
	| Riwayat Akses Ruangan
	|-----------------------------------------------------------------
	*/

	public function akses_ruangan()
	{
		// Membatasi level pengguna yang dapat mengakses halaman
		if($this->session->userdata('level') != "Bagian Umum")
		{
			redirect(base_url('dashboard'));
		}

		// Memanggil fungsi lihat data pada Model Tap
		$query   = $this->model_tap->tampil()->result_array();

		// Data disimpan sementara pada array
		$halaman = array
		(
			'tb'            => $query,
			'hal'           => 'Riwayat Akses Ruangan'
		);

		$this->template->utama('pages/halaman-akses-ruangan', $halaman);
	}


	/*
	|-----------------------------------------------------------------
	| Fitur Unduh Data
	|-----------------------------------------------------------------
	*/

	public function unduh_akses_ruangan()
	{
		// Membatasi level pengguna yang dapat mengakses halaman
		if($this->session->userdata('level') != "Bagian Umum")
		{
			redirect(base_url('dashboard'));
		}

		// Memanggil fungsi lihat data pada Model Tap
		$query   = $this->model_tap->tampil()->result_array();

		// Data disimpan sementara pada array
		$halaman = array
		(
			'tb'            => $query,
			'hal'           => 'Riwayat Akses Ruangan'
		);

		$this->load->view('pages/unduh-akses-ruangan', $halaman);
	}

	public function unduh_laporan_peminjaman()
	{
		// Membatasi level pengguna yang dapat mengakses halaman
		if($this->session->userdata('level') != "Bagian Umum")
		{
			redirect(base_url('dashboard'));
		}

		// Menerima input, lalu disimpan pada variabel-variabel berikut
		$tgl_awal  = $this->input->post('tanggal_awal');
		$tgl_akhir = $this->input->post('tanggal_akhir');

		// Tanggal awal dan akhir digunakan sebagai pengenal data mana yang akan ditampilkan
		$where = array
		(
			'waktu_pengajuan >=' => $tgl_awal,
			'waktu_pengajuan <=' => $tgl_akhir
		);

		$query     = $this->model_peminjaman->tampil_detail($where)->result_array();

		// Data disimpan sementara pada array
		$halaman = array
		(
			'tb'            => $query,
			'tanggal_awal'  => $tgl_awal,
			'tanggal_akhir' => $tgl_akhir,
			'hal'           => 'Laporan Peminjaman'
		);

		$unduh = $this->load->view('pages/unduh-laporan', $halaman);
	}


	/*
	|-----------------------------------------------------------------
	| Fitur Logout
	|-----------------------------------------------------------------
	*/

	public function logout()
	{
		$sesi	= array
		(
			'namalengkap',
			'level',
			'status-masuk'
		);

		$this->session->unset_userdata($sesi);

		redirect(base_url());
	}
}