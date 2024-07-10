<?php

include '../koneksi.php';
include '../template/header.php';

$kode_penerbit = $_GET['kode_penerbit'];

$query = "SELECT * FROM penerbit WHERE kode_penerbit = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($stmt, "s", $kode_penerbit);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$row = mysqli_fetch_array($result);
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah penerbit
                </div>

                <div class="card-body">
                    <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'gagal') : ?>
                        <div class="alert alert-danger" role="alert">
                            Data penerbit gagal disimpan.
                        </div>
                    <?php endif ?>

                    <form method="post" action="update-penerbit.php">
                        <div class=" form-group mb-3">
                            <label>Kode penerbit</label>
                            <input type="text" name="kode_penerbit" placeholder="Masukkan kode penerbit" class="form-control" value="<?php echo $row['kode_penerbit'] ?>" required>
                        </div>

                        <div class=" form-group mb-3">
                            <label>Nama penerbit</label>
                            <input type="text" name="nama_penerbit" placeholder="Masukkan nama penerbit" class="form-control" value="<?php echo $row['nama_penerbit'] ?>" required>
                        </div>

                        <div class=" form-group mb-3">
                            <label>Kota penerbit</label>
                            <input type="text" name="kota_penerbit" placeholder="Masukkan kota penerbit" class="form-control" value="<?php echo $row['kota_penerbit'] ?>" required>
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