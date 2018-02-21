<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

	public function cek_user(){
		$nama_akun = $this->input->post('nama_akun');
		$password = $this->input->post('password');

		$query = $this->db->where('email', $nama_akun)
						  ->where('password', $password)
						  ->get('tb_akun');

						  if ($query->num_rows() > 0) {
						  	$data = array(
						  		'nama_akun'  => $nama_akun,
						  		'level' => $query->row()->nama_akun,
						  		'logged_in' => TRUE
						  		);
						  	$this->session->set_userdata($data);

						  	return TRUE;

						  }else {
						  	return FALSE;
						  }
	}	

	public function get_informasi()
	{
		return $this->db->order_by('id_informasi','DESC')
						->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
						->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
						->get('tb_informasi')
						->result();
	}

	public function get_info_event($id_jenis)
	{
		return $this->db->order_by('id_informasi','DESC')
						->where('tb_informasi.id_jenis', $id_jenis)
                        ->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
						->get('tb_informasi')
                        ->result();
	}

	public function get_informasi_home()
	{
		$date = date("Y-m-d");
		return $this->db->order_by('id_informasi','DESC')
						->where('accept', 'approve')
						->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
						->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
						->get('tb_informasi', 8)
						->result();
	}

	public function get_informasi_random($id_informasi)
	{
		return $this->db->where('id_informasi !=', $id_informasi)
						->order_by('id_informasi', 'RANDOM')
						->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
						->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
						->get('tb_informasi', 4)
						->result();
	}

	public function get_pupular_informasi()
	{
		date_default_timezone_set("Asia/Bangkok");
		$date = date("Y-m-d");
		return $this->db->where('suka > 5')
						->where('tanggal >=', $date)
						->order_by('tanggal', 'ASC')
						->order_by('id_informasi','DESC')
						->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
						->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
						->get('tb_informasi')
						->result();
	}

	public function get_near_informasi()
	{
		date_default_timezone_set("Asia/Bangkok");
		$date = date("Y-m-d");
		return $this->db->order_by('tanggal', 'ASC')
						->order_by('id_informasi', 'DESC')
						->where('tanggal >=', $date)
						->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
						->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
						->get('tb_informasi', 8)
						->result();

	}

	public function get_info_lomba_home()
	{
		date_default_timezone_set("Asia/Bangkok");
		$date = date("Y-m-d");
		$lomba = 1;
		return $this->db->order_by('tanggal', 'ASC')
						->order_by('id_informasi','DESC')
						->where('id_jenis', $lomba)
						->where('tanggal >=', $date)
						->get('tb_informasi', 4)
						->result();
	}

	public function get_info_seminar_home()
	{	
		$seminar = 2;
		return $this->db->order_by('id_informasi','DESC')
						->where('id_jenis', $seminar)
						->get('tb_informasi', 4)
						->result();
	}

	public function get_info_loker_home()
	{
		$loker = 3;
		return $this->db->order_by('id_informasi','DESC')
						->where('id_jenis', $loker)
						->get('tb_informasi', 4)
						->result();
	}

	public function get_info_other_home()
	{
		$loker = 4;
		return $this->db->order_by('id_informasi','DESC')
						->where('id_jenis', $loker)
						->get('tb_informasi', 4)
						->result();
	}

	public function detail_info($id_informasi){
		return $this->db->where('id_informasi', $id_informasi)
						->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
						->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
				 		->get('tb_informasi')
				 		->row();
	}

	public function get_jenis()
	{
		return $this->db->order_by('id_jenis','ASC')
						->get('tb_jenis')
						->result();
	}

	public function insert_jenis($foto_jenis){
		$data = array(
			'id_jenis'			=> NULL,
			'nama_jenis'		=> $this->input->post('nama_jenis'),
			'foto_jenis'		=> $foto_jenis['file_name']
		);
		$this->db->insert('tb_jenis',$data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_t_akun()
	{
		return $this->db->order_by('email','ASC')
						->get('tb_akun')
						->result();	
	}

	public function get_suka()
	{
		return $this->db->order_by('nama_event','ASC')
						->order_by('nama_akun','ASC')
						->join('tb_akun','tb_akun.id_akun = tb_suka.id_akun')
						->join('tb_informasi','tb_informasi.id_informasi = tb_suka.id_informasi')
						->get('tb_suka')
						->result();	
	}

	public function get_akun()
	{
		return $this->db->where('id_akun', 1)
						->get('tb_akun')
						->row();
	}

	public function delete_informasi($id_informasi){
		$this->db->where('id_informasi', $id_informasi)
	  	     	 ->delete('tb_informasi');

	  	     	 //
	  	    if ($this->db->affected_rows() > 0) {
	  	    	return TRUE;
	  	    }else{
	  	    	return FALSE;
	  	    }

	}

	public function delete($id_informasi)
	{
		$this->db->where("id_informasi", $id_informasi)
				 ->delete("tb_informasi");

			if ($this->db->affected_rows() >= 0) {
	  	    	return TRUE;
	  	    }else{
	  	    	return FALSE;
	  	    }
	}

	public function delete_jenis($id_jenis){
		$this->db->where('id_jenis', $id_jenis)
	  	     	 ->delete('tb_jenis');

	  	     	 //
	  	    if ($this->db->affected_rows() > 0) {
	  	    	return TRUE;
	  	    }else{
	  	    	return FALSE;
	  	    }

	}
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */

