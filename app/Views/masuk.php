<?= $this->extend('layout/base_guest'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="col-5 mx-auto border rounded px-5 py-5">
        <div class="col text-center mb-4">
            <img src="/Assets/logo_tentang.png" width="80" alt="logo-cooltreasure">
            <div class="header-masuk">Masuk Akun <b>Cooltreasure.id</b>!</div>
        </div>

        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="/masuk/save" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="d-grid mt-2">
                <a href="/masuk/lupaKataSandi" class="btn btn-3">Lupa Kata Sandi?</a>
            </div>

            <div class="text-center mt-3">
                Belum punya akun?
            </div>
            <div class="text-center">
                Klik <a href="/buatAkun" class="link">disini</a> untuk membuat akun.
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-1">Masuk</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>