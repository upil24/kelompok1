<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        $this->load->library('cetak_pdf');
    }

    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pasien'] = $this->ModelPasien->tampilPasien()->result_array();
        $data['judul'] = 'Form Master Pasien';
        $data['kd_pasien'] = $this->ModelPasien->get_no_pasien();


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required|trim', [
            'required' => 'Tanggal Lahir harus diisi'
        ]);
        $this->form_validation->set_rules('kontak', 'No Telpon/HP', 'required|trim|numeric', [
            'required' => 'Nomor Telp harus diisi',
            'numeric' => 'Nomor Telpon Harus Angka'
        ]);
        $this->form_validation->set_rules('jen_kel', 'jen_kel', 'required|trim', [
            'required' => 'jenis Kelamin harus diisi'
        ]);
        $this->form_validation->set_rules('no_ktp', 'NO_KTP', 'required|trim|numeric', [
            'required' => 'Nomor KTP harus diisi',
            'numeric' => 'Nomor KTP harus Angka'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Alamat harus diisi'
        ]);
        $this->form_validation->set_rules('umur', 'Umur', 'required|trim', [
            'required' => 'Umur harus diisi'
        ]);
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim', [
            'required' => 'Pekerjaan harus diisi'
        ]);
        $this->form_validation->set_rules('pelayanan', 'Pelayanan', 'required|trim', [
            'required' => 'Jenis Pelayanan harus diisi'
        ]);



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pendaftaran/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_pasien' => htmlspecialchars($this->input->post('kd_pasien', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'jen_kel' => htmlspecialchars($this->input->post('jen_kel', true)),
                'kontak' => htmlspecialchars($this->input->post('kontak', true)),
                'umur' => htmlspecialchars($this->input->post('umur', true)),
                'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_ktp' => htmlspecialchars($this->input->post('no_ktp', true)),
                'pelayanan' => htmlspecialchars($this->input->post('pelayanan', true)),
                'no_bpjs' => htmlspecialchars($this->input->post('no_bpjs', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'gol_darah' => htmlspecialchars($this->input->post('gol_darah', true))
            ];

            $this->ModelPasien->simpanData($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pasien berhasil ditambahkan !!!</div>');
            redirect('pasien');
        }
    }



    public function hapusPasien()
    {
        $where = ['kd_pasien' => $this->uri->segment(3)];
        $this->ModelPasien->hapusPasien($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pasien berhasil diHapus !!!</div>');
        redirect('pasien');
    }



    public function ubahPasien()
    {
        $data['judul'] = 'Ubah Data Pasien';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pasien'] = $this->ModelPasien->pasienWhere(['kd_pasien' => $this->uri->segment(3)])->row_array();


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required|trim', [
            'required' => 'Tanggal Lahir harus diisi'
        ]);
        $this->form_validation->set_rules('kontak', 'No Telpon/HP', 'required|trim|numeric', [
            'required' => 'Nomor Telp harus diisi',
            'numeric' => 'Nomor Telpon Harus Angka'
        ]);
        $this->form_validation->set_rules('jen_kel', 'jen_kel', 'required|trim', [
            'required' => 'jenis Kelamin harus diisi'
        ]);
        $this->form_validation->set_rules('no_ktp', 'NO_KTP', 'required|trim|numeric', [
            'required' => 'Nomor KTP harus diisi',
            'numeric' => 'Nomor KTP harus Angka'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Alamat harus diisi'
        ]);
        $this->form_validation->set_rules('umur', 'Umur', 'required|trim', [
            'required' => 'Umur harus diisi'
        ]);
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim', [
            'required' => 'Pekerjaan harus diisi'
        ]);
        $this->form_validation->set_rules('pelayanan', 'Pelayanan', 'required|trim', [
            'required' => 'Jenis Pelayanan harus diisi'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pendaftaran/ubah-pasien', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_pasien' => htmlspecialchars($this->input->post('kd_pasien', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'jen_kel' => htmlspecialchars($this->input->post('jen_kel', true)),
                'kontak' => htmlspecialchars($this->input->post('kontak', true)),
                'umur' => htmlspecialchars($this->input->post('umur', true)),
                'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_ktp' => htmlspecialchars($this->input->post('no_ktp', true)),
                'pelayanan' => htmlspecialchars($this->input->post('pelayanan', true)),
                'no_bpjs' => htmlspecialchars($this->input->post('no_bpjs', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'gol_darah' => htmlspecialchars($this->input->post('gol_darah', true)),
                'last_update' => time()
            ];

            $this->ModelPasien->updatePasien($data, ['kd_pasien' => $this->input->post('kd_pasien')]);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Berhasil diubah </div>');
            redirect('pasien');
        }
    }

    public function cetak_kartu()
    {
        $data['pasien'] = $this->ModelPasien->pasienWhere(['kd_pasien' => $this->uri->segment(3)])->row_array();

        $this->load->view('cetak/kartu_pasien', $data);
    }
}
