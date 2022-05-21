<?php

class About extends CI_Controller
{
    public function index($nama = 'Ahmad Zuhril')
    {
        $data['judul'] = 'Halaman About';
        $data['nama'] = $nama;
        $this->load->view('templates/header', $data);
        $this->load->view('about/index', $data);
        $this->load->view('templates/footer');
    }
}
