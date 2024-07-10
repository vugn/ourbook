<?php

include '../koneksi.php';
include '../template/header.php';

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Kategori
                </div>

                <div class="card-body">
                    <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'gagal') : ?>
                        <div class="alert alert-danger" role="alert">
                            Data kategori gagal disimpan.
                        </div>
                    <?php endif ?>

                    <form method="post" action="simpan-kategori.php">
                        <div class=" form-group mb-3">
                            <label>Kode Kategori</label>
                            <input type="text" name="kode_kategori" placeholder="Masukkan kode kategori" class="form-control" required>
                        </div>

                        <div class=" form-group mb-3">
                            <label>Nama Kategori</label>
                            <input type="text" name="nama_kategori" placeholder="Masukkan nama kategori" class="form-control" required>
                        </div>

                        <button type=" submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../template/footer.php'; ?>