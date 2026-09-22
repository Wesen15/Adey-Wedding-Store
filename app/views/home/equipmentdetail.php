<!-- Section Banner -->
<div>
    <div class="cover-image sptb-1 bg-background" data-image-src="<?= BASEURL; ?>/assets_dashboard/images/banner/1.png" style="background: url(&quot;<?= BASEURL; ?>/assets_dashboard/images/banner/1.png&quot;) center center;">
        <div class="header-text1 mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-12 col-md-12 d-block mx-auto">
                        <div class="text-center text-white ">
                            <h1 class="mb-5"><span class="font-weight-bold">Much More</span> Equipment Available</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /header-text -->
    </div>
</div>
<!-- End Section Banner -->

<!-- Breadcrumb -->
<div class="bg-white border-bottom">
    <div class="container">
        <div class="page-header">
            <h4 class="page-title">Adey - Equipment Rental</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Equipment</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Equipment</li>
            </ol>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Image Detail -->
<section class="sptb" data-select2-id="64">
    <div class="container" data-select2-id="63">
        <div class="row" data-select2-id="62">
            <div class="col-xl-8 col-lg-8 col-md-12">
                <!-- Classified Description -->
                <?php Flasher::flash(); ?>
                <?php foreach ($data['detail'] as $dt) : ?>
                    <div class="card overflow-hidden">
                        <div class="ribbon ribbon-top-right text-danger">
                            <span class="bg-danger">
                                <?php
                                if ($dt['status'] == 1 || $dt['status'] == 7) {
                                    echo 'Available';
                                } else {
                                    echo 'Ordered';
                                }
                                ?>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="item-det mb-4">
                                <a href="#" class="text-dark">
                                    <h3><?php echo $dt['item_name'] ?></h3>
                                </a>
                                <div class="d-flex">
                                    <ul class="d-flex mb-0">
                                        <li class="mr-5">
                                            <a href="#" class="icons">
                                                <i class="ti-location-pin text-muted mr-1"></i>
                                                <?php echo $dt['location'] ?>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="rating-stars d-flex mr-5">
                                        <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" id="rating-stars-value" value="4">
                                        <div class="rating-stars-container mr-2">
                                            <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                            <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                            <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                            <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                            <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                                        </div> Rating
                                    </div>
                                    <div class="rating-stars d-flex">
                                        <div class="rating-stars-container mr-2">
                                            <div class="rating-star sm"> <i class="fa fa-heart"></i> </div>
                                        </div> Like
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img width="726px" src="<?= BASEURL . '/equipment_photo/' . $dt['picture'] ?>" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Description Equipment -->
                    <div class="">
                        <div class="">
                            <div class="border-0">
                                <div class="wideget-user-tab wideget-user-tab3">
                                    <div class="tab-menu-heading">
                                        <div class="tabs-menu1">
                                            <ul class="nav">
                                                <li class=""><a href="#tab-1" class="active" data-toggle="tab">Information</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content border-left border-right border-top br-tr-3 p-5 bg-white">
                                    <div class="tab-pane active" id="tab-1">
                                        <div class="mb-4">
                                            <h2><?php echo $dt['item_name'] ?></h2>
                                            <p><?php echo $dt['description'] ?></p>
                                        </div>
                                        <h4 class="mb-4">Specification</h4>
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered w-100 m-0 text-nowrap ">
                                                        <tbody>
                                                            <tr>
                                                                <td><span class="font-weight-bold">Price :</span> <?php echo $dt['price'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><span class="font-weight-bold">Equipment type :</span> <?php echo $dt['category_name'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><span class="font-weight-bold">Location :</span> <?php echo $dt['location'] ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer bg-white border-left border-right border-bottom br-br-3 br-bl-3">
                                    <?php if ($data['getcomplete'][0]['id_number'] != NULL) { ?>
                                        <div class="icons">
                                            <button type="button" class="btn btn-success icons" data-toggle="modal" data-target="#update_modal<?= $dt['equipment_id']; ?>" <?php if ($dt['status'] == 1 || $dt['status'] == 7) {
                                                echo '><i class="icon icon-cloud-download mr-1"></i> Order now';
                                            } else {
                                                echo 'disabled ><i class="icon icon-cloud-download mr-1"></i> Not available';
                                            } ?></button>
                                        </div>
                                    <?php } elseif (empty($_SESSION)) { ?>
                                        <div class="icons">
                                            <a class="btn btn-danger icons" href="<?= BASEURL; ?>/home/login" <?php if ($dt['status'] == 1 || $dt['status'] == 7) {
                                                echo '><i class="icon icon-cloud-download mr-1"></i> Order now';
                                            } else {
                                                echo 'disabled ><i class="icon icon-cloud-download mr-1"></i> Not available';
                                            } ?></a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="icons">
                                            <a class="btn btn-danger icons" href="<?= BASEURL; ?>/home/complete_profile" <?php if ($dt['status'] == 1 || $dt['status'] == 7) {
                                                echo '><i class="icon icon-cloud-download mr-1"></i> Order now';
                                            } else {
                                                echo 'disabled ><i class="icon icon-cloud-download mr-1"></i> Not available';
                                            } ?></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- Classified Description -->
                <h3 class="mb-5 mt-6">Selected Products</h3>
                <!-- Related Posts -->
                <div id="myCarousel5" class="owl-carousel owl-carousel-icons3 owl-loaded owl-drag">
                    <!-- Wrapper for carousel items -->
                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(-2403px, 0px, 0px); transition: all 0.25s ease 0s; width: 4406px;">
                            <?php foreach ($data['equipment'] as $mb) : ?>
                                <div class="owl-item" style="width: 375.333px; margin-right: 25px;">
                                    <div class="item <?= $mb['status'] == '0' ? 'sold-out' : '' ?>">
                                        <?php if ($mb['status'] == '0') : ?>
                                            <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">Booked</span></div>
                                        <?php endif; ?>
                                        <div class="card">
                                            <div class="item-card2-img">
                                                <a class="link" href="<?= $mb['status'] == '0' ? '#' : BASEURL . '/home/detail/' . $mb['equipment_id'] ?>"></a>
                                                <img width="373.33px" height="221.98px" src="<?= BASEURL . '/equipment_photo/' . $mb['picture'] ?>" alt="img" class="cover-image">
                                                <?php if ($mb['status'] == '1' || $mb['status'] == '7') : ?>
                                                    <div class="item-tag-overlaytext"> <span class="text-white bg-success">Available</span> </div>
                                                <?php endif; ?>
                                                <div class="item-card2-icons">
                                                    <a class="item-card2-icons-l bg-primary">
                                                        <i class="fa fa-cart-arrow-down"></i>
                                                    </a>
                                                    <a class="item-card2-icons-r wishlist active">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body pb-0">
                                                <div class="item-card2">
                                                    <div class="item-card2-desc">
                                                        <div class="item-card2-text">
                                                            <a href="<?= $mb['status'] == '0' ? '#' : BASEURL . '/home/detail/' . $mb['equipment_id'] ?>" class="text-dark">
                                                                <h4 class="mb-0"><?php echo $mb['item_name']; ?></h4>
                                                            </a>
                                                        </div>
                                                        <div class="d-flex pb-0 pt-0">
                                                            <a href="<?= $mb['status'] == '0' ? '#' : BASEURL . '/home/detail/' . $mb['equipment_id'] ?>">
                                                                <p class="pb-0 pt-0 mb-2 mt-2"><i class="fa fa-map-marker text-danger mr-2"></i><?php echo $mb['location'] ?>, Ethiopia</p>
                                                            </a>
                                                        </div>
                                                        <p class="">Equipment Description <?= substr($mb['description'], 0, 49); ?></p>
                                                    </div>
                                                </div>
                                                <div class="item-card2-footer mt-4 mb-4">
                                                    <div class="item-card2-footer-u">
                                                        <div class="d-md-flex">
                                                            <span class="review_score mr-2 badge badge-primary">ETB. <?php echo number_format($mb['price'], 0, ',', '.'); ?></span>
                                                            <div class="rating-stars d-inline-flex ml-auto">
                                                                <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
                                                                <div class="rating-stars-container">
                                                                    <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                                    <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                                    <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                                                                    <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                                                                    <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                                                                </div> (5 Reviews)
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a class="btn btn-primary btn-block mt-3 <?= $mb['status'] == '0' ? 'disabled' : '' ?>" href="<?= BASEURL; ?>/home/detail/<?= $mb['equipment_id'] ?>">Order now</a>
                                                </div>
                                            </div>
                                            <div class="card-footer"></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="owl-nav disabled">
                        <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button>
                        <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
                    </div>
                    <div class="owl-dots disabled"></div>
                </div>
                <!-- Related Posts -->
            </div>
            <!-- Right Side Content -->
            <div class="col-xl-4 col-lg-4 col-md-12" data-select2-id="61">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-4">Look for equipment</h3>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto">
                        <form method="POST" action="<?= BASEURL; ?>/home/equipment">
                            <div class="form-group search-cars1">
                                <select id="equipment" name="equipment" required="" class="form-control select2-show-search border-bottom-0 w-100 br-3 select2-hidden-accessible" data-placeholder="Select" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <optgroup label="Categories" data-select2-id="9998">
                                        <option value="select" data-select2-id="1">Select Equipment</option>
                                        <?php foreach ($data['equipment'] as $mb) : ?>
                                            <option value="<?= $mb['equipment_id']; ?>" data-select2-id="<?= $mb['equipment_id']; ?>"><?= $mb['item_name']; ?></option>
                                        <?php endforeach; ?>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-calendar fs-11 lh-0 op-6"></i></div>
                                </div>
                                <input type="text" class="form-control pull-right" id="reservationtime">
                            </div>
                            <button id="submit" type="submit" value="submit" class="btn btn-primary btn-lg btn-block">Order now</button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Keywords</h3>
                    </div>
                    <?php foreach ($data['detail'] as $dt) : ?>
                        <div class="card-body product-filter-desc">
                            <div class="product-tags clearfix">
                                <ul class="list-unstyled mb-0">
                                    <li><a href=""><?php echo $dt['item_name'] ?></a></li>
                                    <li><a href=""><?php echo $dt['category_name'] ?></a></li>
                                    <li><a href=""><?php echo $dt['description'] ?></a></li>
                                    <li><a href="">Equipment</a></li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Latest Equipment</div>
                    </div>
                    <div class="card-body ">
                        <ul class="vertical-scroll" style="overflow-y: hidden; height: 264px;">
                            <?php foreach ($data['equipment'] as $mb) : ?>
                                <li class="news-item">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td><img width="64px" height="53.66px" src="<?= BASEURL . '/equipment_photo/' . $mb['picture'] ?>" alt="equipment" class="w-8 border"></td>
                                                <td class="pl-3">
                                                    <h5 class="mb-1 "><?php echo $mb['item_name']; ?></h5><a href="<?= BASEURL; ?>/home/detail/<?= $mb['equipment_id'] ?>" class="btn-link">View Details</a><span class="float-right font-weight-bold">ETB. <?php echo number_format($mb['price'], 0, ',', '.'); ?></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="card mb-0">
                    <div class="card-header">
                        <h3 class="card-title">Best Selling equipment</h3>
                    </div>
                    <div class="card-body">
                        <div class="rated-products">
                            <ul class="vertical-scroll" style="overflow-y: hidden; height: 488px;">
                                <?php foreach ($data['equipment'] as $mb) : ?>
                                    <li class="item">
                                        <div class="media mb-0 p-5 mt-0">
                                            <img class="mr-4" src="<?= BASEURL . '/equipment_photo/' . $mb['picture'] ?>" alt="equipment">
                                            <div class="media-body">
                                                <h4 class="mt-2 mb-1"><?php echo $mb['item_name']; ?></h4>
                                                <span class="rated-products-ratings">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star-o text-warning"></i>
                                                    <i class="fa fa-star-o text-warning"></i>
                                                </span>
                                                <div class="h5 mb-0 font-weight-semibold mt-1">ETB. <?php echo number_format($mb['price'], 0, ',', '.'); ?></div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Side Content -->
        </div>
    </div>
</section>
<!-- End Image Detail -->

<!-- Modal Order now -->
<?php foreach ($data['detail'] as $dt) : ?>
    <div class="modal fade" id="update_modal<?= $dt['equipment_id']; ?>" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModal">Rental Equipment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div aria-hidden="true">
                        <form action="<?= BASEURL; ?>/home/rent" method="post">
                            <input type="hidden" class="form-control" id="equipment_id" name="equipment_id" value="<?= $dt['equipment_id'] ?>">
                            <div class="form-group">
                                <label class="form-control-label" for="item_name">Item Name</label>
                                <input type="text" class="form-control" id="item_name" name="item_name" value="<?= $dt['item_name'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="price">Rental price</label>
                                <input type="number" class="form-control" id="price" name="price" value="<?= $dt['price'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="rental_date">Rental Date</label>
                                <input type="date" class="form-control" id="rental_date" name="rental_date">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="return_date">Return Date</label>
                                <input type="date" class="form-control" id="return_date" name="return_date">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Rent Equipment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Order now -->
