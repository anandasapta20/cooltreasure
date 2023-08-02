<?= $this->extend('/layout/base_guest'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <img src="/Assets/success-daftar.png" alt="daftar berhasil" height="360px">
            <h1><b>Akun Telah Berhasil Dibuat!</b></h1>
            <p>Aktifkan akunmu dengan lakukan klik link pada pesan email yang telah dikirimkan ke akun emailmu.</p>
            <div class="d-grid mt-5">
                <a href="/masuk" class="btn btn-1 px-auto">Lanjut ke Halaman Masuk</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>