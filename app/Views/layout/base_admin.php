<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="/CSS/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg">
        <div class="container d-flex justify-content-between p-0">
            <a class="navbar-brand justify-content-center" href="/admin/daftarJaket">
                <div class="p-2">
                    <img src="/Assets/logo_navbar.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
                </div>
            </a>

            <div class="p-2">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/daftarPengguna">Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/daftarJaket">Jaket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/daftarPembelian">Pemesanan</a>
                    </li>
                </ul>
            </div>

            <div class="p-2">
                <a href="/admin">
                    <a href="/admin/keluar" class="btn btn-2 btn-outline mx-0">Keluar</a>
                </a>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content'); ?>

    <div class="footer sticky-bottom d-flex justify-content-center py-2 mt-4">
        Copyright © 2023 Cooltreasure. All Rights Reserved
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        function previewImg() {
            const fotoJaket = document.querySelector('#foto_jaket');
            const fotoLabel = document.querySelector('.label-foto');
            const imgPreview = document.querySelector('.img-preview');

            // fotoLabel.textContent = fotoJaket.files[0].name;

            const fileJaket = new FileReader();
            fileJaket.readAsDataURL(fotoJaket.files[0]);

            fileJaket.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
</body>

</html>