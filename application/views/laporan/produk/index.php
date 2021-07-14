<div class="row">
    <div class="col-xs-12 col-sm-4 widget-container-col">
        <div class="widget-box widget-color-blue">
            <div class="widget-header">
                <h5 class="widget-title">Laporan Data Produk Keseluruhan</h5>
                <div class="widget-toolbar">

                </div>
                <div class="widget-toolbar no-border"></div>
            </div>
            <div class="widget-body">
                <form class="form-horizontal" method="POST" action="<?= site_url('laporan/produk/all') ?>" target="_blank">
                    <div class="widget-main">
                        <div>
                            <label>Kategori</label>
                            <select class="form-control">
                                <option>Keseluruhan</option>
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
                <h5 class="widget-title">Laporan Data Produk Perkategori</h5>
                <div class="widget-toolbar">

                </div>
                <div class="widget-toolbar no-border"></div>
            </div>
            <div class="widget-body">
                <form class="form-horizontal" method="POST" action="<?= site_url('laporan/produk/kategori') ?>" target="_blank">
                    <div class="widget-main">
                        <div>
                            <label>Kategori</label>
                            <select class="form-control" name="kategori">
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach ($kategori as $k) { ?>
                                    <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                                <?php } ?>
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