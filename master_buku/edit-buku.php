<?php

include '../koneksi.php';
include '../template/header.php';


$kode_buku = $_GET['kode_buku'];

$query = "SELECT * FROM master_buku WHERE kode_buku = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($stmt, "s", $kode_buku);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$row = mysqli_fetch_array($result);

// Fetch 'kategori' options
$kategoriQuery = "SELECT kode_kategori, nama_kategori FROM kategori ORDER BY nama_kategori";
$kategoriResult = mysqli_query($conn, $kategoriQuery);

// Fetch 'pengarang' options
$pengarangQuery = "SELECT kode_pengarang, nama_pengarang FROM pengarang ORDER BY nama_pengarang";
$pengarangResult = mysqli_query($conn, $pengarangQuery);

// Fetch 'penerbit' options
$penerbitQuery = "SELECT kode_penerbit, nama_penerbit FROM penerbit ORDER BY nama_penerbit";
$penerbitResult = mysqli_query($conn, $penerbitQuery);
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah buku
                </div>

                <div class="card-body">
                    <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'gagal') : ?>
                        <div class="alert alert-danger" role="alert">
                            Data buku gagal disimpan.
                        </div>
                    <?php endif ?>

                    <form method="post" action="update-buku.php">
                        <div class="form-group mb-3">
                            <label>Kode buku</label>
                            <input type="text" name="kode_buku" placeholder="Masukkan kode buku" class="form-control" value="<?php echo $row['kode_buku'] ?>" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Nama buku</label>
                            <input type="text" name="judul_buku" placeholder="Masukkan nama buku" class="form-control" value="<?php echo $row['judul_buku'] ?>" required>
                        </div>


                        <div class="form-group mb-3">
                            <label for="kategori">Kategori:</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <?php while ($kategoriRow = mysqli_fetch_assoc($kategoriResult)) : ?>
                                    <option value="<?php echo $kategoriRow['nama_kategori']; ?>" <?php if ($kategoriRow['nama_kategori'] == $row['kategori']) echo 'selected'; ?>>
                                        <?php echo htmlspecialchars($kategoriRow['nama_kategori']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="pengarang">Pengarang:</label>
                            <select name="pengarang" id="pengarang" class="form-control">
                                <?php while ($pengarangRow = mysqli_fetch_assoc($pengarangResult)) : ?>
                                    <option value="<?php echo $pengarangRow['nama_pengarang']; ?>" <?php if ($pengarangRow['nama_pengarang'] == $row['pengarang']) echo 'selected'; ?>>
                                        <?php echo htmlspecialchars($pengarangRow['nama_pengarang']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>


                        <div class="form-group mb-3">
                            <label for="penerbit">Penerbit:</label>
                            <select name="penerbit" id="penerbit" class="form-control">
                                <?php while ($penerbitRow = mysqli_fetch_assoc($penerbitResult)) : ?>
                                    <option value="<?php echo $penerbitRow['nama_penerbit']; ?>" <?php if ($penerbitRow['nama_penerbit'] == $row['penerbit']) echo 'selected'; ?>>
                                        <?php echo htmlspecialchars($penerbitRow['nama_penerbit']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Tahun Terbit</label>
                            <input type="text" name="tahun" placeholder="Masukkan tahun terbit buku" class="form-control" maxlength="4" value="<?php echo $row['tahun'] ?>" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" placeholder="Masukkan deskripsi buku" class="form-control" required><?php echo htmlspecialchars($row['deskripsi']); ?></textarea>
                        </div>

                        <label>Harga</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                            </div>
                            <input type="number" name="harga" class="form-control" id="inlineFormInputGroup" placeholder="Masukkan harga buku" value="<?php echo $row['harga'] ?>">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../template/footer.php'; ?>