<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{


    public function index()
    {
        $data['judul'] = 'Kelola Data Pasien';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['pasien'] = $this->db->get('pasien')->result_array();

        $this->form_validation->set_rules('kode_psn', 'Kode Pasien', 'required');
        $this->form_validation->set_rules('nama_psn', 'Nama Pasien', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
        $this->form_validation->set_rules('jenis_klm', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tgl_daftar', 'Tanggal Daftar', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pasien/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_psn' => $this->input->post('kode_psn'),
                'nama_psn' => $this->input->post('nama_psn'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'jenis_klm' => $this->input->post('jenis_klm'),
                'tgl_daftar' => $this->input->post('tgl_daftar')
            ];
            $this->db->insert('pasien', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data pasien baru berhasil ditambahkan</div>');
            redirect('pasien');
        }
    }

    public function hapusPasien($id)
    {
        $this->load->model('Pasien_model');
        $this->Pasien_model->hapusPasien($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Pasien berhasil dihapus</div>');
        redirect('Pasien');
    }


    public function edit($id)
    {
        $data['judul'] = 'Edit Data Pasien';

        $this->load->model('Pasien_model');
        $data['pasien'] = $this->Pasien_model->getPasienById($id);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('id');
        $this->form_validation->set_rules('kode_psn', 'Kode Pasien', 'required');
        $this->form_validation->set_rules('nama_psn', 'Nama Pasien', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
        $this->form_validation->set_rules('jenis_klm', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tgl_daftar', 'Tanggal Daftar', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pasien/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pasien_model->edit();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data pasien Berhasil Di Edit</div>');
            redirect('pasien');
        }
    }
}
