<?php $kategori = $this->db->where('id_kategori', $data['kategori_produk'])->get('kategori')->row(); ?>
<section class="header_text sub">
    <h4><span>Detail Produk</span></h4>
</section>
<section class="main-content">
    <div class="row">
        <div class="span9">
            <div class="row">
                <div class="span4">
                    <a href="<?= base_url() . $data['image_produk'] ?>" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="<?= base_url() . $data['image_produk'] ?>"></a><br>
                </div>
                <div class="span5">
                    <address>
                        <strong>Produk:</strong> <span><?= $data['nama_produk'] ?></span><br>
                        <strong>Kategori:</strong> <span><?= $kategori->nama_kategori ?></span><br>
                    </address>
                    <h4><strong>Harga: Rp <?= count_format($data['harga_produk']) ?></strong></h4>
                </div>
                <div class="span5">
                    <?= form_open('keranjang/store', ['id' => 'form_create'], ['id_produk' => $data['id_produk']]) ?>
                    <label>Qty:</label>
                    <input type="text" name="jumlah" class="span1" placeholder="1" value="1">
                    <button type="submit" class="btn btn-inverse" id="store" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Loading...">Tambah ke Keranjang</button>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="row">
                <div class="span9">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#home">Deskripsi</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home"><?= $data['desc_produk'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $('#form_create').on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData($("#form_create")[0]);
        $.ajax({
            url: $("#form_create").attr('action'),
            dataType: 'json',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#store').button('loading');
            },
            success: function(resp) {
                if (resp.status == "0100") {
                    Swal.fire({
                        title: 'Sukses!!!',
                        text: resp.pesan,
                        type: 'success'
                    }).then(okay => {
                        if (okay) {
                            window.location.href = BASE_URL + 'keranjang';
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Oops...',
                        text: resp.pesan,
                        type: 'error'
                    }).then(okay => {
                        if (okay) {
                            window.location.href = BASE_URL + 'auth';
                        }
                    });
                    // Swal.fire('Oops...', resp.pesan, 'error');
                }
            },
            complete: function() {
                $('#store').button('reset');
            }
        })
    });
</script>