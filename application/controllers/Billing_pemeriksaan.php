<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Billing_pemeriksaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('cetak_pdf');
    }
    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['tampil'] = $this->ModelBillingPemeriksaan->tampil()->result_array();
        $data['judul'] = 'Form Billing Pemeriksaan';

        $this->form_validation->set_rules('kd_rm', 'Kode Rekam Medis', 'required', [
            'required' => 'Kode Rekam Medis belum diisi',
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('billing_pemeriksaan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data['biodata'] = $this->ModelBillingPemeriksaan->biodata()->row_array();
            $data['kd_billing_periksa'] = $this->ModelBillingPemeriksaan->get_no_billing();
            $data['hasil'] = $this->ModelBillingPemeriksaan->cari()->result_array();


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('billing_pemeriksaan/tambah', $data);
            $this->load->view('templates/footer');
        }
    }

    public function tambah()
    {

        $current_date = date("Ymd");
        $data = [
            'kd_billing_periksa' => htmlspecialchars($this->input->post('kd_billing_periksa', true)),
            'kd_pasien' => htmlspecialchars($this->input->post('kd_pasien', true)),
            'kd_rm' => htmlspecialchars($this->input->post('kd_rm', true)),
            'total' => htmlspecialchars($this->input->post('total', true)),
            'tgl_bayar' => $current_date,
            'status' => 'Selesai'
        ];


        $this->ModelBillingPemeriksaan->simpanData($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Menyimpan Data !!!</div>');
        redirect('billing_pemeriksaan/');
    }

    public function hapus()
    {
        $where = ['kd_billing_periksa' => $this->uri->segment(3)];
        $this->ModelBillingPemeriksaan->hapus($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diHapus !!!</div>');
        redirect('billing_pemeriksaan/');
    }

    public function kwitansi()
    {
        $data['hasil'] = $this->ModelBillingPemeriksaan->cari_cetak()->result_array();
        $data['biodata'] = $this->ModelBillingPemeriksaan->biodata_cetak()->row_array();
        $this->load->view('cetak/kwitansi_pemeriksaan', $data);
    }
}
