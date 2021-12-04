<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBillingPemeriksaan extends CI_Model
{
    public function tampil()
    {
        return $this->db->get('billing_pemeriksaan');
    }

    public function cari()
    {
        $a = $this->input->post('kd_rm');
        $this->db->select('pasien.kd_pasien,pasien.nama,rekam_medis.kd_rm,detail_tindakan.*,tindakan.*');
        $this->db->from('pasien');
        $this->db->join('rekam_medis', 'rekam_medis.kd_pasien = pasien.kd_pasien');
        $this->db->join('detail_tindakan', 'detail_tindakan.kd_rm = rekam_medis.kd_rm');
        $this->db->join('tindakan', 'tindakan.kd_tindakan = detail_tindakan.kd_tindakan');
        $this->db->where('detail_tindakan.kd_rm', $a);
        return $this->db->get();
    }

    public function get_no_billing()
    {
        $cd = $this->db->query("SELECT MAX(RIGHT(kd_billing_periksa,3)) AS kd_max FROM billing_pemeriksaan WHERE DATE(date_created)=CURDATE()");
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

    function biodata()
    {
        $a = $this->input->post('kd_rm');
        $this->db->select('rekam_medis.*,pasien.*');
        $this->db->from('rekam_medis');
        $this->db->join('pasien', 'rekam_medis.kd_pasien = pasien.kd_pasien');
        $this->db->where('kd_rm', $a);
        return $this->db->get();
    }

    public function simpanData($data = null)
    {
        $this->db->insert('billing_pemeriksaan', $data);
    }

    public function hapus($where = null)
    {
        $this->db->delete('billing_pemeriksaan', $where);
    }

    function biodata_cetak()
    {
        $a = $this->uri->segment(3);
        $this->db->select('pasien.*,billing_pemeriksaan.*');
        $this->db->from('pasien');
        $this->db->join('billing_pemeriksaan', 'billing_pemeriksaan.kd_pasien = pasien.kd_pasien');
        $this->db->where('billing_pemeriksaan.kd_rm', $a);
        return $this->db->get();
    }

    public function cari_cetak()
    {
        $a = $this->uri->segment(3);
        $this->db->select('pasien.kd_pasien,pasien.nama,rekam_medis.kd_rm,detail_tindakan.*,tindakan.*');
        $this->db->from('pasien');
        $this->db->join('rekam_medis', 'rekam_medis.kd_pasien = pasien.kd_pasien');
        $this->db->join('detail_tindakan', 'detail_tindakan.kd_rm = rekam_medis.kd_rm');
        $this->db->join('tindakan', 'tindakan.kd_tindakan = detail_tindakan.kd_tindakan');
        $this->db->where('detail_tindakan.kd_rm', $a);
        return $this->db->get();
    }
}
