<!DOCTYPE html>

<html lang="en">

<head>

	<?php echo $head; ?>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
	<!-- [ page wise css ] -->
	<?= $this->renderSection('style') ?>
</head>

<body class="">

	<!-- [ Pre-loader ] start -->

	<div class="loader-bg">

		<div class="loader-track">

			<div class="loader-fill"></div>

		</div>

	</div>

	<!-- [ Pre-loader ] End -->

	<!-- [ navigation menu ] start -->

	<nav class="pcoded-navbar menupos-fixed">

		<?php echo $left_sidebar; ?>

	</nav>

	<!-- [ navigation menu ] end -->

	<?php echo $header; ?>



	<!-- [ Main Content ] start -->

	<div class="pcoded-main-container">

		<?php echo $maincontent; ?>

	</div>


	<?php
	$this->session = \Config\Services::session();
	$this->session->setFlashdata('success_message', '');
	$this->session->setFlashdata('error_message', '');
	?>


	<!-- Required Js -->

	<script src="<?php echo base_url('material/'); ?>/assets/js/vendor-all.min.js"></script>

	<script src="<?php echo base_url('material/'); ?>/assets/js/plugins/bootstrap.min.js"></script>

	<script src="<?php echo base_url('material/'); ?>/assets/js/pcoded.min.js"></script>

	<!-- <script src="<?php echo base_url('material/'); ?>/assets/js/menu-setting.min.js"></script> -->



	<!-- Apex Chart -->

	<script src="<?php echo base_url('material/'); ?>/assets/js/plugins/apexcharts.min.js"></script>





	<!-- custom-chart js -->

	<script src="<?php echo base_url('material/'); ?>/assets/js/pages/dashboard-main.js"></script>



	<!-- jquery-validation Js -->

	<script src="<?php echo base_url('material/'); ?>/assets/js/plugins/jquery.validate.min.js"></script>

	<!-- form-picker-custom Js -->

	<script src="<?php echo base_url('material/'); ?>/assets/js/pages/form-validation.js"></script>



	<!-- datatable Js -->

	<script src="<?php echo base_url('material/'); ?>/assets/js/plugins/jquery.dataTables.min.js"></script>

	<script src="<?php echo base_url('material/'); ?>/assets/js/plugins/dataTables.bootstrap4.min.js"></script>

	<script src="<?php echo base_url('material/'); ?>/assets/js/pages/data-basic-custom.js"></script>

	<script>
		$('#user-list-table').DataTable();
	</script>

	<!-- sweet alert Js -->

	<script src="<?php echo base_url('material/'); ?>/assets/js/plugins/sweetalert.min.js"></script>

	<script src="<?php echo base_url('material/'); ?>/assets/js/pages/ac-alert.js"></script>

	<!-- Ckeditor js -->
	<script src="<?php echo base_url('material/'); ?>/assets/js/plugins/ckeditor.js"></script>
	<script type="text/javascript">
		$(window).on('load', function() {
			ClassicEditor.create(document.querySelector('#classic-editor'))
				.catch(error => {
					console.error(error);
				});
		});
	</script>

	<!-- select2 Js -->
	<script src="<?php echo base_url('material/'); ?>/assets/js/plugins/select2.full.min.js"></script>
	<!-- form-select-custom Js -->
	<script src="<?php echo base_url('material/'); ?>/assets/js/pages/form-select-custom.js"></script>

	<!-- bootstrap-tagsinput-latest Js -->
	<script src="<?php echo base_url('material/'); ?>/cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
	<script src="<?php echo base_url('material/'); ?>/assets/js/plugins/bootstrap-tagsinput.min.js"></script>
	<!-- bootstrap-maxlength Js -->
	<script src="<?php echo base_url('material/'); ?>/assets/js/plugins/bootstrap-maxlength.js"></script>
	<!-- form-advance custom js -->
	<script src="<?php echo base_url('material/'); ?>/assets/js/pages/form-advance-custom.js"></script>

	<!-- ekko-lightbox Js -->
	<script src="<?php echo base_url('material/'); ?>/assets/js/plugins/ekko-lightbox.min.js"></script>
	<script src="<?php echo base_url('material/'); ?>/assets/js/plugins/lightbox.min.js"></script>
	<script src="<?php echo base_url('material/'); ?>/assets/js/pages/ac-lightbox.js"></script>
	<!-- Summernote JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
	<script>
		// [ customer-scroll ] start
		var px = new PerfectScrollbar('.cust-scroll', {
			wheelSpeed: .5,
			swipeEasing: 0,
			wheelPropagation: 1,
			minScrollbarLength: 40,
		});
		// [ customer-scroll ] end
	</script>

	<script type="text/javascript">
		$('#simpletable').dataTable({
			"pageLength": 25
		})





		$(document).ready(function() {
			$('.summernote').summernote({
				placeholder: '',
				tabsize: 2,
				height: 200, // Set the height of the editor
				toolbar: [
					['style', ['style']],
					['font', ['bold', 'italic', 'underline', 'clear']],
					['fontname', ['fontname']],
					['fontsize', ['fontsize']],
					['color', ['color']],
					['para', ['ul', 'ol', 'paragraph']],
					['height', ['height']],
					['insert', ['picture', 'link', 'video']],
					['view', ['fullscreen', 'codeview', 'help']]
				]
			});
		});
	</script>

	<!-- [ page wise Scripts ] -->
	<?= $this->renderSection('scripts') ?>


</body>

</html>