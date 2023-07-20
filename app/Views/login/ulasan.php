<?= $this->extend('layout/base_user'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-6 rounded border py-4 px-5">
            <div class="row">
                <div class="col">
                    <div class="header text-center mb-4">Ulasan</div>
                </div>
            </div>

            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <span class="required">* Wajib diisi</span>

            <form action="/riwayat/detailRiwayat/ulasan/save/<?= $dataRiwayat['id_order']; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="user_id" id="user_id" value="<?= session()->get('id') ?>">
                <div class="my-3">
                    <label for="ulasan" class="form-label">Rincian Ulasan<span class="required">*</span></label>
                    <textarea class="form-control" id="ulasan" name="ulasan" rows="3"></textarea>
                </div>
                <div class="my-4">
                    <label for="foto_ulasan" class="form-label label-foto">Foto Ulasan<span class="required">*</span></label>
                    <input class="form-control" type="file" id="foto_ulasan" name="foto_ulasan" onchange="previewImgUlasan()">
                    <div class="col-sm-4 mt-2">
                        <img src="/Assets/fotojaket/default.png" class="img-thumbnail img-preview" alt="">
                    </div>
                </div>
                <div class="form-check my-4">
                    <input class="form-check-input" type="checkbox" value="1" id="anonim" name="anonim" for="anonim">
                    <label class="form-check-label" for="anonim">
                        Anonim
                    </label>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-1">Unggah</button>
                    <a href="/riwayat" class="btn btn-2">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>