<?= $this->extend('/layout/base_guest'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <img src="/Assets/success-email.png" alt="email berhasil" height="360px">
            <h1><b>Email Telah Berhasil Dikirim!</b></h1>
            <p>Ganti kata sandi anda melalui tautan pada email yang telah dikirim!</p>
            <div class="d-grid mt-5">
                <a href="/masuk/lupaKataSandi/gantiKataSandi" class="btn btn-1 px-auto">Lanjut</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>