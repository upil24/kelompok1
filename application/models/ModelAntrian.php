<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAntrian extends CI_Model
{
    public function tampil()
    {
        return $this->db->get('antrian');
    }

    public function cari()
    {
        $a = $this->input->post('tanggal');
        $this->db->select('pasien.kd_pasien,pasien.nama,antrian.kd_antrian,antrian.tanggal');
        $this->db->from('pasien');
        $this->db->like('antrian.tanggal', $a);
        $this->db->join('antrian', 'antrian.kd_pasien = pasien.kd_pasien');
        return $this->db->get();
    }

    public function get_no_antrian()
    {
        $cd = $this->db->query("SELECT MAX(RIGHT(kd_antrian,3)) AS kd_max FROM antrian WHERE DATE(tanggal)=CURDATE()");
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
        return  date('dmy')  . $kd;
    }

    public function simpanData($data = null)
    {
        $this->db->insert('antrian', $data);
    }

    public function hapusAntrian($where = null)
    {
        $this->db->delete('antrian', $where);
    }

    public function antrianWhere($where)
    {
        return $this->db->get_where('antrian', $where);
    }

    public function cetak_kunjungan()
    {

        $this->db->select('pasien.*, dokter.*, antrian.*, rekam_medis.*');
        $this->db->from('antrian');
        $this->db->join('pasien', 'antrian.kd_pasien = pasien.kd_pasien');
        $this->db->join('rekam_medis', 'rekam_medis.kd_pasien = pasien.kd_pasien');
        $this->db->join('dokter', 'dokter.kd_dokter = rekam_medis.kd_dokter');
        return $this->db->get();
    }
}
