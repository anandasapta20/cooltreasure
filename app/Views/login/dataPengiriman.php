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
            <form method="post" action="/profil/update/alamat/<?= session()->get('id_user'); ?>">
                <div class="row">
                    <div class="col">
                        <div class="header text-center mb-4">Data Pengiriman</div>
                    </div>
                </div>

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
                    <label for="alamat" class="form-label">Alamat<span class="required">*</span></label>
                    <input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="alamat" value="<?= $dataUser['alamat']; ?>">
                </div>
                <div class="my-3">
                    <label for="rt_rw" class="form-label">RT/RW<span class="required">*</span></label>
                    <input type="text" class="form-control" id="rt_rw" name="rt_rw" aria-describedby="rt_rw" value="<?= $dataUser['rt_rw']; ?>">
                </div>
                <div class="my-3">
                    <label for="kelurahan_desa" class="form-label">Kelurahan/Desa<span class="required">*</span></label>
                    <input type="text" class="form-control" id="kelurahan_desa" name="kelurahan_desa" aria-describedby="kelurahan_desa" value="<?= $dataUser['kelurahan_desa']; ?>">
                </div>
                <div class="my-3">
                    <label for="kecamatan" class="form-label">Kecamatan<span class="required">*</span></label>
                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" aria-describedby="kecamatan" value="<?= $dataUser['kecamatan']; ?>">
                </div>
                <div class="my-3">
                    <label for="kabupaten_kota" class="form-label">Kabupaten/Kota<span class="required">*</span></label>
                    <input type="text" class="form-control" id="kabupaten_kota" name="kabupaten_kota" aria-describedby="kabupaten_kota" value="<?= $dataUser['kabupaten_kota']; ?>">
                </div>
                <div class="my-3">
                    <label for="provinsi" class="form-label">Provinsi<span class="required">*</span></label>
                    <input type="text" class="form-control" id="provinsi" name="provinsi" aria-describedby="provinsi" value="<?= $dataUser['provinsi']; ?>">
                </div>
                <div class="my-3">
                    <label for="kode_pos" class="form-label">Kode Pos<span class="required">*</span></label>
                    <input type="text" class="form-control" id="kode_pos" name="kode_pos" aria-describedby="kode_pos" value="<?= $dataUser['kode_pos']; ?>">
                </div>

                <div class="d-grid gap-2 mt-5 mb-3">
                    <button class="btn btn-1" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>