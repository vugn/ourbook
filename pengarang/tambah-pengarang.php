<?php

include '../koneksi.php';
include '../template/header.php';

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah pengarang
                </div>

                <div class="card-body">
                    <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'gagal') : ?>
                        <div class="alert alert-danger" role="alert">
                            Data pengarang gagal disimpan.
                        </div>
                    <?php endif ?>

                    <form method="post" action="simpan-pengarang.php">
                        <div class=" form-group mb-3">
                            <label>Kode pengarang</label>
                            <input type="text" name="kode_pengarang" placeholder="Masukkan kode pengarang" class="form-control" required>
                        </div>

                        <div class=" form-group mb-3">
                            <label>Nama pengarang</label>
                            <input type="text" name="nama_pengarang" placeholder="Masukkan nama pengarang" class="form-control" required>
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