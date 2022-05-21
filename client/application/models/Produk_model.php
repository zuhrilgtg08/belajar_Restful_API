<?php

use GuzzleHttp\Client;

class Produk_model extends CI_model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/rest-api/server/',
        ]);
    }


    public function getAllProduk()
    {
        // return $this->db->get('mahasiswa')->result_array();
        $response = $this->_client->request('GET', 'produk', [
            'query' => [
                'apikey' => 'rahasia'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    public function getProdukById($id)
    {
        $response = $this->_client->request('GET', 'produk', [
            'query' => [
                'apikey' => 'rahasia',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }


    public function tambahDataProduk()
    {
        $data = [
            "nama_produk" => $this->input->post('nama_produk', true),
            "kode_produk" => $this->input->post('kode_produk', true),
            "stok" => $this->input->post('stok', true),
            "harga" => $this->input->post('harga', true),
            'apikey' => 'rahasia'
        ];

        $response = $this->_client->request('POST', 'produk', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function hapusDataProduk($id)
    {
        // $this->db->where('id', $id);
        // $this->db->delete('mahasiswa', ['id' => $id;
        $response = $this->_client->request('DELETE', 'produk', [
            'form_params' => [
                'id' => $id,
                'apikey' => 'rahasia'
            ],
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }


    public function ubahDataProduk()
    {
        $data = [
            "nama_produk" => $this->input->post('nama_produk', true),
            "kode_produk" => $this->input->post('kode_produk', true),
            "stok" => $this->input->post('stok', true),
            "harga" => $this->input->post('harga', true),
            "id" => $this->input->post('id', true),
            'apikey' => 'rahasia'
        ];

        // $this->db->where('id', $this->input->post('id'));
        // $this->db->update('mahasiswa', $data);
        $response = $this->_client->request('PUT', 'produk', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('nrp', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}
