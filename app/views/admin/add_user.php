<!-- Card stats -->
</div>
</div>
</div>
<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class="col-lg-8 card-wrapper">
      <!-- Page content -->
      <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">Add New User</h3>
          <?php Flasher::flash_modal(); ?>
        </div>
        <!-- Card body -->
        <div class="card-body">
          <form id="user-form" method="POST" action="<?= BASEURL; ?>/Users/add_user">
            <div class="form-group row">
              <label class="col-md-2 col-form-label form-control-label">Full Name</label>
              <div class="col-md-10"><input class="form-control" type="text" name="name" id="name">
                <span class="invalidFeedback" style="color: red">
                  <?= $data['nameError'] ?? '' ?>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label form-control-label">Username</label>
              <div class="col-md-10"><input class="form-control" type="text" name="username" id="username">
                <span class="invalidFeedback" style="color: red">
                  <?= $data['usernameError'] ?? '' ?>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label form-control-label">Email</label>
              <div class="col-md-10"><input class="form-control" type="email" name="email" id="email">
                <span class="invalidFeedback" style="color: red">
                  <?= $data['emailError'] ?? '' ?>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label form-control-label">Password</label>
              <div class="col-md-10"><input class="form-control" type="password" name="password" id="password">
                <span class="invalidFeedback" style="color: red">
                  <?= $data['passwordError'] ?? '' ?>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label form-control-label">Confirm Password</label>
              <div class="col-md-10"><input class="form-control" type="password" name="confirmPassword" id="confirmPassword">
                <span class="invalidFeedback" style="color: red">
                  <?= $data['confirmPasswordError'] ?? '' ?>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label form-control-label">Bank Name</label>
              <div class="col-md-10"><input class="form-control" type="bank_name" name="bank_name" id="bank_name">
                <span class="invalidFeedback" style="color: red">
                  <?= $data['bankNameError'] ?? '' ?>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label form-control-label">Account Number</label>
              <div class="col-md-10"><input class="form-control" type="account_number" name="account_number" id="account_number">
                <span class="invalidFeedback" style="color: red">
                  <?= $data['accountNumberError'] ?? '' ?>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label form-control-label">Account Holder Name</label>
              <div class="col-md-10"><input class="form-control" type="account_holder_name" name="account_holder_name" id="account_holder_name">
                <span class="invalidFeedback" style="color: red">
                  <?= $data['accountHolderNameError'] ?? '' ?>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label form-control-label">Role</label>
              <div class="col-md-10">
                <select class="form-control" name="role" id="role">
                  <option type="checkbox" value="3" selected>Customer</option>
                  <option type="checkbox" value="2">Vendor</option>
                  <option type="checkbox" value="1">Admin</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="submit" id="submit" class="btn btn-primary">Add User</button>
            </div>
          </form>
        </div>
      </div>
      <!-- End Page content -->
    </div>
  </div>
</div>
