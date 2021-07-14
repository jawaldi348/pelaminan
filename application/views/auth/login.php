<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Login - Pelaminan Basrida Wiwi</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="<?= assets() ?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= assets() ?>font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?= assets() ?>css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="<?= assets() ?>css/ace.min.css" />
    <link rel="stylesheet" href="<?= assets() ?>css/ace-rtl.min.css" />
</head>

<body class="login-layout light-login">
    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">
                        <div class="center">
                            <h1>
                                <br><br>
                                <span class="red">Pelaminan</span>
                                <span class="grey" id="id-text2">Basrida Wiwi</span>
                            </h1>
                        </div>
                        <div class="space-6"></div>
                        <div class="position-relative">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header blue lighter bigger">
                                            <i class="ace-icon fa fa-coffee green"></i>
                                            Sign in to start your session
                                        </h4>
                                        <div class="space-6"></div>
                                        <form action="<?= site_url('admin/signin') ?>" id="form_signin" method="post" accept-charset="utf-8">
                                            <fieldset>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" />
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                    <span id="username_error" class="red"></span>
                                                </label>

                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
                                                        <i class="ace-icon fa fa-lock"></i>
                                                    </span>
                                                    <span id="password_error" class="red"></span>
                                                </label>
                                                <div class="space"></div>
                                                <div class="clearfix">
                                                    <label class="inline">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl"> Remember Me</span>
                                                    </label>
                                                    <button type="submit" id="btn_signin" class="width-35 pull-right btn btn-sm btn-primary" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Processing...">
                                                        <i class="ace-icon fa fa-key"></i>
                                                        <span class="bigger-110">Login</span>
                                                    </button>
                                                </div>
                                                <div class="space-4"></div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= assets() ?>js/jquery-2.1.4.min.js"></script>
    <script src="<?= assets() ?>js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#form_signin').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $('#btn_signin').button('loading');
                    },
                    success: function(data) {
                        if (data.status == false) {
                            if (data.username_error != '') {
                                $('#username_error').html(data.username_error);
                            } else {
                                $('#username_error').html('');
                            }
                            if (data.password_error != '') {
                                $('#password_error').html(data.password_error);
                            } else {
                                $('#password_error').html('');
                            }
                        } else {
                            window.location.href = "<?= site_url('dashboard') ?>";
                        }
                        $('#btn_signin').button('reset');
                    },
                    complete: function() {
                        $('#btn_signin').button('reset');
                    }
                })
            });
        });
    </script>
</body>

</html>