<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Telboard_model extends CI_Model {

	
public function insert($foto){

		$data = json_decode($parameter, FALSE);

		$data = array(
			'id_informasi' => NULL,
            'id_jenis'     => $data->id_jenis,
            'id_kategori'  => $data->id_kategori,
            'id_akun'      => $data->id_akun,
            'nama_event'   => $data->nama_event,
            'tanggal'      => $data->tanggal,
            'waktu'        => $data->waktu,
            'penyelenggara'=> $data->penyelenggara,
            'maps'         => $data->maps,
            'deskripsi'    => $data->deskripsi,
            'biaya'        => $data->biaya,
			'foto'         => $foto['file_name'],
            'suka'         => $data->suka,
            'lihat'        => $data->lihat
		);

        $this->db->insert('tb_informasi', json_decode($parameter, TRUE);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */