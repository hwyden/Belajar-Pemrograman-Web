<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien_model extends CI_Model
{

    public function hapusPasien($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pasien');
    }

    public function getPasienById($id)
    {
        return $this->db->get_where('pasien', ['id' => $id])->row_array();
    }

    public function edit()
    {

        $data = [
            'id' => $this->input->post('id', true),
            'kode_psn' => $this->input->post('kode_psn', true),
            'nama_psn' => $this->input->post('nama_psn', true),
            'alamat' => $this->input->post('alamat', true),
            'no_hp' => $this->input->post('no_hp', true),
            'jenis_klm' => $this->input->post('jenis_klm', true),
            'tgl_daftar' => $this->input->post('tgl_daftar', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('pasien', $data);
    }
}
