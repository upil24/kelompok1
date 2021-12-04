<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrian extends CI_Controller
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
        $data['judul'] = 'Form Antrian';

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', [
            'required' => 'Tanggal belum diisi',
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('antrian/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data['kd_antrian'] = $this->ModelAntrian->get_no_antrian();
            $data['hasil'] = $this->ModelAntrian->cari()->result_array();


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('antrian/tambah', $data);
            $this->load->view('templates/footer');
        }
    }

    public function tambah()
    {

        $data = [
            'kd_antrian' => htmlspecialchars($this->input->post('kd_antrian', true)),
            'kd_pasien' => htmlspecialchars($this->input->post('kd_pasien', true))
        ];

        $this->ModelAntrian->simpanData($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pasien berhasil diantrikan !!!</div>');
        redirect('antrian/');
    }

    public function hapusAntrian()
    {
        $where = ['kd_antrian' => $this->uri->segment(3)];
        $this->ModelAntrian->hapusAntrian($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Antrian berhasil diHapus !!!</div>');
        redirect('antrian/');
    }

    public function kartu_antri()
    {
        $data['pasien'] = $this->ModelAntrian->antrianWhere(['kd_antrian' => $this->uri->segment(3)])->row_array();

        $this->load->view('cetak/kartu_antri', $data);
    }
}
