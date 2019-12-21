<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>dist/css/AdminLTE.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>plugins/iCheck/square/blue.css">
	<!-- Bootstrap Validator -->
	<link rel="stylesheet" href="<?php echo base_url('assets/plugin/more/'); ?>bootstrapValidator_v0.5.0/dist/css/bootstrapValidator.min.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<style type="text/css">
		@import url('https://fonts.googleapis.com/css?family=Cardo&display=swap');

		body {
			font-family: 'Cardo' !important;
			/* font-family: 'Alegreya' !important; */
			/* line-height: 1.72222; */
			line-height: normal;
			font-size: 16px;
			color: #34495e;
			/* background-color: #ffffff; */
		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-family: 'Cardo' !important;
		}
	</style>

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<a href="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>index2.html"><b>Admin</b>LTE</a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">Enter your email to get Recovery Link</p>

		<?php if ($this->session->flashdata('success')) { ?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-check"></i> Success!</h4>
				<?php echo $this->session->flashdata('success'); ?>
			</div>
		<?php } else if ($this->session->flashdata('error')) {  ?>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i> Error!</h4>
				<?php echo $this->session->flashdata('error'); ?>
			</div>
		<?php } else if ($this->session->flashdata('warning')) {  ?>
			<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-warning"></i> Warning!</h4>
				<?php echo $this->session->flashdata('warning'); ?>
			</div>
		<?php } else if ($this->session->flashdata('info')) {  ?>
			<div class="alert alert-info alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-info"></i> Info!</h4>
				<?php echo $this->session->flashdata('info'); ?>
			</div>
		<?php } ?>

			<?php
				$attr_form = [
					'id' => 'form-forgot-password',
					'name' => 'form-forgot-password',
				];
				echo form_open('main/forgot_password_process', $attr_form);
			?>
			<div class="form-group has-feedback">
				<input type="email" class="form-control" id="UsrEmail" name="UsrEmail" placeholder="Email" autofocus=""
					data-bv-notempty="true"
					data-bv-notempty-message="The Email is required and cannot be empty"
				>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-12 text-right">
					<button type="submit" class="btn btn-primary btn-flat">Get Recovery</button>
				</div>
				<!-- /.col -->
			</div>
		</form>

		<a href="<?php echo base_url('main/sign_in') ?>" class="text-center">I already have a membership</a><br/>
		<a href="<?php echo base_url('auth/sign_up') ?>" class="text-center">Register a new membership</a>

	</div>
	<!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap Validator -->
<script src="<?php echo base_url('assets/plugin/more/'); ?>bootstrapValidator_v0.5.0/dist/js/bootstrapValidator.min.js"></script>
<script>
	// Hide message after ten seconds
	setTimeout(function(){
		$('.disappear-after-five-seconds').slideUp();
	}, 5000);
	setTimeout(function(){
		$('.disappear-after-ten-seconds1').slideUp();
	}, 10000);

	$(function () {
		$('#form-forgot-password').bootstrapValidator();

		// Close Alert Slide Up Close Animation
		$('body').on('close.bs.alert', function(e){
			e.preventDefault();
			e.stopPropagation();
			$(e.target).slideUp();
		});
	});
</script>
</body>
</html>
