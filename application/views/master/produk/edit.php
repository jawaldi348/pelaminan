<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">
                    <a href="<?= site_url('produk') ?>" style="padding-right: 10px;" class="dark"><i class="icon-arrow-left8 bigger-120"></i></a> Tambah <?= $title ?>
                </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main no-padding">
                    <?= form_open_multipart('produk/update', ['id' => 'form_create'], ['kode' => $data['id_produk']]) ?>
                    <fieldset>
                        <div class="form-group">
                            <label class="control-label">Nama Produk</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Produk" value="<?= $data['nama_produk'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($kategori as $k) { ?>
                                    <option value="<?= $k['id_kategori'] ?>" <?= $data['kategori_produk'] == $k['id_kategori'] ? 'selected' : null ?>><?= $k['nama_kategori'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga" value="<?= $data['harga_produk'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Deskripsi</label>
                            <textarea name="desc" id="desc" class="form-control" rows="15"><?= $data['desc_produk'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Gambar Produk</label>
                            <input type="file" name="gambar" id="gambar" onchange="return fileValidation()">
                            <div id="pesan_gambar"></div>
                        </div>
                        <div id="imagePreview"><img src="<?= base_url() . $data['image_produk'] ?>" width="230" height="230"></div>
                        <div class="form-group">
                            <label>Status</label>
                            <div class="radio">
                                <label>
                                    <input name="status" type="radio" class="ace" value="1" <?= $data['status_produk'] == 1 ? 'checked' : null ?>>
                                    <span class="lbl"> Tampilkan</span>
                                </label>
                                <label>
                                    <input name="status" type="radio" class="ace" value="0" <?= $data['status_produk'] == 0 ? 'checked' : null ?>>
                                    <span class="lbl"> Tidak Tampilkan</span>
                                </label>
                            </div>
                            <div id="status"></div>
                        </div>
                    </fieldset>
                    <div class="form-actions center">
                        <button type="submit" class="btn btn-sm btn-primary" id="store" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Loading..."><i class="ace-icon icon-floppy-disk"></i>Simpan</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function fileValidation() {
        var fileInput = document.getElementById('gambar');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Please upload file having extensions .jpeg/.jpg/.png only.');
            fileInput.value = '';
            return false;
        } else {
            //Image preview
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').innerHTML = '<img src="' + e.target.result + '" width="230" height="230"/>';
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    }
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
                        title: 'Sukses!',
                        text: resp.pesan,
                        type: 'success'
                    }).then(okay => {
                        if (okay) {
                            window.location.href = BASE_URL + 'produk';
                        }
                    });
                } else {
                    $.each(resp.pesan, function(key, value) {
                        var element = $('#' + key);
                        element.closest('div.form-group')
                            .removeClass('has-error')
                            .addClass(value.length > 0 ? 'has-error' : 'has-success')
                            .find('.help-block')
                            .remove();
                        element.after(value);
                    });
                }
            },
            complete: function() {
                $('#store').button('reset');
            }
        })
    });
</script>