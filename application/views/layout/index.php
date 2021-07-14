<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>{title}</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="<?= assets() ?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= assets() ?>font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?= assets() ?>css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="<?= assets() ?>css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="<?= assets() ?>css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?= assets() ?>css/ace-rtl.min.css" />
    <link rel="stylesheet" href="<?= assets() ?>fonts/icomoon/styles.css" />

    <script src="<?= assets() ?>js/ace-extra.min.js"></script>
    <script src="<?= assets() ?>js/jquery-2.1.4.min.js"></script>
    <script src="<?= assets() ?>js/jquery.dataTables.min.js"></script>
    <script src="<?= assets() ?>js/jquery.dataTables.bootstrap.min.js"></script>
    <script src="<?= assets() ?>js/dataTables.buttons.min.js"></script>
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write("<script src='<?= assets() ?>js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>
    <script src="<?= assets() ?>js/bootstrap.min.js"></script>
    <script src="<?= assets() ?>js/jquery-ui.custom.min.js"></script>
    <script src="<?= assets() ?>js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?= assets() ?>js/ace-elements.min.js"></script>
    <script src="<?= assets() ?>js/ace.min.js"></script>
    <script src="<?= assets() ?>sweetalert2/sweetalert2.all.min.js"></script>
    <script>
        var BASE_URL = "<?= base_url(); ?>";
    </script>
</head>

<body class="no-skin">
    <div class="main-container ace-save-state" id="main-container">
        <?php $this->load->view('layout/navbar') ?>
        <script type="text/javascript">
            try {
                ace.settings.loadState('main-container')
            } catch (e) {}
        </script>
        <?php $this->load->view('layout/sidebar') ?>
        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="#">Home</a>
                        </li>
                        {links}
                    </ul>
                </div>

                <div class="page-content">
                    {content}
                </div>
            </div>
        </div>
        <?php $this->load->view('layout/footer') ?>
        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div>
</body>

</html>