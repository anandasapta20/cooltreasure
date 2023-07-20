<?= $this->extend('layout/base_guest'); ?>

<?= $this->section('content'); ?>
<div class="container my-4">
    <div class="header text-center mb-4">Semua Ulasan</div>
    <div class="row row-cols-1 row-cols-md-2 g-2">
        <?php foreach ($ulasan as $u) : ?>
            <div class="col">
                <div class="card mb-3 h-100">
                    <div class="card-body p-4">
                        <div class="d-flex">
                            <img src="/Assets/fotoprofil/<?php
                                                            if ($u['anonim'] == true) {
                                                                echo 'default_profil.svg';
                                                            } else {
                                                                echo $u['foto_profil'];
                                                            }
                                                            ?>" width="40px" alt="user photo" class="foto-profil-semua-ulasan">
                            <p class="card-title nama-ulasan my-auto ms-3">
                                <b>
                                    <?php
                                    if ($u['anonim'] == true) {
                                        echo 'Anonim';
                                    } else {
                                        echo $u['nama_lengkap'];
                                    }
                                    ?>
                                </b>
                            </p>
                            <p class="tanggal-ulasan my-auto ms-3"><?= $u['created_at']; ?></p>
                        </div>
                        <p class="card-text mt-3 mb-0"><?= $u['ulasan']; ?></p>
                        <?= (empty($u['foto_ulasan'])) ? '' : '<img src="/Assets/ulasan/' . $u['foto_ulasan'] . '" class="rounded mt-3" width="200px" alt="">' ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?= $this->endSection(); ?>