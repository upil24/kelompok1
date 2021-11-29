<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelRM extends CI_Model
{
    function tampil_data()
    {
        $this->db->select('rekam_medis.*,pasien.*,dokter.*');
        $this->db->from('rekam_medis');
        $this->db->join('pasien', 'rekam_medis.kd_pasien = pasien.kd_pasien');
        $this->db->join('dokter', 'dokter.kd_dokter = rekam_medis.kd_dokter');
        return $this->db->get();
    }

    public function get_no_rm()
    {
        $cd = $this->db->query("SELECT MAX(RIGHT(kd_rm,3)) AS kd_max FROM rekam_medis WHERE DATE(date_created)=CURDATE()");
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
        return 'RM' . date('dmy')  . $kd;
    }

    public function simpanData($data = null)
    {
        $this->db->insert('rekam_medis', $data);
    }

    public function hapusKunjungan($where = null)
    {
        $this->db->delete('rekam_medis', $where);
    }

    public function updateKunjungan($data = null, $where = null)
    {
        $this->db->update('rekam_medis', $data, $where);
    }

    public function pasienWhere($where)
    {
        return $this->db->get_where('rekam_medis', $where);
    }

    function tampil_editdata()
    {
        $this->db->select('rekam_medis.*,pasien.*,dokter.*');
        $this->db->from('rekam_medis');
        $this->db->join('pasien', 'rekam_medis.kd_pasien = pasien.kd_pasien');
        $this->db->join('dokter', 'dokter.kd_dokter = rekam_medis.kd_dokter');
        $this->db->where(['kd_rm' => $this->uri->segment(3)]);
        return $this->db->get();
    }

    function biodata()
    {
        $this->db->select('rekam_medis.*,pasien.*');
        $this->db->from('rekam_medis');
        $this->db->join('pasien', 'rekam_medis.kd_pasien = pasien.kd_pasien');
        $this->db->where(['kd_rm' => $this->uri->segment(3)]);
        return $this->db->get();
    }

    function tampil_riwayat($pasien)
    {

        $query = $this->db->query("SELECT rekam_medis.*, 
                            pasien.nama, 
                            pasien.umur, 
                            pasien.jen_kel,
                            dokter.nama_dokter
                        FROM rekam_medis
                        INNER JOIN pasien ON rekam_medis.kd_pasien=pasien.kd_pasien
                        INNER JOIN dokter ON rekam_medis.kd_dokter=dokter.kd_dokter
                        WHERE rekam_medis.kd_pasien='$pasien'");

        return $query;
    }

    function tampil_rm($id)
    {
        $query = $this->db->query("SELECT rekam_medis.*, 
                            pasien.nama, 
                            pasien.umur, 
                            pasien.jen_kel,
                            dokter.nama_dokter
                        FROM rekam_medis
                        INNER JOIN pasien ON rekam_medis.kd_pasien=pasien.kd_pasien
                        INNER JOIN dokter ON rekam_medis.kd_dokter=dokter.kd_dokter
                        WHERE rekam_medis.kd_rm='$id'");

        return $query;
    }

    function insert_resep($data)
    {

        return $this->db->insert('resep_obat', $data);
    }


    function tampil_resep($id)
    {

        $query = $this->db->query("SELECT resep_obat.*,
                                obat.nama_obat
                            FROM resep_obat
                            INNER JOIN obat ON resep_obat.kd_obat=obat.kd_obat
                            WHERE resep_obat.kd_rm='$id'");

        return $query;
    }

    function hapus_resep($where)
    {
        $this->db->where($where);
        $this->db->delete('resep_obat');
    }

    function insert_tindakan($data)
    {
        return $this->db->insert('detail_tindakan', $data);
    }

    function tampil_tindakan($id)
    {

        $query = $this->db->query("SELECT detail_tindakan.*,
                                tindakan.nama
                            FROM detail_tindakan
                            INNER JOIN tindakan ON tindakan.kd_tindakan=detail_tindakan.kd_tindakan
                            WHERE detail_tindakan.kd_rm='$id'");

        return $query;
    }

    function hapus_tindakan($where)
    {
        $this->db->where($where);
        $this->db->delete('detail_tindakan');
    }

    public function tampilObat()
    {
        $this->db->select('*');
        $this->db->from('obat');
        return $this->db->get();
    }

    function cetak_hasil()
    {
        $id = $this->uri->segment(3);
        $query = $this->db->query("SELECT pasien.*,
                                rekam_medis.*,
                                dokter.nama_dokter
                            FROM pasien
                            INNER JOIN rekam_medis ON rekam_medis.kd_pasien=pasien.kd_pasien
                            INNER JOIN dokter ON rekam_medis.kd_dokter=dokter.kd_dokter
                            WHERE rekam_medis.kd_rm='$id'");

        return $query;
    }

    function cetak_resep()
    {
        $id = $this->uri->segment(3);
        $query = $this->db->query("SELECT pasien.*,
                                rekam_medis.*,
                                obat.*,
                                dokter.*,
                                resep_obat.*
                            FROM pasien
                            INNER JOIN rekam_medis ON rekam_medis.kd_pasien=pasien.kd_pasien
                            INNER JOIN dokter ON rekam_medis.kd_dokter=dokter.kd_dokter
                            INNER JOIN resep_obat ON resep_obat.kd_rm = rekam_medis.kd_rm
                            INNER JOIN obat ON obat.kd_obat = resep_obat.kd_obat
                            WHERE rekam_medis.kd_rm='$id'");

        return $query;
    }
}
