<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
    <!-- bootstrap -->
    <link href="<?= assets_home() ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= assets_home() ?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

    <link href="<?= assets_home() ?>themes/css/bootstrappage.css" rel="stylesheet" />

    <!-- global styles -->
    <link href="<?= assets_home() ?>themes/css/flexslider.css" rel="stylesheet" />
    <link href="<?= assets_home() ?>themes/css/main.css" rel="stylesheet" />

    <!-- scripts -->
    <script src="<?= assets_home() ?>themes/js/jquery-1.7.2.min.js"></script>
    <script src="<?= assets_home() ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= assets_home() ?>themes/js/superfish.js"></script>
    <script src="<?= assets_home() ?>themes/js/jquery.scrolltotop.js"></script>
    <script src="<?= assets() ?>sweetalert2/sweetalert2.all.min.js"></script>
    <!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
    <style>
        .text-red {
            color: #eb4800;
        }

        select,
        textarea,
        input[type="text"],
        input[type="password"],
        input[type="datetime"],
        input[type="datetime-local"],
        input[type="date"],
        input[type="month"],
        input[type="time"],
        input[type="week"],
        input[type="number"],
        input[type="email"],
        input[type="url"],
        input[type="search"],
        input[type="tel"],
        input[type="color"],
        .uneditable-input {
            margin-bottom: 0;
        }
    </style>
    <script>
        var BASE_URL = "<?= base_url(); ?>";
    </script>
</head>

<body>
    <div id="wrapper" class="container">
        <section class="navbar main-menu">
            <div class="navbar-inner main-menu">
                <a href="<?= site_url() ?>" class="logo pull-left"><img src="<?= assets_home() ?>themes/images/logo.png" class="site_logo" alt=""></a>
                <nav id="menu" class="pull-right">
                    <ul>
                        <li><a href="<?= site_url() ?>">Home</a></li>
                        <li><a href="#">Cara Pemesanan</a></li>
                        <li><a href="<?= site_url('keranjang') ?>">Keranjang</a></li>
                        <?php if ($this->session->userdata('status_home') != 'session_basridahome') : ?>
                            <li><a href="<?= site_url('auth') ?>">Login</a></li>
                        <?php else : ?>
                            <li><a href="<?= site_url('pesanan') ?>">Pesanan</a></li>
                            <li><a href="<?= site_url('auth/logout') ?>">Logout</a></li>
                        <?php endif ?>
                    </ul>
                </nav>
            </div>
        </section>
        {content}
        <section id="footer-bar">
            <div class="row">
                <div class="span3">
                    <h4>Navigation</h4>
                    <ul class="nav">
                        <li><a href="<?= site_url() ?>">Homepage</a></li>
                        <li><a href="#">Cara Pemesanan</a></li>
                        <li><a href="<?= site_url('keranjang') ?>">Keranjang</a></li>
                        <?php if ($this->session->userdata('status_home') != 'session_basridahome') : ?>
                            <li><a href="<?= site_url('auth') ?>">Login</a></li>
                        <?php else : ?>
                            <li><a href="<?= site_url('auth/logout') ?>">Logout</a></li>
                        <?php endif ?>
                    </ul>
                </div>
                <div class="span4">
                    <h4>My Account</h4>
                    <ul class="nav">
                        <li><a href="<?= site_url('profile') ?>">Akun Saya</a></li>
                        <li><a href="<?= site_url('pesanan') ?>">Histori Pesanan</a></li>
                    </ul>
                </div>
                <div class="span5">
                    <p class="logo"><img src="<?= assets_home() ?>themes/images/logo.png" class="site_logo" alt=""></p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. the Lorem Ipsum has been the industry's standard dummy text ever since the you.</p>
                    <br />
                    <span class="social_icons">
                        <a class="facebook" href="#">Facebook</a>
                        <a class="twitter" href="#">Twitter</a>
                        <a class="skype" href="#">Skype</a>
                        <a class="vimeo" href="#">Vimeo</a>
                    </span>
                </div>
            </div>
        </section>
        <section id="copyright">
            <span>Copyright 2021 Palaminan Basrida Wiwi All right reserved.</span>
        </section>
    </div>
    <script src="<?= assets_home() ?>themes/js/common.js"></script>
    <script src="<?= assets_home() ?>themes/js/jquery.flexslider-min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "fade",
                    slideshowSpeed: 4000,
                    animationSpeed: 600,
                    controlNav: false,
                    directionNav: true,
                    controlsContainer: ".flex-container" // the container that holds the flexslider
                });
            });
        });
    </script>
</body>

</html>