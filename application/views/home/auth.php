<section class="header_text sub">
    <h4><span>Login or Regsiter</span></h4>
</section>
<section class="main-content">
    <div class="row">
        <div class="span5">
            <h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
            <form action="<?= site_url('auth/login') ?>" method="post" class="form-stacked form_singin">
                <input type="hidden" name="next" value="/">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input type="text" name="email" id="email" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" name="password" id="password" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <input tabindex="3" class="btn btn-inverse large btn-signin" type="submit" value="Login">
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="span7">
            <h4 class="title"><span class="text"><strong>Registrasi</strong> Akun Baru</span></h4>
            <form action="<?= site_url('auth/registrasi') ?>" method="post" class="form-stacked form_create">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Nama</label>
                        <div class="controls">
                            <input type="text" name="nama" id="nama" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Alamat</label>
                        <div class="controls">
                            <input type="text" name="alamat" id="alamat" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">No. HP</label>
                        <div class="controls">
                            <input type="text" name="phone" id="phone" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input type="text" name="email" id="email" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" name="pass_reg" id="pass_reg" class="input-xlarge">
                        </div>
                    </div>
                    <hr>
                    <div class="actions"><input tabindex="9" class="btn btn-inverse large store_data" type="submit" value="Registrasi"></div>
                </fieldset>
            </form>
        </div>
    </div>
</section>
<script>
    $(document).on('submit', '.form_singin', function(e) {
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            cache: false,
            beforeSend: function() {
                $('.btn-signin').button('loading');
            },
            success: function(resp) {
                if (resp.status == "0100") {
                    Swal.fire({
                        title: 'Sukses!',
                        text: resp.pesan,
                        type: 'success'
                    }).then(okay => {
                        if (okay) {
                            window.location.href = "<?= base_url() ?>";
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
                $('.btn-signin').button('reset');
            }
        });
        return false;
    });

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
                            window.location.href = "<?= site_url('auth') ?>";
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