<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Masuk</h2>

                <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'gagal') : ?>
                    <div class="alert alert-danger" role="alert">
                        Username atau kata sandi salah.
                    </div>
                <?php endif ?>

                <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'belum_login') : ?>
                    <div class="alert alert-danger" role="alert">
                        Anda harus login terlebih dahulu.
                    </div>
                <?php endif ?>

                <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'logout') : ?>
                    <div class="alert alert-success" role="alert">
                        Anda berhasil logout.
                    </div>
                <?php endif ?>

                <form method="post" action="validasi.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Masuk</button>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>