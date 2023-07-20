<?= $this->extend('layout/base_guest'); ?>

<?= $this->section('content'); ?>
<div class="search-bar container p-0 my-4">
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Cari jaket" aria-label="Search">
        <button class="btn btn-1 btn-outline" type="submit"><img src="/Assets/search.svg" alt=""></button>
    </form>
</div>

<div class="container">
    <div class="row">
        <div class="col-3 border border-1 rounded filter">
            <div class="filter-section">
                <div class="filter-title mt-0 mb-2"><b>Jenis Jaket</b></div>
                <div class="form-check radio">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Hoodie
                    </label>
                </div>
                <div class="form-check radio">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Bomber
                    </label>
                </div>
                <div class="form-check radio">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Harrington
                    </label>
                </div>
                <div class="form-check radio">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Varsity
                    </label>
                </div>
                <div class="form-check radio">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Sport
                    </label>
                </div>
            </div>

            <div class="filter-section mt-4">
                <div class="filter-title mt-0 mb-2"><b>Harga</b></div>
                <div class="form-check radio">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        < Rp 50.000 </label>
                </div>
                <div class="form-check radio">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Rp 50.000 - 100.000
                    </label>
                </div>
                <div class="form-check radio">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        > Rp 100.000
                    </label>
                </div>
            </div>

            <div class="d-grid mt-4">
                <button class="btn btn-1"><img src="/Assets/icon/filter.svg" class="me-2" alt="">Terapkan Filter</button>
            </div>
        </div>

        <div class="col pe-0 ps-4">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($jaket as $j) : ?>
                    <div class="col">
                        <div class="card h-100 text-center">
                            <a href="/detailJaket/<?= $j['id_jaket']; ?>"><img src="/Assets/fotojaket/<?= $j['foto_jaket']; ?>" class="rounded mx-auto my-3 d-block" width="290" alt="foto jaket"></a>
                            <div class="card-body pt-0">
                                <a href="/detailJaket/<?= $j['id_jaket']; ?>" class="card-detail">
                                    <h5 class="card-title"><b><?= $j['nama_jaket']; ?></b></h5>
                                    <p class="card-text mb-2"><?= $j['ukuran']; ?></p>
                                    <a href="/detailJaket/<?= $j['id_jaket']; ?>" class="btn btn-2 card-harga">Rp <?= $j['harga']; ?></a>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>