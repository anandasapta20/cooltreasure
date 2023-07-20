<?= $this->extend('layout/base_guest'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-6 rounded border py-4 px-5">
            <div class="row">
                <div class="col">
                    <div class="header text-center mb-4">Ganti Kata Sandi</div>
                </div>
            </div>

            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <span class="required">* Wajib diisi</span>

            <form action="/masuk/lupaKataSandi/gantiKataSandi/update" method="post">
                <div class="my-3">
                    <label for="password" class="form-label">Kata Sandi Baru<span class="required">*</span></label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="my-3">
                    <label for="passwordConf" class="form-label">Konfirmasi Kata Sandi<span class="required">*</span></label>
                    <input type="password" class="form-control" id="passwordConf" name="passwordConf">
                </div>
                <div class="d-grid gap-2 mt-5">
                    <button class="btn btn-1" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>