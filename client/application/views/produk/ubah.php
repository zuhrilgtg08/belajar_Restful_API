<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Produk
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $data_produk['id']; ?>">
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" id="nama_produk" value="<?= $data_produk['nama_produk']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama_produk'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kode_produk">Kode Produk</label>
                            <input type="text" name="kode_produk" class="form-control" id="kode_produk" value="<?= $data_produk['kode_produk']; ?>">
                            <small class="form-text text-danger"><?= form_error('kode_produk'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok Produk</label>
                            <input type="text" name="stok" class="form-control" id="stok" value="<?= $data_produk['stok']; ?>">
                            <small class="form-text text-danger"><?= form_error('stok'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Produk</label>
                            <input type="text" name="harga" class="form-control" id="harga" value="<?= $data_produk['harga']; ?>">
                            <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                            <!-- <select class="form-control" id="jurusan" name="jurusan">
                                <?php foreach ($jurusan as $j) : ?>
                                    <?php if ($j == $mahasiswa['jurusan']) : ?>
                                        <option value="<?= $j; ?>" selected><?= $j; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $j; ?>"><?= $j; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select> -->
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>