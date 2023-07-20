<?= $this->extend('layout/base_user'); ?>

<?= $this->section('content'); ?>
<div class="container my-4">
    <div class="header text-center mb-4">Keranjang</div>
    <div class="row justify-content-center">
        <div class="col-8">
            <?php if (!empty(session()->getFlashdata('pesan'))) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>

            <?php
            if (!empty($dataKeranjang)) { ?>
                <div class="card mb-4">
                    <div class="card-body p-3 d-flex justify-content-between">
                        <div>
                            <img src="/Assets/fotojaket/<?= $dataKeranjang['foto_jaket']; ?>" class="rounded" width="140px" alt="">
                        </div>
                        <div class="detail-keranjang my-auto mx-4">
                            <h2 class="nama-jaket-keranjang"><b><?= $dataKeranjang['nama_jaket']; ?></b></h2>
                            <h2 class="harga-jaket-keranjang"><b>Rp <?= $dataKeranjang['harga']; ?></b></h2>
                            <div class="btn btn-2"><?= $dataKeranjang['ukuran']; ?></div>
                        </div>
                        <a href="/keranjang/delete/<?= $dataKeranjang['id_keranjang']; ?>" class="image-keranjang"><img class="image-keranjang" src="/Assets/icon/delete.png" alt=""></a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row mb-4">
                    <img src="/Assets/not-found.svg" class="image-keranjang mx-auto d-block" height="400px" alt="">
                    <h1 class="keranjang-alert text-center"><b>Keranjang Kosong</b></h1>
                </div>
            <?php } ?>

            <div class="text-center">
                <h3 class="mb-0"><b>Subtotal</b></h3>
                <h2 class="harga">
                    <b>Rp <?php
                            if (!empty($dataKeranjang['harga'])) {
                                echo $dataKeranjang['harga'];
                            } else {
                                echo "-";
                            }
                            ?></b>
                </h2>

            </div>
            <div class="row mt-4">
                <div class="col d-grid">
                    <?php if (!empty($dataKeranjang['id_jaket'])) { ?>
                        <a href="/pemesanan/<?= $dataKeranjang['id_jaket']; ?>" class="btn btn-1">Beli</a>
                    <?php } else { ?>
                        <a href="/keranjang/<?= session()->get('id_user'); ?>" class="btn btn-1">Beli</a>
                    <?php } ?>
                </div>
                <div class="col d-grid">
                    <a href="/keranjang/deleteAll" class="btn btn-2">Hapus Semua</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>