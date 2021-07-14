<section class="main-content">
    <div class="row">
        <div class="span12">
            <h4 class="title"><span class="text"><strong>Keranjang</strong></span></h4>
            <?php if ($this->session->userdata('status_home') != 'session_basridahome') : ?>
                <h4>Anda belum login!!!</h4>
            <?php else : ?>
                <?= form_open('keranjang/update', ['id' => 'form_create']) ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Sub-Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0;
                        foreach ($data as $d) {
                            $total = $total +  ($d['harga_produk'] * $d['jumlah_tmp']);
                        ?>
                            <input type="hidden" name="tmp[<?= $d['id_tmp'] ?>][id_tmp]" value="<?= $d['id_tmp'] ?>">
                            <tr>
                                <td><a href="<?= site_url($d['id_produk']) ?>"><img alt="" src="<?= base_url() . $d['image_produk'] ?>"></a></td>
                                <td><?= $d['nama_produk'] ?></td>
                                <td><input type="text" name="tmp[<?= $d['id_tmp'] ?>][jumlah]" placeholder="1" class="input-mini" value="<?= $d['jumlah_tmp'] ?>"></td>
                                <td>Rp <?= count_format($d['harga_produk']) ?></td>
                                <td>Rp <?= count_format($d['harga_produk'] * $d['jumlah_tmp']) ?></td>
                                <td style="color: #eb4800; font-weight: 600;"><a href="<?= site_url('keranjang/destroy/' . $d['id_tmp']) ?>">Hapus</a></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>Total</td>
                            <td><strong>Rp <?= count_format($total) ?></strong></td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <p class="buttons center">
                    <button type="submit" class="btn" id="store" data-loading-text="Loading...">Update</button>
                    <button type="button" class="btn" onclick="location.href='<?= site_url() ?>'">Continue</button>
                    <button type="button" class="btn btn-inverse" onclick="location.href='<?= site_url('checkout') ?>'">Checkout</button>
                </p>
                <?= form_close() ?>
            <?php endif ?>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#form_create').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                cache: false,
                beforeSend: function() {
                    $('#store').button('loading');
                },
                success: function(resp) {
                    if (resp.status == "0100") {
                        Swal.fire({
                            title: 'Sukses!',
                            text: resp.pesan,
                            type: 'success'
                        }).then(okay => {
                            if (okay) {
                                window.location.href = BASE_URL + 'keranjang';
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Gagal!',
                            text: resp.pesan,
                            type: 'error'
                        }).then(okay => {
                            if (okay) {
                                window.location.href = BASE_URL + 'keranjang';
                            }
                        });
                    }
                },
                complete: function() {
                    $('#store').button('reset');
                }
            })
        });
    });
</script>