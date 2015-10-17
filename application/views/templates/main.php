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

		<!-- Script tags -->
		<?php echo $script_tags; ?>
		<!-- End Script tags -->
	</head>
	<body class="skin-blue">
		<!-- Header bar -->
		<?php echo $header_bar; ?>
		<!-- End Header bar -->

		<!-- Content -->
		<div class="wrapper row-offcanvas row-offcanvas-left">
			<?php echo $menu; ?>

			<!-- Left side column. contains the content -->
			<div class="right-side">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1><?php echo $page_header; ?></h1>
					<?php
						if (isset($this->breadcrumbs)) {
							echo $this->breadcrumbs->show();
						}
					?>
				</section>
				<!-- End Content Header (Page header) -->

				<section class="content">
					<?php echo $content; ?>
				</section> <!-- /.content -->
			</div>
			<!-- End Left side column. -->
		</div>
		<!-- End Content -->

		<script type="text/javascript">
			$(function() {
				<?php if (isset($this->session) && !empty($this->session->flashdata('flash_message'))) : ?>
					$.notify('<?php echo $this->session->flashdata("flash_message")["message"]; ?>',
								{
									status: '<?php echo $this->session->flashdata("flash_message")["status"]; ?>',
									timeout: 15000
								});
				<?php endif; ?>
			});
		</script>
	</body>
</html>
