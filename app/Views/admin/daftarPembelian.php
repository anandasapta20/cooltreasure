<?= $this->extend('/layout/base_admin'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row">
        <div class="col">
            <div class="header text-center mb-4">Daftar Pemesanan</div>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-2 text-center">
            <h1 class="m-0 counter-pemesanan"><b><?= $hariIni; ?></b></h1>
            <p class="m-0">Pesanan</p>
            <h3>Hari Ini</h3>
        </div>
        <div class="col-2 text-center">
            <h1 class="m-0 counter-pemesanan"><b><?= $bulanIni; ?></b></h1>
            <p class="m-0">Pesanan</p>
            <h3>Bulan Ini</h3>
        </div>
        <div class="col-auto text-center">
            <h1 class="m-0 counter-pemesanan"><b><?= $belumDiproses; ?></b></h1>
            <p class="m-0">Pesanan</p>
            <h3>Belum Diproses</h3>
        </div>
        <div class="col-2 text-center">
            <h1 class="m-0 counter-pemesanan"><b><?= $totalPesanan; ?></b></h1>
            <p class="m-0">Pesanan</p>
            <h3>Total</h3>
        </div>
    </div>

    <div class="text-center mb-2">
        <a href="<?php echo base_url('PdfController/htmlToPDF') ?>" class="btn btn-1">
            Download PDF <img src="/Assets/icon/download.svg" alt="">
        </a>
    </div>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr class="table-head">
                        <th scope="col">No.</th>
                        <th scope="col">Nama Pemesan</th>
                        <th scope="col">Pemesanan Jaket</th>
                        <th scope="col">Metode Pembayaran</th>
                        <th scope="col">Metode Pengiriman</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal Pemesanan</th>
                        <th scope="col">Total</th>
                        <th scope="col">Foto Bukti</th>
                        <th scope="col">Nomor Resi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $i = 1; ?>
                    <?php foreach ($pembelian as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td>
                                <?= $p['nama_lengkap']; ?>
                                <!-- Trigger Modal -->
                                <div>
                                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#alamat<?= $p['id_order']; ?>">
                                        Alamat
                                    </button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="alamat<?= $p['id_order']; ?>" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content px-4 py-4">
                                            <div class="mb-4">
                                                <h1 class="text-center judul-modal" id="exampleModalLabel">Alamat Pengiriman <?= $p['nama_lengkap']; ?></h1>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="mb-0">Alamat</p>
                                                    <h4 class="mb-0"><?= $p['alamat']; ?></h4>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col">
                                                    <p class="mb-0">RT/RW</p>
                                                    <h4 class="mb-0"><?= $p['rt_rw']; ?></h4>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-0">Kelurahan/Desa</p>
                                                    <h4 class="mb-0"><?= $p['kelurahan_desa']; ?></h4>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col">
                                                    <p class="mb-0">Kecamatan</p>
                                                    <h4 class="mb-0"><?= $p['kecamatan']; ?></h4>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-0">Kabupaten/Kota</p>
                                                    <h4 class="mb-0"><?= $p['kabupaten_kota']; ?></h4>
                                                </div>
                                            </div>
                                            <div class="row my-4">
                                                <div class="col">
                                                    <p class="mb-0">Provinsi</p>
                                                    <h4 class="mb-0"><?= $p['provinsi']; ?></h4>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-0">Kode Pos</p>
                                                    <h4 class="mb-0"><?= $p['kode_pos']; ?></h4>
                                                </div>
                                            </div>
                                            <div class="d-grid">
                                                <button type="button" data-bs-dismiss="modal" class="btn btn-2 d-block">Kembali</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><?= $p['nama_jaket']; ?></td>
                            <td><?= $p['nama_bank_wallet']; ?></td>
                            <td><?= $p['ekspedisi']; ?></td>
                            <td>
                                <div class="
                                <?= ($p['status_pembayaran'] == 'Menunggu Pembayaran') ? 'btn btn-kuning' : ''; ?>
                                <?= ($p['status_pembayaran'] == 'Menunggu Konfirmasi Admin') ? 'btn btn-kuning' : ''; ?>
                                <?= ($p['status_pembayaran'] == 'Barang Sedang Diproses') ? 'btn btn-hijau' : ''; ?>
                                <?= ($p['status_pembayaran'] == 'Gagal') ? 'btn btn-merah' : ''; ?>
                                <?= ($p['status_pembayaran'] == 'Batal') ? 'btn btn-merah' : ''; ?>
                                <?= ($p['status_pembayaran'] == 'Barang Dikirim') ? 'btn btn-hijau' : ''; ?>
                                ">
                                    <b class="status-bayar"><?= $p['status_pembayaran']; ?></b>
                                </div>
                            </td>
                            <td><?= $p['tanggal_pembelian']; ?></td>
                            <td>Rp <?= $p['harga'] + $p['ongkos_kirim']; ?></td>
                            <td>
                                <?php
                                if (empty($p['foto_bukti'])) {
                                    echo '-';
                                } else {
                                    echo '<img src="/Assets/fotobukti/' . $p['foto_bukti'] . '" width="100px" alt="foto bukti">';
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if (empty($p['no_resi'])) {
                                    echo '-';
                                } else {
                                    echo $p['no_resi'];
                                }
                                ?>
                            </td>
                            <td>
                                <!-- Trigger Modal Terima -->
                                <div>
                                    <button type="button" <?= ($p['status_terima'] == true || $p['status_tolak'] == true) ? 'class="btn btn-disable mb-2"' : 'class="btn btn-success mb-2"'; ?> data-bs-toggle="modal" data-bs-target="#terima<?= $p['id_order']; ?>">
                                        Terima
                                    </button>
                                </div>
                                <!-- Modal Terima -->
                                <div class="modal fade" id="terima<?= $p['id_order']; ?>" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content px-4 py-4">
                                            <div class="mb-4">
                                                <h1 class="text-center judul-modal-confirmation" id="exampleModalLabel">Apakah anda yakin akan <b class="terima">menerima</b> pemesanan <?= $p['nama_lengkap']; ?> ?</h1>
                                            </div>
                                            <div class="mb-4">
                                                <p class="mb-0">Bukti Pembayaran</p>
                                                <img src="/Assets/fotobukti/<?= $p['foto_bukti']; ?>" width="400px" alt="" class="rounded">
                                            </div>
                                            <div class="container">
                                                <div class="row gap-2">
                                                    <a href="/admin/daftarPembelian/terima/<?= $p['id_order']; ?>" class="btn btn-1 d-block col">Ya</a>
                                                    <button type="button" data-bs-dismiss="modal" class="btn btn-2 d-block col">Tidak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#resi<?= $p['id_order']; ?>">
                                        <?= (empty($p['no_resi'])) ? 'Kirim' : 'Edit Resi'; ?>
                                    </button>
                                </div>
                                <!-- Modal Resi -->
                                <div class="modal fade" id="resi<?= $p['id_order']; ?>" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content px-4 py-4">
                                            <div class="mb-4">
                                                <h1 class="text-center judul-modal" id="exampleModalLabel">Tambah Nomor Resi</h1>
                                            </div>
                                            <form action="/admin/daftarPembelian/kirim/<?= $p['id_order']; ?>" method="post">
                                                <div class="modal-body py-0 px-0 mb-4">
                                                    <div class="mb-4">
                                                        <p class="mb-0">Nama Pemesan</p>
                                                        <h4 class="mb-0"><?= $p['nama_lengkap']; ?></h4>
                                                    </div>
                                                    <div class="card mb-4">
                                                        <div class="card-body p-3 d-flex justify-content-between">
                                                            <div>
                                                                <img src="/Assets/fotojaket/<?= $p['foto_jaket']; ?>" class="rounded" width="120px" alt="">
                                                            </div>
                                                            <div class="detail-keranjang my-auto ms-4">
                                                                <h2 class="nama-jaket-detail-modal"><b><?= $p['nama_jaket']; ?></b></h2>
                                                                <h2 class="harga-jaket-detail-modal"><b>Rp <?= $p['harga']; ?></b></h2>
                                                                <div class="btn btn-2"><?= $p['ukuran']; ?></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <label for="no_resi" class="form-label">Nomor Resi</label>
                                                    <input type="text" class="form-control" id="no_resi" name="no_resi" value="<?= $p['no_resi']; ?>">
                                                </div>
                                                <div class="d-grid gap-2">
                                                    <button type="submit" class="btn btn-1 d-block">Simpan</button>
                                                    <button type="button" data-bs-dismiss="modal" class="btn btn-2 d-block">Kembali</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Trigger Modal Tolak -->
                                <div>
                                    <button type="button" <?= ($p['status_terima'] == true || $p['status_tolak'] == true) ? 'class="btn btn-disable mb-2"' : 'class="btn btn-danger mb-2"'; ?> data-bs-toggle="modal" data-bs-target="#tolak<?= $p['id_order']; ?>">
                                        Tolak
                                    </button>
                                </div>
                                <!-- Modal Tolak -->
                                <div class="modal fade" id="tolak<?= $p['id_order']; ?>" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content px-4 py-4">
                                            <div class="mb-4">
                                                <h1 class="text-center judul-modal-confirmation" id="exampleModalLabel">Apakah anda yakin akan <b class="tolak">menolak</b> pemesanan <?= $p['nama_lengkap']; ?> ?</h1>
                                            </div>
                                            <div class="mb-4">
                                                <p class="mb-0">Bukti Pembayaran</p>
                                                <img src="/Assets/fotobukti/<?= $p['foto_bukti']; ?>" width="400px" alt="" class="rounded">
                                            </div>
                                            <div class="container">
                                                <div class="row gap-2">
                                                    <a href="/admin/daftarPembelian/tolak/<?= $p['id_order']; ?>" class="btn btn-1 d-block col">Ya</a>
                                                    <button type="button" data-bs-dismiss="modal" class="btn btn-2 d-block col">Tidak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>