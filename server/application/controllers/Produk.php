<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Produk extends RestController
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->database();
        $this->load->model('Produk_model', 'produk');
    }

    function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $produk = $this->produk->getProduk();
        } else {
            $produk = $this->produk->getProduk($id);
        }

        if ($produk) {
            $this->response([
                'status' => 'success',
                'data' => $produk,
            ], 200);
        } else {
            $this->response([
                'status' => 'error',
                'message' => 'id not found',
            ], 404);
        }
    }

    function index_post()
    {
        $data = array(
            'id' => $this->post('id'),
            'nama_produk' => $this->post('nama_produk'),
            'kode_produk' => $this->post('kode_produk'),
            'harga' => $this->post('harga'),
            'stok' => $this->post('stok')
        );

        if ($this->produk->insertProduk($data) > 0) {
            $this->response([
                'status' => 'success',
                'message' => 'new produk has been created'
            ], 201);
        } else {
            $this->response([
                'status' => 'error',
                'message' => 'failed to create new produk'
            ], 502);
        }
    }

    function index_put()
    {
        $id = $this->put('id');
        $data = array(
            'id' => $this->put('id'),
            'nama_produk' => $this->put('nama_produk'),
            'kode_produk' => $this->put('kode_produk'),
            'harga' => $this->put('harga'),
            'stok' => $this->put('stok')
        );

        if ($this->produk->editProduk($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'the produk has been updated'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'the produk failed to updated'
            ], 502);
        }
    }

    function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => 'error',
                'message' => 'provide an id',
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->produk->deleteProduk($id) > 0) {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'id has been deleted'
                ], 201);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], 404);
            }
        }
    }
}
