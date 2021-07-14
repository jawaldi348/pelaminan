<section class="header_text sub" style="margin-bottom: 10px;">
    <h4><span>Konfirmasi Pembayaran</span></h4>
</section>
<section class="main-content">
    <div class="row">
        <div class="span4"></div>
        <div class="span4">
            <form action="<?= site_url('pesanan/konfirmasi-store') ?>" class="form-stacked form_confirm" enctype="multipart/form-data" method="post">
                <input type="hidden" name="idpesan" value="<?= $data['id'] ?>">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Tanggal Transfer</label>
                        <div class="controls">
                            <input type="date" name="tanggal" id="tanggal" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Jumlah Transfer</label>
                        <div class="controls">
                            <input type="text" name="nilai" id="nilai" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Bank Pengirim</label>
                        <div class="controls">
                            <select class="input-xlarge" name="bank" id="bank">
                                <option value="">-- Pilih --</option>
                                <?php $bank = $this->db->get('bank_kode')->result_array();
                                foreach ($bank as $b) { ?>
                                    <option value="<?= $b['id_bank'] ?>"><?= $b['kode_bank'] . ' ' . $b['nama_bank'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Atasnama</label>
                        <div class="controls">
                            <input type="text" name="pemilik" id="pemilik" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">No Rekening</label>
                        <div class="controls">
                            <input type="text" name="norek" id="norek" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Upload Bukti Transfer</label>
                        <div class="controls">
                            <input type="file" name="gambar" id="gambar" class="input-xlarge">
                        </div>
                        <div id="pesan_gambar"></div>
                    </div>
                    <div class="control-group">
                        <button type="button" class="btn" onclick="location.href='<?= site_url('pesanan/detail/' . $data['id']) ?>'">&laquo; Kembali</button>
                        <input tabindex="3" class="btn btn-inverse large btn-confirm" type="submit" value="Simpan">
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="span4"></div>
    </div>
</section>
<script>
    $(document).on('submit', '.form_confirm', function(e) {
        event.preventDefault();
        var formData = new FormData($(".form_confirm")[0]);
        $.ajax({
            url: $(".form_confirm").attr('action'),
            dataType: 'json',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('.btn-confirm').button('loading');
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
                } else {
                    $("#pesan_gambar").html(resp.error);
                    $.each(resp.pesan, function(key, value) {
                        var element = $('#' + key);
                        element.closest('div.control-group')
                            .removeClass('has-error')
                            .addClass(value.length > 0 ? 'has-error' : 'has-success')
                            .find('.text-red')
                            .remove();
                        element.after(value);
                    });
                }
            },
            complete: function() {
                $('.btn-confirm').button('reset');
            }
        })
    });
</script>