<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Billing_obat extends CI_Controller
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
        $data['tampil'] = $this->ModelBillingObat->tampil()->result_array();
        $data['judul'] = 'Form Billing Obat';

        $this->form_validation->set_rules('kd_rm', 'Kode Rekam Medis', 'required', [
            'required' => 'Kode Rekam Medis belum diisi',
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('billing_obat/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data['biodata'] = $this->ModelBillingObat->biodata()->row_array();
            $data['kd_billing_obat'] = $this->ModelBillingObat->get_no_billing();
            $data['hasil'] = $this->ModelBillingObat->cari()->result_array();


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('billing_obat/tambah', $data);
            $this->load->view('templates/footer');
        }
    }

    public function tambah()
    {

        $current_date = date("Ymd");
        $data = [
            'kd_billing_obat' => htmlspecialchars($this->input->post('kd_billing_obat', true)),
            'kd_pasien' => htmlspecialchars($this->input->post('kd_pasien', true)),
            'kd_rm' => htmlspecialchars($this->input->post('kd_rm', true)),
            'total' => htmlspecialchars($this->input->post('total', true)),
            'tgl_bayar' => $current_date,
            'status' => 'Selesai'
        ];


        $this->ModelBillingObat->simpanData($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Menyimpan Data !!!</div>');
        redirect('billing_obat/');
    }

    public function hapus()
    {
        $where = ['kd_billing_obat' => $this->uri->segment(3)];
        $this->ModelBillingObat->hapus($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diHapus !!!</div>');
        redirect('billing_obat/');
    }

    public function kwitansi()
    {
        $data['hasil'] = $this->ModelBillingObat->cari_cetak()->result_array();
        $data['biodata'] = $this->ModelBillingObat->biodata_cetak()->row_array();
        $this->load->view('cetak/kwitansi_obat', $data);
    }
}
