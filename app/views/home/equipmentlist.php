<!--Section Banner--->
<div>
    <div class="cover-image sptb-1 bg-background" data-image-src="<?= BASEURL; ?>/assets_dashboard/images/banner/1.png" style="background: url('<?= BASEURL; ?>/assets_dashboard/images/banner/1.png') center center;">
        <div class="header-text1 mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-12 col-md-12 d-block mx-auto">
                        <div class="text-center text-white">
                            <h1 class="mb-5"><span class="font-weight-bold">Wide </span> selection of wedding equipment for rent or purchase at competitive prices</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /header-text -->
    </div>
</div>
<!--End Section Banner--->
<!--Break Crumb--->
<div class="bg-white border-bottom">
    <div class="container">
        <div class="page-header">
            <h4 class="page-title">Adey- Store</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Equipment</a></li>
                <li class="breadcrumb-item active" aria-current="page">List Of Item</li>
            </ol>
        </div>
    </div>
</div>
<!--End Break Crumb-->
<section class="sptb">
    <div class="container">
        <!--Lists-->
        <div class="mb-0">
            <div>
                <div class="item2-gl">
                    <div class="mb-0">
                        <div class="bg-white p-5 item2-gl-nav d-flex">
                            <h6 class="mb-0 mt-3 text-left">Buy or Rent Everything You Need at Adey Wedding Store</h6>
                            <ul class="nav item2-gl-menu ml-auto mt-1">
                                <li><a href="#tab-11" data-toggle="tab" title="List style"><i class="fa fa-list"></i></a></li>
                                <li><a href="#tab-12" class="active show" data-toggle="tab" title="Grid"><i class="fa fa-th"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane" id="tab-11">
                            <?php foreach ($data['equipment'] as $mb) : ?>
                                <div class="card overflow-hidden <?= $mb['status'] == '0' ? 'sold-out' : '' ?>">
                                    <?php if ($mb['status'] == '0') : ?>
                                        <div class="ribbon ribbon-top-left text-danger">
                                            <span class="bg-danger">Rented Out</span>
                                        </div>
                                    <?php elseif ($mb['status'] == '7') : ?>
                                        <div class="ribbon ribbon-top-left text-warning">
                                            <span class="bg-warning">Canceled Order</span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="d-md-flex">
                                        <div class="item-card9-img">
                                            <div class="item-card9-imgs">
                                                <a class="link" href="<?= $mb['status'] == '0' ? '#' : BASEURL . '/home/detail/' . $mb['equipment_id'] ?>"></a>
                                                <img src="<?= BASEURL . '/equipment_photo/' . $mb['picture'] ?>" alt="img" class="cover-image">
                                            </div>
                                            <div class="item-card9-icons">
                                                <a href="<?= $mb['status'] == '0' ? '#' : BASEURL . '/home/detail/' . $mb['equipment_id'] ?>" class="item-card9-icons1 wishlist active">
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="item-overly-trans">
                                                <div class="rating-stars">
                                                    <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
                                                    <div class="rating-stars-container">
                                                        <div class="rating-star sm is--active"><i class="fa fa-star"></i></div>
                                                        <div class="rating-star sm is--active"><i class="fa fa-star"></i></div>
                                                        <div class="rating-star sm is--active"><i class="fa fa-star"></i></div>
                                                        <div class="rating-star sm is--active"><i class="fa fa-star"></i></div>
                                                        <div class="rating-star sm"><i class="fa fa-star"></i></div>
                                                    </div>
                                                </div>
                                                <span>
                                                    <a href="<?= $mb['status'] == '0' ? '#' : BASEURL . '/home/detail/' . $mb['equipment_id'] ?>"></a>
                                                    <?php if ($mb['status'] == 1 || $mb['status'] == 7) : ?>
                                                        <a href="<?= BASEURL . '/home/detail/' . $mb['equipment_id'] ?>" class="bg-success">Available</a>
                                                    <?php endif; ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="card border-0 mb-0">
                                            <div class="card-body">
                                                <div class="item-card9">
                                                    <div class="rating-stars">
                                                        <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
                                                    </div>
                                                    <a href="<?= $mb['status'] == '0' ? '#' : BASEURL . '/home/detail/' . $mb['equipment_id'] ?>" class="text-dark">
                                                        <h4 class="font-weight-semibold mt-1"><?= $mb['item_name']; ?></h4>
                                                    </a>
                                                    <div class="item-card9-desc mb-2">
                                                        <a href="<?= $mb['status'] == '0' ? '#' : BASEURL . '/home/detail/' . $mb['equipment_id'] ?>" class="mr-4"><span class=""><i class="fa fa-map-marker text-muted mr-1"></i> <?= $mb['location'] ?>, Ethiopia</span></a>
                                                    </div>
                                                    <p class="leading-tight"><?= $mb['description']; ?></p>
                                                </div>
                                            </div>
                                            <div class="card-footer pr-4 pl-4 pt-4 pb-4">
                                                <div class="item-card9-footer d-sm-flex">
                                                    <div class="item-card9-cost">
                                                        <h4 class="text-dark font-weight-bold mb-0 mt-0">ETB <?= number_format($mb['price'], 0, ',', '.'); ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="tab-pane active" id="tab-12">
                            <div class="row">
                                <?php foreach ($data['equipment'] as $mb) : ?>
                                    <div class="col-lg-6 col-md-12 col-xl-4">
                                        <div class="card overflow-hidden <?= $mb['status'] == '0' ? 'sold-out' : '' ?>">
                                            <?php if ($mb['status'] == '0') : ?>
                                                <div class="ribbon ribbon-top-left text-danger">
                                                    <span class="bg-danger">Rented Out</span>
                                                </div>
                                            <?php elseif ($mb['status'] == '7') : ?>
                                                <div class="ribbon ribbon-top-left text-warning">
                                                    <span class="bg-warning">Canceled Order</span>
                                                </div>
                                            <?php endif; ?>
                                            <div class="item-card9-img">
                                                <div class="arrow-ribbon bg-success">ETB <?= number_format($mb['price'], 0, ',', '.'); ?></div>
                                                <div class="item-card9-imgs">
                                                    <a class="link" href="<?= $mb['status'] == '0' ? '#' : BASEURL . '/home/detail/' . $mb['equipment_id'] ?>"></a>
                                                    <img height="250px" src="<?= BASEURL . '/equipment_photo/' . $mb['picture'] ?>" alt="img" class="cover-image">
                                                </div>
                                                <div class="item-card9-icons">
                                                    <a href="<?= $mb['status'] == '0' ? '#' : BASEURL . '/home/detail/' . $mb['equipment_id'] ?>" class="item-card9-icons1 wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                                <div class="item-overly-trans">
                                                    <div class="rating-stars">
                                                        <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
                                                        <div class="rating-stars-container">
                                                            <div class="rating-star sm is--active"><i class="fa fa-star"></i></div>
                                                            <div class="rating-star sm is--active"><i class="fa fa-star"></i></div>
                                                            <div class="rating-star sm is--active"><i class="fa fa-star"></i></div>
                                                            <div class="rating-star sm is--active"><i class="fa fa-star"></i></div>
                                                            <div class="rating-star sm"><i class="fa fa-star"></i></div>
                                                        </div>
                                                    </div>
                                                    <span>
                                                        <a href="<?= $mb['status'] == '0' ? '#' : BASEURL . '/home/detail/' . $mb['equipment_id'] ?>"></a>
                                                        <?php if ($mb['status'] == '1' || $mb['status'] == '7') : ?>
                                                            <a href="<?= BASEURL . '/home/detail/' . $mb['equipment_id'] ?>" class="bg-success">Available</a>
                                                        <?php endif; ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="card border-0 mb-0">
                                                <div class="card-body">
                                                    <div class="item-card9">
                                                        <a href="<?= $mb['status'] == '0' ? '#' : BASEURL . '/home/detail/' . $mb['equipment_id'] ?>" class="text-dark">
                                                            <h4 class="font-weight-semibold mt-1"><?= $mb['item_name'] ?></h4>
                                                        </a>
                                                        <div class="item-card9-desc mb-2">
                                                            <a href="<?= $mb['status'] == '0' ? '#' : BASEURL . '/home/detail/' . $mb['equipment_id'] ?>" class="mr-4"><span class=""><i class="fa fa-map-marker text-muted mr-1"></i> <?= $mb['location']; ?>, Ethiopia</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer pr-4 pl-4 pt-4 pb-4">
                                                    <div class="item-card9-footer d-sm-flex">
                                                        <!-- Additional content if needed -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!--/Lists-->
                </div>
            </div>
        </div>
</section>
