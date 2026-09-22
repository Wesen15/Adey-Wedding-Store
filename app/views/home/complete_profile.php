<section>
    <div class="bannerimg cover-image bg-background3" data-image-src="<?= BASEURL; ?>/assets_dashboard/images/banner/1.png" style="background: url('<?= BASEURL; ?>/assets_dashboard/images/banner/1.png') center center;">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white">
                    <h1 class="">Complete Profile</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Complete Profile</li>
                    </ol>
                </div>
            </div>
            <section class="sptb">
    <div class="container customerpage">
        <div class="row">
            <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                <form id="complete-form" method="POST" action="<?= BASEURL; ?>/home/complete_action" enctype="multipart/form-data" class="form-luxurious-complete-profile">
                    <div class="glassy-card-complete-profile">
                        <div class="card-header">
                            <h3 class="form-title-complete-profile">Complete Profile</h3>
                            <?php Flasher::flash(); ?>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['user_id']; ?>">
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <input type="text" name="name" id="name" value="<?php foreach ($data['get_name'] as $gn) { echo $gn; } ?>" disabled class="input-luxurious-complete-profile">
                                        <label class="label-luxurious-complete-profile">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <input type="text" name="address" id="address" class="input-luxurious-complete-profile" required="">
                                        <label class="label-luxurious-complete-profile">Address</label>
                                        <span class="invalidFeedback error-luxurious-complete-profile">
                                            <?php echo $data['addressError']; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <select class="input-luxurious-complete-profile" name="gender" id="gender" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <label class="label-luxurious-complete-profile">Gender</label>
                                        <span class="invalidFeedback error-luxurious-complete-profile">
                                            <?php echo $data['genderError']; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <input type="number" name="phone_number" id="phone_number" class="input-luxurious-complete-profile" required="">
                                        <label class="label-luxurious-complete-profile">Phone Number</label>
                                        <span class="invalidFeedback error-luxurious-complete-profile">
                                            <?php echo $data['phone_numberError']; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <input type="number" name="id_number" id="id_number" class="input-luxurious-complete-profile" required="">
                                        <label class="label-luxurious-complete-profile">National ID Number</label>
                                        <span class="invalidFeedback error-luxurious-complete-profile">
                                            <?php echo $data['id_numberError']; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-0 position-relative">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="photo" name="photo" required="">
                                            <label class="custom-file-label" for="photo">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button id="submit" type="submit" value="submit" class="btn btn-luxurious-complete-profile btn-block">Complete Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
        </div>
        
    </div>
</section>
<!--Register--->


<!--End Register--->
