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
                        <th>Tanggal Pesan</th>
                        <th>Tanggal Acara</th>
                        <th>Total Bayar</th>
                        <th>Sisa Bayar</th>
                        <th>Status</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $d) { ?>
                        <tr>
                            <td><?= $d['id_pesan'] ?></td>
                            <td><?= format_biasa($d['tgl_pesan']) ?></td>
                            <td><?= format_biasa($d['tgl_mulai']) . ' s/d ' . format_biasa($d['tgl_selesai']) ?></td>
                            <td>Rp <?= rupiah($d['total_bayar']) ?></td>
                            <td>Rp <?= rupiah($d['total_bayar'] - $d['bayar']) ?></td>
                            <td><?= $d['status_pesan'] == 0 ? 'Belum Bayar' : ($d['status_pesan'] == 1 ? 'Sudah Bayar' : 'Dibatalkan') ?></td>
                            <td>
                                <a href="<?= site_url('pesanan/detail/' . $d['id_pesan']) ?>">Detail</a>&nbsp;&nbsp;|&nbsp;
                                <a href="javascript:void(0)" onclick="cancel('<?= $d['id_pesan'] ?>')">Batal</a>
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
            url: "<?= site_url('pesanan/cancel') ?>",
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
                            window.location.href = BASE_URL + 'pesanan';
                        }
                    });
                }
            }
        });
    }
</script>