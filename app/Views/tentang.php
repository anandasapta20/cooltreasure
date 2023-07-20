<?= $this->extend('layout/base_guest'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="header text-center mb-4">Cooltreasure.id</div>
    <img class="image-tentang mx-auto d-block" src="/Assets/logo_tentang.png" alt="">
    <p class="text-center" style="font-size: 24px; width:710px; margin: auto;"> <b>Cooltreasure.id</b> merupakan <i>online shop</i> yang menyediakan produk jaket <i>casual</i>, <i>vintage</i>, dan <i>street wear</i> sejak tahun 2020.
        Cocok untuk semua kalangan, kawula muda hingga tua.
        Produk bagus dan cakep hanya ada di <b>Cooltreasure.id</b>!
    </p>
</div>

<div class="container my-5">
    <div class="header text-center mb-4">Petunjuk Order</div>
    <div class="step-order mx-auto">
        1. Masuk ke halaman katalog
    </div>
    <div class="step-order mx-auto">
        2. Pilih jaket yang ingin anda beli
        (Anda dapat melakukan filter katalog berdasarkan jenis dan harga)
    </div>
    <div class="step-order mx-auto">
        3. Cek kondisi jaket, jika sesuai anda dapat langsung melanjutkan kepemesanan atau masukkan ke keranjang terlebih dahulu
    </div>
    <div class="step-order mx-auto">
        4. Lakukan pengisian formulir pengiriman, metode pembayaran, dan metode pengiriman pada halaman pemesanan
    </div>
    <div class="step-order mx-auto">
        5. Lakukan pembayaran sebelum batas akhir pembayaran kepada nomor rekening sesuai total biaya yang tertera
    </div>
    <div class="step-order mx-auto">
        6. Upload bukti pembayaran pada halaman formulir pembayaran, lalu simpan
    </div>
    <div class="step-order mx-auto">
        7. Tunggu konfirmasi admin untuk pembayaran yang telah dilakukan dan barang akan segera dikirimkan
    </div>
</div>

<div class="container kontak my-5 py-4">
    <div class="header text-center mb-4">Kontak Kami</div>

    <div class="row">
        <div class="col text-center">
            <a href="https://wa.me/6281220102595" class="link-ig">
                <img src="/Assets/whatsapp.png" class="mx-auto" alt="">
                <p class="mt-2">+62 812-2010-2595</p>
            </a>
        </div>
        <div class="col text-center">
            <a href="https://www.instagram.com/cooltreasure.id/" class="link-ig">
                <img src="/Assets/instagram.png" class="mx-auto" alt="">
                <p class="mt-2">@cooltreasure.id</p>
            </a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>