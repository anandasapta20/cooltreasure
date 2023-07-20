<?= $this->extend('layout/base_adminLogin'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="col-5 mx-auto border rounded px-5 py-5">
        <div class="col text-center">
            <img src="/Assets/logo_tentang.png" width="80" alt="logo-cooltreasure">
            <div class="header-masuk">Admin <b>Cooltreasure.id</b></div>
        </div>

        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-danger mt-2" role="alert">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="/admin/masuk" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="d-grid mt-5">
                <button type="submit" class="btn btn-1">Masuk</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>