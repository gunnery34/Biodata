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
<body class="hold-transition register-page">
<div class="register-box">
	<div class="register-logo">
		<a href="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>index2.html"><b>Admin</b>LTE</a>
	</div>

	<div class="register-box-body">
		<p class="login-box-msg">Register a new membership</p>

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
				'id' => 'form-sign-up',
				'name' => 'form-sign-up',
			];
			echo form_open('main/sign_up_process', $attr_form);
		?>
			<div class="form-group has-feedback">
				<input type="text" class="form-control" id="UsrFirstName" name="UsrFirstName" placeholder="Full name"
					data-bv-notempty="true"
					data-bv-notempty-message="The Full Name is required and cannot be empty"
					data-bv-stringlength="true"
					data-bv-stringlength-min="6"
					data-bv-stringlength-max="35"
					data-bv-stringlength-message="The Full Name must be between 6-35 characters"
				>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="email" class="form-control" id="UsrEmail" name="UsrEmail" placeholder="Email"
					data-bv-notempty="true"
					data-bv-notempty-message="The Email is required and cannot be empty"
					data-bv-emailaddress="true"
					data-bv-emailaddress-message="The Email is not a valid email address"
				>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" id="UsrPassword" name="UsrPassword" placeholder="Password"
					data-bv-notempty="true"
					data-bv-notempty-message="The Password is required and cannot be empty"
					data-bv-identical="true"
					data-bv-identical-field="UsrPassword_"
					data-bv-identical-message="The Password and its confirm are not the same"
					data-bv-stringlength="true"
					data-bv-stringlength-min="8"
					data-bv-stringlength-max="35"
					data-bv-stringlength-message="The Password must be between 8-35 characters"
				>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" id="UsrPassword_" name="UsrPassword_" placeholder="Retype password"
					data-bv-notempty="true"
					data-bv-notempty-message="The Re-Password is required and cannot be empty"
					data-bv-identical="true"
					data-bv-identical-field="UsrPassword"
					data-bv-identical-message="The Password and its confirm are not the same"
					data-bv-stringlength="true"
					data-bv-stringlength-min="8"
					data-bv-stringlength-max="35"
					data-bv-stringlength-message="The Password must be between 8-35 characters"
				>
				<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label>
							<input type="checkbox"
								data-bv-notempty="true"
								data-bv-notempty-message="The Re-Password is required and cannot be empty">
								I agree to the <a href="#">terms</a>
						</label>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
				</div>
				<!-- /.col -->
			</div>
		</form>

		<div class="social-auth-links text-center">
			<p>- OR -</p>
			<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
				Facebook</a>
			<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
				Google+</a>
		</div>

		<a href="<?php echo base_url('main/sign_in') ?>" class="text-center">I already have a membership</a>
	</div>
	<!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap Validator -->
<script src="<?php echo base_url('assets/plugin/more/'); ?>bootstrapValidator_v0.5.0/dist/js/bootstrapValidator.min.js"></script>
<script>
	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' /* optional */
		});

		$('#form-sign-up').bootstrapValidator();
	});
</script>
</body>
</html>
