<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Codeigniter 4 PDF Example - positronx.io</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Rekap Penjualan Jaket Cooltreasure.id Per <?= $tanggal; ?></h2>
        <div class="d-flex flex-row-reverse bd-highlight">
        </div>
        <table class="">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pemesan</th>
                    <th>Pemesanan Jaket</th>
                    <th>Metode Pembayaran</th>
                    <th>Metode Pengiriman</th>
                    <th>Status</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Total</th>
                    <th>Nomor Resi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($pembelian as $p) : ?>
                    <tr>
                        <th><?= $i++; ?></th>
                        <td><?= $p['nama_lengkap']; ?></td>
                        <td><?= $p['nama_jaket']; ?></td>
                        <td><?= $p['nama_bank_wallet']; ?></td>
                        <td><?= $p['ekspedisi']; ?></td>
                        <td><?= $p['status_pembayaran']; ?></td>
                        <td><?= $p['tanggal_pembelian']; ?></td>
                        <td>Rp <?= $p['harga'] + $p['ongkos_kirim']; ?></td>
                        <td>
                            <?php
                            if (empty($p['no_resi'])) {
                                echo '-';
                            } else {
                                echo $p['no_resi'];
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>