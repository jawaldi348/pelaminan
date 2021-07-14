<table class="table">
    <tr>
        <th>No Pesan</th>
        <td colspan="3"><?= $data['id_pesan'] ?></td>
    </tr>
    <tr>
        <th>Pelanggan</th>
        <td colspan="3"><?= $data['nama_pelanggan'] ?></td>
    </tr>
    <tr>
        <th>Tanggal Transfer</th>
        <td colspan="3"><?= format_biasa($data['tanggal_transfer']) ?></td>
    </tr>
    <tr>
        <th>Bank Pengirim</th>
        <td colspan="3"><?= $data['nama_bank'] ?></td>
    </tr>
    <tr>
        <th>Pengirim</th>
        <td colspan="3"><?= $data['atasnama_rekening'] ?></td>
    </tr>
    <tr>
        <th>Nomor Rekening</th>
        <td colspan="3"><?= $data['nomor_rekening'] ?></td>
    </tr>
    <tr>
        <th>Jumlah</th>
        <td colspan="3"><?= rupiah($data['jumlah_konfirmasi']) ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td colspan="3"><?= $data['status_konfirmasi'] == 0 ? '<span class="orange">Pending</span>' : ($data['status_konfirmasi'] == 1 ? '<span class="green">Diterima</span>' : '<span class="red">Dibatalkan</span>') ?></td>
    </tr>
    <tr>
        <th>Bukti</th>
        <td colspan="3"><a href="<?= assets() . $data['bukti_transfer'] ?>" target="_blank">Link Bukti Transfer</a></td>
    </tr><?php if ($data['status_konfirmasi'] == 0) { ?>
        <tr>
            <td colspan="2" class="center">
                <button type="button" class="btn btn-success btn-sm" id="store" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Loading..." onclick="approve('<?= $data['id_konfirmasi'] ?>')"><i class="icon-checkmark-circle"></i> Setujui Pembayaran</button>
                <button type="button" class="btn btn-danger btn-sm" id="batal" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Loading..." onclick="batalConfrim('<?= $data['id_konfirmasi'] ?>')"><i class="icon-cancel-square2"></i> Batalkan Pembayaran</button>
            </td>
        </tr>
    <?php } ?>
</table>