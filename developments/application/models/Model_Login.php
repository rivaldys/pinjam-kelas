<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Login extends CI_Model 
{
	public function periksa_login($table, $simpan)
	{		
		return $this->db->get_where($table, $simpan);
	}		
}