<?php
$urls = $this->uri->segment(1);
$urls2 = $this->uri->segment(2);
?>
<div id="sidebar" class="sidebar responsive ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {}
    </script>

    <ul class="nav nav-list">
        <li class="<?= $urls == "dashboard" ? "active" : null ?>">
            <a href="<?= site_url('dashboard') ?>">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="<?= $urls == "users" || $urls == "rekening" || $urls == "kategori" || $urls == "produk" || $urls == "pelanggan" ? "active open" : null ?>">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon icon-puzzle4"></i>
                <span class="menu-text">Master Data</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="<?= $urls == "users" ? "active" : null ?>">
                    <a href="<?= site_url('users') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        User
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="<?= $urls == "rekening" ? "active" : null ?>">
                    <a href="<?= site_url('rekening') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Rekening
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="<?= $urls == "kategori" ? "active" : null ?>">
                    <a href="<?= site_url('kategori') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Kategori
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="<?= $urls == "produk" ? "active" : null ?>">
                    <a href="<?= site_url('produk') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Produk
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="<?= $urls == "pelanggan" ? "active" : null ?>">
                    <a href="<?= site_url('pelanggan') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Pelanggan
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="<?= $urls == "orders" || $urls == "payments" ? "active open" : null ?>">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon icon-inbox"></i>
                <span class="menu-text">Transaksi</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="<?= $urls == "orders" ? "active" : null ?>">
                    <a href="<?= site_url('orders') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Pesanan
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="<?= $urls == "payments" ? "active" : null ?>">
                    <a href="<?= site_url('payments') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Pembayaran
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="<?= $urls == "laporan" ? "active open" : null ?>">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon icon-clipboard2"></i>
                <span class="menu-text"> Laporan </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li>
                    <a href="<?= site_url('laporan/pelanggan') ?>" target="_blank">
                        <i class="menu-icon fa fa-caret-right"></i>Pelanggan</a>
                    <b class="arrow"></b>
                </li>
                <li class="<?= $urls2 == "produk" ? "active" : null ?>">
                    <a href="<?= site_url('laporan/produk') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>Produk</a>
                    <b class="arrow"></b>
                </li>
                <li class="<?= $urls2 == "pemesanan" ? "active" : null ?>">
                    <a href="<?= site_url('laporan/pemesanan') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>Pemesanan</a>
                    <b class="arrow"></b>
                </li>
                <li class="<?= $urls2 == "pembayaran" ? "active" : null ?>">
                    <a href="<?= site_url('laporan/pembayaran') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>Pembayaran</a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>