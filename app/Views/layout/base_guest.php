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
            <a class="navbar-brand justify-content-center" href="/">
                <div class="p-2">
                    <img src="/Assets/logo_navbar.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
                </div>
            </a>

            <div class="p-2 ">
                <div class="navbar-nav">
                    <div class="nav-item">
                        <a class="nav-link text-center align-middle" href="/katalog">Katalog</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link text-center align-middle" href="/semuaUlasan">Ulasan</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link text-center align-middle" href="/tentang">Tentang</a>
                    </div>
                </div>
            </div>

            <div class="p-1">
                <a href="/masuk" class="btn btn-2 btn-outline mx-0">Masuk<img src="/Assets/icon/login.svg" alt="" class="icon ms-2"></a>
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
                    <div class="footer-menu"><a href="/" class="footer-link">Halaman Utama</a></div>
                    <div class="footer-menu"><a href="/katalog" class="footer-link">Katalog</a></div>
                    <div class="footer-menu"><a href="/semuaUlasan" class="footer-link">Semua Ulasan</a></div>
                    <div class="footer-menu"><a href="/tentang" class="footer-link">Tentang Kami</a></div>
                </div>
                <div class="col-2">
                    <div class="footer-section">Kontak</div>
                    <div class="footer-menu"><img src="/Assets/wa_white.svg" class="me-2" alt=""><a href="https://wa.me/6281220102595" class="footer-link">+62 812-2010-2595</a></div>
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

            const fileJaket = new FileReader();
            fileJaket.readAsDataURL(fotoProfil.files[0]);

            fileJaket.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

</body>

</html>