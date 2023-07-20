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
                    <div class="header text-center mb-4">Profil</div>
                </div>
            </div>
            <form method="post" action="/profil/update/profil/<?= session()->get('id_user'); ?>" enctype="multipart/form-data">

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

                <input type="hidden" name="id_user" id="id_user" value="<?= session()->get('id_user'); ?>">
                <input type="hidden" name="nama_foto_profil_lama" value="<?= $dataUser['foto_profil']; ?>">

                <div class="text-center">
                    <img src="/Assets/fotoprofil/<?= $dataUser['foto_profil']; ?>" alt="foto-profil" height="160px" width="160px" class="foto-profil">
                </div>

                <div class="my-3">
                    <label for="foto_profil" class="form-label label-foto">Ubah Foto Profil</label>
                    <input type="file" class="form-control" id="foto_profil" name="foto_profil" aria-describedby="foto_profil" value="<?= $dataUser['foto_profil']; ?>" onchange="previewImg()">
                    <div class="col-sm-4 mt-2">
                        <img src="/Assets/fotojaket/default.png" class="img-preview foto-profil" alt="">
                    </div>
                </div>
                <div class="my-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap<span class="required">*</span></label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" aria-describedby="nama_lengkap" value="<?= $dataUser['nama_lengkap']; ?>">
                </div>
                <div class="my-3">
                    <label for="email" class="form-label">Email<span class="required">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email" value="<?= $dataUser['email']; ?>">
                </div>
                <div class="my-3">
                    <label for="no_hp" class="form-label">Nomor Handphone<span class="required">*</span></label>
                    <input type="number" class="form-control" id="no_hp" name="no_hp" aria-describedby="no_hp" value="<?= $dataUser['no_hp']; ?>">
                </div>
                <div class="d-grid gap-2 mt-5 mb-3">
                    <button class="btn btn-1" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>