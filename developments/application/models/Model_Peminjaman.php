<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Peminjaman extends CI_Model 
{
	var $table = 'tb_peminjaman';

    public function tampil()
    {
        return $this->db->order_by('id_peminjaman', 'DESC')->get($this->table);
    }

    public function tampil_detail($where)
    {
        return $this->db->order_by('id_peminjaman', 'DESC')->get_where($this->table, $where);
    }

    public function tampil_id()
    {
        return $this->db->select_max('id_peminjaman')->get($this->table);
    }

    public function buat($data_isi)
	{	
		return $this->db->insert($this->table, $data_isi);
	}

	public function perbarui($data, $where)
	{
		return $this->db->update($this->table, $data, $where);
	}

	public function hapus($where)
	{
		return $this->db->delete($this->table, $where);
	}
}