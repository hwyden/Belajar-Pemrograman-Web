<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     is_logged_in();
    // }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login - SIMPUS';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // validation success
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        // usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else if ($user['role_id'] == 2) {
                        redirect('dokter');
                    } else if ($user['role_id'] == 3) {
                        redirect('farmasi');
                    } else {
                        redirect('pendaftaran');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username belom terdaftar</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">username is not registered!!</div>');
            redirect('auth');
        }
    }

    public function Registrasi()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username telah terdaftar'
        ]);
        $this->form_validation->set_rules('no_hp', 'Phone', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password tidak cocok!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Registrasi - SIMPUS';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'foto' => 'default.jpg',
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat! Akun Anda berhasil didaftarkan</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda telah berhasil keluar!</div>');
        redirect('auth');
    }

    // public function blocked()
    // {
    //     echo 'akses blocked';
    // }
}
