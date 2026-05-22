<?= $this->section('style') ?>

<?= $this->endSection() ?>

<!-- inner page banner start -->
<section class="inner_banner inner_floting_box_banner">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="inner_floting_box">
          <div class="about_more_box">
            <div class="mission_tabs">
              <h4>
                <?= $page_header ?>
              </h4>
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
        <strong>Success!</strong>
        <?php echo $session->getFlashdata('success_message'); ?>
      </div>
    <?php } ?>
    <?php if ($session->getFlashdata('error_message')) { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>
        <?php echo $session->getFlashdata('error_message'); ?>
      </div>
    <?php } ?>
    <br>

    <!-- form  html -->
    <div class="container">

      <!-- Step 1: Customer Information -->
      <div class="step-1">
        <h3>🎉Get Your 10% OFF Coupon!🎉</h3>
        <p>Fill out the form below and receive your unique code instantly, Show your nearest Leads dealer & enjoy the
          discount.</p>
        <!-- <div class="row g-3">
                        <div class="col-md-6">
                            <label for="full_name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="full_name" name="full_name" value="">
                            <p class="text-danger error" id="name-error"</p>
                        </div>
                        <div class="col-md-6">
                            <label for="email_address" class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email_address" name="email_address" value="">
                            <p class="text-danger error" id="name-error"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="phone_number" class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="">
                            <p class="text-danger error" id="name-error"></p>
                        </div>                        
                    </div> -->
      </div>
      <!-- Submit Button -->
      <!-- <div class="mt-2 text-end">
                    <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                    g-recaptcha
                    <button class="btn btn-primary g-recaptcha " data-sitekey="<?= SITE_KEY ?>" data-callback='onSubmit1'>Generate My Coupon</button>
                </div> -->


    </div>


    <!-- new html -->
    <div class="offer_holder mt-3">
      <div class="text-container">
        <h1>How It Works:</h1>
        <p>1. Fill in your details: Complete the form with your name, email, and phone number.</p>
        <p>2. Generate your unique coupon: Clicking the "Generate My Coupon" button will provide the user with their
          coupon code.</p>
        <p>3. Redeem Coupon: Users can visit their nearest store, show the coupon, and enjoy 10% OFF on their purchase.
        </p>
      </div>
      <div class="sign-up">
        <h1 class="heading">Glad to see you!</h1>
        <p class="text-center">Welcome, Please fill in the blanks for get the offer !</p>
        <form id="warranty_registration_form" method="POST" action="">
          <div class="text">
            <i class="fa fa-user"></i>
            <input type="text" class="form-control" placeholder="Full Name *" id="full_name" name="full_name" required>
          </div>
          <p class="text-danger error ms-4" id="name-error">
            <?= session('errors.full_name') ?? '' ?>
          </p>

          <div class="text">
            <i class="fa fa-envelope"></i>
            <input type="email" placeholder="Email Address *" class="form-control" id="email_address"
              name="email_address" required>
          </div>
          <p class="text-danger error ms-4" id="email-error">
            <?= session('errors.email_address') ?? '' ?>
          </p>

          <div class="text">
            <i class="fa fa-globe"></i>
            <input type="text" name="address" class="form-control" id="address" placeholder="Address *" required>
          </div>
          <p class="text-danger error ms-4" id="address-error">
            <?= session('errors.address') ?? '' ?>
          </p>

          <div class="text">
            <i class="fa fa-mobile"></i>
            <input type="text" class="form-control" placeholder="Phone Number *" id="phone_number" name="phone_number"
              required>
          </div>
          <p class="text-danger error ms-4" id="phone-error">
            <?= session('errors.phone_number') ?? '' ?>
          </p>

          <div class="mt-5 text-end">
            <input type="hidden" name="recaptcha_token" id="recaptcha_token">

            <!-- g-recaptcha -->
            <!-- <button class="btn btn-primary" type="submit">Generate My Coupon</button> -->
            <button class="btn btn-primary g-recaptcha " data-sitekey="<?= SITE_KEY ?>"
              data-callback='onSubmit1'>Generate My Coupon</button>
          </div>
          <!-- <button type="submit">CREATE ACCOUNT</button>
                    <p class="conditions">Already have an account? <a href="#">Sign in</a></p> -->
        </form>
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
  function validateForm() {
    let isValid = true;

    // Get form field values
    const fullName = $('#full_name').val().trim();
    const address = $('#address').val().trim();
    const email = $('#email_address').val().trim();
    const phoneNumber = $('#phone_number').val().trim();

    // Clear previous error messages
    $('.error').text('');

    // Validate Full Name
    if (fullName === '') {
      $('#name-error').text('Full Name is required.');
      isValid = false;
    }

    // Validate Email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === '') {
      $('#email-error').text('Email Address is required.');
      isValid = false;
    } else if (!emailRegex.test(email)) {
      $('#email-error').text('Enter a valid Email Address.');
      isValid = false;
    }

    // Validate Phone Number
    const phoneRegex = /^[0-9]{10}$/;
    if (phoneNumber === '') {
      $('#phone-error').text('Phone Number is required.');
      isValid = false;
    } else if (!phoneRegex.test(phoneNumber)) {
      $('#phone-error').text('Enter a valid 10-digit Phone Number.');
      isValid = false;
    }

     // Validate Address
     if (address === '') {
            $('#address-error').text('Address is required.');
            isValid = false;
        }

    // Return the overall validation status
    return isValid;
  }

  // Handle reCAPTCHA callback
  function onSubmit1(token) {
    if (validateForm()) {
      // Set the token in the hidden input
      $('#recaptcha_token').val(token);

      // Submit the form
      $('#warranty_registration_form').submit();
    } else {
      // Prevent form submission if validation fails
      return false;
    }
  }
</script>

<?= $this->endSection() ?>