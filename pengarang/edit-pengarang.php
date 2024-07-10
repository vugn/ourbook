<?php

include '../koneksi.php';
include '../template/header.php';

$kode_pengarang = $_GET['kode_pengarang'];

$query = "SELECT * FROM pengarang WHERE kode_pengarang = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($stmt, "s", $kode_pengarang);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$row = mysqli_fetch_array($result);
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

                    <form method="post" action="update-pengarang.php">
                        <div class=" form-group mb-3">
                            <label>Kode pengarang</label>
                            <input type="text" name="kode_pengarang" placeholder="Masukkan kode pengarang" class="form-control" value="<?php echo $row['kode_pengarang'] ?>" required>
                        </div>

                        <div class=" form-group mb-3">
                            <label>Nama pengarang</label>
                            <input type="text" name="nama_pengarang" placeholder="Masukkan nama pengarang" class="form-control" value="<?php echo $row['nama_pengarang'] ?>" required>
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