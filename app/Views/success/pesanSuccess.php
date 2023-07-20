<?= $this->extend('/layout/base_user'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <img src="/Assets/success-pesan.svg" alt="bayar berhasil" height="360px">
            <h1><b>Pemesanan Telah Berhasil!</b></h1>
            <p>Silahkan lakukan pembayaran sebelum batas waktu
                yang telah ditentukan agar pemesananmu dapat kami proses.</p>
            <div class="d-grid mt-5">
                <a href="/pembayaran/<?= $dataPemesanan['id_order']; ?>" class="btn btn-1 px-auto">Lanjut ke Pembayaran</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>