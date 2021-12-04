<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekamMedis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('cetak_pdf');
    }

    public function index()
    {
        $data['judul'] = 'Form Data Kunjungan / Berobat';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['rm'] = $this->ModelRM->tampil_data()->result_array();
        $data['kd_rm'] = $this->ModelRM->get_no_rm();
        $data['dokter'] = $this->ModelDokter->tampilDokter()->result_array();

        $this->form_validation->set_rules('kd_pasien', 'Pasien', 'required|trim', [
            'required' => 'Pasien Belum Dipilih !!!'
        ]);
        $this->form_validation->set_rules('kd_dokter', 'Dokter', 'required|trim', [
            'required' => 'Dokter Belum Dipilih !!!'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('rekam_medis/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_rm' => ($this->input->post('kd_rm', true)),
                'kd_pasien' => ($this->input->post('kd_pasien', true)),
                'kd_dokter' => ($this->input->post('kd_dokter', true)),
                'status_periksa' => 'Belum Periksa'
            ];


            $this->ModelRM->simpanData($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data !!!</div>');
            redirect('rekammedis/');
        }
    }

    public function hapusKunjungan()
    {
        $where = ['kd_rm' => $this->uri->segment(3)];
        $this->ModelRM->hapusKunjungan($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Kunjungan berhasil diHapus !!!</div>');
        redirect('rekammedis');
    }

    public function editkunjungan()
    {
        $data['judul'] = 'Form Edit Data Kunjungan / Berobat';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['dokter'] = $this->ModelDokter->tampilDokter()->result_array();
        $data['kd_rm'] = $this->ModelRM->pasienWhere(['kd_rm' => $this->uri->segment(3)])->row_array();
        $data['pasien'] = $this->ModelRM->tampil_editdata()->row_array();

        $this->form_validation->set_rules('kd_pasien', 'Pasien', 'required|trim', [
            'required' => 'Pasien Belum Dipilih !!!'
        ]);
        $this->form_validation->set_rules('kd_dokter', 'Dokter', 'required|trim', [
            'required' => 'Dokter Belum Dipilih !!!'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('rekam_medis/ubah-kunjungan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_rm' => ($this->input->post('kd_rm', true)),
                'kd_pasien' => ($this->input->post('kd_pasien', true)),
                'kd_dokter' => ($this->input->post('kd_dokter', true)),
                'last_update' => time()
            ];


            $this->ModelRM->updateKunjungan($data, ['kd_rm' => $this->input->post('kd_rm')]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Mengubah Data !!!</div>');
            redirect('rekammedis/');
        }
    }

    public function rekam()
    {
        $data['judul'] = 'Form Berobat Pasien';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['biodata'] = $this->ModelRM->biodata(['kd_rm' => $this->uri->segment(3)])->row_array();

        $id =  $this->uri->segment(3);
        $q = $this->db->query("SELECT kd_pasien FROM rekam_medis WHERE kd_rm='$id'")->row_array();
        $kd_pasien = $q['kd_pasien'];
        $data['riwayat'] = $this->ModelRM->tampil_riwayat($kd_pasien)->result_array();

        $data['d'] = $this->ModelRM->tampil_rm($id)->row_array();
        $data['obat'] = $this->ModelRM->tampilObat()->result_array();
        $data['resep'] = $this->ModelRM->tampil_resep($id)->result_array();
        $data['tindakan'] = $this->ModelTindakan->tampilTindakan()->result_array();
        $data['detail_tindakan'] = $this->ModelRM->tampil_tindakan($id)->result_array();
        $data['kode_rekam'] = $this->uri->segment(3);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rekam_medis/periksa', $data);
        $this->load->view('templates/footer');
    }

    function insert_rm()
    {
        $kd_rm = $this->input->post('kd_rm');
        $keluhan = $this->input->post('keluhan');
        $diagnosa = $this->input->post('diagnosa');
        $tensi = $this->input->post('tensi');
        $alergi = $this->input->post('alergi');
        $tb_bb = $this->input->post('tb_bb');
        $last_update = time();

        $data = array(
            'keluhan' => $keluhan,
            'diagnosa' => $diagnosa,
            'tensi' => $tensi,
            'alergi' => $alergi,
            'tb_bb' => $tb_bb,
            'status_periksa' => 'Done',
            'last_update' => $last_update
        );

        $where = array('kd_rm' => $kd_rm);
        $this->ModelRM->updateKunjungan($data, $where);
        redirect('rekammedis/rekam/' . $kd_rm);
    }

    function insert_resep()
    {
        $kd_rm = $this->input->post('kd_rm');
        $kd_obat = $this->input->post('kd_obat');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'kd_rm' => $kd_rm,
            'kd_obat' => $kd_obat,
            'jumlah' => $jumlah,
            'keterangan' => $keterangan
        );

        $this->ModelRM->insert_resep($data);
        redirect('rekammedis/rekam/' . $kd_rm);
    }

    function hapus_resep($id, $kd_rm)
    {
        $where = array('kd_resep' => $id);
        $this->ModelRM->hapus_resep($where);
        redirect('rekammedis/rekam/' . $kd_rm);
    }

    function insert_tindakan()
    {
        $kd_rm = $this->input->post('kd_rm');
        $kd_tindakan = $this->input->post('kd_tindakan');

        $data = array(
            'kd_rm' => $kd_rm,
            'kd_tindakan' => $kd_tindakan
        );
        $this->ModelRM->insert_tindakan($data);

        redirect('rekammedis/rekam/' . $kd_rm);
    }

    function hapus_tindakan($id, $kd_rm)
    {
        $where = array('kd_detail' => $id);
        $this->ModelRM->hapus_tindakan($where);
        redirect('rekammedis/rekam/' . $kd_rm);
    }

    public function cetak_hasil()
    {
        $data['pasien'] = $this->ModelRM->cetak_hasil()->row_array();

        $this->load->view('cetak/hasil_pasien', $data);
    }

    public function cetak_resep()
    {
        $data['pasien'] = $this->ModelRM->cetak_resep()->result_array();

        $this->load->view('cetak/cetak_resep', $data);
    }

    public function cetak_riwayat()
    {
        $data['pasien'] = $this->ModelPasien->pasienWhere(['kd_pasien' => $this->uri->segment(3)])->row_array();
        $data['riwayat'] = $this->ModelRM->cetak_riwayat()->result_array();

        $this->load->view('cetak/cetak_riwayat', $data);
    }
}
