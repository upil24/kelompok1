<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPasien extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('pasien', $data);
    }


    public function get_no_pasien()
    {
        $cd = $this->db->query("SELECT MAX(RIGHT(kd_pasien,3)) AS kd_max FROM pasien WHERE DATE(date_created)=CURDATE()");
        $kd = "";
        if ($cd->num_rows() > 0) {
            foreach ($cd->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'PSN' . date('dmy')  . $kd;
    }

    public function tampilPasien()
    {
        return $this->db->get('pasien');
    }

    public function hapusPasien($where = null)
    {
        $this->db->delete('pasien', $where);
    }


    public function pasienWhere($where)
    {
        return $this->db->get_where('pasien', $where);
    }

    public function updatePasien($data = null, $where = null)
    {
        $this->db->update('pasien', $data, $where);
    }

    public function jumlahpasien()
    {
        return $this->db->count_all_results('pasien');
    }
}
