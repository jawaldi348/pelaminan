<section class="main-content">
    <div class="row">
        <div class="span12">
            <h4 class="title"><span class="text"><strong>Rincian Pemesanan</strong></span></h4>
            <?= form_open('checkout/store', ['id' => 'form_create']) ?>
            <table class="table">
                <tr>
                    <th style="width: 40%;">Tanggal Acara</th>
                    <td style="text-align: right;">
                        <div class="controls">
                            <input type="date" placeholder="Tanggal Mulai" name="mulai" id="start" class="input-xlarge" value="<?= date('Y-m-d') ?>">
                            <input type="date" placeholder="Tanggal Selesai" name="selesai" id="start" class="input-xlarge" value="<?= date('Y-m-d') ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>
                        Lokasi Acara
                        <div id="lokasi" style="font-weight: 400;"></div>
                    </th>
                    <td style="text-align: right;"><button type="button" class="btn btn-inverse" onclick="editlokasi()">Edit Lokasi</button></td>
                </tr>
                <tr>
                    <td id="produk" colspan="2"></td>
                </tr>
            </table>
            <p class="buttons center">
                <button type="submit" class="btn btn-inverse" id="store">Buat Pesanan</button>
            </p>
            <?= form_close() ?>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        datalokasi();
        dataproduk();
    });

    function datalokasi() {
        $.ajax({
            type: "GET",
            url: '<?= site_url('checkout/datalokasi') ?>',
            success: function(resp) {
                $("#lokasi").html(resp);
            }
        });
    }

    function editlokasi() {
        $.ajax({
            type: "GET",
            url: '<?= site_url('checkout/editlokasi') ?>',
            success: function(resp) {
                $("#lokasi").html(resp);
            }
        });
    }

    function savelokasi() {
        var lokasi = $('textarea[name=\'lokasi\']').val();
        $.ajax({
            type: "POST",
            url: '<?= site_url('checkout/savelokasi') ?>',
            data: {
                lokasi: lokasi
            },
            success: function(resp) {
                datalokasi();
            }
        });
    }

    function dataproduk() {
        $.ajax({
            type: "GET",
            url: '<?= site_url('checkout/dataproduk') ?>',
            success: function(resp) {
                $("#produk").html(resp);
            }
        });
    }

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
                    console.log(resp);
                    if (resp.status == "0100") {
                        Swal.fire({
                            title: 'Sukses!',
                            text: resp.pesan,
                            type: 'success'
                        }).then(okay => {
                            if (okay) {
                                window.location.href = BASE_URL + 'pesanan/detail/' + resp.kode;
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Gagal!',
                            text: resp.pesan,
                            type: 'error'
                        }).then(okay => {
                            if (okay) {
                                window.location.href = BASE_URL + 'checkout';
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