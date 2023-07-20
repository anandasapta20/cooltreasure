<?= $this->extend('layout/base_admin'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row">
        <div class="col">
            <a href="/admin/daftarJaket/tambahJaket"><button class="btn btn-1" type="button">Tambah Jaket <img src="/Assets/icon/add.png" width="24px" alt="add"></button></a>
        </div>
        <div class="col">
            <div class="header text-center mb-4">Daftar Jaket</div>
        </div>
        <div class="col"></div>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Jaket</th>
                        <th scope="col">Ukuran</th>
                        <th scope="col">Kondisi</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $i = 1; ?>
                    <?php foreach ($jaket as $j) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $j['nama_jaket']; ?></td>
                            <td><?= $j['ukuran']; ?></td>
                            <td><?= $j['kondisi']; ?></td>
                            <td>Rp <?= $j['harga']; ?></td>
                            <td><?= $j['jenis']; ?></td>
                            <td><img src="/Assets/fotojaket/<?= $j['foto_jaket']; ?>" class="data-foto-jaket rounded" alt="jaket"></td>
                            <td>
                                <a href="/admin/daftarJaket/ubahJaket/<?= $j['id_jaket']; ?>" class="btn btn-warning mb-2">Ubah</a>
                                <!-- Trigger Modal Hapus -->
                                <div>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $j['id_jaket']; ?>">
                                        Hapus
                                    </button>
                                </div>
                                <!-- Modal Hapus -->
                                <div class="modal fade" id="hapus<?= $j['id_jaket']; ?>" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content px-4 py-4">
                                            <div class="mb-4">
                                                <h1 class="text-center judul-modal-confirmation" id="exampleModalLabel">Apakah anda yakin akan <b class="tolak">menghapus</b> jaket <b><?= $j['nama_jaket']; ?></b> ?</h1>
                                            </div>
                                            <div class="mb-4">
                                                <p class="mb-0">Foto Jaket</p>
                                                <img src="/Assets/fotojaket/<?= $j['foto_jaket']; ?>" width="400px" alt="" class="rounded">
                                            </div>
                                            <div class="container">
                                                <div class="row gap-2">
                                                    <a href="/admin/daftarJaket/delete/<?= $j['id_jaket']; ?>" class="btn btn-1 d-block col">Ya</a>
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