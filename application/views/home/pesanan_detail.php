<section class="main-content">
    <div class="row">
        <div class="span12">
            <h4 class="title"><span class="text"><strong>Detail Pemesanan</strong></span></h4>
            <table class="table">
                <tr>
                    <th style="width: 40%;">Tanggal Acara</th>
                    <td><?= format_biasa($data['mulai']) . ' s/d ' . format_biasa($data['selesai']) ?></td>
                </tr>
                <tr>
                    <th>
                        Lokasi Acara
                        <div id="lokasi" style="font-weight: 400;"></div>
                    </th>
                    <td><?= $data['lokasi'] ?></td>
                </tr>
            </table>
            <table class="table" style="margin-bottom: 10px">
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th style="text-align: right;">Total Harga</th>
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
                <tr>
                    <td colspan="4">Pembayaran harap ditransfer ke rekening:
                        <ul>
                            <?php foreach ($rekening as $r) { ?>
                                <li>
                                    <?= 'Bank ' . $r['nama_bank'] . ' Norek: ' . $r['nomor_rekening'] . ' Pemilik: ' . $r['atasnama_rekening'] ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </td>
                </tr>
            </table>
            <p class="buttons center">
                <button type="submit" class="btn" id="cancel" data-loading-text="Loading..." onclick="cancel('<?= $data['id'] ?>')">&#9746; Batalkan Pesanan</button>
                <button type="button" class="btn" onclick="location.href='<?= site_url('pesanan/konfirmasi/' . $data['id']) ?>'">Konfirmasi Pembayaran</button>
                <button type="button" class="btn" onclick="location.href='<?= site_url('pesanan/cetak/' . $data['id']) ?>'">Cetak Invoice</button>
                <button type="button" class="btn btn-inverse" onclick="location.href='<?= site_url('pesanan') ?>'">Lihat Data Pesanan Anda &raquo;</button>
            </p>
        </div>
    </div>
</section>
<script>
    function cancel(kode) {
        $.ajax({
            url: "<?= site_url('pesanan/cancel') ?>",
            type: "GET",
            dataType: 'json',
            data: {
                kode: kode
            },
            beforeSend: function() {
                $('#cancel').button('loading');
            },
            success: function(resp) {
                if (resp.status == "0100") {
                    Swal.fire({
                        title: 'Sukses!',
                        text: resp.pesan,
                        type: 'success'
                    }).then(okay => {
                        if (okay) {
                            window.location.href = BASE_URL + 'pesanan';
                        }
                    });
                }
            },
            complete: function() {
                $('#cancel').button('reset');
            }
        });
    }
</script>