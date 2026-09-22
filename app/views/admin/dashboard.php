<?php
// Your PHP code here
?>

       <!-- Card stats -->
        <div class="row">
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">All Transactions</h5>
                    <span class="h2 font-weight-bold mb-0"><?php foreach ($data['total_transactions'] as $ta) { echo $ta;} ?></span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="ni ni-active-40"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  <span class="text-nowrap">Of Total</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">All Customers</h5>
                    <span class="h2 font-weight-bold mb-0"><?php foreach ($data['total_user'] as $ta) { echo $ta;} ?></span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                      <i class="ni ni-chart-pie-35"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  <span class="text-nowrap">Of Total</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">All Vendors</h5>
                    <span class="h2 font-weight-bold mb-0"><?php foreach ($data['total_vendor'] as $ta) { echo $ta;} ?></span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                      <i class="ni ni-money-coins"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  <span class="text-nowrap">Of Total</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">All Equipments</h5>
                    <span class="h2 font-weight-bold mb-0"><?php foreach ($data['total_equipment'] as $ta) { echo $ta;} ?></span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                      <i class="ni ni-chart-bar-32"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  <span class="text-nowrap">Of Total</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
          <div class="card mb-4">
            <div class="card-body">
              <div class="card">
                <!-- List group -->
                <div class="row">
                  <div class="col-md-12">
                    <img class="card-img-top" height="100%" src="<?= BASEURL; ?>/assets_manage/img/theme/2.jpg" alt="Equipment Adey">
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- Div Class Container Content-->