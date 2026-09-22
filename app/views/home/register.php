<!--Section Banner--->
<section>
    <div class="bannerimg cover-image bg-background3" data-image-src="<?= BASEURL; ?>/assets_dashboard/images/banner/1.png" style="background: url(&quot;<?= BASEURL; ?>/assets_dashboard/images/banner/1.png&quot;) center center;">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white">
                    <h1 class="">Register</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Register</li>
                    </ol>
                </div>
            </div>
            <section class="sptb">
            <div class="container customerpage">
    <div class="row">
        <div class="single-page">
            <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                <div class="glassy-card-register">
                    <form id="register-form" method="POST" action="<?= BASEURL; ?>/users/register_customer" class="form-luxurious-register" tabindex="500">
                        <h3 class="form-title-register">Register</h3>
                        <?php Flasher::flash(); ?>
                        <div class="form-group position-relative">
                            <input type="text" name="name" id="name" class="input-luxurious-register" required>
                            <label class="label-luxurious-register">Name</label>
                            <span class="invalidFeedback error-luxurious-register">
                                <?= $data['nameError'] ?? ''; ?>
                            </span>
                        </div>
                        <div class="form-group position-relative">
                            <input type="text" name="username" id="username" class="input-luxurious-register" required>
                            <label class="label-luxurious-register">Username</label>
                            <span class="invalidFeedback error-luxurious-register">
                                <?= $data['usernameError'] ?? ''; ?>
                            </span>
                        </div>
                        <div class="form-group position-relative">
                            <input type="email" name="email" id="email" class="input-luxurious-register" required>
                            <label class="label-luxurious-register">Email</label>
                            <span class="invalidFeedback error-luxurious-register">
                                <?= $data['emailError'] ?? ''; ?>
                            </span>
                        </div>
                        <div class="form-group position-relative">
                            <input type="password" name="password" id="password" class="input-luxurious-register" required>
                            <label class="label-luxurious-register">Password</label>
                            <span class="invalidFeedback error-luxurious-register">
                                <?= $data['passwordError'] ?? ''; ?>
                            </span>
                        </div>
                        <div class="form-group position-relative">
                            <input type="password" name="confirmPassword" id="confirmPassword" class="input-luxurious-register" required>
                            <label class="label-luxurious-register">Confirm Password</label>
                            <span class="invalidFeedback error-luxurious-register">
                                <?= $data['confirmPasswordError'] ?? ''; ?>
                            </span>
                        </div>
                        <button id="submit" type="submit" value="submit" class="btn btn-luxurious-register btn-block">Register</button>
                        <p class="text-dark mb-0">Already have an account?<a href="<?= BASEURL ?>/home/login" class="text-primary ml-1">Sign In</a></p>
                            <p class="text-dark mb-0 mt-3">If you are a vendor, please <a href="#" id="contact-link" class="text-primary ml-1">contact Adey Wedding Store</a> for more information.</p>
                            <div id="contact-info" style="display:none;">
                                <p class="text-dark mb-0 mt-2">Email: contact@adeyweddingstore.com</p>
                                <p class="text-dark mb-0">Phone: +123-456-7890</p>
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
<!--Register--->

<!--End Register--->
<script>
    document.getElementById('contact-link').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('contact-info').style.display = 'block';
    });
</script>