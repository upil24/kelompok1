<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['dokter'] = $this->ModelDokter->tampilDokter()->result_array();
        $data['judul'] = 'Form Master Dokter';
        $dariDB = $this->ModelDokter->cekkode();
        // contoh DKT0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($dariDB, 3, 4);
        $kodeDokterSekarang = $nourut + 1;
        $data['kd_dokter'] =  $kodeDokterSekarang;


        $this->form_validation->set_rules('nama_dokter', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('no_sip', 'No SIP', 'required|trim', [
            'required' => 'No SIP harus diisi'
        ]);
        $this->form_validation->set_rules('kontak', 'No Telpon/HP', 'required|trim|numeric', [
            'required' => 'Nomor Telp harus diisi',
            'numeric' => 'Nomor Telpon Harus Angka'
        ]);
        $this->form_validation->set_rules('jen_kel', 'jen_kel', 'required|trim', [
            'required' => 'jenis Kelamin harus diisi'
        ]);
        $this->form_validation->set_rules('spesialis', 'Spesialis', 'required|trim', [
            'required' => 'Spesialis harus diisi'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Alamat harus diisi'
        ]);
        $this->form_validation->set_rules('jam_praktek', 'Jam Praktek', 'required|trim', [
            'required' => 'Jam Praktek harus diisi'
        ]);
        $this->form_validation->set_rules('hari_praktek', 'Hari Praktek', 'required|trim', [
            'required' => 'Hari Praktek harus diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[dokter.email]', [
            'required' => 'Email harus diisi',
            'is_unique' => 'Email sudah pernah mendaftar'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required|trim', [
            'required' => 'Status harus diisi'
        ]);



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dokter/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_dokter' => htmlspecialchars($this->input->post('kd_dokter', true)),
                'nama_dokter' => htmlspecialchars($this->input->post('nama_dokter', true)),
                'no_sip' => htmlspecialchars($this->input->post('no_sip', true)),
                'jen_kel' => htmlspecialchars($this->input->post('jen_kel', true)),
                'spesialis' => htmlspecialchars($this->input->post('spesialis', true)),
                'jam_praktek' => htmlspecialchars($this->input->post('jam_praktek', true)),
                'hari_praktek' => htmlspecialchars($this->input->post('hari_praktek', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'kontak' => htmlspecialchars($this->input->post('kontak', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'status' => htmlspecialchars($this->input->post('status', true)),
                'date_created' => time()
            ];

            $this->ModelDokter->simpanData($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Dokter berhasil ditambahkan !!!</div>');
            redirect('dokter');
        }
    }

    public function hapusDokter()
    {
        $where = ['kd_dokter' => $this->uri->segment(3)];
        $this->ModelDokter->hapusDokter($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Dokter berhasil diHapus !!!</div>');
        redirect('dokter');
    }

    public function ubahDokter()
    {
        $data['judul'] = 'Ubah Data Dokter';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['dokter'] = $this->ModelDokter->dokterWhere(['kd_dokter' => $this->uri->segment(3)])->row_array();


        $this->form_validation->set_rules('nama_dokter', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('no_sip', 'No SIP', 'required|trim', [
            'required' => 'No SIP harus diisi'
        ]);
        $this->form_validation->set_rules('kontak', 'No Telpon/HP', 'required|trim|numeric', [
            'required' => 'Nomor Telp harus diisi',
            'numeric' => 'Nomor Telpon Harus Angka'
        ]);
        $this->form_validation->set_rules('jen_kel', 'jen_kel', 'required|trim', [
            'required' => 'jenis Kelamin harus diisi'
        ]);
        $this->form_validation->set_rules('spesialis', 'Spesialis', 'required|trim', [
            'required' => 'Spesialis harus diisi'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Alamat harus diisi'
        ]);
        $this->form_validation->set_rules('jam_praktek', 'Jam Praktek', 'required|trim', [
            'required' => 'Jam Praktek harus diisi'
        ]);
        $this->form_validation->set_rules('hari_praktek', 'Hari Praktek', 'required|trim', [
            'required' => 'Hari Praktek harus diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email harus diisi'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required|trim', [
            'required' => 'Status harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dokter/dokter-ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_dokter' => htmlspecialchars($this->input->post('kd_dokter', true)),
                'nama_dokter' => htmlspecialchars($this->input->post('nama_dokter', true)),
                'no_sip' => htmlspecialchars($this->input->post('no_sip', true)),
                'jen_kel' => htmlspecialchars($this->input->post('jen_kel', true)),
                'spesialis' => htmlspecialchars($this->input->post('spesialis', true)),
                'jam_praktek' => htmlspecialchars($this->input->post('jam_praktek', true)),
                'hari_praktek' => htmlspecialchars($this->input->post('hari_praktek', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'kontak' => htmlspecialchars($this->input->post('kontak', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'status' => htmlspecialchars($this->input->post('status', true)),
                'last_update' => time()
            ];

            $this->ModelDokter->updateDokter($data, ['kd_dokter' => $this->input->post('kd_dokter')]);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Berhasil diubah </div>');
            redirect('dokter');
        }
    }
}
