<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="<?= BASEURL; ?>/dashboard">
          <img src="<?= BASEURL; ?>/assets_manage/img/brand/logo5.png" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
              <div class="collapse show" id="navbar-dashboards">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= BASEURL; ?>/dashboard" class="nav-link">Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= BASEURL; ?>/home/landing" class="nav-link">Customer Home</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASEURL; ?>/Equipment">
                <i class="ni ni-ui-04 text-info"></i>
                <span class="nav-link-text">Equipment List</span>
              </a>
            </li>
            <?php if ($_SESSION['group_id'] == '1') { ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL; ?>/Equipment/category_data">
                  <i class="ni ni-single-copy-04 text-pink"></i>
                  <span class="nav-link-text">Equipment Type</span>
                </a>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASEURL; ?>/dashboard/customer_data">
                <i class="ni ni-archive-2 text-green"></i>
                <span class="nav-link-text">Customer Data</span>
              </a>
            </li>
            <?php if ($_SESSION['group_id'] == '1') { ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL; ?>/dashboard/vendor_data">
                  <i class="ni ni-archive-2 text-green"></i>
                  <span class="nav-link-text">Vendors Data</span>
                </a>
              </li>
            <?php } ?>
            <?php if ($_SESSION['group_id'] == '2') { ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL; ?>/transaction/payment">
                  <i class="ni ni-single-copy-04 text-pink"></i>
                  <span class="nav-link-text">Payment</span>
                </a>
              </li>
            <?php } ?>
            <?php if ($_SESSION['group_id'] == '2') { ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL; ?>/transaction">
                  <i class="ni ni-chart-pie-35 text-info"></i>
                  <span class="nav-link-text">Transaction</span>
                </a>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASEURL; ?>/transaction/report">
                <i class="ni ni-align-left-2 text-default"></i>
                <span class="nav-link-text">Report</span>
              </a>
            </li>
            <?php if ($_SESSION['group_id'] == '1') { ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL; ?>/dashboard/add_user">
                  <i class="ni ni-ungroup text-orange"></i>
                  <span class="nav-link-text">Add User</span>
                </a>
              </li>
            <?php } ?>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">Settings</h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="<?= BASEURL; ?>/users/logout">
                <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">Logout</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->

          <ul class="navbar-nav align-items-center ml-md-auto">

            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default dropdown-menu-right">
                <div class="row shortcuts px-4">
                  <?php if ($_SESSION['group_id'] == '2') { ?>
                    <a href="<?= BASEURL; ?>/transaction" class="col-4 shortcut-item">
                      <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                        <i class="ni ni-calendar-grid-58"></i>
                      </span>
                      <small>Transaction</small>
                    </a>
                  <?php } ?>
                  <?php if ($_SESSION['group_id'] == '1') { ?>
                    <a href="<?= BASEURL; ?>/dashboard/vendor_data" class="col-4 shortcut-item">
                      <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                        <i class="ni ni-email-83"></i>
                      </span>
                      <small>Vendor Data</small>
                    </a>
                  <?php } ?>
                  <?php if ($_SESSION['group_id'] == '2') { ?>
                    <a href="<?= BASEURL; ?>/transaction/payment" class="col-4 shortcut-item">
                      <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                        <i class="ni ni-credit-card"></i>
                      </span>
                      <small>Payment</small>
                    </a>
                    <a href="<?= BASEURL; ?>/transaction/report" class="col-4 shortcut-item">
                      <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                        <i class="ni ni-books"></i>
                      </span>
                      <small>Report</small>
                    </a>
                  <?php } ?>
                  <?php if ($_SESSION['group_id'] == '1') { ?>
                    <a href="<?= BASEURL; ?>/equipment/category_data" class="col-4 shortcut-item">
                      <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                        <i class="ni ni-pin-3"></i>
                      </span>
                      <small>Equipment Type</small>
                    </a>
                    <a href="<?= BASEURL; ?>/Equipment" class="col-4 shortcut-item">
                      <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                        <i class="ni ni-basket"></i>
                      </span>
                      <small>Equipment List</small>
                    </a>
                  <?php } ?>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
               <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                      <?php
                      $profilePicture = isset($_SESSION['profile_picture']) && !empty($_SESSION['profile_picture']) ? $_SESSION['profile_picture'] : 'default.jpg';
                     ?>
                      <img alt="Image placeholder" src="<?= BASEURL; ?>/customer_photo/<?= htmlspecialchars($profilePicture); ?>">
                      </span>
                          <div class="media-body ml-2 d-none d-lg-block">
                         <span class="mb-0 text-sm font-weight-bold">
                        <?= htmlspecialchars($_SESSION['username']); ?>
                        </span>
                            </div>
                      </div>
                        </a>
                                  <div class="dropdown-menu dropdown-menu-right">
                                  <a href="#" class="dropdown-item" data-toggle="modal" data-target="#profileSettingsModal">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Profile Settings</span>
                    </>
                    <div class="dropdown-divider"></div>
                    <a href="<?= BASEURL ?>/users/logout" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                </div>
              </li>
            </ul>

<!-- Profile Settings Modal -->
<div class="modal fade" id="profileSettingsModal" tabindex="-1" role="dialog" aria-labelledby="profileSettingsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileSettingsModalLabel">Profile Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="profileSettingsForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($_SESSION['username']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="profile_picture">Profile Picture:</label>
                        <input type="file" class="form-control-file" id="profile_picture" name="profile_picture" accept="image/*">
                    </div>
                    <div id="vendor-details" style="display: none;">
                        <div class="form-group">
                            <label for="bank_name">Bank Name:</label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name">
                        </div>
                        <div class="form-group">
                            <label for="account_number">Account Number:</label>
                            <input type="text" class="form-control" id="account_number" name="account_number">
                        </div>
                        <div class="form-group">
                            <label for="account_holder_name">Account Holder Name:</label>
                            <input type="text" class="form-control" id="account_holder_name" name="account_holder_name">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div> </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0"><?php echo $data['title']; ?></h6>
              <?php if ($data['title'] != 'Dashboard') {
                echo '<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">' . $data['menu'] . '</a></li>
                <li class="breadcrumb-item active" aria-current="page">' . $data['submenu'] . '</li>
              </ol>
            </nav>';
              } ?>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    console.log("Document is ready");

    $('#profileSettingsModal').on('show.bs.modal', function (e) {
        if (<?= $_SESSION['group_id'] == 2 ? 'true' : 'false'; ?>) {
            $.ajax({
                type: 'POST',
                url: '<?= BASEURL; ?>/users/getVendorAccountDetails',
                data: { user_id: <?= $_SESSION['user_id']; ?> },
                success: function(response) {
                    var jsonResponse = JSON.parse(response);
                    if (jsonResponse.success) {
                        $('#bank_name').val(jsonResponse.data.bank_name);
                        $('#account_number').val(jsonResponse.data.account_number);
                        $('#account_holder_name').val(jsonResponse.data.account_holder_name);
                        $('#vendor-details').show();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                    alert('An error occurred while fetching vendor account details');
                }
            });
        }
    });

    $('#profileSettingsForm').on('submit', function(e) {
        e.preventDefault();
        console.log("Form submission prevented");

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '<?= BASEURL; ?>/users/update_profile',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var jsonResponse = JSON.parse(response);
                console.log(jsonResponse);

                if (jsonResponse.profile_picture) {
                    var newProfilePicture = '<?= BASEURL; ?>/customer_photo/' + jsonResponse.profile_picture;
                    $('.avatar img').attr('src', newProfilePicture);
                    $('#currentProfilePicture').attr('src', newProfilePicture);
                }

                alert(jsonResponse.message);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
                alert('An error occurred while updating the profile');
            }
        });
    });
});
</script>

          </div>