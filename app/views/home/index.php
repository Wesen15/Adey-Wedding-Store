<!--Section-->
<div>
  <div class="cover-image sptb-1 bg-background" data-image-src="<?= BASEURL; ?>/assets_dashboard/images/banner/1.png" style="background: url(&quot;<?= BASEURL; ?>/assets_dashboard/images/banner/1.png&quot;) center center;">
    <div class="header-text1 mb-0">
      <div class="container">
        <div class="row">
          <div class="col-xl-7 col-lg-7 col-md-12">
            <div class="text-white mt-lg-7 mb-5">
              <h1 class="mb-3 display-3"><span class="font-weight-bold">Adey </span><br>Wedding Store</h1>
              <p class="fs-18 mb-6">Elegant. Traditional. Unforgettable..</p><a href="<?= BASEURL; ?>/home/login" class="btn btn-register-glassy btn-lg mr-2">Login</a> <a href="<?= BASEURL; ?>/home/register" class="btn btn-login-glassy btn-lg">Sign Up Now</a>
            </div>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-12 search-equipment-container">
          <div class="card mb-0 shadow-none">
            <div class="card-body">
              <h3 class="mb-4">Search For Equipment</h3>
              <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto">
                  <form method="GET" action="<?= BASEURL; ?>/search" tabindex="500">
                    <div class="form-group_search-equipment1">
                      <select id="equipment" name="query" required="" class="form-control select2-show-search border-bottom-0 w-100 br-3 select2-hidden-accessible luxurious-select" data-placeholder="Select" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <optgroup label="" data-select2-id="9998">
                            <option value="choose" data-select2-id="1">Search</option>
                            <?php foreach ($data['equipment'] as $equipment) : ?>
                                <option value="<?= $equipment['item_name'] ?>"><?= $equipment['item_name'] ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                      </select>
                    </div>
                <button id="submit" type="submit" value="submit" class="submit btn btn-primary btn-block luxurious-button">Search Equipment</button>
               </form>
        </div>
    </div>
</div>


        </div>
      </div>
    </div>
    <!-- /header-text -->
  </div>
</div>
<!--Section-->
<!--Featured Products-->
<section class="sptb bg-patterns bg-white">
  <div class="container">
    <div class="section-title center-block text-center">
      <h2>Selected Equipment</h2>
      <p>Products Selected by Many Of Adey Store Users</p>
    </div>
    <div id="feature-carousel" class="owl-carousel owl-carousel-icons auction-content owl-loaded owl-drag">
      <div class="owl-stage-outer">
        <div class="owl-stage" style="transform: translate3d(-2001px, 0px, 0px); transition: all 0.25s ease 0s; width: 4404px;">
          <?php foreach ($data['equipment'] as $mb) : ?>
            <div class="owl-item" style="width: 375.333px; margin-right: 25px;">
              <div class="item <?php if ($mb['status'] == '0') echo 'sold-out' ?>">
                <?php if ($mb['status'] == '0') echo '<div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">Reserved</span></div>' ?>
                <div class="card mb-0">
                  <div class="item-card2-img"> <a class="link" <?php if ($mb['status'] == '1') echo 'href="#"' ?>></a> <img width="373.33px" height="221.98px" src="<?= BASEURL . '/equipment_photo/' . $mb['picture'] ?>" alt="img" class="cover-image">
                    <?php if ($mb['status'] == '1') echo '<div class="item-tag-overlaytext"> <span class="text-white bg-success"> Available</span> </div>' ?>
                    <div class="item-card2-icons"> <a class="item-card2-icons-l bg-primary"> <i class="fa fa-cart-arrow-down"></i></a> <a class="item-card2-icons-r wishlist active"><i class="fa fa fa-heart"></i></a> </div>
                  </div>
                  <div class="card-body pb-0">
                    <div class="item-card2">
                      <div class="item-card2-desc">
                        <div class="item-card2-text"> <a <?php if ($mb['status'] == '1') echo 'href="#"' ?> class="text-dark">
                            <h4 class="mb-0"><?php echo $mb['item_name']; ?></h4>
                          </a> </div>
                        <div class="d-flex pb-0 pt-0"> <a <?php if ($mb['status'] == '1') echo 'href="#"' ?>>
                            <p class="pb-0 pt-0 mb-2 mt-2"><i class="fa fa-map-marker text-danger mr-2"></i><?php echo $mb['location'] ?>, Ethiopia</p>
                            <p class="item-description"><?php echo substr($mb['description'], 0, 43); ?> ... </p> <!-- Truncated description -->
                            <button class="btn btn-link btn-sm see-more-btn" >See More</button> <!-- See More button -->
                        </div>
                      </div>
                    </div>
                    <div class="item-card2-footer mt-4 mb-4">
                      <div class="item-card2-footer-u">
                        <div class="d-md-flex"> <span class="review_score mr-2 badge badge-primary">ETB <?php echo number_format($mb['price'], 0, ',', '.'); ?></span>
                          <div class="rating-stars d-inline-flex ml-auto"> <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
                            <div class="rating-stars-container">
                              <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                              <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                              <div class="rating-star sm is--active"> <i class="fa fa-star"></i> </div>
                              <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                              <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                            </div> (5 Reviews)
                          </div>
                        </div>
                      </div> <a class="btn btn-primary btn-block mt-3 <?php if ($mb['status'] == '0') echo 'disabled' ?>" href="<?= BASEURL; ?>/home/detail/<?= $mb['equipment_id'] ?>">Book Now</a>
                    </div>
                  </div>
                  <div class="card-footer">

                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><

    </div>
  </div>
</section>

<!--/Featured Products-->
<!--Section-->
<section class="sptb bg-8">
  <div class="container">
    <div class="section-title center-block text-center">
      <h2>Top Wedding Brands </h2>
      <p>There are many top brands that we provide.</p>
    </div>
    <div class="row">
      <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
        <div class="card bg-card mb-lg-0">
          <div class="card-body">
            <div class="cat-item text-center"> <a href="#"></a>
              <div class="cat-img text-shadow1"> <img src="<?= BASEURL; ?>/assets_dashboard/images/Brand/vs.png" alt="img" class="cover-image h-8 w-8"> </div>
              <div class="cat-desc">
                <h5 class="mb-1">Venue Setup</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
        <div class="card bg-card mb-lg-0">
          <div class="card-body">
            <div class="cat-item text-center"> <a href="#"></a>
              <div class="cat-img text-shadow1"> <img src="<?= BASEURL; ?>/assets_dashboard/images/Brand/d.png" alt="img" class="cover-image h-8 w-8"> </div>
              <div class="cat-desc">
                <h5 class="mb-1">Decorations</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
        <div class="card bg-card mb-md-0">
          <div class="card-body">
            <div class="cat-item text-center"> <a href="#"></a>
              <div class="cat-img text-shadow1"> <img src="<?= BASEURL; ?>/assets_dashboard/images/Brand/p.png" alt="img" class="cover-image h-8 w-8"> </div>
              <div class="cat-desc">
                <h5 class="mb-1">Photography</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
        <div class="card bg-card mb-md-0">
          <div class="card-body">
            <div class="cat-item text-center"> <a href="#"></a>
              <div class="cat-img text-shadow1"> <img src="<?= BASEURL; ?>/assets_dashboard/images/Brand/v.png" alt="img" class="cover-image h-8 w-8"> </div>
              <div class="cat-desc">
                <h5 class="mb-1">Videography</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
        <div class="card bg-card mb-sm-0">
          <div class="card-body">
            <div class="cat-item text-center"> <a href="#"></a>
              <div class="cat-img text-shadow1"> <img src="<?= BASEURL; ?>/assets_dashboard/images/Brand/cs.png" alt="img" class="cover-image h-8 w-8"> </div>
              <div class="cat-desc">
                <h5 class="mb-1">Catering Services</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
        <div class="card bg-card mb-0">
          <div class="card-body">
            <div class="cat-item text-center"> <a href="#"></a>
              <div class="cat-img text-shadow1"> <img src="<?= BASEURL; ?>/assets_dashboard/images/Brand/dj.png" alt="img" class="cover-image h-8 w-8"> </div>
              <div class="cat-desc">
                <h5 class="mb-1">DJ or live band</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Section-->
<!--Call to action-->
<section>
  <div class="about-1 cover-image sptb bg-background-color text-white" data-image-src="<?= BASEURL; ?>/assets_dashboard/images/EqMenu/5.jpg" style="background: url(&quot;<?= BASEURL; ?>/assets_dashboard/images/banner/5.jpg&quot;) center center;">
    <div class="content-text mb-0">
      <div class="container">
        <div class="section-title center-block text-center">
          <h2>What is Adey Store?</h2>
          <p class="text-white-50">Choose Adey Wedding Store for the best in wedding services, ensuring your special day is elegant, traditional, and unforgettable</p>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <p class="fs-16">Adey Store is your trusted partner for all wedding-related services, specializing in creating elegant and unforgettable wedding experiences. Our comprehensive range of services includes.</p>
            <ul class="list-group mb-4">
              <li class="mt-1 mb-2 fs-16"><i class="fa fa-angle-right mr-1" aria-hidden="true"></i> DJ or Live Band</li>
              <li class="mt-1 mb-2 fs-16"><i class="fa fa-angle-right mr-1" aria-hidden="true"></i> Catering Services</li>
              <li class="mt-1 mb-2 fs-16"><i class="fa fa-angle-right mr-1" aria-hidden="true"></i> Venue Setup</li>
              <li class="mt-1 mb-2 fs-16"><i class="fa fa-angle-right mr-1" aria-hidden="true"></i> Car Rentals</li>
            </ul> <a class="btn btn-login-glassy btn-lg" href="<?= BASEURL; ?>/home/login">Login</a> <a class="btn btn-register-glassy btn-lg" href="<?= BASEURL; ?>/home/register">Register Now</a>
          </div>
          <div class="col-lg-6">
            <div class="border-5 br-7 mt-5 mt-lg-0">
              <div class="owl-carousel testimonial-owl-carousel3 owl-loaded owl-drag">
                <div class="owl-stage-outer">
                  <div class="owl-stage" style="transform: translate3d(-1773px, 0px, 0px); transition: all 0.25s ease 0s; width: 4137px;">
                    <div class="owl-item cloned" style="width: 566px; margin-right: 25px;">
                      <div class="item"> <img src="<?= BASEURL; ?>/assets_dashboard/images/EqMenu/2.jpg" alt="img"> </div>
                    </div>
                    <div class="owl-item cloned" style="width: 566px; margin-right: 25px;">
                      <div class="item"> <img src="<?= BASEURL; ?>/assets_dashboard/images/EqMenu/4.jpg" alt="img"> </div>
                    </div>
                    <div class="owl-item" style="width: 566px; margin-right: 25px;">
                      <div class="item"> <img src="<?= BASEURL; ?>/assets_dashboard/images/EqMenu/1.jpg" alt="img"> </div>
                    </div>
                    <div class="owl-item active" style="width: 566px; margin-right: 25px;">
                      <div class="item"> <img src="<?= BASEURL; ?>/assets_dashboard/images/EqMenu/7.jpg" alt="img"> </div>
                    </div>
                    <div class="owl-item" style="width: 566px; margin-right: 25px;">
                      <div class="item"> <img src="<?= BASEURL; ?>/assets_dashboard/images/EqMenu/3.jpg" alt="img"> </div>
                    </div>
                    <div class="owl-item cloned" style="width: 566px; margin-right: 25px;">
                      <div class="item"> <img src="<?= BASEURL; ?>/assets_dashboard/images/EqMenu/5.jpg" alt="img"> </div>
                    </div>
                    <div class="owl-item cloned" style="width: 566px; margin-right: 25px;">
                      <div class="item"> <img src="<?= BASEURL; ?>/assets_dashboard/images/EqMenu/6.jpg" alt="img"> </div>
                    </div>
                  </div>
                </div>
                <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Call to action-->
<!--Section-->
<section class="sptb bg-patterns bg-white">
  <div class="container">
    <div class="section-title center-block text-center">
      <h2>Best Wedding Services</h2>
      <p>The best equipment and services we provide to ensure a flawless and unforgettable wedding day</p>
    </div>
    <div id="myCarousel2" class="owl-carousel owl-carousel-icons5 owl-loaded owl-drag">
      <!-- Wrapper for carousel items -->
      <div class="owl-stage-outer">
        <div class="owl-stage">
          <?php foreach ($data['equipment'] as $mb) : ?>
            <div class="owl-item">
              <div class="item <?= $mb['status'] == '0' ? 'sold-out' : '' ?>">
                <?= $mb['status'] == '0' ? '<div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">Reserved</span></div>' : '' ?>
                <div class="card mb-0">
                  <div class="item-card7-imgs">
                    <a class="link" <?= $mb['status'] == '1' ? 'href="#"' : '' ?>></a>
                    <img width="273.25px" height="162.46px" src="<?= BASEURL . '/equipment_photo/' . $mb['picture'] ?>" alt="Equipment Image" class="cover-image">
                    <div class="item-tag">
                      <h4 class="mb-0 fs-13">ETB <?= number_format($mb['price'], 0, ',', '.'); ?></h4>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="item-card7-desc">
                      <div class="item-card7-text d-flex">
                        <a <?= $mb['status'] == '1' ? 'href="#"' : '' ?> class="text-dark">
                          <h4 class=""><?= $mb['item_name'] ?></h4>
                        </a>
                      </div>
                      <ul class="item-cards7-ic mb-0 mt-2">
                        
                          <a class="icons"><i class="icon icon-location-pin text-muted mr-1"></i> <?= $mb['location'] ?></a>
                      
                      </ul>
                      <p class="mb-0"><?= substr($mb['description'], 0, 45); ?></p>
                    </div>
                    <div class="item-card2-footer mt-4 mb-0">
                      <a class="btn btn-order-now-transparent btn-block <?= $mb['status'] == '0' ? 'disabled' : '' ?>" href="<?= BASEURL; ?>/home/detail/<?= $mb['equipment_id'] ?>"> Book Now</a>
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
</section>

<!--Section-->
