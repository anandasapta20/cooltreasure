<?= $this->extend('layout/base_admin'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row">
        <div class="col">
            <div class="header text-center mb-4">Daftar Pengguna</div>
        </div>
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
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nomor Handphone</th>
                        <th scope="col">Data Alamat</th>
                        <th scope="col">Foto Profil</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $i = 1; ?>
                    <?php foreach ($user as $j) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $j['nama_lengkap']; ?></td>
                            <td><?= $j['email']; ?></td>
                            <td><?= $j['no_hp']; ?></td>
                            <td>
                                <!-- Trigger Modal -->
                                <div>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#alamat<?= $j['id_user']; ?>">
                                        Detail
                                    </button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="alamat<?= $j['id_user']; ?>" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content px-4 py-4">
                                            <div class="mb-4">
                                                <h1 class="text-center judul-modal" id="exampleModalLabel">Data Alamat <?= $j['nama_lengkap']; ?></h1>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="mb-0">Alamat</p>
                                                    <h4 class="mb-0"><?= $j['alamat']; ?></h4>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col">
                                                    <p class="mb-0">RT/RW</p>
                                                    <h4 class="mb-0"><?= $j['rt_rw']; ?></h4>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-0">Kelurahan/Desa</p>
                                                    <h4 class="mb-0"><?= $j['kelurahan_desa']; ?></h4>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col">
                                                    <p class="mb-0">Kecamatan</p>
                                                    <h4 class="mb-0"><?= $j['kecamatan']; ?></h4>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-0">Kabupaten/Kota</p>
                                                    <h4 class="mb-0"><?= $j['kabupaten_kota']; ?></h4>
                                                </div>
                                            </div>
                                            <div class="row my-4">
                                                <div class="col">
                                                    <p class="mb-0">Provinsi</p>
                                                    <h4 class="mb-0"><?= $j['provinsi']; ?></h4>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-0">Kode Pos</p>
                                                    <h4 class="mb-0"><?= $j['kode_pos']; ?></h4>
                                                </div>
                                            </div>
                                            <div class="d-grid">
                                                <button type="button" data-bs-dismiss="modal" class="btn btn-2 d-block">Kembali</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><img src="/Assets/fotoprofil/<?= $j['foto_profil']; ?>" class="foto-profil-admin" alt="user"></td>
                            <td>
                                <!-- Trigger Modal Hapus -->
                                <div>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $j['id_user']; ?>">
                                        Hapus
                                    </button>
                                </div>
                                <!-- Modal Hapus -->
                                <div class="modal fade" id="hapus<?= $j['id_user']; ?>" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content px-4 py-4">
                                            <div class="mb-4">
                                                <h1 class="text-center judul-modal-confirmation" id="exampleModalLabel">Apakah anda yakin akan <b class="tolak">menghapus</b> pengguna berikut?</h1>
                                            </div>
                                            <div class="mb-4">
                                                <p class="mb-0">Nama Lengkap</p>
                                                <h4 class="mb-0"><?= $j['nama_lengkap']; ?></h4>
                                            </div>
                                            <div class="mb-4">
                                                <p class="mb-0">Email</p>
                                                <h4 class="mb-0"><?= $j['email']; ?></h4>
                                            </div>
                                            <div class="container">
                                                <div class="row gap-2">
                                                    <a href="/admin/daftarPengguna/delete/<?= $j['id_user']; ?>" class="btn btn-1 d-block col">Ya</a>
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