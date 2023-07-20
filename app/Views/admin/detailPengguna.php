<?= $this->extend('layout/base_admin'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-8 rounded border p-5">
            <div class="row">
                <div class="col">
                    <div class="header text-center mb-4">Data Pengiriman <?= $user['nama_lengkap']; ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="mb-0">Alamat</p>
                    <h4 class="mb-0"><?= $user['alamat']; ?></h4>
                </div>
            </div>
            <div class="row my-4">
                <div class="col">
                    <p class="mb-0">RT/RW</p>
                    <h4 class="mb-0"><?= $user['rt_rw']; ?></h4>
                </div>
                <div class="col">
                    <p class="mb-0">Kelurahan/Desa</p>
                    <h4 class="mb-0"><?= $user['kelurahan_desa']; ?></h4>
                </div>
            </div>
            <div class="row my-4">
                <div class="col">
                    <p class="mb-0">Kecamatan</p>
                    <h4 class="mb-0"><?= $user['kecamatan']; ?></h4>
                </div>
                <div class="col">
                    <p class="mb-0">Kabupaten/Kota</p>
                    <h4 class="mb-0"><?= $user['kabupaten_kota']; ?></h4>
                </div>
            </div>
            <div class="row my-4">
                <div class="col">
                    <p class="mb-0">Provinsi</p>
                    <h4 class="mb-0"><?= $user['provinsi']; ?></h4>
                </div>
                <div class="col">
                    <p class="mb-0">Kode Pos</p>
                    <h4 class="mb-0"><?= $user['kode_pos']; ?></h4>
                </div>
            </div>

            <div class="d-grid">
                <a href="/admin/daftarPengguna" class="btn btn-2">Kembali</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>