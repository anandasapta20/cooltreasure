<?= $this->extend('layout/base_user'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row">
        <div class="col-6 mx-auto border rounded px-5 py-4">
            <div class="header text-center mb-4">Formulir Pemesanan</div>

            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <span class="required">* Wajib diisi</span>

            <div class="card-body py-0 mt-2">
                <div class="card">
                    <div class="card-body p-3 d-flex justify-content-between">
                        <div>
                            <img src="/Assets/fotojaket/<?= $jaket['foto_jaket']; ?>" class="rounded" width="130px" alt="">
                        </div>
                        <div class="detail-keranjang my-auto mx-4">
                            <h2 class="pemesanan-jaket"><b><?= $jaket['nama_jaket']; ?></b></h2>
                            <h2 class="pemesanan-harga"><b>Rp <?= $jaket['harga']; ?></b></h2>
                            <div class="btn btn-2-ukuran"><?= $jaket['ukuran']; ?></div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-3" data-bs-toggle="modal" data-bs-target="#info<?= $jaket['id_jaket']; ?>"><img src="/Assets/icon/info.svg" alt="" width="28px"></button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="info<?= $jaket['id_jaket']; ?>" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content px-4 py-4">
                                    <div class="mb-4">
                                        <h1 class="text-center judul-modal" id="exampleModalLabel">Data Jaket</h1>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p class="mb-0 label-form">Nama Jaket</p>
                                            <h4 class="mb-0"><?= $jaket['nama_jaket']; ?></h4>
                                        </div>
                                        <div class="col">
                                            <p class="mb-0">Ukuran</p>
                                            <h4 class="mb-0"><?= $jaket['ukuran']; ?></h4>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <p class="mb-0">Kondisi</p>
                                            <h4 class="mb-0"><?= $jaket['kondisi']; ?></h4>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <p class="mb-0">Harga</p>
                                            <h4 class="mb-0">Rp <?= $jaket['harga']; ?></h4>
                                        </div>
                                        <div class="col">
                                            <p class="mb-0">Jenis</p>
                                            <h4 class="mb-0"><?= $jaket['jenis']; ?></h4>
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col">
                                            <p class="mb-0">Foto Jaket</p>
                                            <img src="/Assets/fotojaket/<?= $jaket['foto_jaket']; ?>" class="rounded" width="160px" alt="">
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

            <form action="/pemesanan/save/<?= $jaket['id_jaket']; ?>" method="post">
                <input type="hidden" name="user_id" value="<?= $dataUser['id_user']; ?>">
                <input type="hidden" name="jaket_id" value="<?= $jaket['id_jaket']; ?>">

                <div class="my-3">
                    <label for="nama_lengkap" class="form-label label-form">Nama Lengkap<span class="required">*</span></label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $dataUser['nama_lengkap']; ?>">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label label-form">Alamat<span class="required">*</span></label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $dataUser['alamat']; ?>">
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="rtrw" class="form-label label-form">RT/RW<span class="required">*</span></label>
                        <input type="text" class="form-control" id="rtrw" name="rt_rw" value="<?= $dataUser['rt_rw']; ?>">
                    </div>
                    <div class="col mb-3">
                        <label for="kelurahan_desa" class="form-label label-form">Kelurahan/Desa<span class="required">*</span></label>
                        <input class="form-control" id="kelurahan_desa" name="kelurahan_desa" value="<?= $dataUser['kelurahan_desa']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="kecamatan" class="form-label label-form">Kecamatan<span class="required">*</span></label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $dataUser['kecamatan']; ?>">
                    </div>
                    <div class="col mb-3">
                        <label for="kabupatenkota" class="form-label label-form">Kabupaten/Kota<span class="required">*</span></label>
                        <input type="text" class="form-control" id="kabupatenkota" name="kabupaten_kota" value="<?= $dataUser['kabupaten_kota']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="provinsi" class="form-label label-form">Provinsi<span class="required">*</span></label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= $dataUser['provinsi']; ?>">
                    </div>
                    <div class="col mb-3">
                        <label for="kodepos" class="form-label label-form">Kode Pos<span class="required">*</span></label>
                        <input type="text" class="form-control" id="kodepos" name="kode_pos" value="<?= $dataUser['kode_pos']; ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="mpembayaran_id" class="form-label label-form">Metode Pembayaran<span class="required">*</span></label>
                    <select class="form-select" name="mpembayaran_id">
                        <?php foreach ($metodePembayaran as $mpemb) : ?>
                            <option value="<?= $mpemb['id_mpembayaran']; ?>"><?= $mpemb['nama_bank_wallet']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="mpengiriman_id" class="form-label label-form">Metode Pengiriman<span class="required">*</span></label>
                    <select class="form-select" name="mpengiriman_id">
                        <?php foreach ($metodePengiriman as $mpeng) : ?>
                            <option value="<?= $mpeng['id_mpengiriman']; ?>"><?= $mpeng['ekspedisi']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="total" class="form-label label-form mb-0">Subtotal</label>
                    <h1 class="total"><b>Rp <?= $jaket['harga']; ?></b></h1>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-1">Pesan</button>
                    <a href="/login/detailJaket/<?= $jaket['id_jaket']; ?>" class="btn btn-2">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>