<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelDokter extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('dokter', $data);
    }

    public function tampilDokter()
    {
        return $this->db->get('dokter');
    }

    public function cekkode()
    {
        $query = $this->db->query("SELECT MAX(kd_dokter) as kodedokter from dokter");
        $hasil = $query->row();
        return $hasil->kodedokter;
    }

    public function hapusDokter($where = null)
    {
        $this->db->delete('dokter', $where);
    }

    public function dokterWhere($where)
    {
        return $this->db->get_where('dokter', $where);
    }

    public function updateDokter($data = null, $where = null)
    {
        $this->db->update('dokter', $data, $where);
    }

    public function jumlahDokter()
    {
        return $this->db->count_all_results('dokter');
    }
}
