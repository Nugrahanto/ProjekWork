<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conview extends CI_Controller {

	public $data = '';

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        //load view
        $this->load->view('insert');
	}

}

/* End of file conview.php */
/* Location: ./application/controllers/conview.php */