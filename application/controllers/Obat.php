<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['obat'] = $this->ModelObat->tampilObat()->result_array();
        $data['judul'] = 'Form Master Obat';
        $dariDB = $this->ModelObat->cekkode();
        // contoh DKT0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($dariDB, 3, 4);
        $kodeObatSekarang = $nourut + 1;
        $data['kd_obat'] =  $kodeObatSekarang;


        $this->form_validation->set_rules('nama_obat', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim', [
            'required' => 'Satuan harus diisi'
        ]);
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|trim|numeric', [
            'required' => 'Harga Beli harus diisi',
            'numeric' => 'Harga Beli Harus Angka'
        ]);
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|trim|numeric', [
            'required' => 'Harga Jual harus diisi',
            'numeric' => 'Harga Jual Harus Angka'
        ]);



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('obat/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_obat' => htmlspecialchars($this->input->post('kd_obat', true)),
                'nama_obat' => htmlspecialchars($this->input->post('nama_obat', true)),
                'satuan' => htmlspecialchars($this->input->post('satuan', true)),
                'harga_beli' => htmlspecialchars($this->input->post('harga_beli', true)),
                'harga_jual' => htmlspecialchars($this->input->post('harga_jual', true)),
                'date_created' => time()
            ];

            $this->ModelObat->simpanData($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Obat berhasil ditambahkan !!!</div>');
            redirect('Obat');
        }
    }

    public function hapusObat()
    {
        $where = ['kd_obat' => $this->uri->segment(3)];
        $this->ModelObat->hapusObat($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Obat berhasil diHapus !!!</div>');
        redirect('Obat');
    }

    public function ubahObat()
    {
        $data['judul'] = 'Ubah Data Obat';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['obat'] = $this->ModelObat->obatWhere(['kd_obat' => $this->uri->segment(3)])->row_array();


        $this->form_validation->set_rules('nama_obat', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim', [
            'required' => 'Satuan harus diisi'
        ]);
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|trim|numeric', [
            'required' => 'Harga Beli harus diisi',
            'numeric' => 'Harga Beli Harus Angka'
        ]);
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|trim|numeric', [
            'required' => 'Harga Jual harus diisi',
            'numeric' => 'Harga Jual Harus Angka'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('obat/obat-ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_obat' => htmlspecialchars($this->input->post('kd_obat', true)),
                'nama_obat' => htmlspecialchars($this->input->post('nama_obat', true)),
                'satuan' => htmlspecialchars($this->input->post('satuan', true)),
                'harga_beli' => htmlspecialchars($this->input->post('harga_beli', true)),
                'harga_jual' => htmlspecialchars($this->input->post('harga_jual', true)),
                'last_update' => time()
            ];

            $this->ModelObat->updateObat($data, ['kd_obat' => $this->input->post('kd_obat')]);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Berhasil diubah </div>');
            redirect('obat');
        }
    }
}
