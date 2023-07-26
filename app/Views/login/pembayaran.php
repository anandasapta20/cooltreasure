<?= $this->extend('layout/base_user'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-8 rounded border p-5">
            <div class="row">
                <div class="col">
                    <div class="header text-center mb-4">Pembayaran</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="mb-1 label-form">Batas Akhir Pembayaran</p>
                    <h4 class="btn btn-merah waktu"><b>59:59</b></h4>
                </div>
            </div>
            <div class="row my-4">
                <div class="col">
                    <p class="mb-0 label-form">Metode Pembayaran</p>
                    <h4 class="mb-0"><?= $dataPembayaran['nama_bank_wallet']; ?></h4>
                </div>
                <div class="col">
                    <p class="mb-0 label-form">Nomor HP/Rekening Tujuan</p>
                    <h4 class="mb-0"><?= $dataPembayaran['norek_nohp']; ?></h4>
                </div>
            </div>

            <div class="mb-4">
                <p class="mb-1 label-form">Pemesanan Jaket</p>
                <div class="card-body py-0">
                    <div class="card">
                        <div class="card-body p-3 d-flex justify-content-between">
                            <div>
                                <img src="/Assets/fotojaket/<?= $dataPembayaran['foto_jaket']; ?>" class="rounded" width="130px" alt="">
                            </div>
                            <div class="detail-keranjang my-auto mx-4">
                                <h2 class="detail-riwayat-jaket"><b><?= $dataPembayaran['nama_jaket']; ?></b></h2>
                                <h2 class="detail-riwayat-harga"><b>Rp <?= $dataPembayaran['harga']; ?></b></h2>
                                <div class="btn btn-2-ukuran"><?= $dataPembayaran['ukuran']; ?></div>
                            </div>
                            <!-- Trigger Modal -->
                            <div>
                                <button type="button" class="btn btn-3" data-bs-toggle="modal" data-bs-target="#info<?= $dataPembayaran['id_jaket']; ?>"><img src="/Assets/icon/info.svg" alt="" width="28px"></button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="info<?= $dataPembayaran['id_jaket']; ?>" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content px-4 py-4">
                                        <div class="mb-4">
                                            <h1 class="text-center judul-modal" id="exampleModalLabel">Data Jaket</h1>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p class="mb-0 label-form">Nama Jaket</p>
                                                <h4 class="mb-0"><?= $dataPembayaran['nama_jaket']; ?></h4>
                                            </div>
                                            <div class="col">
                                                <p class="mb-0">Ukuran</p>
                                                <h4 class="mb-0"><?= $dataPembayaran['ukuran']; ?></h4>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <p class="mb-0">Kondisi</p>
                                                <h4 class="mb-0"><?= $dataPembayaran['kondisi']; ?></h4>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <p class="mb-0">Harga</p>
                                                <h4 class="mb-0">Rp <?= $dataPembayaran['harga']; ?></h4>
                                            </div>
                                            <div class="col">
                                                <p class="mb-0">Jenis</p>
                                                <h4 class="mb-0"><?= $dataPembayaran['jenis']; ?></h4>
                                            </div>
                                        </div>
                                        <div class="row my-4">
                                            <div class="col">
                                                <p class="mb-0">Foto Jaket</p>
                                                <img src="/Assets/fotojaket/<?= $dataPembayaran['foto_jaket']; ?>" class="rounded" width="160px" alt="">
                                            </div>
                                        </div>
                                        <div class="d-grid">
                                            <button type="button" data-bs-dismiss="modal" class="btn btn-2 d-block">Kembali</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="">
                <p class="mb-0 label-form">Total Pembayaran</p>
                <h4 class="total"><b>Rp <?= $dataPembayaran['total'] + $dataPembayaran['ongkos_kirim']; ?></b></h4>
            </div>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger mt-4" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form action="/pembayaran/update/<?= $dataPembayaran['id_order']; ?>" method="post" enctype="multipart/form-data">
                <div class="my-4">
                    <label for="foto_bukti" class="form-label label-foto label-form">Bukti Pembayaran<span class="required">*</span></label>

                    <div class="d-flex">
                        <div class="col-sm-3 me-2">
                            <img src="/Assets/fotojaket/default.png" class="img-thumbnail img-preview" alt="">
                        </div>
                        <div class="col align-self-center">
                            <input class="form-control" type="file" id="foto_bukti" name="foto_bukti" onchange="previewImgBayar()">
                            <div class="rule">Ukuran foto maks 5 MB</div>
                        </div>
                    </div>
                </div>

                <span class="required">* Wajib diisi</span>
                <div class="d-grid gap-2 mt-4">
                    <button class="btn btn-1" type="submit">Simpan</button>
                    <a href="/pembayaran/batal/<?= $dataPembayaran['id_order']; ?>" class="btn btn-2">Batalkan</a>
                    <a href="/riwayat" class="btn btn-3">Kembali</a>
                </div>
            </form>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>