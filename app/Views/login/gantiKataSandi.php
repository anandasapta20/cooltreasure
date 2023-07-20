<?= $this->extend('layout/base_user'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row justify-content-start gap-2">
        <div class="col-3 rounded border side-profil">
            <div class="filter-title mt-0 mb-4"><b>Ubah Data</b></div>
            <div class="">
                <a class="nav-link" href="/profil/<?= session()->get('id_user'); ?>">Profil</a>
            </div>
            <div class="my-3">
                <a class="nav-link" href="/profil/gantiKataSandi/<?= session()->get('id_user'); ?>">Kata Sandi</a>
            </div>
            <div>
                <a class="nav-link" href="/profil/dataPengiriman/<?= session()->get('id_user'); ?>">Data Pengiriman</a>
            </div>
        </div>
        <div class="col-6 rounded border py-4 px-5">
            <div class="row">
                <div class="col">
                    <div class="header text-center mb-4">Ganti Kata Sandi</div>
                </div>
            </div>
            <form action="/profil/gantiKataSandi/update/<?= session()->get('id_user'); ?>" method="post">
                <?php if (!empty(session()->getFlashdata('pesan'))) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <span class="required">* Wajib diisi</span>
                <div class="my-3">
                    <label for="passwordLama" class="form-label">Kata Sandi Lama<span class="required">*</span></label>
                    <input type="password" class="form-control" id="passwordLama" name="passwordLama" aria-describedby="kataSandiBaru">
                </div>
                <div class="my-3">
                    <label for="password" class="form-label">Kata Sandi Baru<span class="required">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" aria-describedby="kataSandiBaru">
                    <div class="rule">Minimal 8 karakter</div>
                </div>
                <div class="my-3">
                    <label for="passwordConf" class="form-label">Konfirmasi Kata Sandi<span class="required">*</span></label>
                    <input type="password" class="form-control" id="passwordConf" name="passwordConf">
                </div>
                <div class="d-grid gap-2 mt-5 mb-3">
                    <button class="btn btn-1" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>