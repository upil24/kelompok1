<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('cetak_pdf');
    }

    public function index()
    {
        $data['judul'] = 'Form Master Laporan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('cetak/index', $data);
        $this->load->view('templates/footer');
    }

    public function laporan_pasien()
    {
        $data['pasien'] = $this->ModelPasien->tampilPasien()->result_array();
        $this->load->view('cetak/c_lap_pasien', $data);
    }

    public function laporan_kunjungan()
    {
        $data['data'] = $this->ModelAntrian->cetak_kunjungan()->result_array();
        $this->load->view('cetak/c_lap_antrian', $data);
    }

    public function laporan_dokter()
    {
        $data['data'] = $this->ModelDokter->tampilDokter()->result_array();
        $this->load->view('cetak/c_lap_dokter', $data);
    }

    public function laporan_user()
    {
        $data['data'] = $this->ModelUser->joinUser_Userrole()->result_array();
        $this->load->view('cetak/c_lap_user', $data);
    }
}
