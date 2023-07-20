<?= $this->extend('/layout/base_user'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <img src="/Assets/success-ulasan.svg" alt="bayar berhasil" height="360px">
            <h1><b>Ulasan Berhasil Dikirim!</b></h1>
            <p>Terima kasih telah memberikan ulasan!
                Mau cakep pakai barang original ga perlu mahal👌</p>
            <div class="d-grid mt-5">
                <a href="/login/katalog" class="btn btn-1 px-auto">Lanjut Belanja</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>