<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class sekolah extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data sekolah
    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $crud_pdo = $this->db->get('sekolah')->result();
        } else {
            $this->db->where('id', $id);
            $crud_pdo = $this->db->get('sekolah')->result();
        }
        $this->response($crud_pdo, 200);
    }

    //Mengirim atau menambah data sekolah baru
    function index_post() {
        $data = array(
                    'id'        => $this->post('id'),
                    'nama'      => $this->post('nama'),
                    'alamat'    => $this->post('alamat'),
					'logo'    	=> $this->post('logo'));
        $insert = $this->db->insert('sekolah', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	
	//Memperbarui data sekolah yang telah ada
    function index_put() {
        $id = $this->put('id');
        $data = array(
                    'id'       => $this->put('id'),
                    'nama'     => $this->put('nama'),
                    'alamat'   => $this->put('alamat'),
					'logo'     => $this->put('logo'));
        $this->db->where('id', $id);
        $update = $this->db->update('sekolah', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	
	//Menghapus salah satu data sekolah
    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('sekolah');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>