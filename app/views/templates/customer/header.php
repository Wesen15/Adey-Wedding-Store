<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Favicon and Icons -->
  <link rel="apple-touch-icon" sizes="180x180" href="/assets_dashboard/images/photo/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets_dashboard/images/photo/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets_dashboard/images/photo/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="icon" href="<?= BASEURL; ?>/assets_dashboard/images/photo/favicon-32x32.png" type="image/x-icon">
  <link rel="shortcut icon" type="image/x-icon" href="<?= BASEURL; ?>/assets_dashboard/images/photo/favicon-32x32.png">
  <meta name="msapplication-TileColor" content="#162946">
  <meta name="theme-color" content="#e72a1a">
  
  <!-- Meta Tags -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="HandheldFriendly" content="True">
  
  <!-- Title -->
  <title>Adey - Wedding Store</title>
  
  <!-- CSS Files -->
  <link href="<?= BASEURL; ?>/assets_dashboard/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>/assets_dashboard/css/style.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>/assets_dashboard/css/icons.css" rel="stylesheet">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="<?= BASEURL; ?>/assets_dashboard/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>/assets_dashboard/plugins/select2/select2.min.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>/assets_dashboard/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>/assets_dashboard/plugins/date-picker/spectrum.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>/assets_dashboard/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet">
  <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?= BASEURL; ?>/assets_dashboard/colorskins/color-skins/color13.css">
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets_dashboard/colorskins/demo.css">
</head>

<body>
  <div class="horizontalMenucontainer">
    <!-- Loader -->
    <div id="global-loader" style="display: none;">
      <img src="<?= BASEURL; ?>/assets_dashboard/images/photo/loader.svg" class="loader-img" alt="Loading">
    </div>
    
    <!-- Topbar -->
    <div class="header-main">
      <!-- Horizontal Header -->
      <div class="sticky-wrapper" style="height: 88px;">
        <div class="horizontal-header clearfix" style="width: 1343px;">
          <div class="container">
            <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
            <span class="smllogo"><img src="<?= BASEURL; ?>/assets_dashboard/images/photo/logo5.png" width="120" alt="Adey Logo "></span>
          </div>
        </div>
      </div>
      
      <!-- Horizontal Main -->
      <div class="sticky-wrapper" style="height: 88px;">
        <div class="horizontal-main horizontal-main bg-dark-transparent clearfix" style="width: 1480px;">
          <div class="horizontal-mainwrapper container clearfix">
            <div class="desktoplogo"><a href="#"><img src="<?= BASEURL; ?>/assets_dashboard/images/photo/logo15.png" alt="Adey Logo "></a></div>
            <div class="desktoplogo-1"><a href="#"><img src="<?= BASEURL; ?>/assets_dashboard/images/photo/logo18.png" alt="Adey Logo "></a></div>
            
            <!-- Navigation -->
            <nav class="horizontalMenu clearfix d-md-flex">
              <div class="outsidebg"></div>
              <ul class="horizontalMenu-list">
                <li aria-haspopup="true"><a href="<?= BASEURL ?>/home/landing">Home</a></li>
                <?php if (isset($_SESSION['user_id'])) : ?>
                  <?php if ($_SESSION['group_id'] == '1') : ?>
                    <li aria-haspopup="true"><a href="<?= BASEURL ?>/dashboard">Dashboard</a></li>
                  <?php elseif ($_SESSION['group_id'] == '2') : ?>
                    <li aria-haspopup="true"><a href="<?= BASEURL ?>/dashboard">Dashboard</a></li>
                  <?php endif; ?>
                <?php endif; ?>
                <li aria-haspopup="true"><a href="<?= BASEURL ?>/home/equipmentlist">Equipment List</a></li>
                <?php if (!isset($_SESSION['user_id'])) : ?>
                  <li aria-haspopup="true"><a href="<?= BASEURL ?>/home/register">Register</a></li>
                  <li aria-haspopup="true"><a href="<?= BASEURL ?>/home/login">Login</a></li>
                <?php else : ?>
                  <li aria-haspopup="true"><a href="<?= BASEURL ?>/users/logout">Logout</a></li>
                <?php endif; ?>
              </ul>
              <ul class="mb-0">
                <li aria-haspopup="true" class="mt-5 d-none d-lg-block"><a class="btn btn-green ad-post" href="<?= BASEURL ?>/customer/checkout"><i class="fa fa-shopping-cart text-white mr-1"></i>Checkout</a></li>
              </ul>
            </nav>
            <!-- End Navigation -->
          </div>
        </div>
      </div>
      <!-- End Horizontal Main -->
    </div>
    <!-- End Topbar -->
  </div>
</body>

</html>
