<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Produk
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $data_produk['nama_produk']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $data_produk['kode_produk']; ?></h6>
                    <p class="card-text"><?= $data_produk['stok']; ?></p>
                    <p class="card-text"><?= $data_produk['harga']; ?></p>
                    <a href="<?= base_url(); ?>produk" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>