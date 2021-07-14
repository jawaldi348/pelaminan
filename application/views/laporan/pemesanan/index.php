<div class="row">
    <div class="col-xs-12 col-sm-4 widget-container-col">
        <div class="widget-box widget-color-blue">
            <div class="widget-header">
                <h5 class="widget-title">Pemesanan Perperiode</h5>
                <div class="widget-toolbar">

                </div>
                <div class="widget-toolbar no-border"></div>
            </div>
            <div class="widget-body">
                <form class="form-horizontal" method="POST" action="<?= site_url('laporan/pemesanan/perperiode') ?>" target="_blank">
                    <div class="widget-main">
                        <div>
                            <div>
                                <label>Tanggal Mulai</label>
                                <input type="date" name="awal" class="form-control">
                            </div>
                        </div>
                        <div class="space space-8"></div>
                        <div>
                            <label>Tanggal Akhir</label>
                            <input type="date" name="akhir" class="form-control">
                        </div>
                    </div>
                    <div class="widget-toolbox padding-8 clearfix">
                        <button type="submit" class="btn btn-xs btn-inverse">
                            <i class="ace-icon icon-printer2"></i>
                            <span class="bigger-110">Cetak</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 widget-container-col">
        <div class="widget-box widget-color-blue">
            <div class="widget-header">
                <h5 class="widget-title">Pemesanan Perbulan</h5>
                <div class="widget-toolbar">

                </div>
                <div class="widget-toolbar no-border"></div>
            </div>
            <div class="widget-body">
                <form class="form-horizontal" method="POST" action="<?= site_url('laporan/pemesanan/perbulan') ?>" target="_blank">
                    <div class="widget-main">
                        <div>
                            <label>Pilih Bulan</label>
                            <select class="form-control" name="bulan">
                                <option value="">-- Pilih Bulan --</option>
                                <?php
                                $nama_bln = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                for ($bln = 1; $bln <= 12; $bln++) {
                                    echo "<option value=$bln>$nama_bln[$bln]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="space space-8"></div>
                        <div>
                            <label>Pilih Tahun</label>
                            <select class="form-control" name="tahun">
                                <option value="">-- Pilih Tahun --</option>
                                <?php
                                $now = date('Y');
                                for ($a = 2020; $a <= $now; $a++) {
                                    echo "<option value='$a'>$a</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="widget-toolbox padding-8 clearfix">
                        <button type="submit" class="btn btn-xs btn-inverse">
                            <i class="ace-icon icon-printer2"></i>
                            <span class="bigger-110">Cetak</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 widget-container-col">
        <div class="widget-box widget-color-blue">
            <div class="widget-header">
                <h5 class="widget-title">Pemesanan Pertahun</h5>
                <div class="widget-toolbar">

                </div>
                <div class="widget-toolbar no-border"></div>
            </div>
            <div class="widget-body">
                <form class="form-horizontal" method="POST" action="<?= site_url('laporan/pemesanan/pertahun') ?>" target="_blank">
                    <div class="widget-main">
                        <div>
                            <label>Pilih Tahun</label>
                            <select class="form-control" name="tahun">
                                <option value="">-- Pilih Tahun --</option>
                                <?php
                                $now = date('Y');
                                for ($a = 2020; $a <= $now; $a++) {
                                    echo "<option value='$a'>$a</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="widget-toolbox padding-8 clearfix">
                        <button type="submit" class="btn btn-xs btn-inverse">
                            <i class="ace-icon icon-printer2"></i>
                            <span class="bigger-110">Cetak</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-4 widget-container-col">
        <div class="widget-box widget-color-blue">
            <div class="widget-header">
                <h5 class="widget-title">Pemesanan Belum Lunas Perperiode</h5>
                <div class="widget-toolbar">

                </div>
                <div class="widget-toolbar no-border"></div>
            </div>
            <div class="widget-body">
                <form class="form-horizontal" method="POST" action="<?= site_url('laporan/pemesanan/belumlunastanggal') ?>" target="_blank">
                    <div class="widget-main">
                        <div>
                            <div>
                                <label>Tanggal Mulai</label>
                                <input type="date" name="awal" class="form-control">
                            </div>
                        </div>
                        <div class="space space-8"></div>
                        <div>
                            <label>Tanggal Akhir</label>
                            <input type="date" name="akhir" class="form-control">
                        </div>
                    </div>
                    <div class="widget-toolbox padding-8 clearfix">
                        <button type="submit" class="btn btn-xs btn-inverse">
                            <i class="ace-icon icon-printer2"></i>
                            <span class="bigger-110">Cetak</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 widget-container-col">
        <div class="widget-box widget-color-blue">
            <div class="widget-header">
                <h5 class="widget-title">Pemesanan Belum Lunas Perbulan</h5>
                <div class="widget-toolbar">

                </div>
                <div class="widget-toolbar no-border"></div>
            </div>
            <div class="widget-body">
                <form class="form-horizontal" method="POST" action="<?= site_url('laporan/pemesanan/belumlunasbulan') ?>" target="_blank">
                    <div class="widget-main">
                        <div>
                            <label>Pilih Bulan</label>
                            <select class="form-control" name="bulan">
                                <option value="">-- Pilih Bulan --</option>
                                <?php
                                $nama_bln = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                for ($bln = 1; $bln <= 12; $bln++) {
                                    echo "<option value=$bln>$nama_bln[$bln]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="space space-8"></div>
                        <div>
                            <label>Pilih Tahun</label>
                            <select class="form-control" name="tahun">
                                <option value="">-- Pilih Tahun --</option>
                                <?php
                                $now = date('Y');
                                for ($a = 2020; $a <= $now; $a++) {
                                    echo "<option value='$a'>$a</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="widget-toolbox padding-8 clearfix">
                        <button type="submit" class="btn btn-xs btn-inverse">
                            <i class="ace-icon icon-printer2"></i>
                            <span class="bigger-110">Cetak</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-4 widget-container-col">
        <div class="widget-box widget-color-blue">
            <div class="widget-header">
                <h5 class="widget-title">Pemesanan Sudah Lunas Perperiode</h5>
                <div class="widget-toolbar">

                </div>
                <div class="widget-toolbar no-border"></div>
            </div>
            <div class="widget-body">
                <form class="form-horizontal" method="POST" action="<?= site_url('laporan/pemesanan/lunastanggal') ?>" target="_blank">
                    <div class="widget-main">
                        <div>
                            <div>
                                <label>Tanggal Mulai</label>
                                <input type="date" name="awal" class="form-control">
                            </div>
                        </div>
                        <div class="space space-8"></div>
                        <div>
                            <label>Tanggal Akhir</label>
                            <input type="date" name="akhir" class="form-control">
                        </div>
                    </div>
                    <div class="widget-toolbox padding-8 clearfix">
                        <button type="submit" class="btn btn-xs btn-inverse">
                            <i class="ace-icon icon-printer2"></i>
                            <span class="bigger-110">Cetak</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 widget-container-col">
        <div class="widget-box widget-color-blue">
            <div class="widget-header">
                <h5 class="widget-title">Pemesanan Sudah Lunas Perbulan</h5>
                <div class="widget-toolbar">

                </div>
                <div class="widget-toolbar no-border"></div>
            </div>
            <div class="widget-body">
                <form class="form-horizontal" method="POST" action="<?= site_url('laporan/pemesanan/lunasbulan') ?>" target="_blank">
                    <div class="widget-main">
                        <div>
                            <label>Pilih Bulan</label>
                            <select class="form-control" name="bulan">
                                <option value="">-- Pilih Bulan --</option>
                                <?php
                                $nama_bln = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                for ($bln = 1; $bln <= 12; $bln++) {
                                    echo "<option value=$bln>$nama_bln[$bln]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="space space-8"></div>
                        <div>
                            <label>Pilih Tahun</label>
                            <select class="form-control" name="tahun">
                                <option value="">-- Pilih Tahun --</option>
                                <?php
                                $now = date('Y');
                                for ($a = 2020; $a <= $now; $a++) {
                                    echo "<option value='$a'>$a</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="widget-toolbox padding-8 clearfix">
                        <button type="submit" class="btn btn-xs btn-inverse">
                            <i class="ace-icon icon-printer2"></i>
                            <span class="bigger-110">Cetak</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>