<?= $this->extend('/layout/base_guest'); ?>

<?= $this->section('content'); ?>
<div class="container my-4">
    <div class="row">
        <div class="col-5">
            <div class="row row-cols-1 row-cols-md-2 g-2">
                <div class="col">
                    <img src="/Assets/fotojaket/<?= $user['foto_jaket']; ?>" class="rounded d-block" width="100%" alt="foto jaket">
                </div>
                <div class="col">
                    <img src="/Assets/fotojaket/<?= $user['foto_jaket']; ?>" class="rounded d-block" width="100%" alt="foto jaket">
                </div>
                <div class="col">
                    <img src="/Assets/fotojaket/<?= $user['foto_jaket']; ?>" class="rounded d-block" width="100%" alt="foto jaket">
                </div>
                <div class="col">
                    <img src="/Assets/fotojaket/<?= $user['foto_jaket']; ?>" class="rounded d-block" width="100%" alt="foto jaket">
                </div>
                <div class="col">
                    <img src="/Assets/fotojaket/<?= $user['foto_jaket']; ?>" class="rounded d-block" width="100%" alt="foto jaket">
                </div>
                <div class="col">
                    <img src="/Assets/fotojaket/<?= $user['foto_jaket']; ?>" class="rounded d-block" width="100%" alt="foto jaket">
                </div>
            </div>
        </div>
        <div class="col my-auto ms-4">
            <div class="info-section">
                <h2 class="nama-jaket-detail"><b><?= $user['nama_jaket']; ?></b></h2>
                <h2 class="harga-jaket-detail"><b>Rp <?= $user['harga']; ?></b></h2>
            </div>
            <div class="info-section">
                <h4 class="info-label">Ukuran</h4>
                <div class="btn btn-2-ukuran"><?= $user['ukuran']; ?></div>
            </div>
            <div class="info-section">
                <h4 class="info-label">Jenis Jaket</h4>
                <div class="info-detail"><?= $user['jenis']; ?></div>
            </div>
            <div class="info-section">
                <h4 class="info-label">Kondisi</h4>
                <div class="info-detail"><?= $user['kondisi']; ?>
                </div>
            </div>
            <div class="row">
                <div class="col d-grid">
                    <a href="/masuk" class="btn btn-1"><img src="/Assets/icon/beli.svg" class="me-2" alt="">Beli Langsung</a>
                </div>
                <div class="col d-grid">
                    <a href="/masuk" class="btn btn-2"><img src="/Assets/icon/tambah-keranjang.svg" class="me-2" alt="">Tambahkan ke Keranjang</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>