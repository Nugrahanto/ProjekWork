<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

	public function cek_user(){
		$nama_akun = $this->input->post('nama_akun');
		$password = $this->input->post('password');

		$query = $this->db->where('nama_akun', $nama_akun)
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
						->where('accept', 'approve')
						->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
						->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
						->get('tb_informasi')
						->result();
	}

	public function get_info_event($id_jenis)
	{
		return $this->db->order_by('id_informasi','DESC')
						->where('tb_informasi.id_jenis', $id_jenis)
						->where('accept', 'approve')
                        ->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
						->get('tb_informasi')
                        ->result();
	}

	public function get_informasi_home()
	{
		date_default_timezone_set("Asia/Bangkok");
		$date = date("Y-m-d H:i");
		return $this->db->order_by('tanggal', 'ASC')
						->order_by('id_informasi','DESC')
						->where('tanggal >=', $date)
						->where('accept', 'approve')
						->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
						->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
						->get('tb_informasi', 8)
						->result();
	}

	public function get_informasi_random()
	{
		return $this->db->order_by('id_informasi', 'RANDOM')
						->where('accept', 'approve')
						->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
						->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
						->get('tb_informasi', 4)
						->result();
	}

	public function get_pupular_informasi()
	{
		return $this->db->where('suka > 5')
						->where('accept', 'approve')
						->order_by('id_informasi','DESC')
						->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
						->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
						->get('tb_informasi')
						->result();
	}

	public function get_near_informasi()
	{
		$date = date("Y-m-d");
		return $this->db->order_by('tanggal', 'ASC')
						->order_by('id_informasi', 'DESC')
						->where('tanggal >=', $date)
						->where('accept', 'approve')
						->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
						->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
						->get('tb_informasi', 8)
						->result();

	}

	// public function get_info_lomba()
	// {
	// 	$lomba = 1;
	// 	return $this->db->order_by('id_informasi','DESC')
	// 					->where('id_jenis', $lomba)
	// 					->get('tb_informasi')
	// 					->result();
	// }

	// public function get_info_seminar()
	// {
	// 	$seminar = 2;
	// 	return $this->db->order_by('id_informasi','DESC')
	// 					->where('id_jenis', $seminar)
	// 					->get('tb_informasi')
	// 					->result();
	// }

	// public function get_info_loker()
	// {
	// 	$loker = 3;
	// 	return $this->db->order_by('id_informasi','DESC')
	// 					->where('id_jenis', $loker)
	// 					->get('tb_informasi')
	// 					->result();
	// }

	// public function get_info_other()
	// {
	// 	$loker = 4;
	// 	return $this->db->order_by('id_informasi','DESC')
	// 					->where('id_jenis', $loker)
	// 					->get('tb_informasi')
	// 					->result();
	// }

	public function insert_info($foto){

		$long = $this->input->post('long');
		$lat = $this->input->post('lat');
		$long_lat = 'geo:'.$lat.','.$long.'';
		$tgl = date("Y-m-d", strtotime($this->input->post('tanggal')));

		$uhu = 'http://localhost/rest_ci/uploads/'.$foto['file_name'];

		$data = array(
			'id_informasi'		=> NULL,
			'id_jenis'			=> $this->input->post('id_jenis'),
			'id_akun'			=> 1,
			'nama_event'		=> $this->input->post('nama_event'),
			'tanggal'			=> $tgl,
			'waktu'				=> $this->input->post('waktu'),
			'penyelenggara'		=> $this->input->post('penyelenggara'),
			'maps'				=> $this->input->post('maps'),
			'long_lat'			=> $long_lat,
			'deskripsi'			=> $this->input->post('deskripsi'),
			'biaya'				=> $this->input->post('biaya'),
			'foto'				=> $uhu,
			'suka'				=> 0,
			'lihat'				=> 0,
			'accept'			=> "approve"
		);
		$insert = $this->db->insert('tb_informasi', $data);
		// if ($insert) {
  //           $push = $this->push_notif("/topics/recomended", $this->input->post('nama_event'), $this->input->post('deskripsi'), "");
  //       }

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function edit_jenis($id_jenis){
		return $this->db->where('id_jenis', $id_jenis)
				 		->get('tb_jenis')
				 		->row();

	}

	public function edit_event($id_jenis, $foto_jenis)
	{
		$data = array(
			'foto_jenis' => $foto_jenis['file_name']
			);
		
            $current_photo = $this->db->where('id_jenis', $id_jenis)->get('tb_jenis')->row()->foto_jenis;
            $path = './'.$current_photo;
            unlink($path);
            $file = './uploads/'.$foto_jenis;
            $array['file_name'] = $foto_jenis;
        

		$this->db->where('id_jenis', $id_jenis)
	  	     	 ->update('tb_jenis', $data);

		// $this->db->query('UPDATE tb_jenis SET foto_jenis="'.$foto_jenis['file_name'].'" WHERE "'.$id_jenis.'"');

	  	    if ($this->db->affected_rows() > 0) {
	  	    	return TRUE;
	  	    }else{
	  	    	return FALSE;
	  	    }		
	}

	public function detail_info($id_informasi){
		return $this->db->where('id_informasi', $id_informasi)
						->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
						->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
				 		->get('tb_informasi')
				 		->row();

	}

	public function edit_info($id_informasi){
		$tgl = date("Y-m-d", strtotime($this->input->post('tanggal')));
		$data = array(
			'nama_event'	=>  $this->input->post('nama_event'),
			'id_jenis'		=>  $this->input->post('jenis'),
			'penyelenggara' =>  $this->input->post('penyelenggara'),
			'maps' 			=>  $this->input->post('lokasi'),
			'tanggal' 		=>  $tgl,
			'waktu' 		=>  $this->input->post('waktu'),
			'deskripsi' 	=>  $this->input->post('deskripsi')
			);

		$this->db->where('id_informasi', $id_informasi)
	  	     	 ->update('tb_informasi', $data);

	  	     	 //
	  	    if ($this->db->affected_rows() > 0) {
	  	    	return TRUE;
	  	    }else{
	  	    	return FALSE;
	  	    }

	}

	public function edit_akun($id_akun){
		$data = array(
			'email'			=>  $this->input->post('email'),
			'nama_akun'		=>  $this->input->post('nama_akun'),
			'password' 		=>  $this->input->post('password'),
			);

		$this->db->where('id_akun', $id_akun)
	  	     	 ->update('tb_akun', $data);

	  	     	 //
	  	    if ($this->db->affected_rows() > 0) {
	  	    	return TRUE;
	  	    }else{
	  	    	return FALSE;
	  	    }

	}

	public function get_jenis()
	{
		return $this->db->order_by('id_jenis','ASC')
						->get('tb_jenis')
						->result();
	}

	public function get_waiting()
	{
		return $this->db->order_by('id_informasi','DESC')
						->where('accept', 'not')
						->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
						->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
						->get('tb_informasi')
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

	public function get_t_token()
	{
		return $this->db->order_by('id_token','ASC')
						->join('tb_akun','tb_akun.id_akun = tb_token.id_akun')
						->get('tb_token')
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

	//push notif
    function push_notif($token, $title, $body, $data)
    {
        // API access key from Google API's Console
    define( 'API_ACCESS_KEY', 'AIzaSyA9YNqx2hWUj7DdQv-VRtvUwW_M13hQdNI' );
    
        $msg = array
           (
                'body'      => $body,
                'title'     => $title,  
                'vibrate'   => 1,
                'sound'     => 1,
           );
        $data = array
           (
                'notifId'  => $data
           );

        $fields = array
            (
                'to'  => $token,
                'notification' => $msg,
                'data' => $data
            );

        $headers = array
            (
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        // echo $result;
        return $result;
    }

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */

