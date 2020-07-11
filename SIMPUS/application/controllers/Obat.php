<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     is_logged_in();
    // }

    public function index()
    {
        $data['judul'] = 'Kelola Data Obat';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['obat'] = $this->db->get('obat')->result_array();

        $this->form_validation->set_rules('kode_obat', 'Kode Obat', 'required');
        $this->form_validation->set_rules('kode_periksa', 'Kode Periksa', 'required');
        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
        $this->form_validation->set_rules('bentuk_obat', 'Bentuk Obat', 'required');
        $this->form_validation->set_rules('stok_obat', 'Stok Obat', 'required');
        $this->form_validation->set_rules('exp', 'Expired', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('obat/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_obat' => $this->input->post('kode_obat'),
                'kode_periksa' => $this->input->post('kode_periksa'),
                'nama_obat' => $this->input->post('nama_obat'),
                'bentuk_obat' => $this->input->post('bentuk_obat'),
                'stok_obat' => $this->input->post('stok_obat'),
                'exp' => $this->input->post('exp')
            ];
            $this->db->insert('obat', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data obat baru berhasil ditambahkan</div>');
            redirect('obat');
        }
    }

    public function hapusObat($id)
    {
        $this->load->model('Obat_model');
        $this->Obat_model->hapusObat($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Obat berhasil dihapus</div>');
        redirect('Obat');
    }


    public function edit($id)
    {
        $data['judul'] = 'Edit Data Obat';
        $this->load->model('Obat_model');
        $data['obat'] = $this->Obat_model->getObatById($id);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('id');
        $this->form_validation->set_rules('kode_obat', 'Kode Obat', 'required');
        $this->form_validation->set_rules('kode_periksa', 'Kode Periksa', 'required');
        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
        $this->form_validation->set_rules('bentuk_obat', 'Bentuk Obat', 'required');
        $this->form_validation->set_rules('stok_obat', 'Stok Obat', 'required');
        $this->form_validation->set_rules('exp', 'Expired', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('obat/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Obat_model->edit();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data obat Berhasil Di Edit</div>');
            redirect('obat');
        }
    }
}
