<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelObat extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('obat', $data);
    }

    public function tampilObat()
    {
        return $this->db->get('obat');
    }

    public function cekkode()
    {
        $query = $this->db->query("SELECT MAX(kd_obat) as kodeobat from obat");
        $hasil = $query->row();
        return $hasil->kodeobat;
    }

    public function hapusObat($where = null)
    {
        $this->db->delete('obat', $where);
    }

    public function obatWhere($where)
    {
        return $this->db->get_where('obat', $where);
    }

    public function updateObat($data = null, $where = null)
    {
        $this->db->update('obat', $data, $where);
    }
}
