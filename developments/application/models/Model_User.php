<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_User extends CI_Model 
{
	var $table = 'tb_user';

	public function tampil()
    {
        return $this->db->order_by('level', 'ASC')->get($this->table);
    }

    public function buat($data)
	{		
		return $this->db->insert($this->table, $data);
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