<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Module - User Page
			<!-- <small>it all starts here</small> -->
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">User Page</a></li>
			<li class="active">Change Password</li>
		</ol>
	</section>

	<!-- Main content -->
		<section class="content">

		<?php if ($this->session->flashdata('success')) { ?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-check"></i> Success!</h4>
				<?php echo $this->session->flashdata('success'); ?>
			</div>
		<?php } else if ($this->session->flashdata('error')) {	?>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i> Error!</h4>
				<?php echo $this->session->flashdata('error'); ?>
			</div>
		<?php } else if ($this->session->flashdata('warning')) {	?>
			<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-warning"></i> Warning!</h4>
				<?php echo $this->session->flashdata('warning'); ?>
			</div>
		<?php } else if ($this->session->flashdata('info')) {	?>
			<div class="alert alert-info alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-info"></i> Info!</h4>
				<?php echo $this->session->flashdata('info'); ?>
			</div>
		<?php } ?>

		<div class="row">
			<div class="col-md-3">

				<!-- Profile Image -->
				<div class="box box-primary">
					<div class="box-body box-profile">
						<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>dist/img/user2-160x160.jpg" alt="User profile picture">

						<h3 class="profile-username text-center"><?php echo $this->session->userdata('UsrFirstName'); ?></h3>

						<p class="text-muted text-center"><?php echo $this->session->userdata('UsrEmail'); ?></p>

						<!-- <ul class="list-group list-group-unbordered">
							<li class="list-group-item">
								<b>Followers</b> <a class="pull-right">1,322</a>
							</li>
							<li class="list-group-item">
								<b>Following</b> <a class="pull-right">543</a>
							</li>
							<li class="list-group-item">
								<b>Friends</b> <a class="pull-right">13,287</a>
							</li>
						</ul>

						<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
			<div class="col-md-9">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
					</ul>
					<div class="tab-content">
						<div class="active tab-pane" id="settings">
							<?php
								$attr_form = [
									'id' => 'form-change-password',
									'name' => 'form-change-password',
									'class' => 'form-horizontal'
								];
								echo form_open('main/change_password_process', $attr_form);
							?>
								<div class="form-group">
									<label for="PasswordLama" class="col-sm-3 control-label">Password Lama</label>

									<div class="col-sm-9">
										<input type="password" class="form-control" id="PasswordLama" name="PasswordLama" placeholder="Password Lama" autofocus=""
											data-bv-notempty="true"
											data-bv-notempty-message="The Last Password is required and cannot be empty"
											data-bv-stringlength="true"
											data-bv-stringlength-min="8"
											data-bv-stringlength-max="35"
											data-bv-stringlength-message="The Password must be between 8-35 characters"
										>
									</div>
								</div>
								<div class="form-group">
									<label for="PasswordBaru" class="col-sm-3 control-label">Password Baru</label>

									<div class="col-sm-9">
										<input type="password" class="form-control" id="PasswordBaru" name="PasswordBaru" placeholder="Password Baru"
											data-bv-notempty="true"
											data-bv-notempty-message="The New Password is required and cannot be empty"
											data-bv-identical="true"
											data-bv-identical-field="ConfirmPasswordBaru"
											data-bv-identical-message="The Password and its confirm are not the same"
											data-bv-stringlength="true"
											data-bv-stringlength-min="8"
											data-bv-stringlength-max="35"
											data-bv-stringlength-message="The Password must be between 8-35 characters"
										>
									</div>
								</div>
								<div class="form-group">
									<label for="ConfirmPasswordBaru" class="col-sm-3 control-label">Confirm Password Baru</label>

									<div class="col-sm-9">
										<input type="password" class="form-control" id="ConfirmPasswordBaru" name="ConfirmPasswordBaru" placeholder="Confirm Password Baru"
											data-bv-notempty="true"
											data-bv-notempty-message="The Confirm New Password is required and cannot be empty"
											data-bv-identical="true"
											data-bv-identical-field="PasswordBaru"
											data-bv-identical-message="The Password and its confirm are not the same"
											data-bv-stringlength="true"
											data-bv-stringlength-min="8"
											data-bv-stringlength-max="35"
											data-bv-stringlength-message="The Password must be between 8-35 characters"
										>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
										<button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-lock"></i> Change Password</button>
									</div>
								</div>
							</form>
						</div>
						<!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				</div>
				<!-- /.nav-tabs-custom -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->