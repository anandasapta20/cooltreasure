<?= $this->extend('layout/base_admin'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row">
        <div class="col-6 mx-auto border rounded px-5 py-4">
            <div class="header text-center mb-4">Ubah Data Jaket</div>
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <span class="required">* Wajib diisi</span>

            <form action="/admin/daftarJaket/ubahJaket/update/<?= $jaket['id_jaket']; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="id_jaket" name="id_jaket" value="<?= $jaket['id_jaket']; ?>">
                <input type="hidden" name="nama_foto_jaket_lama" value="<?= $jaket['foto_jaket']; ?>">
                <div class="row my-3">
                    <div class="col">
                        <label for="nama_jaket" class="form-label">Nama Jaket<span class="required">*</span></label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_jaket')) ? 'is-invalid' : ''; ?>" id="nama_jaket" name="nama_jaket" value="<?= $jaket['nama_jaket']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_jaket'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="ukuran" class="form-label">Ukuran<span class="required">*</span></label>
                        <input type="text" class="form-control" id="ukuran" name="ukuran" value="<?= $jaket['ukuran']; ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="kondisi" class="form-label">Kondisi<span class="required">*</span></label>
                    <textarea class="form-control" id="kondisi" name="kondisi" rows="3"><?php echo $jaket['kondisi'] ?></textarea>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="harga" class="form-label">Harga<span class="required">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">Rp </span>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $jaket['harga']; ?>">
                        </div>
                    </div>
                    <div class="col">
                        <label for="jenis" class="form-label">Jenis<span class="required">*</span></label>
                        <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $jaket['jenis']; ?>">
                    </div>
                </div>
                <div class="custom-file mb-3">
                    <label for="foto_jaket" class="form-label label-foto">Foto Jaket<span class="required">*</span></label>
                    <div class="input-group">
                        <input type="file" class="form-control <?= ($validation->hasError('foto_jaket')) ? 'is-invalid' : ''; ?>" id="foto_jaket" name="foto_jaket" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onchange="previewImg()">
                        <div class="invalid-feedback">
                            <?= $validation->getError('foto_jaket'); ?>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-2">
                        <img src="/Assets/fotojaket/<?= $jaket['foto_jaket']; ?>" class="img-thumbnail img-preview" alt="">
                    </div>
                </div>
                <div class="d-grid gap-2 mt-5">
                    <button type="submit" class="btn btn-1">Simpan</button>
                    <a href="/admin/daftarJaket" class="btn btn-2">Kembali</a>
                </div>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>