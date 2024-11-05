<?php
$site_setting = $common_model->find_data('sms_site_settings','row');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $site_setting->site_name; ?></title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Codedthemes" />
	<!-- Favicon icon -->
	<link rel="icon" href="<?php echo base_url(); ?>/uploads/<?php echo $site_setting->site_favicon; ?>" type="image/x-icon">
	<!-- vendor css -->
	<link rel="stylesheet" href="<?php echo base_url('material/'); ?>/assets/css/style.css">
	
	
</head>
<!-- [ signin-img ] start -->
<div class="auth-wrapper align-items-stretch aut-bg-img">
	<div class="flex-grow-1">
		<div class="h-100 d-md-flex align-items-center auth-side-img">
			<div class="col-sm-10 auth-content w-auto">
				<img src="<?php echo base_url(); ?>/uploads/<?php echo $site_setting->site_logo; ?>" alt="" class="img-fluid">
				<h1 class="text-white my-4">Welcome Back!</h1>
				<h5 class="text-white font-weight-normal">Signin to your account and get explore the <?php echo $site_setting->site_name; ?> Dashboard</h5>
			</div>
		</div>
		<div class="auth-side-form">
			<form method="post" action="<?php echo base_url('admin/user/login'); ?>">
				<div class=" auth-content">
					<img src="<?php echo base_url(); ?>/uploads/<?php echo $site_setting->site_logo; ?>" alt="" class="img-fluid mb-4 d-block d-xl-none d-lg-none">
					<h3 class="mb-4 f-w-400">Signin</h3>
					
					<?php if($session->getFlashdata('error_message')) { ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
			            	<strong>Error!</strong> <?php echo $session->getFlashdata('error_message');?>
			            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			          	</div>
					<?php } ?>
					<?php if($session->getFlashdata('success_message')) { ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
			            	<strong>Success!</strong> <?php echo $session->getFlashdata('success_message');?>
			            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			          	</div>
					<?php } ?>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="feather icon-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off">
					</div>
					<p class="text-danger">
					<?php
					if(isset($validation) && $validation->hasError('username')) {
						echo $validation->getError('username');
					}
					?>
					</p>
					<div class="input-group mb-4">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="feather icon-lock"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
					</div>
					<p class="text-danger">
						<?php
						if(isset($validation) && $validation->hasError('password')) {
							echo $validation->getError('password');
						}
						?>
					</p>
					<button type="submit" class="btn btn-block btn-primary mb-0">Signin</button>
					<div class="text-center">					
						<p class="mb-2 mt-4 text-muted">Forgot password? <a href="<?=base_url('forgot-password')?>" class="f-w-400">Reset</a></p>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
$this->session = \Config\Services::session();
$this->session->setFlashdata('success_message', '');
$this->session->setFlashdata('error_message', '');
?>
<!-- [ signin-img ] end -->
<!-- Required Js -->
<script src="<?php echo base_url('material/'); ?>/assets/js/vendor-all.min.js"></script>
<script src="<?php echo base_url('material/'); ?>/assets/js/plugins/bootstrap.min.js"></script>
<script src="<?php echo base_url('material/'); ?>/assets/js/waves.min.js"></script>
</body>
</html>
