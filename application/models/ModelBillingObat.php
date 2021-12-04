<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBillingObat extends CI_Model
{
    public function tampil()
    {
        return $this->db->get('billing_obat');
    }

    public function cari()
    {
        $a = $this->input->post('kd_rm');
        $this->db->select('pasien.kd_pasien,pasien.nama,rekam_medis.kd_rm,resep_obat.*,obat.*');
        $this->db->from('pasien');
        $this->db->join('rekam_medis', 'rekam_medis.kd_pasien = pasien.kd_pasien');
        $this->db->join('resep_obat', 'resep_obat.kd_rm = rekam_medis.kd_rm');
        $this->db->join('obat', 'obat.kd_obat = resep_obat.kd_obat');
        $this->db->where('resep_obat.kd_rm', $a);
        return $this->db->get();
    }

    public function get_no_billing()
    {
        $cd = $this->db->query("SELECT MAX(RIGHT(kd_billing_obat,3)) AS kd_max FROM billing_obat WHERE DATE(date_created)=CURDATE()");
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
        $this->db->insert('billing_obat', $data);
    }

    public function hapus($where = null)
    {
        $this->db->delete('billing_obat', $where);
    }

    function biodata_cetak()
    {
        $a = $this->uri->segment(3);
        $this->db->select('pasien.*,billing_obat.*');
        $this->db->from('pasien');
        $this->db->join('billing_obat', 'billing_obat.kd_pasien = pasien.kd_pasien');
        $this->db->where('billing_obat.kd_rm', $a);
        return $this->db->get();
    }

    public function cari_cetak()
    {
        $a = $this->uri->segment(3);
        $this->db->select('pasien.kd_pasien,pasien.nama,rekam_medis.kd_rm,resep_obat.*,obat.*');
        $this->db->from('pasien');
        $this->db->join('rekam_medis', 'rekam_medis.kd_pasien = pasien.kd_pasien');
        $this->db->join('resep_obat', 'resep_obat.kd_rm = rekam_medis.kd_rm');
        $this->db->join('obat', 'obat.kd_obat = resep_obat.kd_obat');
        $this->db->where('resep_obat.kd_rm', $a);
        return $this->db->get();
    }
}
