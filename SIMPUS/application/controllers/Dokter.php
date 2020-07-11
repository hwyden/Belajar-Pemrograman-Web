<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dokter/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['judul'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dokter/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $no_hp = $this->input->post('no_hp');
            $alamat = $this->input->post('alamat');

            // cek jika ada gambar yang di upload
            $upload_image = $_FILES['foto']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jgp|png';
                $config['max_size'] = '5000';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $old_image = $data['user']['foto'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('dokter');
                }
            }


            $this->db->set('name', $name);
            $this->db->where('username', $username);
            $this->db->update('user');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Profil berhasil diubah</div>');
            redirect('dokter');
        }
    }

    public function changePassword()
    {
        $data['judul'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newPassword1', 'New Password', 'required|trim|min_length[5]|matches[newPassword2]');
        $this->form_validation->set_rules('newPassword2', 'Confirm Password', 'required|trim|min_length[5]|matches[newPassword1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dokter/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $currentPassword = $this->input->post('currentPassword');
            $newPassword = $this->input->post('newPassword1');
            if (!password_verify($currentPassword, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah!!</div>');
                redirect('dokter/changepassword');
            } else {
                if ($currentPassword == $newPassword) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password yang baru tidak boleh sama dengan password yang sekarang!</div>');
                    redirect('dokter/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($newPassword, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
