<?php

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Produk';
        $data['data_produk'] = $this->Produk_model->getAllProduk();
        if( $this->input->post('keyword') ) {
            $data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Data Produk';

        $this->form_validation->set_rules('nama_produk', 'nama produk', 'required');
        $this->form_validation->set_rules('kode_produk', 'kode produk', 'required');
        $this->form_validation->set_rules('stok', 'stok', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('produk/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Produk_model->tambahDataProduk();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('produk');
        }
    }

    public function hapus($id)
    {
        $this->Produk_model->hapusDataProduk($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('produk');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Produk';
        $data['data_produk'] = $this->Produk_model->getProdukById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('produk/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Produk';
        $data['data_produk'] = $this->Produk_model->getProdukById($id);
        // $data['jurusan'] = ['Teknik Informatika', 'Teknik Mesin', 'Teknik Planologi', 'Teknik Pangan', 'Teknik Lingkungan'];

        $this->form_validation->set_rules('nama_produk', 'nama produk', 'required');
        $this->form_validation->set_rules('kode_produk', 'kode produk', 'required');
        $this->form_validation->set_rules('stok', 'stok', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('produk/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Produk_model->ubahDataProduk();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('produk');
        }
    }

}
