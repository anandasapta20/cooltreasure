<?= $this->extend('layout/base_guest'); ?>

<?= $this->section('content'); ?>
<div class="container my-4 justify-content-center">
    <div class="row">
        <div class="col align-self-center ps-5">
            <h1 class="header-landing"><b>Jaket Vintage, Casual, dan Streetwear</b></h1>
            <p>Mau cakep pakai barang original ga perlu mahal👌</p>
            <a href="/katalog" class="btn btn-1 btn-outline">Cek Katalog<img src="/Assets/icon/arrow-right.svg" alt="" class="icon ms-2"></a>
        </div>
        <div class="col">
            <img src="/Assets/illustration_hero.png" width="500" class="mx-auto d-block" alt="">
        </div>
    </div>
</div>

<div class="container my-4 justify-content-center">
    <div class="row">
        <div class="col text-center">
            <img src="/Assets/illustration_about.png" width="500" class="mx-auto d-block" alt="">
        </div>
        <div class="col-sm align-self-center">
            <h1><b>Apa itu Cooltreasure.id?</b></h1>
            <p>Gimana cara ordernya? Bisa kontak kemana? Yuk cari tau!</p>
            <a href="/tentang" class="btn btn-1 btn-outline me-2 align-middle">Tentang Kami<img src="/Assets/icon/arrow-right.svg" alt="" class="icon ms-2"></a>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="header text-center mb-4">Produk Terbaru</div>
    <div class="row">
        <?php foreach ($jaket as $j) : ?>
            <div class="col">
                <div class="card h-100 text-center">
                    <a href="/detailJaket/<?= $j['id_jaket']; ?>"><img src="/Assets/fotojaket/<?= $j['foto_jaket']; ?>" class="rounded mx-auto my-3 d-block" width="270" alt="foto jaket"></a>
                    <div class="card-body pt-0">
                        <a href="/detailJaket/<?= $j['id_jaket']; ?>" class="card-detail">
                            <h5 class="card-title"><b><?= $j['nama_jaket']; ?></b></h5>
                            <p class="card-text mb-2"><?= $j['ukuran']; ?></p>
                            <a href="/detailJaket/<?= $j['id_jaket']; ?>" class="btn btn-2 card-harga">Rp <?= $j['harga']; ?></a>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-between">
        <div class="col-2">

        </div>
        <div class="col">
            <div class="header text-center mb-4">Ulasan</div>
        </div>
        <div class="col-2 text-end align-middle">
            <a href="/semuaUlasan" class="btn btn-2">Lihat Semua<img src="/Assets/icon/arrow-right-main.svg" alt="" class="icon ms-2"></a>
        </div>
    </div>
    <div class="row">
        <?php foreach ($ulasan as $u) : ?>
            <div class="col">
                <div class="card h-100 text-center">
                    <img src="/Assets/fotoprofil/<?= $u['foto_profil']; ?>" class="mx-auto my-3 d-block foto-profil-ulasan-landing" width="100" height="100" alt="foto jaket">
                    <div class="card-body">
                        <h5 class="card-title mb-0"><?= $u['nama_lengkap']; ?></h5>
                        <p class="card-text mb-2 tanggal-ulasan"><?= $u['created_at']; ?></p>
                        <p class="card-text"><?= $u['ulasan']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection(); ?>