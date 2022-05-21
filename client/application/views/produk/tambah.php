<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Produk
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" id="nama_produk">
                            <small class="form-text text-danger"><?= form_error('nama_produk'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kode_produk">Kode Produk</label>
                            <input type="text" name="kode_produk" class="form-control" id="kode_produk">
                            <small class="form-text text-danger"><?= form_error('kode_produk'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="stok_produk">Stok Produk</label>
                            <input type="text" name="stok" class="form-control" id="stok_produk">
                            <small class="form-text text-danger"><?= form_error('stok'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="harga_produk">Harga Produk</label>
                            <input type="text" name="harga" class="form-control" id="harga_produk">
                            <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Produk</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>