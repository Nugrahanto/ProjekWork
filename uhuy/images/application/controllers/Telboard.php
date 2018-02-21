<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Telboard extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

   //Menampilkan data informasi
   function ambil($value, $parameter) {
        if ($value == '') {
            $informasi = $this->db->order_by('id_informasi', 'ASC')
                                  ->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
                                  ->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
                                  ->get('tb_informasi')
                                  ->result();
        } else {
            $informasi = $this->db->order_by('id_informasi', $value)
                                  ->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
                                  ->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
                                  ->get('tb_informasi')
                                  ->result();
        }
        $this->response(
            array(
            'status' => 200,
            'result' => $informasi
            ));
    }
    
    //Menampilkan data jenis
    function ambil_jenis($value, $parameter) {
        if ($value == '') {
            $jenis = $this->db->get('tb_jenis')
                                  ->result();
        } else {
            $this->db->where('id_jenis', $value);
            $jenis = $this->db->get('tb_jenis')->result();
        }
        $this->response(array(
            'status' => 200,
            'result' => $jenis
            ));
    }
    
    //ambil informasi berdasar id_jenis
    function ambil_by_jenis($value, $parameter) {
        if ($value == '') {
            $informasi = $this->db->where('tb_informasi.id_jenis', $parameter)
                                  ->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
                                  ->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
                                  ->get('tb_informasi')
                                  ->result();
        } else {
            $this->db->where('id_informasi', $value);
            $informasi = $this->db->get('tb_informasi')->result();
        }
        $this->response(array(
            'status' => 200,
            'result' => $informasi
            ));
    }

    //ambil informasi berdasar tanggal ASC
    function ambil_by_date($value, $parameter) {
        if ($value == '') {
            $informasi = $this->db->order_by('tanggal', 'ASC')
                                  ->order_by('id_informasi', 'DESC')
                                  ->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
                                  ->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
                                  ->get('tb_informasi')
                                  ->result();
        } else {
            $this->db->where('id_informasi', $value);
            $informasi = $this->db->get('tb_informasi')->result();
        }
        $this->response(array(
            'status' => 200,
            'result' => $informasi
            ));
    }

    //ambil informasi berdasar tanggal before now
    function ambil_by_datebn($value, $parameter) {
        
        $jenis = $this->db->get('tb_jenis')
                                  ->result();
        
        if ($value == '') {
            $informasiNear['jenis'] = array();
            foreach ($jenis as $value_jenis) {
                $date = date("Y-m-d");
                $informasi = $this->db->order_by('tanggal', 'ASC')
                                  ->order_by('id_informasi', 'ASC')
                                  ->order_by('tanggal', 'ASC')
                                  ->where('tb_informasi.id_jenis', $value_jenis->id_jenis)
                                  ->where('tanggal >=', $date)
                                  ->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
                                  ->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
                                  ->get('tb_informasi')
                                  ->result();

                $informasiJenis = array('id_jenis' => $value_jenis->id_jenis,
                                        'jenis_nama' => $value_jenis->nama_jenis,
                                        'data' => $informasi);
                array_push($informasiNear['jenis'], $informasiJenis);
                
            }

            $this->response(array(
            'status' => 200,
            'result' => $informasiNear
            ));
            
        } else {
            $this->db->where('id_informasi', $value);
            $informasi = $this->db->get('tb_informasi')->result();

            $this->response(array(
            'status' => 200,
            'result' => $informasi
            ));

        }   
    }
        

    //ambil informasi berdasar like terbanyak
    function ambil_by_suka($value, $parameter) {
        if ($value == '') {
            $informasi = $this->db->order_by('suka', 'DESC')
                                  ->order_by('id_informasi', 'DESC')
                                  ->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
                                  ->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
                                  ->get('tb_informasi')
                                  ->result();
        } else {
            $this->db->where('id_informasi', $value);
            $informasi = $this->db->get('tb_informasi')->result();
        }
        $this->response(array(
            'status' => 200,
            'result' => $informasi
            ));
    }

    //ambil informasi berdasar lihat terbanyak
    function ambil_by_lihat($value, $parameter) {
        if ($value == '') {
            $informasi = $this->db->order_by('lihat', 'DESC')
                                  ->order_by('id_informasi', 'DESC')
                                  ->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
                                  ->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
                                  ->get('tb_informasi')
                                  ->result();
        } else {
            $this->db->where('id_informasi', $value);
            $informasi = $this->db->get('tb_informasi')->result();
        }
        $this->response(array(
            'status' => 200,
            'result' => $informasi
            ));
    }

    function ambil_by_idinfo($value, $parameter)
    {
        if ($value == !'') {
            $informasi = $this->db->where('id_informasi', $value)
                                  ->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
                                  ->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
                                  ->get('tb_informasi')
                                  ->result();
        } else {
            $this->response(array('status' => 'fail', 502));
        }
        $this->response(array(
            'status' => 200,
            'result' => $informasi
            ));
    }

    //menambah data informasi
    function tambah($value, $parameter) {
        $data = json_decode($parameter, FALSE);
        $tgl = date("Y-m-d", strtotime($data->tanggal));
        
        $insert = $this->db->query('INSERT INTO tb_informasi(id_informasi, id_jenis, id_akun, nama_event, tanggal, waktu, penyelenggara, maps, long_lat, deskripsi, biaya, foto, suka, lihat) VALUES (NULL, '.$data->id_jenis.', "'.$data->id_akun.'", "'.$data->nama_event.'", "'.$tgl.'", "'.$data->waktu.'", "'.$data->penyelenggara.'", "'.$data->maps.'", "'.$data->long_lat.'", "'.$data->deskripsi.'", "'.$data->biaya.'", "'.$data->foto.'", '.$data->suka.', '.$data->lihat.')');


        if ($insert) {
            $push = $this->push_notif("/topics/recomended", $data->nama_event, $data->deskripsi, "");
            $this->response(array('status' => 'success',
                                  'push' => $push));

        } else {
            $this->response(array('status' => 'fail_query', 502));
        }
    }

    function tambah_akun($value, $parameter){
        $data = json_decode($parameter, FALSE);
        $query = $this->db->where('id_akun', $data->id_akun)
                          ->get('tb_akun');

        if ($query->num_rows() == 0 ) {
            $insert = $this->db->query('INSERT INTO tb_akun(id_akun, email, nama_akun, password, foto_akun) VALUES ("'.$data->id_akun.'", "'.$data->email.'", "'.$data->nama_akun.'", "'.$data->password.'", "'.$data->foto_akun.'")');

            if ($insert) {
                $this->response(array('status' => 'success', 200));
            } else {
                $this->response(array('status' => 'fail_query', 502));
            }
        }
    }

    //tambah_token
    function tambah_token($value, $parameter)
    {
        $data = json_decode($parameter, FALSE);
        $query = $this->db->where('id_token', $data->id_token)
                          ->get('tb_token');

        if ($query->num_rows() == 0 ) {
            $insert = $this->db->query('INSERT INTO tb_token(id_token, id_akun, token) VALUES ("'.$data->id_token.'", "'.$data->id_akun.'", "'.$data->token.'")');

            if ($insert) {
                $this->response(array('status' => 'success', 200));
            } else {
                $this->response(array('status' => 'fail_query', 502));
            }
        }   
    }

    //menampilkan berdasarkan parameter = tabel db
    function ambil_order($value, $parameter) {

        if ($value == '') {
            $kontak = $this->db->order_by($parameter,'DESC')->get('tb_informasi')->result();
        } else {
            $this->db->where('id_informasi', $value);
            $kontak = $this->db->get('tb_informasi')
                               ->result();
        }
        $this->response(array(
            'status' => 200,
            'result' => $kontak
            ));
    }

    //Menampilkan berdasarkan parameter = format json
    // function ambil_order($value, $parameter) {

    //     $parameter 

    //     if ($value == '') {
    //         $kontak = $this->db->order_by($parameter,'DESC')->get('tb_informasi')->result();
    //     } else {
    //         $this->db->where('id_informasi', $value);
    //         $kontak = $this->db->get('tb_informasi')
    //                            ->result();
    //     }
    //     $this->response($kontak, 200);
    // }

    //Menghapus salah satu data kontak
    function hapus($value, $parameter) {
        $delete = $this->db->where('id_informasi', $value)
                            ->delete('tb_informasi');
        if ($delete) {
            $this->response(array('status' => 'success'), 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    
    //suka (tambah dan kurang)
//    function suka($value, $parameter){
//
//        $sql = $this->db->query('UPDATE tb_informasi SET suka = suka '.$parameter.' WHERE id_informasi = '.$value.'');
//
//        if ($sql) {
//            $this->response(array('status' => 'success'), 200);
//        } else {
//            $this->response(array('status' => 'fail', 502));
//        }
//    }

    // update status
    function status($value, $parameter){
        $data = json_decode($parameter, FALSE);
        $sql = $this->db->query('UPDATE tb_suka SET status = "'.$value.'" WHERE id_informasi = '.$data->id_informasi.' && id_akun = "'.$data->id_akun.'"');

        if ($sql) {
            $this->response(array('status' => 'success'), 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function suka($value, $parameter)
    {
        $data = json_decode($parameter, FALSE);
        $query = $this->db->where('id_akun', $data->id_akun)
                          ->where('id_informasi', $data->id_informasi)
                          ->get('tb_suka');

        $usuka = $this->db->query('UPDATE tb_informasi SET lihat = lihat + 1 WHERE id_informasi = '.$data->id_informasi.'');
        if ($usuka) {
            $this->response(array('status' => 'success_update', 200));
        }

        if ($query->num_rows() == 0 ) {
            $sql = $this->db->query('INSERT INTO tb_suka(id_suka, id_informasi, id_akun, status) VALUES (NULL, '.$data->id_informasi.', "'.$data->id_akun.'", "'.$value.'")');

            if ($sql) {
                $this->response(array('status' => 'success', 200));
            } else {
                $this->response(array('status' => 'fail_query', 502));
            }
        }

    }

    function ubah($value, $parameter)
    {
        $data = json_decode($parameter, FALSE);
        $tgl = date("Y-m-d", strtotime($data->tanggal));
        
        $update = $this->db->query('UPDATE tb_informasi SET id_jenis='.$data->id_jenis.', nama_event="'.$data->nama_event.'", tanggal="'.$tgl.'", waktu="'.$data->waktu.'", penyelenggara="'.$data->penyelenggara.'", maps="'.$data->maps.'", long_lat="'.$data->long_lat.'", deskripsi="'.$data->deskripsi.'", biaya="'.$data->biaya.'", foto="'.$data->foto.'", suka='.$data->suka.', lihat='.$data->lihat.' WHERE id_informasi = '.$data->id_informasi.'');

        if ($update) {
            $this->response(array('status' => 'success', 200));
        } else {
            $this->response(array('status' => 'fail_query', 502));
        }
    }

    function ambil_suka($value, $parameter)
    {
        $suka = $this->db->where('id_informasi', $value)
                         ->where('status', 'true')
                         ->count_all_results('tb_suka');

        $ambil = $this->db->where('id_informasi', $value)
                          ->where('id_akun', $parameter)
                          ->get('tb_suka')
                          ->result();

                          $this->response(array(
                            'status' => 200,
                            'jumlah' => $suka,
                            'result' => $ambil));
    }

    function cari($value, $parameter)
    {
        if ($value == '') {
            $informasi = $this->db->order_by('nama_event', 'ASC')
                                  ->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
                                  ->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
                                  ->get('tb_informasi')
                                  ->result();
        } else {
            $informasi = $this->db->like('nama_event', $value)
                                  ->order_by('id_informasi', 'ASC')
                                  ->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
                                  ->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
                                  ->get('tb_informasi')
                                  ->result();
        }
        $this->response(
            array(
            'status' => 200,
            'result' => $informasi
            ));
    }

    //push notif
    function push_notif($token, $title, $body, $data)
    {
        // API access key from Google API's Console
    define( 'API_ACCESS_KEY', 'AIzaSyA9YNqx2hWUj7DdQv-VRtvUwW_M13hQdNI' );
    
            $msg = array
           (
                'body'  => $body,
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

    //Mengirim atau menambah data kontak baru
    function index_post() {
        $parameter = $this->post('parameter');
        $method = $this->post('method');
        $value = $this->post('value');

        $this->$method($value, $parameter);
    }
}

?>		