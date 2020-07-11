<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat_model extends CI_Model
{

    public function hapusObat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('obat');
    }

    public function getObatById($id)
    {
        return $this->db->get_where('obat', ['id' => $id])->row_array();
    }

    public function edit()
    {

        $data = [
            'id' => $this->input->post('id', true),
            'kode_obat' => $this->input->post('kode_obat', true),
            'kode_periksa' => $this->input->post('kode_periksa', true),
            'nama_obat' => $this->input->post('nama_obat', true),
            'bentuk_obat' => $this->input->post('bentuk_obat', true),
            'stok_obat' => $this->input->post('stok_obat', true),
            'exp' => $this->input->post('exp', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('obat', $data);
    }
}
