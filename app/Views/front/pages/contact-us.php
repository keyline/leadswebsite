<!-- inner page banner start -->
<section class="inner_banner inner_floting_box_banner">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="inner_floting_box">
					<div class="about_more_box">
						<div class="mission_tabs">
							<h4>Contact</h4>
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
			<div class="col-md-12">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58916.47387804551!2d88.36018915820313!3d22.643361!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f8a1362e4125df%3A0x5c4bc4b5cd9f4737!2sLEADS%20OVERSEAS%20PVT%20LTD%20-%20MADHYAMGRAM%2C%20KOLKATA!5e0!3m2!1sen!2sin!4v1730718239387!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<div class="col-md-6">
				<div class="contact_innerbox">
					<div class="cont_title">Head Office & Warehouse</div>
					<div class="cont_infoadd">
						<div class="cont_info_item">
							<div class="cont_it_icon"><i class="fa-solid fa-map-pin"></i></div>
							<div class="cont_in_text"><strong>Address :</strong><br> <?= $site_setting->site_address ?> </div>
						</div>
						<div class="cont_info_item">
							<div class="cont_it_icon"><i class="fa-solid fa-mobile-screen-button"></i></div>
							<div class="cont_in_text">
								<!-- <a href="tel:">+91 95640 14111</a>, <a href="tel:">+91 94340 56065</a> -->
								<?php if (count($phone_numbers)) {
									$totalNumbers = count($phone_numbers);
									foreach ($phone_numbers as $index => $number) { ?>
										<a href="tel:"> <?= $number ?> </a>
								<?php
										if ($index < $totalNumbers - 1) {
											echo ', '; // Add comma if it's not the last number
										}
									}
								} ?>
							</div>
						</div>
						<div class="cont_info_item">
							<div class="cont_it_icon"><i class="fa-solid fa-globe"></i></div>
							<div class="cont_in_text"><a href="#"><?= $site_setting->site_url ?></a></div>
						</div>
						<div class="cont_info_item">
							<div class="cont_it_icon"><i class="fa-solid fa-envelope"></i></div>
							<div class="cont_in_text">
								<!-- <a href="#">leadsindia.net@gmail.com</a>, <a href="#">info@leadsindia.net</a> -->
								<?php if (count($admin_mails)) {
									$totalNumbers = count($admin_mails);
									foreach ($admin_mails as $index => $mail) { ?>
										<a href="mailto:"> <?= $mail ?> </a>
								<?php
										if ($index < $totalNumbers - 1) {
											echo ', '; // Add comma if it's not the last mail
										}
									}
								} ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="contact_innerbox">
					<div class="cont_title">Registered Office</div>
					<div class="cont_infoadd">
						<div class="cont_info_item">
							<div class="cont_it_icon"><i class="fa-solid fa-map-pin"></i></div>
							<div class="cont_in_text"><strong>Address :</strong><br><?= $site_setting->registered_address ?></div>
						</div>
						<div class="cont_info_item">
							<div class="cont_it_icon"><i class="fa-solid fa-mobile-screen-button"></i></div>
							<div class="cont_in_text">
								<!-- <a href="tel:">+91 95640 14111</a> -->
								<a href="tel:"><?= $site_setting->office_no ?></a>
							</div>
						</div>

						<div class="cont_info_item">
							<div class="cont_it_icon"><i class="fa-solid fa-envelope"></i></div>
							<div class="cont_in_text"><strong>Please write us for any Suggestion / complains at :</strong><br>
								<!-- <a href="#">customerservice@leadsindia.net</a> -->
								<a href="#"><?=$site_setting->service_email?></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<a class="cont_btn" href="#home_enquiry">SEND ENQUIRY SERVICE REQUEST</a>
			</div>
		</div>
	</div>
</section>
<!-- mission section end -->

<!-- our clients start -->
<?= $clientbox ?>
<!--our clients  end -->

<!-- feature icon section start -->
<?= $feature ?>
<!-- feature icon section end -->

<!-- home enquiry start -->
<?= $enquiry ?>
<!-- home enquiry end -->