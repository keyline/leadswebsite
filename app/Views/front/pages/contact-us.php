    <!-- about banner start -->

    <section class="contactus-banner">

    	<div class="container">

    		<div class="row">

    			<h1>Contact us</h1>

    			<div class="breadcrumb-box">

    				<nav aria-label="breadcrumb">

    					<ol class="breadcrumb">

    						<li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>

    						<li class="breadcrumb-item active" aria-current="page">Contact Us</li>

    					</ol>

    				</nav>

    			</div>

    		</div>

    	</div>

    </section>

    <!-- about banner end -->



    <!-- our mission section start -->

    <section class="contacttext-section">



    	<div class="container">

    		<div class="row">

    			<div class="col-md-12 text-center">

    				<div class="heading-box-2 " data-aos="fade-left" data-aos-duration="1500">

    					<h3 class="sub-heading sub-heading-2">Reach Out <span class="fontnormal">and Connect</span></h3>

    				</div>

    				<p>As a full-service travel agency, we offer a comprehensive range of services to cater to all your travel needs. </p>

    				<p>From designing bespoke itineraries and providing expert travel advice to handling visa assistance, travel insurance, accommodation bookings, transportation arrangements, and more, our dedicated team is committed to making your travel experience seamless and hassle-free.

    				</p>



    				<div class="contactform_inner">

    					<img class="contactformimg" src="<?= base_url('material/front/assets/img') ?>/modal-logo.webp" alt="modal-logo">

    					<div class="contactmodal-body">





    						<?php if (session()->has('success_mag')) : ?>

    							<div class="alert alert-success">

    								<?= session('success_mag') ?>

    							</div>

    						<?php

								session()->remove('success_mag');

							endif; ?>



    						<?php if (session()->has('error_msg')) : ?>

    							<div class="alert alert-danger">

    								<?= session('error_msg') ?>

    							</div>

    						<?php

								session()->remove('error_msg');

							endif; ?>







    						<form id="saveFrm" action="<?= base_url('contact-us') ?>" method="post">

    							<div class="row">

    								<div class="col-lg-6">

    									<div class="form-group">

    										<label class="form-label">First Name*</label>

    										<input type="text" required pattern="[A-Za-z]+" name="fname" class="form-control">

    									</div>



    								</div>

    								<div class="col-lg-6">

    									<div class="form-group">

    										<label class="form-label">Last Name*</label>

    										<input type="text" required pattern="[A-Za-z]+" name="lname" class="form-control">

    									</div>

    								</div>

    							</div>

    							<div class="row">

    								<div class="col-lg-6">

    									<div class="form-group">

    										<label class="form-label">Phone*</label>

    										<input type="tel" pattern="[0-9]{10}" required name="phone" class="form-control">

    									</div>

    								</div>

    								<div class="col-lg-6">

    									<div class="form-group">

    										<label class="form-label">Email*</label>

    										<input type="email" required name="email" class="form-control">

    									</div>

    								</div>

    							</div>

    							<div class="row">

    								<div class="col-lg-6">

    									<div class="form-group">

    										<label class="form-label">Preferred Destination*</label>

    										<input type="text" required pattern="[A-Za-z]+" name="destination" class="form-control">

    									</div>

    								</div>

    								<div class="col-lg-6">

    									<div class="form-group">

    										<label class="form-label">Preferred month of travel*</label>

    										<select name="month" required id="month" class="form-control">

    											<option value="1">January</option>

    											<option value="2">February</option>

    											<option value="3">March</option>

    											<option value="4">April</option>

    											<option value="5">May</option>

    											<option value="6">June</option>

    											<option value="7">July</option>

    											<option value="8">August</option>

    											<option value="9">September</option>

    											<option value="10">October</option>

    											<option value="11">November</option>

    											<option value="12">December</option>

    										</select>

    									</div>

    								</div>

    							</div>

    							<div class="row">

    								<div class="col-lg-6">

    									<div class="form-group">

    										<label class="form-label">No. of pax</label>

    										<input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength=2 name="pax" required class="form-control">

    									</div>

    								</div>



    								<div class="col-lg-6">

    									<div class="form-group">

    										<label class="form-label">Type of Holidays*</label>

    										<select name="vacation_type" required id="vacation_type" class="form-control">

    											<?php foreach (HOLIDAY_TYPES as $key =>  $type) : ?>

    												<option value="<?= $key ?>"><?= $type ?></option>

    											<?php endforeach; ?>

    										</select>

    									</div>

    								</div>

    							</div>

    							<div class="row">

    								<div class="col-md-12">

    									<div class="btn-box">

    										<input type="hidden" id="set_pkg_id" name="pkg_id" value="0">

    										<input type="hidden" name="recaptcha_token" id="recaptcha_token">



    										<button type="submit" class="btn primary-btn g-recaptcha" data-sitekey="<?= SITE_KEY ?>" data-callback='onSubmit'>Submit</button>









    									</div>

    								</div>

    							</div>

    						</form>

    					</div>

    				</div>

    			</div>

    		</div>

    	</div>

    	<img src="<?= base_url('material/front/assets/img') ?>/contact_passport.jpg" alt="contact_passport" class="img-fluid contact-left d-none d-lg-block fade-up">

    	<img src="<?= base_url('material/front/assets/img') ?>/contact_glass.jpg" alt="contact_glass" class="img-fluid contact-right d-none d-lg-block fade-up">

    </section>

    <!-- our mission section end -->







    <script src="https://www.google.com/recaptcha/api.js"></script>



    <script>
    	function onSubmit(token) {

    		document.getElementById("recaptcha_token").value = token;

    		// $("#recaptcha_token").value(token);

    		$('#saveFrm').submit();

    	}


		


    </script>