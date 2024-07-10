<?php

include '../koneksi.php';
include '../template/header.php';


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

                    <form method="post" action="simpan-buku.php">
                        <div class="form-group mb-3">
                            <label>Kode buku</label>
                            <input type="text" name="kode_buku" placeholder="Masukkan kode buku" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Nama buku</label>
                            <input type="text" name="judul_buku" placeholder="Masukkan nama buku" class="form-control" required>
                        </div>


                        <div class="form-group mb-3">
                            <label for="kategori">Kategori:</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <?php while ($row = mysqli_fetch_assoc($kategoriResult)) : ?>
                                    <option value="<?php echo $row['nama_kategori']; ?>"><?php echo $row['nama_kategori']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>


                        <div class="form-group mb-3">
                            <label for="pengarang">Pengarang:</label>
                            <select name="pengarang" id="pengarang" class="form-control">
                                <?php while ($row = mysqli_fetch_assoc($pengarangResult)) : ?>
                                    <option value="<?php echo $row['nama_pengarang']; ?>"><?php echo $row['nama_pengarang']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>


                        <div class="form-group mb-3">
                            <label for="penerbit">Penerbit:</label>
                            <select name="penerbit" id="penerbit" class="form-control">
                                <?php while ($row = mysqli_fetch_assoc($penerbitResult)) : ?>
                                    <option value="<?php echo $row['nama_penerbit']; ?>"><?php echo $row['nama_penerbit']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Tahun Terbit</label>
                            <input type="text" name="tahun" placeholder="Masukkan tahun terbit buku" class="form-control" maxlength="4" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Deskripsi</label>
                            <textarea type="text" name="deskripsi" placeholder="Masukkan deskripsi buku" class="form-control" required> </textarea>
                        </div>

                        <label>Harga</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                            </div>
                            <input type="number" name="harga" class="form-control" id="inlineFormInputGroup" placeholder="Masukkan harga buku">
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