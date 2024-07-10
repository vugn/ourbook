<?php

include '../koneksi.php';
include '../template/header.php';

$keyword = '';

if (isset($_GET['q'])) {
    $keyword = $_GET['q'];
    $query = mysqli_query($conn, "select * from kategori where nama_kategori like '%$keyword%'");
} else {
    $query = mysqli_query($conn, "select * from kategori");
}

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Kategori
                </div>

                <div class="card-body">
                    <a href="tambah-kategori.php" class="btn btn-md btn-success mb-3">Tambah Data</a>

                    <form method="get" class="input-group mb-3">
                        <input name="q" type="text" class="form-control" placeholder="Cari Kategori" value="<?php echo $keyword ?>">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    </form>

                    <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'berhasil') : ?>
                        <div class="alert alert-success" role="alert">
                            Data kategori berhasil disimpan.
                        </div>
                    <?php endif ?>

                    <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'berhasil_update') : ?>
                        <div class="alert alert-success" role="alert">
                            Data kategori berhasil diperbarui.
                        </div>
                    <?php endif ?>

                    <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'berhasil_delete') : ?>
                        <div class="alert alert-success" role="alert">
                            Data kategori berhasil dihapus.
                        </div>
                    <?php endif ?>

                    <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'gagal_delete') : ?>
                        <div class="alert alert-danger" role="alert">
                            Data kategori gagal dihapus.
                        </div>
                    <?php endif ?>

                    <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'gagal_update') : ?>
                        <div class="alert alert-danger" role="alert">
                            Data kategori gagal diedit.
                        </div>
                    <?php endif ?>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Kode Kategori</th>
                                <th scope="col">Nama Kategori</th>
                                <th scope="col">Aksi</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($query)) :
                            ?>
                                <tr>
                                    <td><?php echo $row['kode_kategori'] ?></td>
                                    <td><?php echo $row['nama_kategori'] ?></td>

                                    <td class="text-center">
                                        <a href="edit-kategori.php?kode_kategori=<?php echo $row['kode_kategori'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="hapus-kategori.php?kode_kategori=<?php echo $row['kode_kategori'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../template/footer.php'; ?>