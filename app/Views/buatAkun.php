<?= $this->extend('layout/base_guest'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="col-5 mx-auto border rounded px-5 py-4">
        <div class="col text-center mb-4">
            <img src="/Assets/logo_tentang.png" width="80" alt="logo-cooltreasure">
            <div class="header-masuk">Silahkan <b>mendaftar</b>!</div>
        </div>

        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <span class="required">* Wajib diisi</span>

        <form action="/buatAkun/save" method="post" enctype="multipart/form-data">
            <div class="my-4">
                <label for="foto_profil" class="form-label label-foto">Foto Profil</label>

                <div class="d-flex">
                    <div class="col-sm-4 me-4">
                        <img src="/Assets/fotoprofil/default_profil.svg" class="foto-profil img-preview" alt="">
                    </div>
                    <div class="col align-self-center">
                        <input class="form-control" type="file" id="foto_profil" name="foto_profil" onchange="previewImg()">
                        <div class="rule">Ukuran foto maks 5 MB</div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap<span class="required">*</span></label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email<span class="required">*</span></label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi<span class="required">*</span></label>
                <input type="password" class="form-control" id="password" name="password">
                <div class="rule">Minimal 8 karakter</div>
            </div>
            <div class="mb-3">
                <label for="passwordConf" class="form-label">Konfirmasi Kata Sandi<span class="required">*</span></label>
                <input type="password" class="form-control" id="passwordConf" name="passwordConf">
            </div>
            <div class="mb-3">
                <label for="nomor_hp" class="form-label">Nomor Handphone<span class="required">*</span></label>
                <input type="number" class="form-control" id="nomor_hp" name="nomor_hp">
            </div>

            <div class="d-grid mt-5">
                <button type="submit" class="btn btn-1">Daftar</button>
                <a href="/masuk" type="submit" class="btn btn-2 mt-2">Kembali</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>