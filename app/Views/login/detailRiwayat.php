<?= $this->extend('layout/base_user'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-8 rounded border py-4 px-5">
            <div class="row">
                <div class="col">
                    <div class="header text-center mb-4">Rincian Pemesanan</div>
                </div>
            </div>

            <div class="card-body py-0 mb-3">
                <div class="card">
                    <div class="card-body p-3 d-flex justify-content-between">
                        <div>
                            <img src="/Assets/fotojaket/<?= $dataRiwayat['foto_jaket']; ?>" class="rounded" width="140px" alt="">
                        </div>
                        <div class="detail-keranjang my-auto mx-4">
                            <h2 class="detail-riwayat-jaket"><b><?= $dataRiwayat['nama_jaket']; ?></b></h2>
                            <h2 class="detail-riwayat-harga"><b>Rp <?= $dataRiwayat['harga']; ?></b></h2>
                            <div class="btn btn-2"><?= $dataRiwayat['ukuran']; ?></div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-3" data-bs-toggle="modal" data-bs-target="#info<?= $dataRiwayat['id_jaket']; ?>"><img src="/Assets/icon/info.svg" alt="" width="28px"></button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="info<?= $dataRiwayat['id_jaket']; ?>" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content px-4 py-4">
                                    <div class="mb-4">
                                        <h1 class="text-center judul-modal" id="exampleModalLabel">Data Jaket</h1>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p class="mb-0">Nama Jaket</p>
                                            <h4 class="mb-0"><?= $dataRiwayat['nama_jaket']; ?></h4>
                                        </div>
                                        <div class="col">
                                            <p class="mb-0">Ukuran</p>
                                            <h4 class="mb-0"><?= $dataRiwayat['ukuran']; ?></h4>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <p class="mb-0">Kondisi</p>
                                            <h4 class="mb-0"><?= $dataRiwayat['kondisi']; ?></h4>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <p class="mb-0">Harga</p>
                                            <h4 class="mb-0">Rp <?= $dataRiwayat['harga']; ?></h4>
                                        </div>
                                        <div class="col">
                                            <p class="mb-0">Jenis</p>
                                            <h4 class="mb-0"><?= $dataRiwayat['jenis']; ?></h4>
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col">
                                            <p class="mb-0">Foto Jaket</p>
                                            <img src="/Assets/fotojaket/<?= $dataRiwayat['foto_jaket']; ?>" class="rounded" width="160px" alt="">
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

            <div class="row">
                <div class="col">
                    <p class="mb-0">Status</p>
                    <div class="
                        <?= ($dataRiwayat['status_pembayaran'] == 'Menunggu Pembayaran') ? 'btn btn-kuning' : ''; ?>
                        <?= ($dataRiwayat['status_pembayaran'] == 'Menunggu Konfirmasi Admin') ? 'btn btn-hijau' : ''; ?>
                        <?= ($dataRiwayat['status_pembayaran'] == 'Gagal') ? 'btn btn-merah' : ''; ?>
                        <?= ($dataRiwayat['status_pembayaran'] == 'Batal') ? 'btn btn-merah' : ''; ?>
                        <?= ($dataRiwayat['status_pembayaran'] == 'Barang Dikirim') ? 'btn btn-hijau' : ''; ?>
                        <?= ($dataRiwayat['status_pembayaran'] == 'Barang Sedang Diproses') ? 'btn btn-hijau' : ''; ?>
                        "><?= $dataRiwayat['status_pembayaran']; ?></div>
                </div>
                <div class="col">
                    <p class="mb-0">Nomor Resi</p>
                    <h4 class="mb-0">
                        <?php
                        if (empty($dataRiwayat['no_resi'])) {
                            echo '-';
                        } else {
                            echo $dataRiwayat['no_resi'];
                        }
                        ?></h4>
                </div>
            </div>
            <div class="row my-4">
                <div class="col">
                    <p class="mb-0">Nama Lengkap</p>
                    <h4 class="mb-0"><?= $dataRiwayat['nama_lengkap']; ?></h4>
                </div>
            </div>
            <div class="row my-4">
                <div class="col">
                    <p class="mb-0">Alamat</p>
                    <h4 class="mb-0"><?= $dataRiwayat['alamat']; ?></h4>
                </div>
            </div>
            <div class="row my-4">
                <div class="col">
                    <p class="mb-0">RT/RW</p>
                    <h4 class="mb-0"><?= $dataRiwayat['rt_rw']; ?></h4>
                </div>
                <div class="col">
                    <p class="mb-0">Kelurahan/Desa</p>
                    <h4 class="mb-0"><?= $dataRiwayat['kelurahan_desa']; ?></h4>
                </div>
            </div>
            <div class="row my-4">
                <div class="col">
                    <p class="mb-0">Kecamatan</p>
                    <h4 class="mb-0"><?= $dataRiwayat['kecamatan']; ?></h4>
                </div>
                <div class="col">
                    <p class="mb-0">Kabupaten/Kota</p>
                    <h4 class="mb-0"><?= $dataRiwayat['kabupaten_kota']; ?></h4>
                </div>
            </div>
            <div class="row my-4">
                <div class="col">
                    <p class="mb-0">Provinsi</p>
                    <h4 class="mb-0"><?= $dataRiwayat['provinsi']; ?></h4>
                </div>
                <div class="col">
                    <p class="mb-0">Kode Pos</p>
                    <h4 class="mb-0"><?= $dataRiwayat['kode_pos']; ?></h4>
                </div>
            </div>
            <div class="row my-4">
                <div class="col">
                    <p class="mb-0">Metode Pengiriman</p>
                    <h4 class="mb-0"><?= $dataRiwayat['ekspedisi']; ?></h4>
                </div>
                <div class="col">
                    <p class="mb-0">Tanggal Pembelian</p>
                    <h4 class="mb-0"><?= $dataRiwayat['tanggal_pembelian']; ?></h4>
                </div>
            </div>

            <div class="row my-4">
                <div class="col">
                    <p class="mb-0">Metode Pembayaran</p>
                    <h4 class="mb-0"><?= $dataRiwayat['nama_bank_wallet']; ?></h4>
                </div>
                <div class="col">
                    <p class="mb-0">Nomor HP/Rekening Tujuan</p>
                    <h4 class="mb-0"><?= $dataRiwayat['norek_nohp']; ?></h4>
                </div>
            </div>
            <div class="row my-4">
                <div class="col">
                    <p class="mb-0">Total Pembayaran</p>
                    <h4 class="total mb-0"><b>Rp <?= $dataRiwayat['harga'] + $dataRiwayat['ongkos_kirim']; ?></b></h4>
                </div>
            </div>
            <div class="row my-4">
                <div class="col">
                    <p class="mb-0">Bukti Pembayaran</p>
                    <?php
                    if (empty($dataRiwayat['foto_bukti'])) {
                        echo '-';
                    } else {
                        echo '<img src="/Assets/fotobukti/' . $dataRiwayat['foto_bukti'] . '" width="100px" alt="">';
                    }
                    ?>
                </div>
            </div>

            <div class="d-grid gap-2 mt-5">
                <a <?= ($dataRiwayat['status_ulasan'] == true || $dataRiwayat['status_bayar'] == false || $dataRiwayat['status_tolak'] == true || empty($dataRiwayat['no_resi']) || $dataRiwayat['status_pembayaran'] == 'Gagal') ? 'class="btn btn-disable"' : 'href="/riwayat/detailRiwayat/ulasan/' . $dataRiwayat['id_order'] . '" class="btn btn-1"'; ?>>Berikan Ulasan</a>
                <a href="/riwayat" class="btn btn-2">Kembali</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>