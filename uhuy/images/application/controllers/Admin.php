<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public $data = '';

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
			if ($this->session->userdata('logged_in') == TRUE) {
				redirect(base_url('admin/home'));
			}else{
				$this->load->view('login');
			}
	}

	public function login()
	{
		if ($this->input->post('submit')) 
		{
			$this->form_validation->set_rules('nama_akun', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
			if ($this->form_validation->run() == TRUE) {
	
				if ($this->admin_model->cek_user() == TRUE) {
					redirect(base_url('admin/home'));

				} else {
					$data['notifError'] = 'Login gagal';
					$this->load->view('login', $data);
				}
			} else {
				$data['notif'] = validation_errors();
				$this->load->view('login', $data);
			}
		}
	}

	public function home()
	{	
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 'Admin') {
			$data['main_view'] = 'home';
	 		$data['all'] = $this->admin_model->get_informasi_home();
	 		$data['jenis'] = $this->admin_model->get_jenis();
	 		$data['akun'] = $this->admin_model->get_akun();
	 		$this->load->view('template', $data);
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
	 		$data['notif'] = 'Login gagal';
			$this->load->view('login', $data);
		}else {
			redirect('admin','refresh');
		}
		
	}

	public function event()
	{	
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 'Admin') {
			$id_jenis = $this->uri->segment(3);

	 		$data['main_view'] = 'event';
	 		$data['event'] = $this->admin_model->get_info_event($id_jenis);
	 		$data['jenis'] = $this->admin_model->get_jenis();
	 		$data['akun'] = $this->admin_model->get_akun();
	 		$this->load->view('template', $data);
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
			redirect('forbidden','refresh');
		}else{
			redirect('admin','refresh');
		}		
	}

	public function detail_informasi()
	{	
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 'Admin') {
	 		$id_informasi = $this->uri->segment(3);

	 		$data['main_view'] = 'detail_info';
	 		$data['detail_info'] = $this->admin_model->detail_info($id_informasi);
	 		$data['jenis'] = $this->admin_model->get_jenis();
	 		$data['akun'] = $this->admin_model->get_akun();
	 		$this->load->view('template', $data);
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
	 		redirect('forbidden','refresh');
		} else{
			redirect('admin','refresh');
		}
		
	}

	public function informasi()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 'Admin') {
	 		$data['main_view'] = 'all_informasi';
	 		$data['all'] = $this->admin_model->get_informasi();
			$data['jenis'] = $this->admin_model->get_jenis();
			$data['akun'] = $this->admin_model->get_akun();
	 		$this->load->view('template', $data);
	 	} else if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
	 		redirect('forbidden','refresh');
		} else {
	 		redirect('admin','refresh');	
	 	}
	}

	public function tambah_informasi(){
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 'Admin') {
	 		$this->load->view('tambah_informasi');
	 	} else if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
	 		redirect('forbidden','refresh');
		} else {
	 		redirect('admin','refresh');	
	 	}	
	}

	public function insert_info()
	{
		if ($this->session->userdata('logged_in') == TRUE && ($this->session->userdata('level') == 'Admin')) {
			if ($this->input->post("submit")) {
				$this->form_validation->set_rules('id_jenis', 'Nama Jenis', 'trim|required');
				$this->form_validation->set_rules('nama_event', 'Nama', 'trim|required');
				$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
				$this->form_validation->set_rules('waktu', 'Waktu', 'trim|required');
				$this->form_validation->set_rules('penyelenggara', 'Penyelenggara', 'trim|required');
				$this->form_validation->set_rules('maps', 'Tempat Pelaksanaan', 'trim|required');
				$this->form_validation->set_rules('long', 'Long', 'trim|required');
				$this->form_validation->set_rules('lat', 'Lat', 'trim|required');
				$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
				$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');

				if ($this->form_validation->run() == TRUE) {

					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']  = '10000';
					
					$this->load->library('upload', $config);
					
					if ($this->upload->do_upload('foto')){
						

						if ($this->admin_model->insert_info($this->upload->data()) == TRUE) {
							$data['notif'] = 'Tambah Info Berhasil';
							$data['all'] = $this->admin_model->get_informasi();
							$data['jenis'] = $this->admin_model->get_jenis();
							$data['akun'] = $this->admin_model->get_akun();
							$data['main_view'] = 'all_informasi';
							$this->load->view('template', $data);
							// $this->load->view('tambah_informasi', $data);
							//$data['main_view'] = 'tambah_informasi';
							//$this->load->view('template', $data);
						}
						else{
							$data['notif'] = 'Tambah Info Gagal!';
							$data['all'] = $this->admin_model->get_informasi();
							$data['jenis'] = $this->admin_model->get_jenis();
							$data['akun'] = $this->admin_model->get_akun();
							$data['main_view'] = 'all_informasi';
							$this->load->view('template', $data);
							// $this->load->view('tambah_informasi', $data);
							// $data['main_view'] = 'tambah_informasi';
							// $this->load->view('template', $data);
						}
					}
					else{
						$data['notif'] = $this->upload->display_errors(); //validation default mengeluarkan kalimat salah
						$data['all'] = $this->admin_model->get_informasi();
						$data['jenis'] = $this->admin_model->get_jenis();
						$data['akun'] = $this->admin_model->get_akun();
						$data['main_view'] = 'all_informasi';
						$this->load->view('template', $data);
						// $this->load->view('tambah_informasi', $data);
						// $data['main_view'] = 'tambah_informasi';
						// $this->load->view('template', $data);
					}
				}
				else{
					$data['notif'] = validation_errors();
					$data['all'] = $this->admin_model->get_informasi();
					$data['jenis'] = $this->admin_model->get_jenis();
					$data['akun'] = $this->admin_model->get_akun();
					$data['main_view'] = 'all_informasi';
					$this->load->view('template', $data);
					// $this->load->view('tambah_informasi', $data);
					// $data['main_view'] = 'tambah_informasi';
					// $this->load->view('template', $data);
				}
			}
		} else {
			redirect('admin','refresh');
		}
	}

	public function akun()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 'Admin') {
	 		$data['main_view'] = 'akun';
	 		$data['t_akun'] = $this->admin_model->get_t_akun();
			$data['jenis'] = $this->admin_model->get_jenis();
			$data['akun'] = $this->admin_model->get_akun();
	 		$this->load->view('template', $data);
	 	} else if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
	 		redirect('forbidden','refresh');
		} else {
	 		redirect('admin','refresh');	
	 	}
	}

	public function token()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 'Admin') {
	 		$data['main_view'] = 'token';
	 		$data['t_token'] = $this->admin_model->get_t_token();
			$data['jenis'] = $this->admin_model->get_jenis();
			$data['akun'] = $this->admin_model->get_akun();
	 		$this->load->view('template', $data);
	 	} else if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
	 		redirect('forbidden','refresh');
		} else {
	 		redirect('admin','refresh');	
	 	}
	}

	public function suka()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 'Admin') {
	 		$data['main_view'] = 'suka';
	 		$data['suka'] = $this->admin_model->get_suka();
			$data['jenis'] = $this->admin_model->get_jenis();
			$data['akun'] = $this->admin_model->get_akun();
	 		$this->load->view('template', $data);
	 	} else if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
	 		redirect('forbidden','refresh');
		} else {
	 		redirect('admin','refresh');	
	 	}
	}

	public function jenis()
	{	
		if ($this->session->userdata('logged_in') == TRUE && ($this->session->userdata('level') == 'Admin')) {
			$data['main_view'] = 'jenis';
			$data['jenis'] = $this->admin_model->get_jenis();
			$data['akun'] = $this->admin_model->get_akun();
			$this->load->view('template', $data);
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
	 		redirect('forbidden','refresh');
		} else{
			redirect('admin','refresh');
		}
		
	}

	public function tambah_jenis()
	{
		if ($this->session->userdata('logged_in') == TRUE && ($this->session->userdata('level') == 'Admin')) {
			if ($this->input->post("submit")) {
				$this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'trim|required');

				if ($this->form_validation->run() == TRUE) {

					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']  = '10000';
					
					$this->load->library('upload', $config);
					
					if ($this->upload->do_upload('foto_jenis')){
						

						if ($this->admin_model->insert_jenis($this->upload->data()) == TRUE) {
							$data['notif'] = 'Tambah Jenis Berhasil';
							$data['jenis'] = $this->admin_model->get_jenis();
							$data['akun'] = $this->admin_model->get_akun();
							$data['main_view'] = 'jenis';
							$this->load->view('template', $data);
						}
						else{
							$data['notif'] = 'Tambah Jenis Gagal!';
							$data['jenis'] = $this->admin_model->get_jenis();
							$data['akun'] = $this->admin_model->get_akun();
							$data['main_view'] = 'jenis';
							$this->load->view('template', $data);
						}
					}
					else{
						$data['notif'] = $this->upload->display_errors(); //validation default mengeluarkan kalimat salah
						$data['jenis'] = $this->admin_model->get_jenis();
						$data['akun'] = $this->admin_model->get_akun();
						$data['main_view'] = 'jenis';
						$this->load->view('template', $data);
					}
				}
				else{
					$data['notif'] = validation_errors();
					$data['jenis'] = $this->admin_model->get_jenis();
					$data['akun'] = $this->admin_model->get_akun();
					$data['main_view'] = 'jenis';
					$this->load->view('template', $data);
				}
			}
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
	 		redirect('forbidden','refresh');
		} else {
			redirect('admin','refresh');
		}
	}

	public function edit_informasi()
	{
		if ($this->session->userdata('logged_in') == TRUE && ($this->session->userdata('level') == 'Admin')) {

			$id_informasi = $this->uri->segment(3);

			$data['main_view'] = 'edit_info';
			$data['detail_info'] = $this->admin_model->detail_info($id_informasi);
			$data['jenis'] = $this->admin_model->get_jenis();
			$data['akun'] = $this->admin_model->get_akun();
			$this->load->view('template', $data);
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
	 		redirect('forbidden','refresh');
		} else{
			redirect('admin','refresh');
		}
	}

	public function do_edit()
	{
		if ($this->input->post("submit")) {
			$this->form_validation->set_rules('nama_event', 'Nama Event', 'trim|required');
			$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
			$this->form_validation->set_rules('penyelenggara', 'Penyelenggara', 'trim|required');
			$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
			$this->form_validation->set_rules('tanggal', 'Tanggal Pelaksanaan', 'trim|required');
			$this->form_validation->set_rules('waktu', 'Waktu Pelaksanaan', 'trim|required');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

		if ($this->form_validation->run() == TRUE) {				

				if ($this->admin_model->edit_info($this->uri->segment(3)) == TRUE) {
					$data['notif'] = 'Edit Sukses';
					$data['detail_info'] = $this->admin_model->detail_info($this->uri->segment(3));
					$data['jenis'] = $this->admin_model->get_jenis();
					$data['akun'] = $this->admin_model->get_akun();
					$data['main_view'] = 'detail_info';
					$this->load->view('template', $data);
				}
				else{
					$data['notif'] = 'Edit Gagal!';
					$data['detail_info'] = $this->admin_model->detail_info($this->uri->segment(3));
					$data['jenis'] = $this->admin_model->get_jenis();
					$data['akun'] = $this->admin_model->get_akun();
					$data['main_view'] = 'edit_info';
					$this->load->view('template', $data);
				}
			}else{
				$data['notif'] = validation_errors();
				$data['detail_info'] = $this->admin_model->detail_info($this->uri->segment(3));
				$data['jenis'] = $this->admin_model->get_jenis();
				$data['akun'] = $this->admin_model->get_akun();
				$data['main_view'] = 'edit_info';
				$this->load->view('template', $data);
			}
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
	 		redirect('forbidden','refresh');
		} else {
			redirect('admin','refresh');
		}
		
	}

	public function do_edit_event()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->input->post("submit")) {
				$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']  = '10000';
					
					$this->load->library('upload', $config);
					
					if ($this->upload->do_upload('foto_jenis')){
						
						if ($this->admin_model->edit_event($this->uri->segment(3), $this->upload->data()) == TRUE) {
							$data['notif'] = 'Tambah Jenis Berhasil';
							$data['main_view'] = 'edit_jenis';
							$data['jenis'] = $this->admin_model->get_jenis();
							$data['akun'] = $this->admin_model->get_akun();
							$data['e_jenis'] = $this->admin_model->edit_jenis($this->uri->segment(3));
							$this->load->view('template', $data);
							redirect('admin/jenis');
						}
						else{
							$data['notif'] = 'Tambah Jenis Gagal!';
							$data['main_view'] = 'edit_jenis';
							$data['jenis'] = $this->admin_model->get_jenis();
							$data['akun'] = $this->admin_model->get_akun();
							$data['e_jenis'] = $this->admin_model->edit_jenis($this->uri->segment(3));
							$this->load->view('template', $data);
							redirect('admin/jenis');
						}
					}
					else{
						$data['notif'] = $this->upload->display_errors(); //validation default mengeluarkan kalimat salah
						$data['main_view'] = 'edit_jenis';
						$data['jenis'] = $this->admin_model->get_jenis();
						$data['akun'] = $this->admin_model->get_akun();
						$data['e_jenis'] = $this->admin_model->edit_jenis($this->uri->segment(3));
						$this->load->view('template', $data);
						redirect('admin/jenis');
					}

			}
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
	 		redirect('forbidden','refresh');
		} else {
			redirect('admin','refresh');
		}		
	}

	public function hapus_informasi(){
		if ($this->session->userdata('logged_in') == TRUE) {
			
			$id_informasi = $this->uri->segment(3);

			if ($this->admin_model->delete_informasi($id_informasi) == TRUE) {
				redirect('admin/informasi');
			}else{
				redirect('admin/informasi');
			}

		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
	 		redirect('forbidden','refresh');
		} else{
			redirect(base_url('admin'));
		}
	}

	public function delete_info(){
		$id_informasi = $this->input->post("id_informasi");
		if ($this->admin_model->delete($id_informasi) == TRUE) {
			echo "1";
		}
		else {
			echo "0";
		}
	}

	public function edit_jenis()
	{
		if ($this->session->userdata('logged_in') == TRUE) {

			$id_jenis = $this->uri->segment(3);

			$data['main_view'] = 'edit_jenis';
			$data['e_jenis'] = $this->admin_model->edit_jenis($id_jenis);
			$data['jenis'] = $this->admin_model->get_jenis();
			$data['akun'] = $this->admin_model->get_akun();
			$this->load->view('template', $data);
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
	 		redirect('forbidden','refresh');
		} else{
			redirect('admin','refresh');
		}
	}

	public function hapus_jenis(){
		if ($this->session->userdata('logged_in') == TRUE) {
			
			$id_jenis = $this->uri->segment(3);

			if ($this->admin_model->delete_jenis($id_jenis) == TRUE) {
				redirect('admin/jenis');
			}else{
				redirect('admin/jenis');
			}

		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
	 		redirect('forbidden','refresh');
		} else{
			redirect(base_url('admin'));
		}
	}

	public function profil()
	{
		if ($this->session->userdata('logged_in') == TRUE && ($this->session->userdata('level') == 'Admin')) {

			$data['main_view'] = 'profil';
			$data['jenis'] = $this->admin_model->get_jenis();
			$data['akun'] = $this->admin_model->get_akun();
			$this->load->view('template', $data);
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
	 		redirect('forbidden','refresh');
		} else{
			redirect('admin','refresh');
		}
	}

	public function do_edit_akun()
	{
		if ($this->input->post("submit")) {
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('nama_akun', 'Nama', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == TRUE) {				

				if ($this->admin_model->edit_akun($this->uri->segment(3)) == TRUE) {
					$data['notif'] = 'Edit Sukses';
					$data['jenis'] = $this->admin_model->get_jenis();
					$data['akun'] = $this->admin_model->get_akun();
					$data['main_view'] = 'profil';
					$this->load->view('template', $data);
					redirect('/admin/profil','refresh');
				}
				else{
					$data['notif'] = 'Edit Gagal!';
					$data['jenis'] = $this->admin_model->get_jenis();
					$data['akun'] = $this->admin_model->get_akun();
					$data['main_view'] = 'profil';
					$this->load->view('template', $data);
				}
			}else{
				$data['notif'] = validation_errors();
				$data['jenis'] = $this->admin_model->get_jenis();
				$data['akun'] = $this->admin_model->get_akun();
				$data['main_view'] = 'profil';
				$this->load->view('template', $data);
			}
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('level') == 'Admin')) {
	 		redirect('forbidden','refresh');
		} else {
			redirect('admin','refresh');
		}	
	}

	public function logout(){
		$data = array('nama_akun' => '',
					  'logged_in' => FALSE 
					  );
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}

}

/* End of file fe.php */
/* Location: ./application/controllers/fe.php */		