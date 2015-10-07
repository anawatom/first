<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title; ?></title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

		<!-- Style tags -->
		<?php echo $link_tags; ?>
		<!-- End Style tags -->

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="skin-blue">
		<!-- Header bar -->
		<?php echo $header_bar; ?>
		<!-- End Header bar -->

		<!-- Content -->
		<div class="wrapper row-offcanvas row-offcanvas-left">
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="left-side sidebar-offcanvas">
				<?php echo $menu; ?>
			</aside>
			<!-- End Left side column -->

			<!-- Left side column. contains the content -->
			<div class="right-side">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>ระบบฝึกอบรมกรมพลศึกษา</h1>
					<?php 
						if (isset($this->breadcrumbs)) {
							echo $this->breadcrumbs->show();
						}
					?>
				</section>
				<!-- End Content Header (Page header) -->

				<!-- Flash message -->
				<?php if (isset($this->session) && $this->session->flashdata('flash_message') !== NULL) : ?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-<?php echo $this->session->flashdata('flash_message')['status']; ?> alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
								<strong><?php echo $this->session->flashdata('flash_message')['message']; ?></strong>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<!-- End Flash message -->

				<?php echo $content; ?>
			</div>
			<!-- End Left side column. -->
		</div>
		<!-- End Content -->

		<!-- Script tags -->
		<?php echo $script_tags; ?>
		<!-- End Script tags -->
	</body>
</html>
