<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template 
{
	protected $_ci;
    
    function __construct()
    {
        $this->_ci = &get_instance();
    }
    
  	function utama($content, $data = NULL)
  	{
        $data['menubar']  = $this->_ci->load->view('components/menubar', $data, TRUE);
        $data['dropdown'] = $this->_ci->load->view('components/dropdown', $data, TRUE);
        $data['content']  = $this->_ci->load->view($content, $data, TRUE);
        
        $this->_ci->load->view('index', $data);
    }
}