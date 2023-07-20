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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg">
        <div class="container d-flex justify-content-between p-0">
            <a class="navbar-brand justify-content-center" href="/login">
                <div class="p-2">
                    <img src="/Assets/logo_navbar.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
                </div>
            </a>

            <div class="p-2">
                <ul class="navbar-nav">
                    <div class="nav-item">
                        <a class="nav-link" href="/login/katalog">Katalog</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="/riwayat">Riwayat</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="/keranjang/<?= session()->get('id_user'); ?>">Keranjang</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link text-center align-middle" href="/login/semuaUlasan">Ulasan</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link text-center align-middle" href="/login/tentang">Tentang</a>
                    </div>
                </ul>
            </div>

            <div class="p-1 dropdown">
                <a class="btn btn-2 btn-outline" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/Assets/icon/profil.svg" alt="" class="icon">
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item dropdown-profil" href="/profil/<?= session()->get('id_user'); ?>"><img src="/Assets/icon/edit.svg" alt="" class="icon me-2">Ubah Profil</a></li>
                    <li><a class="dropdown-item dropdown-profil" href="/keluarAkun"><img src="/Assets/icon/logout.svg" alt="" class="icon me-2">Keluar Akun</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content'); ?>

    <div class="footer d-flex justify-content-center mt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tentang">
                        <img src="/Assets/logo_tentang.png" width="100px" class="mb-2" alt="">
                        <h2 class="mb-0"><b>Cooltreasure.id</b></h2>
                        <p class="tentang-p mb-5">Mau cakep pakai jaket original ga perlu mahal👌</p>
                    </div>
                    <div class="copyright">
                        Copyright © 2023 Cooltreasure. All Rights Reserved
                    </div>
                </div>
                <div class="col-2">
                    <div class="footer-section">Eksplorasi</div>
                    <div class="footer-menu"><a href="/login" class="footer-link">Halaman Utama</a></div>
                    <div class="footer-menu"><a href="/login/katalog" class="footer-link">Katalog</a></div>
                    <div class="footer-menu"><a href="/riwayat" class="footer-link">Riwayat</a></div>
                    <div class="footer-menu"><a href="/keranjang/<?= session()->get('id_user'); ?>" class="footer-link">Keranjang</a></div>
                    <div class="footer-menu"><a href="/login/semuaUlasan" class="footer-link">Semua Ulasan</a></div>
                    <div class="footer-menu"><a href="/login/tentang" class="footer-link">Tentang Kami</a></div>
                </div>
                <div class="col-2">
                    <div class="footer-section">Kontak</div>
                    <div class="footer-menu"><img src="/Assets/wa_white.svg" class="me-2" alt="">+62 812-2010-2595</div>
                    <div class="footer-menu"><img src="/Assets/ig_white.svg" class="me-2" alt=""><a href="https://www.instagram.com/cooltreasure.id/" class="footer-link">@cooltreasure.id</a></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        function previewImg() {
            const fotoProfil = document.querySelector('#foto_profil');
            const fotoLabel = document.querySelector('.label-foto');
            const imgPreview = document.querySelector('.img-preview');

            // fotoLabel.textContent = fotoProfil.files[0].name;

            const fileProfil = new FileReader();
            fileProfil.readAsDataURL(fotoProfil.files[0]);

            fileProfil.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

    <script>
        function previewImgBayar() {
            const fotoBayar = document.querySelector('#foto_bukti');
            const fotoLabel = document.querySelector('.label-foto');
            const imgPreview = document.querySelector('.img-preview');

            // fotoLabel.textContent = fotoBayar.files[0].name;

            const fileBukti = new FileReader();
            fileBukti.readAsDataURL(fotoBayar.files[0]);

            fileBukti.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
    <script>
        function previewImgUlasan() {
            const fotoUlasan = document.querySelector('#foto_ulasan');
            const fotoLabel = document.querySelector('.label-foto');
            const imgPreview = document.querySelector('.img-preview');

            // fotoLabel.textContent = fotoUlasan.files[0].name;

            const fileUlasan = new FileReader();
            fileUlasan.readAsDataURL(fotoUlasan.files[0]);

            fileUlasan.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
</body>

</html>