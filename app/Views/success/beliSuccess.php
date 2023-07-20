<?= $this->extend('/layout/base_user'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <img src="/Assets/success-bayar.png" alt="bayar berhasil" height="360px">
            <h1><b>Pembayaran Telah Berhasil!</b></h1>
            <p>Terima kasih sudah berbelanja di Cooltreasure! Barang akan kami kirimkan ke tujuan anda.</p>
            <div class="d-grid mt-5">
                <a href="/riwayat" class="btn btn-1 px-auto">Lanjut ke Riwayat</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>