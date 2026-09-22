<!--Section Banner--->
<div>
    <div class="cover-image sptb-1 bg-background" data-image-src="<?= BASEURL; ?>/assets_dashboard/images/banner/1.png.jpg" style="background: url('<?= BASEURL; ?>/assets_dashboard/images/banner/1.png.jpg') center center;">
        <div class="header-text1 mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-12 col-md-12 d-block mx-auto">
                        <div class="text-center text-white">
                            <h1 class="mb-5"><span class="font-weight-bold">3,750 </span> Equipment Rental Units Available</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /header-text -->
    </div>
</div>
<!--End Section Banner--->
<!--Break Crump--->
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
<!--End Break Crump-->
<!--All-->
<section class="sptb" data-select2-id="64">
    <div class="container" data-select2-id="63">
        <div class="row" data-select2-id="62">
            <!-- Checkout Table -->
            <?php Flasher::flash(); ?>
            <div class="col-xl-8 col-lg-8 col-md-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h3 class="card-title">Payment Invoice</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($data['transaction']['rental_status'] == 3) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">Payment failed, proof of payment does not match. Please re-upload or contact your administrator if something goes wrong. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><strong>Transaction Number</strong></td>
                                        <td>:</td>
                                        <td class="text-primary">#000<?= $data['transaction']['rental_id']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Equipment Brand</strong></td>
                                        <td>:</td>
                                        <td><?= $data['transaction']['item_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Rental Date</strong></td>
                                        <td>:</td>
                                        <td><?php echo date('d/m/Y', strtotime($data['transaction']['rental_date'])); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Return Date</strong></td>
                                        <td>:</td>
                                        <td><?php echo date('d/m/Y', strtotime($data['transaction']['return_date'])); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Rental Fee/Day</strong></td>
                                        <td>:</td>
                                        <td>ETB. <?php echo number_format($data['transaction']['price'], 0, ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number of Rental Days</strong></td>
                                        <td>:</td>
                                        <td><?php
                                            $rental = strtotime($data['transaction']['rental_date']);
                                            $return = strtotime($data['transaction']['return_date']);
                                            $jml = abs(($rental - $return) / (60 * 60 * 24));
                                            echo $jml > 0 ? "$jml Day" : "0 Day";
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-success"><strong>Total Payment</strong></td>
                                        <td class="text-success">:</td>
                                        <td class="text-success"><strong>ETB <?php echo number_format($jml > 0 ? $data['transaction']['price'] * $jml : $data['transaction']['price'], 0, ',', '.'); ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <div class="col text-right">
                                <a class="btn btn-transparent-black mb-0" href="<?= BASEURL; ?>/customer/checkout">Return</a>
                                <a href="<?= BASEURL; ?>/customer/printpayment/<?= $data['transaction']['rental_id']; ?>" class="btn btn-secondary icons"><i class="icon icon-printer mr-1"></i> Print Invoices</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Checkout Table -->
            <!--Right Side Content-->
            <div class="col-xl-4 col-lg-4 col-md-12" data-select2-id="61">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment Methods</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-pay">
                            <ul class="tabs-menu nav">
                                <li class=""><a href="#tab1" class="" data-toggle="tab"><i class="fa fa-university"></i> Bank Transfer</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <p>Bank Account Details</p>
                                    <dl class="card-text">
                                        <dt>BANK: </dt>
                                        <dd><?= htmlspecialchars($data['transaction']['bank_name'] ?? 'N/A'); ?></dd>
                                    </dl>
                                    <dl class="card-text">
                                        <dt>Account name: </dt>
                                        <dd><?= htmlspecialchars($data['transaction']['account_holder_name'] ?? 'N/A'); ?></dd>
                                    </dl>
                                    <dl class="card-text">
                                        <dt>Account Number: </dt>
                                        <dd><?= htmlspecialchars($data['transaction']['account_number'] ?? 'N/A'); ?></dd>
                                    </dl>
                                    <dl class="card-text">
                                        <dt>Transaction Number: </dt>
                                        <dd class="text-primary">#000<?= htmlspecialchars($data['transaction']['rental_id']); ?></dd>
                                    </dl>
                                    <p class="mb-0"><strong>Note:</strong> Please include the transaction number at the time of payment, to speed up the payment verification process.</p>
                                </div>
                            </div>
                        </div>
                        <?php
                            if (isset($data['transaction'])) {
                                $transaction = $data['transaction'];
                                if (!isset($transaction['payment_proof']) || empty($transaction['payment_proof'])) { ?>
                                    <button style="width: 100%;" type="button" class="btn btn-transparent-black mt-3" data-toggle="modal" data-target="#update_modal<?= $transaction['rental_id']; ?>">Upload Proof of Payment</button>
                                <?php } elseif ($transaction['rental_status'] == '1') { ?>
                                    <button style="width: 100%;" type="button" class="btn btn-warning mt-3"><i class="fa fa-clock-o"></i> waiting for confirmation</button>
                                <?php } elseif ($transaction['rental_status'] == '2') { ?>
                                    <button style="width: 100%;" type="button" class="btn btn-success mt-3"><i class="fa fa-check"></i> Payment confirmed successfully</button>
                                <?php } elseif ($transaction['rental_status'] == '3') { ?>
                                    <button style="width: 100%;" type="button" class="btn btn-danger mt-3" data-toggle="modal" data-target="#update_modal<?= $transaction['rental_id']; ?>">Reupload</button>
                                <?php } elseif ($transaction['rental_status'] == '5') { ?>
                                    <button style="width: 100%;" type="button" class="btn btn-warning mt-3"><i class="fa fa-clock-o"></i> On Rental</button>
                                <?php } elseif ($transaction['rental_status'] == '6') { ?>
                                    <button style="width: 100%;" type="button" class="btn btn-success mt-3"><i class="fa fa-check"></i> Transaction Complete</button>
                                <?php }
                            } else {
                                echo "Transaction data not available.";
                            }
                            ?>
                    </div>
                </div>
            </div>
            <!--/Right Side Content-->
            <!-- Form Modal Upload Bukti Bayar -->
            <div class="modal fade" id="update_modal<?= $data['transaction']['rental_id']; ?>" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="judulModal">Upload Proof of Payment</h5>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL; ?>/customer/upload_proof" method="post" enctype="multipart/form-data">
                                <input type="hidden" class="form-control" id="rental_id" name="rental_id" value="<?= $data['transaction']['rental_id']; ?>">
                                <div class="form-group">
                                    <label class="form-control-label" for="no_transaction">Transaction Number</label>
                                    <input type="text" class="form-control" value="#000<?= $data['transaction']['rental_id']; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="item_name">Equipment Brand</label>
                                    <input type="text" class="form-control" value="<?= $data['transaction']['item_name'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="description">Lease Term</label>
                                    <input type="text" class="form-control" value="<?php
                                        $rental = strtotime($data['transaction']['rental_date']);
                                        $return = strtotime($data['transaction']['return_date']);
                                        $jml = abs(($rental - $return) / (60 * 60 * 24));
                                        echo "$jml Day"
                                        ?> (<?php echo date('d/m/Y', strtotime($data['transaction']['rental_date'])); ?> - <?php echo date('d/m/Y', strtotime($data['transaction']['return_date'])); ?>)" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="description">Total Payment</label>
                                    <input type="text" class="form-control" value="ETB. <?php echo number_format($jml > 0 ? $data['transaction']['price'] * $jml : $data['transaction']['price'], 0, ',', '.'); ?>" disabled>
                                </div>
                                <label>Upload picture</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="picture" name="picture">
                                    <label class="custom-file-label" for="picture">Select File</label>
                                </div>
                                <div class="modal-footer mt-5">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" id="submit" class="btn btn-secondary">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form Modal Upload Bukti Bayar -->
            <!--Section-->
            <div class="container">
                <div class="section-title center-block text-center">
                    <br><br>
                    <h2>Best Cars</h2>
                </div>
                <div id="myCarousel2" class="owl-carousel owl-carousel-icons5 owl-loaded owl-drag">
                    <!-- Wrapper for carousel items -->
                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(-1801px, 0px, 0px); transition: all 0.25s ease 0s; width: 3904px;">
                            <?php foreach ($data['equipment'] as $mb) : ?>
                                <div class="owl-item" style="width: 275.25px; margin-right: 25px;">
                                    <div class="item <?php if ($mb['status'] == '0') echo 'sold-out' ?>">
                                        <?php if ($mb['status'] == '0') echo '<div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">Dipesan</span></div>' ?>
                                        <div class="card mb-0">
                                            <?php if ($mb['status'] == '1'); ?>
                                            <div class="item-card7-imgs"> <a class="link" <?php if ($mb['status'] == '1') echo 'href="#"' ?>></a> <img width="273.25px" height="162.46px" src="<?= BASEURL . '/equipment_photo/' . $mb['picture'] ?>" alt="img" class="cover-image">
                                                <div class="item-tag">
                                                    <h4 class="mb-0 fs-13">ETB. <?php echo number_format($mb['price'], 0, ',', '.'); ?></h4>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="item-card7-desc">
                                                    <div class="item-card7-text  d-flex"> <a <?php if ($mb['status'] == '1') echo 'href="#"' ?> class="text-dark">
                                                            <h4 class=""><?php echo $mb['item_name'] ?></h4>
                                                        </a> </div>
                                                    <ul class="item-cards7-ic mb-0 mt-2">
                                                        <li><a class="icons"><i class="icon icon-location-pin text-muted mr-1"></i> <?php echo $mb['location'] ?></a></li>
                                                        <li><a class="icons"><i class="icon icon-event text-muted mr-1"></i> <?php substr($mb['description'], 0, 45)?></a></li>
                                                    </ul>
                                                    <p class="mb-0">Best Equipment Produced description <?php substr($mb['description'], 0, 45) ?> </p>
                                                </div>
                                                <div class="item-card2-footer mt-4 mb-0"> <a class="btn btn-primary btn-block <?php if ($mb['status'] == '0') echo 'disabled' ?>" href="<?= BASEURL; ?>/home/cardetail/<?= $mb['equipment_id'] ?>"> Book Now</a> </div>
                                            </div>
                                            <div class="card-footer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--Section-->
        </div>
    </div>
</section>
<!--End All-->
