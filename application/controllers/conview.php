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

	 public function tambah() {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = '10000';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto') == TRUE) {

                $file_data = $this->do_upload->data();
                $file_name = $file_data['file_name'];

                $file_type = $file_data['file_type'];
                $file_path = $file_data['file_path'];
                $full_path = $file_data['full_path'];

                $data = array(
                        'id_informasi'  => NULL,
                        'id_jenis'      => $this->input->get('jenis'),
                        'id_kategori'   => $this->input->get('kategori'),
                        'id_akun'       => $this->input->get('akun'),
                        'nama_event'    => $this->input->get('nama_event'),
                        'penyelenggara' => $this->input->get('penyelenggara'),
                        'tanggal'       => $this->input->get('tanggal'),
                        'waktu'         => $this->input->get('waktu'),
                        'tempat'        => $this->input->get('tempat'),
                        'deskripsi'     => $this->input->get('deskripsi'),
                        'foto'          => $file_name,
                        'suka'          => $this->input->get(0),
                        'lihat'         => $this->input->get(0)
                    );

                $this->db->insert('tb_informasi', $data);
                return $this->db->insert_id();

                if ($insert) {
                    $this->response(array('status' => 'success', 200));
                } else {
                    $this->response(array('status' => 'fail', 502));
                }
            } else {
                echo "gagal";
            }


        

         //    }
         //  else {
         //    $dataDB['status'] =  'failure';
         // }
         // $this->response($dataDB, 200);       
    }

}

/* End of file conview.php */
/* Location: ./application/controllers/conview.php */