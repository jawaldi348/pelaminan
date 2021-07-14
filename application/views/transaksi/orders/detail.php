<table class="table">
    <tr>
        <th>Pelanggan</th>
        <td colspan="3"><?= $data['nama'] ?></td>
    </tr>
    <tr>
        <th>Tanggal Acara</th>
        <td colspan="3"><?= format_biasa($data['mulai']) . ' s/d ' . format_biasa($data['selesai']) ?></td>
    </tr>
    <tr>
        <th>Lokasi Acara</th>
        <td colspan="3"><?= $data['lokasi'] ?></td>
    </tr>
    <tr>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th class="right">Total Harga</th>
    </tr>
    <?php $total = 0;
    foreach ($data['dataProduk'] as $d) {
        $total = $total + ($d['harga'] * $d['jumlah']);
    ?>
        <tr>
            <td><?= $d['produk'] ?></td>
            <td><?= rupiah($d['harga']) ?></td>
            <td><?= count_format($d['jumlah']) ?></td>
            <td style="text-align: right;">Rp <?= rupiah($d['harga'] * $d['jumlah']) ?></td>
        </tr>
    <?php } ?>
    <tr>
        <th>Grand Total</th>
        <td></td>
        <td></td>
        <th style="text-align: right;"><strong>Rp <?= rupiah($total) ?></strong></th>
    </tr>
    <tr>
        <th><?= $data['metode'] == 1 ? 'Bayar DP' : 'Bayar Lunas' ?></th>
        <td></td>
        <td></td>
        <th style="text-align: right;"><strong>Rp <?= $data['metode'] == 1 ? rupiah(25 * $total / 100) : rupiah($total) ?></strong></th>
    </tr>
</table>