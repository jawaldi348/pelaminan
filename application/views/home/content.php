<section class="header_text">
    We stand for top quality templates. Our genuine developers always optimized bootstrap commercial templates.
    <br />Don't miss to use our cheap abd best bootstrap templates.
</section>
<section class="main-content">
    <div class="row">
        <div class="span12">
            <?php foreach ($kategori as $k) {
                $idkategori = $k['id_kategori'];
                $produk = $this->db->query("SELECT * FROM produk WHERE status_produk=1 AND kategori_produk='$idkategori'")->result_array();
            ?>
                <div class="row">
                    <div class="span12">
                        <h4 class="title">
                            <span class="pull-left"><span class="text"><span class="line"><?= $k['nama_kategori'] ?></span></span></span>
                            <span class="pull-right">
                                <a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
                            </span>
                        </h4>
                        <div id="myCarousel" class="myCarousel carousel slide">
                            <div class="carousel-inner">
                                <div class="active item">
                                    <ul class="thumbnails">
                                        <?php foreach ($produk as $p) { ?>
                                            <li class="span3">
                                                <div class="product-box">
                                                    <span class="sale_tag"></span>
                                                    <p><a href="<?= site_url($p['id_produk']) ?>"><img src="<?= base_url() . $p['image_produk'] ?>" alt="" /></a></p>
                                                    <a href="<?= site_url($p['id_produk']) ?>" class="title"><?= $p['nama_produk'] ?></a>
                                                    <p class="price">Rp <?= count_format($p['harga_produk']) ?></p>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- <div class="row">
                <div class="span12">
                    <h4 class="title">
                        <span class="pull-left"><span class="text"><span class="line">Feature <strong>Products</strong></span></span></span>
                        <span class="pull-right">
                            <a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
                        </span>
                    </h4>
                    <div id="myCarousel" class="myCarousel carousel slide">
                        <div class="carousel-inner">
                            <div class="active item">
                                <ul class="thumbnails">
                                    <li class="span3">
                                        <div class="product-box">
                                            <span class="sale_tag"></span>
                                            <p><a href="product_detail.html"><img src="<?= assets_home() ?>themes/images/ladies/1.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Ut wisi enim ad</a><br />
                                            <a href="products.html" class="category">Commodo consequat</a>
                                            <p class="price">$17.25</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <span class="sale_tag"></span>
                                            <p><a href="product_detail.html"><img src="<?= assets_home() ?>themes/images/ladies/2.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Quis nostrud exerci tation</a><br />
                                            <a href="products.html" class="category">Quis nostrud</a>
                                            <p class="price">$32.50</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="<?= assets_home() ?>themes/images/ladies/3.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Know exactly turned</a><br />
                                            <a href="products.html" class="category">Quis nostrud</a>
                                            <p class="price">$14.20</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="<?= assets_home() ?>themes/images/ladies/4.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">You think fast</a><br />
                                            <a href="products.html" class="category">World once</a>
                                            <p class="price">$31.45</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="item">
                                <ul class="thumbnails">
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="<?= assets_home() ?>themes/images/ladies/5.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Know exactly</a><br />
                                            <a href="products.html" class="category">Quis nostrud</a>
                                            <p class="price">$22.30</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="<?= assets_home() ?>themes/images/ladies/6.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Ut wisi enim ad</a><br />
                                            <a href="products.html" class="category">Commodo consequat</a>
                                            <p class="price">$40.25</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="<?= assets_home() ?>themes/images/ladies/7.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">You think water</a><br />
                                            <a href="products.html" class="category">World once</a>
                                            <p class="price">$10.45</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="<?= assets_home() ?>themes/images/ladies/8.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Quis nostrud exerci</a><br />
                                            <a href="products.html" class="category">Quis nostrud</a>
                                            <p class="price">$35.50</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="span12">
                    <h4 class="title">
                        <span class="pull-left"><span class="text"><span class="line">Latest <strong>Products</strong></span></span></span>
                        <span class="pull-right">
                            <a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
                        </span>
                    </h4>
                    <div id="myCarousel-2" class="myCarousel carousel slide">
                        <div class="carousel-inner">
                            <div class="active item">
                                <ul class="thumbnails">
                                    <li class="span3">
                                        <div class="product-box">
                                            <span class="sale_tag"></span>
                                            <p><a href="product_detail.html"><img src="<?= assets_home() ?>themes/images/cloth/bootstrap-women-ware2.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Ut wisi enim ad</a><br />
                                            <a href="products.html" class="category">Commodo consequat</a>
                                            <p class="price">$25.50</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="<?= assets_home() ?>themes/images/cloth/bootstrap-women-ware1.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Quis nostrud exerci tation</a><br />
                                            <a href="products.html" class="category">Quis nostrud</a>
                                            <p class="price">$17.55</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="<?= assets_home() ?>themes/images/cloth/bootstrap-women-ware6.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Know exactly turned</a><br />
                                            <a href="products.html" class="category">Quis nostrud</a>
                                            <p class="price">$25.30</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="<?= assets_home() ?>themes/images/cloth/bootstrap-women-ware5.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">You think fast</a><br />
                                            <a href="products.html" class="category">World once</a>
                                            <p class="price">$25.60</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="item">
                                <ul class="thumbnails">
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="<?= assets_home() ?>themes/images/cloth/bootstrap-women-ware4.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Know exactly</a><br />
                                            <a href="products.html" class="category">Quis nostrud</a>
                                            <p class="price">$45.50</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="<?= assets_home() ?>themes/images/cloth/bootstrap-women-ware3.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Ut wisi enim ad</a><br />
                                            <a href="products.html" class="category">Commodo consequat</a>
                                            <p class="price">$33.50</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="<?= assets_home() ?>themes/images/cloth/bootstrap-women-ware2.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">You think water</a><br />
                                            <a href="products.html" class="category">World once</a>
                                            <p class="price">$45.30</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="<?= assets_home() ?>themes/images/cloth/bootstrap-women-ware1.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Quis nostrud exerci</a><br />
                                            <a href="products.html" class="category">Quis nostrud</a>
                                            <p class="price">$25.20</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>