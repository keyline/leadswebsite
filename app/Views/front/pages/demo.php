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
<section class="contact_section demo_section">
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

    <!-- form  html -->
    <div class="container">

      <!-- Step 1: Customer Information -->
      <div class="step-1">
        <h2>Get a live demo for product</h2>
        <!-- <p>Fill out the form below and receive your unique code instantly, Show your nearest Leads dealer & enjoy the
          discount.</p> -->        
      </div>      
    </div>


    <!-- new html -->
    <div class="offer_holder mt-3">
      <div class="row">
        <div class="col-md-4">
          <div class="text-container">
            <h1 class="heading">Glad to see you!</h1>
            <p class="text-center mb-4 mb-md-0">Welcome, Please fill in the blanks for get the live demo !</p>
          </div>
        </div>
        <div class="col-md-8">
          <div class="sign-up">
          <form id="warranty_registration_form" method="POST" action="" class="w-100">

          <div class="row">
            <div class="col-md-6">
              <div class="text">
                <i class="fa fa-user"></i>
                <input type="text" class="form-control" placeholder="Full Name *" id="full_name" name="full_name" required>
              </div>
              <p class="text-danger error ms-4" id="name-error">
                <?= session('errors.full_name') ?? '' ?>
              </p>
            </div>
            <div class="col-md-6">
              <div class="text">
                <i class="fa fa-globe"></i>
                <input type="text" name="address" class="form-control" id="address" placeholder="Address *" required>
              </div>
              <p class="text-danger error ms-4" id="address-error">
                <?= session('errors.address') ?? '' ?>
              </p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="text">
                <i class="fa fa-mobile"></i>
                <input type="text" class="form-control" placeholder="Phone Number *" id="phone_number" name="phone_number"
                  required>
              </div>
              <p class="text-danger error ms-4" id="phone-error">
                <?= session('errors.phone_number') ?? '' ?>
              </p> 
            </div>
            <div class="col-md-6">
              <div class="text">
                <i class="fa fa-envelope"></i>
                <input type="email" placeholder="Email Address *" class="form-control" id="email_address"
                name="email_address" required>
              </div>
              <p class="text-danger error ms-4" id="email-error">
                <?= session('errors.email_address') ?? '' ?>
              </p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="text">
                <i class="fa fa-mobile"></i>
                <input type="text" class="form-control" placeholder="State *" id="state" name="state"
                  required>
              </div>
              <p class="text-danger error ms-4" id="state-error">
                <?= session('errors.state') ?? '' ?>
              </p>
            </div>
            <div class="col-md-6">
              <div class="text">
                <i class="fa-solid fa-layer-group"></i>
                  <select class="form-select" name="product_interest" id="categorySelect" aria-label="Default select example" required>
                      <option selected>Select Product Category</option>
                      <?php foreach($productcat as $category)
                      {?>
                          <option value="<?=$category->id?>"><?=$category->name?></option>
                      <?php } ?>                                            
                  </select>
              </div>
              <p class="text-danger error ms-4" id="product_category-error">
                <?= session('errors.product_category') ?? '' ?>
              </p>
            </div>
          </div>  
          <div class="row">
            <div class="col-md-6">
              <div class="text">
                <i class="fa fa-box"></i>
                <!-- Product Dropdown -->
                <select class="form-select" name="product_list" id="productSelect" aria-label="Products" required>
                    <option selected>Select a Product</option>
                </select>
              </div>
              <p class="text-danger error ms-4" id="product-error">
                  <?= session('errors.product') ?? '' ?>
                </p>
            </div>
            <div class="col-md-6">
              <div class="text">
                <i class="fa-solid fa-calendar-days"></i>
                <input type="date" class="form-control"  id="date" name="date"
                  required>
              </div>
              <p class="text-danger error ms-4" id="date-error">
                <?= session('errors.date') ?? '' ?>
              </p>
            </div>
          </div>
            
            
            <div class="mt-5 text-end">
              <input type="hidden" name="recaptcha_token" id="recaptcha_token">

              <!-- g-recaptcha -->
              <!-- <button class="btn btn-primary" type="submit">Generate My Coupon</button> -->
              <div class="demo_btn">
                <button class="btn btn-primary g-recaptcha " data-sitekey="<?= SITE_KEY ?>"
                  data-callback='onSubmit1'> <i class="fa-solid fa-video"></i> Get a live demo</button>
              </div>
            </div>
            <!-- <button type="submit">CREATE ACCOUNT</button>
                      <p class="conditions">Already have an account? <a href="#">Sign in</a></p> -->
          </form>
        </div>
        </div>
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
    const state = $('#state').val().trim();
    const categorySelect = $('#categorySelect').val().trim();
    const productSelect = $('#productSelect').val().trim();
    const date = $('#date').val().trim();

    // Log values to the console
console.log("Full Name:", fullName);
console.log("Address:", address);
console.log("Email:", email);
console.log("State:", state);
console.log("Product Category:", categorySelect);
console.log("Product List:", productSelect);
console.log("Date:", date);

    // Clear previous error messages
    $('.error').text('');

    // Validate Full Name
    if (fullName === '') {
      $('#name-error').text('Full Name is required.');
      isValid = false;
    }

    // Validate Address
    if (address === '') {
            $('#address-error').text('Address is required.');
            isValid = false;
        }

    // Validate State
    if (state === '') {
            $('#state-error').text('state is required.');
            isValid = false;
        }
// Validate Product category
if (categorySelect === 'Select Product Category') {
            $('#product_category-error').text('Product Category is required.');
            isValid = false;
        }

    // Validate Product
    if (productSelect === 'Select a Product') {
            $('#product-error').text('product is required.');
            isValid = false;
        }
    
    // Validate date
    if (date === '') {
            $('#date-error').text('date is required.');
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
    
    // Validate Email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === '') {
      $('#email-error').text('Email Address is required.');
      isValid = false;
    } else if (!emailRegex.test(email)) {
      $('#email-error').text('Enter a valid Email Address.');
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
<script>
    $(document).ready(function() {
        // On category selection change
        $('#categorySelect').on('change', function() {
            var categoryId = $(this).val(); // Get selected category ID
            
            if (categoryId) {
                $.ajax({
                    url: '<?= base_url("/get_products_by_category") ?>', // Controller URL
                    method: 'POST',
                    data: { category_id: categoryId },
                    dataType: 'json',
                    success: function(response) {
                        // Clear and populate product dropdown
                        $('#productSelect').empty();
                        $('#productSelect').append('<option selected>Select a Product</option>');
                        
                        $.each(response, function(index, product) {
                            $('#productSelect').append('<option value="' + product.id + '">' + product.product_title + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error fetching products. Please try again.');
                    }
                });
            } else {
                $('#productSelect').empty().append('<option selected>Select a Product</option>');
            }
        });
    });
</script>


<?= $this->endSection() ?>