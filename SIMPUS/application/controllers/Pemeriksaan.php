<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksaan extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     is_logged_in();
    // }

    public function index()
    {
        $data['judul'] = 'Kelola Data Pemeriksaan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['pemeriksaan'] = $this->db->get('pemeriksaan')->result_array();

        $this->form_validation->set_rules('kode_periksa', 'Kode Periksa', 'required');
        $this->form_validation->set_rules('kode_psn', 'Kode Pasien', 'required');
        $this->form_validation->set_rules('nama_psn', 'Nama Pasien', 'required');
        $this->form_validation->set_rules('tgl_periksa', 'Tanggal Pemeriksaan', 'required');
        $this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
        $this->form_validation->set_rules('diagnosa', 'Diagnosa', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pemeriksaan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_periksa' => $this->input->post('kode_periksa'),
                'kode_psn' => $this->input->post('kode_psn'),
                'nama_psn' => $this->input->post('nama_psn'),
                'tgl_periksa' => $this->input->post('tgl_periksa'),
                'keluhan' => $this->input->post('keluhan'),
                'diagnosa' => $this->input->post('diagnosa')
            ];
            $this->db->insert('pemeriksaan', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Pemeriksaan baru berhasil ditambahkan</div>');
            redirect('pemeriksaan');
        }
    }

    public function hapusPemeriksaan($id)
    {
        $this->load->model('Pemeriksaan_model');
        $this->Pemeriksaan_model->hapusPemeriksaan($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Pemeriksaan berhasil dihapus</div>');
        redirect('pemeriksaan');
    }


    public function edit($id)
    {
        $data['judul'] = 'Edit Data Pemeriksaan';
        $this->load->model('Pemeriksaan_model');
        $data['pemeriksaan'] = $this->Pemeriksaan_model->getPemeriksaanById($id);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('id');
        $this->form_validation->set_rules('kode_periksa', 'Kode Periksa', 'required');
        $this->form_validation->set_rules('kode_psn', 'Kode Pasien', 'required');
        $this->form_validation->set_rules('nama_psn', 'Nama Pasien', 'required');
        $this->form_validation->set_rules('tgl_periksa', 'Tanggal Periksa', 'required');
        $this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
        $this->form_validation->set_rules('diagnosa', 'Diagnosa', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pemeriksaan/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Pemeriksaan_model->edit();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Pemeriksaan Berhasil Di Edit</div>');
            redirect('pemeriksaan');
        }
    }
}
