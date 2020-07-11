<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksaan_model extends CI_Model
{

    public function hapusPemeriksaan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pemeriksaan');
    }

    public function getPemeriksaanById($id)
    {
        return $this->db->get_where('pemeriksaan', ['id' => $id])->row_array();
    }

    public function edit()
    {

        $data = [
            'id' => $this->input->post('id', true),
            'kode_periksa' => $this->input->post('kode_periksa', true),
            'kode_psn' => $this->input->post('kode_psn', true),
            'nama_psn' => $this->input->post('nama_psn', true),
            'tgl_periksa' => $this->input->post('tgl_periksa', true),
            'keluhan' => $this->input->post('keluhan', true),
            'diagnosa' => $this->input->post('diagnosa', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('pemeriksaan', $data);
    }
}
