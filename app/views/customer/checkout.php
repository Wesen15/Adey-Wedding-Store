<!-- Section Banner -->
<div>
    <div class="cover-image sptb-1 bg-background" style="background: url('<?= BASEURL; ?>/assets_dashboard/images/banner/1.png.jpg') center center;">
        <div class="header-text1 mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-12 col-md-12 d-block mx-auto">
                        <div class="text-center text-white">
                            <h1 class="mb-5"><span class="font-weight-bold">Much </span> More Equipment Available</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Main Section -->
<section class="sptb">
    <div class="container">
        <div class="row">
            <!-- Left Column -->
            <div class="col-xl-9 col-lg-9 col-md-12">
                <!-- Checkout Table -->
                <?php Flasher::flash(); ?>
                <div class="card mb-0">
                    <div class="card-header">
                        <h3 class="card-title">Your Transaction Data</h3>
                    </div>
                    <div class="card-body">
                        <div class="manged-ad table-responsive border-top userprof-tab">
                            <table class="table table-bordered table-hover mb-0 text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Equipment</th>
                                        <th>Rental Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['transaction'] as $tk) : ?>
                                        <?php if ($tk['rental_status'] != 6) : // Exclude completed transactions ?>
                                            <tr>
                                                <td class="text-primary">#000<?= htmlspecialchars($tk['rental_id']) ?></td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="card-aside-img"><img src="<?= BASEURL . '/equipment_photo/' . $tk['picture'] ?>" alt="img"> </div>
                                                        <div class="media-body">
                                                            <div class="card-item-desc ml-4 p-0 mt-0">
                                                                <h4 class="font-weight-semibold"><?= $tk['item_name'] ?></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>ETB <?= number_format($tk['price'], 0, ',', '.'); ?></td>
                                                <td>
                                                    <?php if ($tk['rental_status'] == 6) : ?>
                                                        <span class="btn btn-success">Rental Completed</span>
                                                    <?php elseif ($tk['rental_status'] == 5) : ?>
                                                        <span class="btn btn-outline-warning">Currently Rental</span>
                                                    <?php elseif ($tk['rental_status'] == 2) : ?>
                                                        <span class="btn btn-outline-primary">Not Taken Yet</span>
                                                    <?php elseif ($tk['rental_status'] == 0) : ?>
                                                        <form action="<?= BASEURL; ?>/customer/payment/<?= $tk['rental_id'] ?>" method="post">
                                                            <button type="submit" class="btn btn-outline-warning">Payment</button>
                                                        </form>
                                                    <?php elseif ($tk['rental_status'] == 1) : ?>
                                                        <span class="btn btn-outline-warning">Waiting for Confirmation</span>
                                                    <?php elseif ($tk['rental_status'] == 3) : ?>
                                                        <a href="<?= BASEURL; ?>/customer/payment/<?= $tk['rental_id'] ?>" class="btn btn-outline-danger">Payment Rejected - Reupload</a>
                                                    <?php elseif ($tk['rental_status'] == 7) : ?>
                                                        <span class="btn btn-outline-secondary">Order Canceled</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($tk['rental_status'] == 0) : ?>
                                                        <a href="<?= BASEURL; ?>/customer/cancelOrder/<?= $tk['rental_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this order?');">Cancel Order</a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End Checkout Table -->
            </div>
            <!-- Right Column -->
            <div class="col-xl-3 col-lg-3 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Why choose Adey Store?</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled widget-spec mb-0">
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Expertise and Experience</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Tailored Services</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Quality Assurance</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Customer Satisfaction</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Best Equipments Section -->
        <div class="container">
            <div class="section-title center-block text-center">
                <br><br>
                <h2>Best Equipments</h2>
                <p>Ready to Plan Your Dream Wedding?</p>
            </div>
            <div id="myCarousel2" class="owl-carousel owl-carousel-icons5 owl-loaded owl-drag">
                <!-- Wrapper for carousel items -->
                <div class="owl-stage-outer">
                    <div class="owl-stage" style="transform: translate3d(-1801px, 0px, 0px); transition: all 0.25s ease 0s; width: 3904px;">
                        <?php foreach ($data['equipment'] as $mb) : ?>
                            <div class="owl-item" style="width: 275.25px; margin-right: 25px;">
                                <div class="item <?= ($mb['status'] == '0') ? 'sold-out' : '' ?>">
                                    <?php if ($mb['status'] == '0') : ?>
                                        <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">Not Available</span></div>
                                    <?php endif; ?>
                                    <div class="card mb-0">
                                        <div class="item-card7-imgs">
                                            <a class="link" <?= ($mb['status'] == '1') ? 'href="#"' : '' ?>></a>
                                            <img width="273.25px" height="162.46px" src="<?= BASEURL . '/equipment_photo/' . htmlspecialchars($mb['picture']) ?>" alt="img" class="cover-image">
                                            <div class="item-tag">
                                                <h4 class="mb-0 fs-13">ETB <?= number_format($mb['price'], 0, ',', '.'); ?></h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card7-desc">
                                                <div class="item-card7-text d-flex">
                                                    <a <?= ($mb['status'] == '1') ? 'href="#"' : '' ?> class="text-dark">
                                                        <h4 class=""><?= htmlspecialchars($mb['item_name']) ?></h4>
                                                    </a>
                                                </div>
                                                <ul class="item-cards7-ic mb-0 mt-2">
                                                    <li><a><span class="text-muted"><i class="icon icon-eye mr-1"></i></span></a></li>
                                                    <li><a class="icons"><i class="icon icon-location-pin text-muted mr-1"></i> <?= htmlspecialchars($mb['location']) ?></a></li>
                                                    <li><a class="icons"><i class="icon icon-event text-muted mr-1"></i> <?= htmlspecialchars(substr($mb['description'], 0, 49)) ?></a></li>
                                                </ul>
                                                <p class="mb-0"><?= htmlspecialchars(substr($mb['description'], 0, 49)) ?></p>
                                            </div>
                                            <div class="item-card2-footer mt-4 mb-0">
                                                <a class="btn btn-primary btn-block <?= ($mb['status'] == '0') ? 'disabled' : '' ?>" href="<?= BASEURL; ?>/home/detail/<?= htmlspecialchars($mb['equipment_id']) ?>">Order now</a>
                                            </div>
                                        </div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Main Section -->
