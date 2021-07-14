<?php $urls = $this->uri->segment(1) ?>
<section class="main-content">
    <div class="row">
        <div class="span3 col">
            <div class="block">
                <ul class="nav nav-list">
                    <li class="nav-header">Navigation</li>
                    <li class="<?= $urls == 'pesanan' ? 'active' : '' ?>"><a href="<?= site_url('pesanan') ?>">Pesanan</a></li>
                    <li class="<?= $urls == 'pembayaran' ? 'active' : '' ?>"><a href="<?= site_url('pembayaran') ?>">Pembayaran</a></li>
                    <li><a href="<?= site_url('auth/logout') ?>">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="span9">
            <h4 class="title"><span class="text"><strong>Pesanan</strong> Anda</span></h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No Pesanan</th>
                        <th>Tanggal Transfer</th>
                        <th>Bank Pengirim</th>
                        <th>Pengirim</th>
                        <th>Norek</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $d) { ?>
                        <tr>
                            <td><?= $d['id_pesan'] ?></td>
                            <td><?= format_biasa($d['tanggal_transfer']) ?></td>
                            <td><?= $d['nama_bank'] ?></td>
                            <td><?= $d['atasnama_rekening'] ?></td>
                            <td><?= $d['nomor_rekening'] ?></td>
                            <td>Rp <?= rupiah($d['jumlah_konfirmasi']) ?></td>
                            <td><?= $d['status_konfirmasi'] == 0 ? 'Pending' : ($d['status_konfirmasi'] == 1 ? 'Diterima' : 'Batal') ?></td>
                            <td>
                                <a href="<?= assets() . $d['bukti_transfer'] ?>" target="_blank">Bukti</a>&nbsp;&nbsp;|&nbsp;
                                <a href="javascript:void(0)" onclick="cancel('<?= $d['id_konfirmasi'] ?>')">Batal</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script>
    function cancel(kode) {
        $.ajax({
            url: "<?= site_url('pembayaran/batal') ?>",
            type: "GET",
            dataType: 'json',
            data: {
                kode: kode
            },
            success: function(resp) {
                if (resp.status == "0100") {
                    Swal.fire({
                        title: 'Sukses!',
                        text: resp.pesan,
                        type: 'success'
                    }).then(okay => {
                        if (okay) {
                            window.location.href = BASE_URL + 'pembayaran';
                        }
                    });
                }
            }
        });
    }
</script>