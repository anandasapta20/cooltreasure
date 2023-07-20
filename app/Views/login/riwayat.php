<?= $this->extend('/layout/base_user'); ?>

<?= $this->section('content'); ?>
<div class="container my-4">
    <div class="header text-center mb-4">Riwayat Pemesanan</div>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger mt-4" role="alert">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php if (!empty(session()->getFlashdata('pesan'))) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <?php
    if (!empty($dataRiwayat)) { ?>
        <?php foreach ($dataRiwayat as $r) : ?>
            <div class="card mb-4">
                <div class="card-body p-4 d-flex">
                    <div class="col-3">
                        <h5>Tanggal Pemesanan</h5>
                        <h2><b><?= $r['tanggal_pembelian']; ?></b></h2>
                    </div>
                    <div class="col-3">
                        <h5>Status</h5>
                        <div class="
                        <?= ($r['status_pembayaran'] == 'Menunggu Pembayaran') ? 'btn btn-kuning' : ''; ?>
                        <?= ($r['status_pembayaran'] == 'Menunggu Konfirmasi Admin') ? 'btn btn-hijau' : ''; ?>
                        <?= ($r['status_pembayaran'] == 'Gagal') ? 'btn btn-merah' : ''; ?>
                        <?= ($r['status_pembayaran'] == 'Batal') ? 'btn btn-merah' : ''; ?>
                        <?= ($r['status_pembayaran'] == 'Barang Dikirim') ? 'btn btn-hijau' : ''; ?>
                        <?= ($r['status_pembayaran'] == 'Barang Sedang Diproses') ? 'btn btn-hijau' : ''; ?>
                        "><?= $r['status_pembayaran']; ?></div>
                    </div>
                    <div class="col-auto">
                        <h5>Nomor Resi</h5>
                        <h2>
                            <?php
                            if (empty($r['no_resi'])) {
                                echo '-';
                            } else {
                                echo $r['no_resi'];
                            }
                            ?>
                        </h2>
                    </div>
                </div>

                <div class="card-body py-0">
                    <div class="card">
                        <div class="card-body p-3 d-flex justify-content-between">
                            <div>
                                <img src="/Assets/fotojaket/<?= $r['foto_jaket']; ?>" class="rounded" width="160px" alt="">
                            </div>
                            <div class="detail-keranjang my-auto mx-5">
                                <h2 class="nama-jaket"><b><?= $r['nama_jaket']; ?></b></h2>
                                <h2 class="harga-jaket"><b>Rp <?= $r['harga']; ?></b></h2>
                                <div class="btn btn-2-ukuran"><?= $r['ukuran']; ?></div>
                            </div>
                            <div>
                                <button type="button" class="btn btn-3" data-bs-toggle="modal" data-bs-target="#info<?= $r['id_jaket']; ?>"><img src="/Assets/icon/info.svg" alt="" width="28px"></button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="info<?= $r['id_jaket']; ?>" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content px-4 py-4">
                                        <div class="mb-4">
                                            <h1 class="text-center judul-modal" id="exampleModalLabel">Data Jaket</h1>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p class="mb-0">Nama Jaket</p>
                                                <h4 class="mb-0"><?= $r['nama_jaket']; ?></h4>
                                            </div>
                                            <div class="col">
                                                <p class="mb-0">Ukuran</p>
                                                <h4 class="mb-0"><?= $r['ukuran']; ?></h4>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <p class="mb-0">Kondisi</p>
                                                <h4 class="mb-0"><?= $r['kondisi']; ?></h4>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <p class="mb-0">Harga</p>
                                                <h4 class="mb-0">Rp <?= $r['harga']; ?></h4>
                                            </div>
                                            <div class="col">
                                                <p class="mb-0">Jenis</p>
                                                <h4 class="mb-0"><?= $r['jenis']; ?></h4>
                                            </div>
                                        </div>
                                        <div class="row my-4">
                                            <div class="col">
                                                <p class="mb-0">Foto Jaket</p>
                                                <img src="/Assets/fotojaket/<?= $r['foto_jaket']; ?>" class="rounded" width="160px" alt="">
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

                <div class="card-body px-4 py-3 d-flex">
                    <div class="col-3">
                        <h5>Total</h5>
                        <h2><b>Rp <?= $r['total'] + $r['ongkos_kirim']; ?></b></h2>
                    </div>
                </div>

                <div class="row card-body pt-0">
                    <div class="col d-grid">
                        <a <?= ($r['status_bayar'] == true || $r['status_pembayaran'] == 'Gagal') ? 'class="btn btn-disable"' : 'href="/pembayaran/' . $r['id_order'] . '" class="btn btn-1"'; ?>>Bayar</a>
                    </div>
                    <div class="col d-grid">
                        <a href="/riwayat/detailRiwayat/<?= $r['id_order']; ?>" class="btn btn-2">Rincian</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php } else { ?>
        <div class="row mb-4 text-center">
            <img src="/Assets/not-found.svg" class="image-keranjang" height="400px" alt="">
            <h1 class="keranjang-alert text-center"><b>Riwayat Kosong</b></h1>
            <p>Silahkan lakukan pemesanan terlebih dahulu</p>
            <div class="d-grid mt-2 mb-4">
                <a href="/login/katalog" class="btn btn-1 px-auto">Ke Katalog</a>
            </div>
        </div>
    <?php } ?>
</div>
<?= $this->endSection(); ?>