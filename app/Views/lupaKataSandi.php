<?= $this->extend('layout/base_guest'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-6 rounded border py-4 px-5">
            <div class="row">
                <div class="col">
                    <div class="header text-center mb-4">Lupa Kata Sandi</div>
                </div>
            </div>

            <div class="row justify-content-center mb-4">
                <div class="col-8 text-center">
                    Jangan khawatir! Kami akan kirimkan pesan untuk mengatur ulang kata sandi anda ke email.
                </div>
            </div>

            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="/masuk/lupaKataSandi/check">
                <div class="my-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email">
                </div>
                <div class="d-grid gap-2 mt-5">
                    <button type="submit" class="btn btn-1">Kirim</button>
                    <a href="/masuk" class="btn btn-2">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>