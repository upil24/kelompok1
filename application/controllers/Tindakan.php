<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tindakan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['tindakan'] = $this->ModelTindakan->tampilTindakan()->result_array();
        $data['judul'] = 'Form Master Tindakan';
        $dariDB = $this->ModelTindakan->cekkode();
        // contoh DKT0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($dariDB, 3, 4);
        $kodeTindakanSekarang = $nourut + 1;
        $data['kd_tindakan'] =  $kodeTindakanSekarang;


        $this->form_validation->set_rules('nama', 'Nama Tindakan', 'required|trim', [
            'required' => 'Nama tindakan harus diisi'
        ]);
        $this->form_validation->set_rules('penjelasan', 'Penjelasan Tindakan', 'required|trim', [
            'required' => 'Penjelasan Tindakan harus diisi'
        ]);
        $this->form_validation->set_rules('tarif', 'Tarif', 'required|trim|numeric', [
            'required' => 'Tarif harus diisi',
            'numeric' => 'Tarif Harus Angka'
        ]);
        $this->form_validation->set_rules('lama_tindakan', 'Lama Tindakan', 'required|trim', [
            'required' => 'Lama Tindakan harus diisi'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tindakan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_tindakan' => htmlspecialchars($this->input->post('kd_tindakan', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'penjelasan' => htmlspecialchars($this->input->post('penjelasan', true)),
                'tarif' => htmlspecialchars($this->input->post('tarif', true)),
                'lama_tindakan' => htmlspecialchars($this->input->post('lama_tindakan', true)),
                'date_created' => time()
            ];

            $this->ModelTindakan->simpanData($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Tindakan berhasil ditambahkan !!!</div>');
            redirect('tindakan');
        }
    }

    public function hapusTindakan()
    {
        $where = ['kd_tindakan' => $this->uri->segment(3)];
        $this->ModelTindakan->hapusTindakan($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Tindakan berhasil diHapus !!!</div>');
        redirect('Tindakan');
    }

    public function ubahTindakan()
    {
        $data['judul'] = 'Ubah Data Tindakan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['tindakan'] = $this->ModelTindakan->tindakanWhere(['kd_tindakan' => $this->uri->segment(3)])->row_array();


        $this->form_validation->set_rules('nama', 'Nama Tindakan', 'required|trim', [
            'required' => 'Nama tindakan harus diisi'
        ]);
        $this->form_validation->set_rules('penjelasan', 'Penjelasan Tindakan', 'required|trim', [
            'required' => 'Penjelasan Tindakan harus diisi'
        ]);
        $this->form_validation->set_rules('tarif', 'Tarif', 'required|trim|numeric', [
            'required' => 'Tarif harus diisi',
            'numeric' => 'Tarif Harus Angka'
        ]);
        $this->form_validation->set_rules('lama_tindakan', 'Lama Tindakan', 'required|trim', [
            'required' => 'Lama Tindakan harus diisi'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tindakan/tindakan-ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_tindakan' => htmlspecialchars($this->input->post('kd_tindakan', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'penjelasan' => htmlspecialchars($this->input->post('penjelasan', true)),
                'tarif' => htmlspecialchars($this->input->post('tarif', true)),
                'lama_tindakan' => htmlspecialchars($this->input->post('lama_tindakan', true)),
                'last_update' => time()
            ];

            $this->ModelTindakan->updateTindakan($data, ['kd_tindakan' => $this->input->post('kd_tindakan')]);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Tindakan Berhasil diubah </div>');
            redirect('tindakan');
        }
    }
}
