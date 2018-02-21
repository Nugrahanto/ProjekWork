<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public $data = '';

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('user_model');
	}

	public function login()
	{
		if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
				redirect(base_url('user'));
		} else{
			$this->load->view('login_user');
		}
	}

	public function do_login()
	{
		if ($this->input->post('submit')) 
		{
			$this->form_validation->set_rules('nama_akun', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
			if ($this->form_validation->run() == TRUE) {
	
				if ($this->user_model->cek_user() == TRUE) {
					
					redirect(base_url('user'));

				} else {
					$data['notif'] = 'Login gagal';
					$this->load->view('login_user', $data);
				}
			} else {
				$data['notif'] = validation_errors();
				$this->load->view('login_user',$data);
			}
		}
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
	 		$data['main_view'] = 'home2';
			$data['all'] = $this->user_model->get_informasi_home();
			$data['top'] = $this->user_model->get_pupular_informasi();
			$data['jenis'] = $this->user_model->get_jenis();
			$this->load->view('template2', $data);
		}else {
			redirect('user/login','refresh');;
		}
	}

	public function lomba()
	{
		if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
			$data['main_view'] = 'lomba2';
			$data['all'] = $this->user_model->get_informasi();
			$data['jenis'] = $this->user_model->get_jenis();
			$data['lomba'] = $this->user_model->get_info_lomba();
			$this->load->view('template2', $data);
		}else {
			redirect('user','refresh');;
		}
	}

	public function event()
	{	
		if ($this->session->userdata('logged_in') == TRUE && !($this->session->userdata('level') == 'Admin')) {
			$id_jenis = $this->uri->segment(3);

	 		$data['main_view'] = 'event2';
	 		$data['event'] = $this->user_model->get_info_event($id_jenis);
	 		$data['jenis'] = $this->user_model->get_jenis();
	 		$this->load->view('template2', $data);
		}else{
			redirect('user','refresh');
		}		
	}

	public function detail_informasi()
	{
		if ($this->session->userdata('logged_in') == TRUE && !($this->session->userdata('level') == 'Admin')) {
			$id_informasi = $this->uri->segment(3);

			$data['main_view'] = 'detail_info2';
			$data['rand'] = $this->user_model->get_informasi_random($id_informasi);
			$data['jenis'] = $this->user_model->get_jenis();
			$data['detail_info'] = $this->user_model->detail_info($id_informasi);
			$data['lomba'] = $this->user_model->get_info_lomba_home();
			$data['seminar'] = $this->user_model->get_info_seminar_home();
			$data['loker'] = $this->user_model->get_info_loker_home();
			$this->load->view('template2', $data);
		}else{
			redirect('user','refresh');
		}			
	}

	public function near_event()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'near_event';
			$data['all'] = $this->user_model->get_informasi();
			$data['jenis'] = $this->user_model->get_jenis();
			$data['near'] = $this->user_model->get_near_informasi();
			$this->load->view('template2', $data);
		} else{
			redirect('admin','refresh');;
		}
	}

	public function logout(){
		$data = array('nama_akun' => '',
					  'logged_in' => FALSE 
					  );
		$this->session->sess_destroy();
		redirect(base_url('user'));
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */