<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function index()
    {
        $data['judul'] = 'Menu Manajemen';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Menu baru berhasil ditambahkan</div>');
            redirect('menu');
        }
    }

    public function hapus($id)
    {
        $this->load->model('Menu_model');
        $this->Menu_model->hapusMenu($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Menu berhasil dihapus</div>');
        redirect('menu');
    }

    public function editMenu($id)
    {
        $data['judul'] = 'Edit Menu';

        $this->load->model('Menu_model');
        $data['menu'] = $this->Menu_model->getMenuById($id);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('id');
        $this->form_validation->set_rules('menu', 'Menu', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/editmenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->edit();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Menu Berhasil Di Edit</div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['judul'] = 'Sub Menu';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'judul' => $this->input->post('judul'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">New Sub menu added</div>');
            redirect('menu/submenu');
        }
    }

    public function hapusSubMenu($id)
    {
        $this->load->model('Menu_model');
        $this->Menu_model->hapusSubMenu($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Sub Menu Management berhasil dihapus</div>');
        redirect('menu/submenu');
    }

    public function editSubMenu($id)
    {
        $data['judul'] = 'Edit Sub Menu';

        $this->load->model('Menu_model');
        $data['submenu'] = $this->Menu_model->getSubMenuById($id);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('id');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/editsubmenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->edit();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data SubMenu Berhasil Di Edit</div>');
            redirect('menu/submenu');
        }
    }
}
