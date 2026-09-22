<!--Section Banner--->
<section>
    <div class="bannerimg cover-image bg-background3" data-image-src="<?= BASEURL; ?>/assets_dashboard/images/banner/1.png" style="background: url(&quot;<?= BASEURL; ?>/assets_dashboard/images/banner/1.png&quot;) center center;">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white">
                    <h1 class="">Login</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Login</li>
                    </ol>
                </div>
            </div>
            <section class="sptb">
    <div class="container customer-page">
        <div class="row">
            <div class="single-page">
                <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                    <div class="glassy-card">
                        <form method="POST" action="<?= BASEURL; ?>/users/login" class="card-body form-luxurious" tabindex="500">
                            <h3 class="form-title">Login</h3>
                            <?php Flasher::flash(); ?>
                            <div class="form-group position-relative">
                                <input type="text" name="username" id="username" class="form-control input-luxurious" placeholder=" ">
                                <label class="label-luxurious">Username</label>
                                <span class="invalid-feedback error-luxurious d-block">
                                    <?php echo $data['usernameError'] ?? ''; ?>
                                </span>
                            </div>
                            <div class="form-group position-relative">
                                <input type="password" name="password" id="password" class="form-control input-luxurious" placeholder=" ">
                                <label class="label-luxurious">Password</label>
                                <span class="invalid-feedback error-luxurious d-block">
                                    <?php echo $data['passwordError'] ?? ''; ?>
                                </span>
                            </div>
                            <button id="submit" type="submit" value="submit" class="btn btn-primary btn-luxurious btn-block">Login</button>
                            <p class="mb-2"><a href="#" class="link-luxurious">Forgot Password</a></p>
                            <p class="text-dark mb-0">Don't have an account? <a href="<?= BASEURL; ?>/home/register" class="text-primary ml-1 link-luxurious">Sign Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


        </div>
    </div>
</section>
<!--Banner end-->
