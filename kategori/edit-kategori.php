<?php

include '../koneksi.php';
include '../template/header.php';

$kode_kategori = $_GET['kode_kategori'];

$query = "SELECT * FROM kategori WHERE kode_kategori = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($stmt, "s", $kode_kategori);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$row = mysqli_fetch_array($result);
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

                    <form method="post" action="update-kategori.php">
                        <div class=" form-group mb-3">
                            <label>Kode Kategori</label>
                            <input type="text" name="kode_kategori" placeholder="Masukkan kode kategori" class="form-control" value="<?php echo $row['kode_kategori'] ?>" required>
                        </div>

                        <div class=" form-group mb-3">
                            <label>Nama Kategori</label>
                            <input type="text" name="nama_kategori" placeholder="Masukkan nama kategori" class="form-control" value="<?php echo $row['nama_kategori'] ?>" required>
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