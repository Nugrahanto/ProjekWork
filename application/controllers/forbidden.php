<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forbidden extends CI_Controller {

	public function index()
	{
		$this->load->view('forbidden');
	}

}

/* End of file error.php */
/* Location: ./application/controllers/error.php */