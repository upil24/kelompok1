<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelTindakan extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('tindakan', $data);
    }

    public function tampilTindakan()
    {
        return $this->db->get('tindakan');
    }

    public function cekkode()
    {
        $query = $this->db->query("SELECT MAX(kd_tindakan) as kodetindakan from tindakan");
        $hasil = $query->row();
        return $hasil->kodetindakan;
    }

    public function hapusTindakan($where = null)
    {
        $this->db->delete('tindakan', $where);
    }

    public function tindakanWhere($where)
    {
        return $this->db->get_where('tindakan', $where);
    }

    public function updateTindakan($data = null, $where = null)
    {
        $this->db->update('tindakan', $data, $where);
    }
}
