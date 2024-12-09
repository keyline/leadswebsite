<?= $this->section('style') ?>
<style>
.offer_holder {
  width: 100%;
  padding: 50px 30px;
  background-color: #ffffff;
  box-shadow: 2px 6px 18px rgb(0 0 0 / 30%);
  border-radius: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  /* background-image: url("https://i.postimg.cc/pdL2vfK9/bg.gif"); */
  background-repeat: no-repeat;
  background-size: contain;
  background-position: right;
}

.sign-up {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.heading {
  font-family: calibri;
  color: rgba(30, 30, 30, 1);
}

.text {
  width: 350px;
  height: 50px;
  box-shadow: 2px 6px 18px rgb(0 0 0 / 30%);
  border-radius: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 10px;
}

.text input {
  height: 40px;
  width: 80%;
  outline: none;
  border: none;
  font-size: 14px;
  margin: 5px;
}

.text img {
  margin-left: 20px;
}

.conditions {
  font-family: myriad pro;
  color: #bbc1cb;
  font-size: 14px;
}

.conditions a {
  color: #7d22e3;
  font-weight: 500;
}

.terms {
  display: flex;
  align-items: center;
}

button {
  width: 200px;
  height: 40px;
  outline: none;
  border: none;
  border-radius: 20px;
  background: #ed1c24 !important;
  border: 1px solid #ed1c24 !important;
  color: #ffffff;
  font-weight: 600;
  letter-spacing: 1px;
  font-size: 13px;
  cursor: pointer;
  transition: all 0.3s ease;
}

button:active {
  transform: scale(1.1);
}

.text-container {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  /* align-items: center; */
}

.text-container p {
  width: 100%;
  margin-bottom: 10px
}

.text-container h1 {
  color: #2d2c2c;
  line-height: 20px;
  margin-bottom: 15px
}

@media screen and (max-width: 1080px) {
  .text-container {
    display: none;
  }
 
}



@media screen and (max-width: 500px) {
  .text {
    width: 300px;
  }
}

@media screen and (max-width: 420px) {
  .heading {
    text-align: center;
  }
  .conditions {
    text-align: center;
  }
  input[type="checkbox"] {
    margin-right: 5px;
  }
  .text {
    width: 280px;
  }
}
</style>
<?= $this->endSection() ?>

<!-- inner page banner start -->
<section class="inner_banner inner_floting_box_banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="inner_floting_box">
                    <div class="about_more_box">
                        <div class="mission_tabs">
                            <h4><?= $page_header ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- inner page banner end -->


<!-- mission section start -->
<section class="contact_section">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Help us connect with you for seamless communication and support. -->
        </div>
        <br>
        <?php if ($session->getFlashdata('success_message')) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> <?php echo $session->getFlashdata('success_message'); ?>
            </div>
        <?php } ?>
        <?php if ($session->getFlashdata('error_message')) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> <?php echo $session->getFlashdata('error_message'); ?>
            </div>
        <?php } ?>
        <br>

        <!-- form  html -->
        <div class="container">
            <form id="warranty_registration_form" method="POST" enctype="multipart/form-data" action="">
                <!-- Step 1: Customer Information -->
                <div class="step-1">
                    <h3>🎉Get Your 10% OFF Coupon!🎉</h3>
                    <p>Fill out the form below and receive your unique code instantly, Show your nearest Leads dealer & enjoy the discount.</p>
                    <!-- <div class="row g-3">
                        <div class="col-md-6">
                            <label for="full_name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="full_name" name="full_name" value="<?= old('full_name') ?>">
                            <p class="text-danger error" id="name-error"><?= session('errors.full_name') ?? '' ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="email_address" class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email_address" name="email_address" value="<?= old('email_address') ?>">
                            <p class="text-danger error" id="name-error"><?= session('errors.email_address') ?? '' ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="phone_number" class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= old('phone_number') ?>">
                            <p class="text-danger error" id="name-error"><?= session('errors.phone_number') ?? '' ?></p>
                        </div>                        
                    </div> -->
                </div>                
                <!-- Submit Button -->
                <!-- <div class="mt-2 text-end">
                    <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                    g-recaptcha
                    <button class="btn btn-primary g-recaptcha " data-sitekey="<?= SITE_KEY ?>" data-callback='onSubmit1'>Generate My Coupon</button>
                </div> -->

            </form>
        </div>


        <!-- new html -->
        <div class="offer_holder mt-3">
            <div class="text-container">
                <h1>How It Works:</h1>
                <p>1. Fill in your details: Complete the form with your name, email, and phone number.</p>
                <p>2. Generate your unique coupon: Clicking the "Generate My Coupon" button will provide the user with their coupon code.</p>
                <p>3. Redeem Coupon: Users can visit their nearest store, show the coupon, and enjoy 10% OFF on their purchase.</p>
            </div>
            <div class="sign-up">
                <h1 class="heading">Glad to see you!</h1>
                <p class="text-center">Welcome, Please fill in the blanks for get the offer !</p>

                <div class="text">
                    <i class="fa fa-user"></i>
                    <input type="text" class="form-control" placeholder="Full Name *" id="full_name" name="full_name" value="<?= old('full_name') ?>">
                    <p class="text-danger error" id="name-error"><?= session('errors.full_name') ?? '' ?></p>
                </div>

                <div class="text">
                    <i class="fa fa-envelope"></i>
                    <input type="email" placeholder="Email Address *" class="form-control" id="email_address" name="email_address" value="<?= old('email_address') ?>">
                    <p class="text-danger error" id="name-error"><?= session('errors.email_address') ?? '' ?></p>
                </div>

                <div class="text">
                    <i class="fa fa-mobile"></i>
                    <input type="text" class="form-control" placeholder="Phone Number *" id="phone_number" name="phone_number" value="<?= old('phone_number') ?>">
                    <p class="text-danger error" id="name-error"><?= session('errors.phone_number') ?? '' ?></p>
                </div>

                <div class="mt-5 text-end">
                    <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                    <!-- g-recaptcha -->
                    <button class="btn btn-primary g-recaptcha " data-sitekey="<?= SITE_KEY ?>" data-callback='onSubmit1'>Generate My Coupon</button>
                </div>
                <!-- <button type="submit">CREATE ACCOUNT</button>
                <p class="conditions">Already have an account? <a href="#">Sign in</a></p> -->

            </div>

            
        </div>

    </div>
</section>
<!-- mission section end -->

<!-- remove errors -->
<?php
session()->remove('errors');
session()->remove('_ci_old_input');
?>

<!-- our clients start -->
<?= $clientbox ?>
<!--our clients  end -->

<!-- feature icon section start -->
<?= $feature ?>
<!-- feature icon section end -->


<?= $this->section('scripts') ?>

<script>
    // Handle reCAPTCHA callback token

    function onSubmit1(token) {
       
        // Set the token in the hidden input
        $('#recaptcha_token').val(token);

        $('#warranty_registration_form').submit();
    }
</script>

<?= $this->endSection() ?>