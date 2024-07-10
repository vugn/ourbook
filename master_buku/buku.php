<?php

include '../koneksi.php';
include '../template/header.php';

$keyword = '';

if (isset($_GET['q'])) {
    $keyword = $_GET['q'];
    // Prepare a statement with placeholders for each field you want to search through
    $stmt = $conn->prepare("SELECT * FROM master_buku WHERE judul_buku LIKE CONCAT('%', ?, '%') OR kategori LIKE CONCAT('%', ?, '%') OR pengarang LIKE CONCAT('%', ?, '%') OR penerbit LIKE CONCAT('%', ?, '%') OR tahun LIKE CONCAT('%', ?, '%') OR deskripsi LIKE CONCAT('%', ?, '%') OR harga LIKE CONCAT('%', ?, '%')");
    // Bind the same keyword to each placeholder
    $stmt->bind_param("sssssss", $keyword, $keyword, $keyword, $keyword, $keyword, $keyword, $keyword);
    $stmt->execute();
    $query = $stmt->get_result();
} else {
    $query = mysqli_query($conn, "SELECT * FROM master_buku");
}

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Buku
                </div>

                <div class="card-body">
                    <a href="tambah-buku.php" class="btn btn-md btn-success mb-3">Tambah Data</a>

                    <form method="get" class="input-group mb-3">
                        <input name="q" type="text" class="form-control" placeholder="Cari buku berdasarkan judul, kategori, pengarang, penerbi, tahun terbit, deskripsi, atau harga" value="<?php echo $keyword ?>">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    </form>

                    <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'berhasil') : ?>
                        <div class="alert alert-success" role="alert">
                            Data buku berhasil disimpan.
                        </div>
                    <?php endif ?>

                    <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'berhasil_update') : ?>
                        <div class="alert alert-success" role="alert">
                            Data buku berhasil diperbarui.
                        </div>
                    <?php endif ?>

                    <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'berhasil_delete') : ?>
                        <div class="alert alert-success" role="alert">
                            Data buku berhasil dihapus.
                        </div>
                    <?php endif ?>

                    <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'gagal_delete') : ?>
                        <div class="alert alert-danger" role="alert">
                            Data buku gagal dihapus.
                        </div>
                    <?php endif ?>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Kode Buku</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Pengarang</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Tahun Terbit</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($query)) :
                            ?>
                                <tr>
                                    <td><?php echo $row['kode_buku'] ?></td>
                                    <td><?php echo $row['judul_buku'] ?></td>
                                    <td><?php echo $row['kategori'] ?></td>
                                    <td><?php echo $row['pengarang'] ?></td>
                                    <td><?php echo $row['penerbit'] ?></td>
                                    <td><?php echo $row['tahun'] ?></td>
                                    <td><?php echo $row['deskripsi'] ?></td>
                                    <td><?php echo $row['harga'] ?></td>
                                    <td class="text-center">
                                        <a href="edit-buku.php?kode_buku=<?php echo $row['kode_buku'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="hapus-buku.php?kode_buku=<?php echo $row['kode_buku'] ?>" class="btn btn-sm btn-danger">Hapus</a>
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