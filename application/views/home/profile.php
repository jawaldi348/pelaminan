<section class="header_text sub">
    <h4><span>Profil Anda</span></h4>
</section>
<section class="main-content">
    <div class="row">
        <div class="span4"></div>
        <div class="span4">
            <h4 class="title"><span class="text"><strong>Edit</strong> Akun Anda</span></h4>
            <form action="<?= site_url('profile/update') ?>" method="post" class="form-stacked form_create">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Nama</label>
                        <div class="controls">
                            <input type="text" name="nama" id="nama" class="input-xlarge" value="<?= $data['nama_pelanggan'] ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Alamat</label>
                        <div class="controls">
                            <input type="text" name="alamat" id="alamat" class="input-xlarge" value="<?= $data['alamat_pelanggan'] ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">No. HP</label>
                        <div class="controls">
                            <input type="text" name="phone" id="phone" class="input-xlarge" value="<?= $data['phone_pelanggan'] ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input type="text" name="email" id="email" class="input-xlarge" value="<?= $data['email_pelanggan'] ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" name="pass_reg" id="pass_reg" class="input-xlarge">
                        </div>
                        <i>Kosongkan jika tidak rubah password</i>
                    </div>
                    <hr>
                    <div class="actions"><input tabindex="9" class="btn btn-inverse large store_data" type="submit" value="Edit Profile"></div>
                </fieldset>
            </form>
        </div>
        <div class="span4"></div>
    </div>
</section>
<script>
    $(document).on('submit', '.form_create', function(e) {
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            cache: false,
            beforeSend: function() {
                $('.store_data').button('loading');
            },
            success: function(resp) {
                if (resp.status == "0100") {
                    Swal.fire({
                        title: 'Sukses!',
                        text: resp.pesan,
                        type: 'success'
                    }).then(okay => {
                        if (okay) {
                            window.location.href = "<?= site_url('profile') ?>";
                        }
                    });
                } else {
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
                $('.store_data').button('reset');
            }
        });
        return false;
    });
</script>