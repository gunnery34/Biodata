<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Module - Biodata
			<small>it all starts here</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Master Data</a></li>
			<li><a href="#">Biodata</a></li>
			<li class="active">Edit</li>
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

		<div class="row">
			<div class="col-md-12">
				<?php
				$attr_form = [
					'class' 							=> 'form-horizontal',
					'id'								=> 'form-edit-bio',
					'data-bv-message'					=> 'This value is not valid',
					'data-bv-feedbackicons-valid'		=> 'glyphicon glyphicon-ok',
					'data-bv-feedbackicons-invalid'		=> 'glyphicon glyphicon-remove',
					'data-bv-feedbackicons-validating'	=> 'glyphicon glyphicon-refresh',
				];
				$hidden = ['BioUniqueId' => $rslt_bio->BioUniqueId];
				echo form_open('biodata/update', $attr_form, $hidden);
				?>
				<!-- Default box -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-pencil"></i> Edit Data Biodata</h3>

						<div class="box-tools pull-right">
							<a href="<?php echo base_url('biodata/index') ?>" class="btn btn-primary btn-xs"
								data-toggle="tooltip" title="Back to Module Biodata">
								<i class="fa fa-arrow-left"></i> Back to Module Biodata
							</a>
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
								title="Collapse">
								<i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
								title="Remove">
								<i class="fa fa-times"></i>
							</button>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								<!-- BioName -->
								<div class="form-group">
									<div class="col-md-12">
										<label for="BioName" class="label-control">Nama<span
												style="color: #f00;">*</span></label>
										<?php
										$data_input = [
											'type' 							=> 'text',
											'name' 							=> 'BioName',
											'class' 						=> 'form-control',
											'id' 							=> 'BioName',
											'placeholder' 					=> 'Input Nama',
											'value' 						=> $rslt_bio->BioName,
											// 'required' 						=> '',
											'autofocus' 					=> '',
											'data-bv-notempty' 				=> 'true',
											'data-bv-notempty-message' 		=> 'The Bio Name is required and cannot be empty',
											'data-bv-stringlength' 			=> 'true',
											'data-bv-stringlength-min' 		=> '3',
											'data-bv-stringlength-max' 		=> '35',
											'data-bv-stringlength-message' 	=> 'The Bio Name must be more than 3 and less than 35 characters long',
										];
										echo form_input($data_input) . PHP_EOL;
										?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<!-- BioEmail -->
								<div class="form-group">
									<div class="col-md-12">
										<label for="BioEmail" class="label-control">Email</label>
										<?php
										$data_input = [
											'type' 							=> 'text',
											'name' 							=> 'BioEmail',
											'class' 						=> 'form-control',
											'id' 							=> 'BioEmail',
											'placeholder' 					=> 'Input E-mail',
											'value' 						=> $rslt_bio->BioEmail,
											'data-bv-emailaddress' 			=> 'true',
											'data-bv-emailaddress-message' 	=> 'The Email is not a valid email address',
										];
										echo form_input($data_input) . PHP_EOL;
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<!-- BioBirthPlace -->
								<div class="form-group">
									<div class="col-md-12">
										<label for="BioBirthPlace" class="label-control">Tempat Lahir</label>
										<?php
										$data_input = [
											'type' 							=> 'text',
											'name' 							=> 'BioBirthPlace',
											'class' 						=> 'form-control',
											'id' 							=> 'BioBirthPlace',
											'placeholder' 					=> 'Input Tempat Lahir',
											'value' 						=> $rslt_bio->BioBirthPlace,
										];
										echo form_input($data_input) . PHP_EOL;
										?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<!-- BioBirthDate -->
								<div class="form-group">
									<div class="col-md-12">
										<label for="BioBirthDate" class="label-control">Tanggal Lahir</label>
										<?php
										$data_input = [
											'type' 							=> 'text',
											'name' 							=> 'BioBirthDate',
											'class' 						=> 'form-control',
											'id' 							=> 'BioBirthDate',
											'placeholder' 					=> 'Input Nama',
											'value' 						=> $rslt_bio->BioBirthDate,
											'data-provide' 					=> 'datepicker',
											'data-date-today-highlight' 	=> 'true',
											'data-date-orientation' 		=> 'bottom',
											'data-date-format' 				=> 'dd MM yyyy',
										];
										echo form_input($data_input) . PHP_EOL;
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<!-- BioAddress -->
								<div class="form-group">
									<div class="col-md-12">
										<label for="BioAddress" class="label-control">Alamat</label>
										<?php
										$data_input = [
											'type' 							=> 'text',
											'name' 							=> 'BioAddress',
											'class' 						=> 'form-control',
											'id' 							=> 'BioAddress',
											'placeholder' 					=> 'Input Alamat',
											'rows' 							=> '5',
											'value' 						=> $rslt_bio->BioAddress,
										];
										echo form_textarea($data_input) . PHP_EOL;
										?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<!-- BioAddressCurrent -->
								<div class="form-group">
									<div class="col-md-12">
										<label for="BioAddressCurrent" class="label-control">Alamat Sekarang</label>
										<?php
										$data_input = [
											'type' 							=> 'text',
											'name' 							=> 'BioAddressCurrent',
											'class' 						=> 'form-control',
											'id' 							=> 'BioAddressCurrent',
											'placeholder' 					=> 'Input Tempat Tinggal Sekarang',
											'rows' 							=> '5',
											'value' 						=> $rslt_bio->BioAddressCurrent,
										];
										echo form_textarea($data_input) . PHP_EOL;
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<!-- BioReligion -->
								<div class="form-group">
									<div class="col-md-12">
										<label for="BioReligion" class="label-control">Agama</label>
										<?php
										$data_input = [
											'' 			=> '-- Pilih Agama --',
											'Islam' 	=> 'Islam',
											'Protestan' => 'Protestan',
											'Katolik' 	=> 'Katolik',
											'Budha' 	=> 'Budha',
											'Hindu' 	=> 'Hindu',
											'Konghucu' 	=> 'Konghucu',
										];
										$options = [
											'class' 						=> 'form-control select2',
											'id' 							=> 'BioReligion',
											'data-placeholder' 				=> '- Pilih Agama -',
										];
										echo form_dropdown('BioReligion', $data_input, $rslt_bio->BioReligion, $options) . PHP_EOL;
										?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<!-- BioPhoneNum -->
								<div class="form-group">
									<div class="col-md-12">
										<label for="BioPhoneNum" class="label-control">Nomor Telphon</label>
										<?php
										$data_input = [
											'type' 							=> 'number',
											'name' 							=> 'BioPhoneNum',
											'class' 						=> 'form-control',
											'id' 							=> 'BioPhoneNum',
											'placeholder' 					=> 'Input Nama',
											'value' 						=> $rslt_bio->BioPhoneNum,
										];
										echo form_input($data_input) . PHP_EOL;
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<!-- BioEducation -->
								<div class="form-group">
									<div class="col-md-12">
										<label for="BioEducation" class="label-control">Pendidikan</label> <br />
										<?php
										$bio_education_expl = explode(',', $rslt_bio->BioEducation);

										$data_input = [
											'SD' 		=> 'SD',
											'SMP'		=> 'SMP',
											'SMA/SMK' 	=> 'SMA/SMK',
											'D3' 		=> 'D3',
											'S1' 		=> 'S1',
											'S2' 		=> 'S2',
											'S3' 		=> 'S3',
										];
										$options = [
											'class' 						=> 'form-control select2',
											'id' 							=> 'BioEducation',
											'multiple' 						=> 'multiple',
											'data-placeholder' 				=> '- Pilih Pendidikan -',
										];
										echo form_dropdown('BioEducation[]', $data_input, $bio_education_expl, $options) . PHP_EOL;
										?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<!-- BioSkill -->
								<div class="form-group">
									<div class="col-md-12">
										<label for="BioSkill" class="label-control">Skill</label>
										<?php
										$data_input = [
											'type' 							=> 'text',
											'name' 							=> 'BioSkill',
											'class' 						=> 'form-control',
											'id' 							=> 'BioSkill',
											'placeholder' 					=> 'Input Skill',
											'value' 						=> $rslt_bio->BioSkill,
											'data-role' 					=> 'tagsinput',
											'style' 						=> 'width: 100% !important;',
										];
										echo form_input($data_input) . PHP_EOL;
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<!-- BioGender -->
									<div class="col-md-12">
										<label for="BioGender" class="label-control">Jenis Kelamin</label>
										<?php
										$gender_default = ['' => '-- Pilih Jenis Kelamin --'];
										$gender_key = [];
										foreach ($rslt_gender as $gender) {
											$gender_key[$gender->GenderCodeName] = $gender->GenderName;
										}
										$data_gender = array_merge($gender_default, $gender_key);

										// print_r($gender_key);

										$options = [
											'class' 				=> 'form-control select2',
											'id' 					=> 'BioGender',
											'data-placeholder' 		=> '- Pilih Jenis Kelamin -',
										];
										echo form_dropdown('BioGender', $data_gender, $rslt_bio->BioGender, $options) . PHP_EOL;
										?>
									</div>
								</div>

								<div class="form-group">
									<!-- BioLanguage -->
									<div class="col-md-12">
										<label for="BioLanguage" class="label-control">Bahasa yang dikuasai</label>
										<?php
										$data_input = [
											'type' 							=> 'text',
											'name' 							=> 'BioLanguage',
											'class' 						=> 'form-control',
											'id' 							=> 'BioLanguage',
											'placeholder' 					=> 'Input bahasa',
											'value' 						=> $rslt_bio->BioLanguage,
											'data-role' 					=> 'tagsinput',
											'style' 						=> 'width: 100% !important; text-transform: capitalize;',
										];
										echo form_input($data_input) . PHP_EOL;
										?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<!-- BioExperince -->
								<div class="form-group">
									<div class="col-md-12">
										<label for="BioExperince" class="label-control">Pengalaman</label>
										<?php
										$data_input = [
											'type' 							=> 'text',
											'name' 							=> 'BioExperince',
											'class' 						=> 'form-control',
											'id' 							=> 'BioExperince',
											'placeholder' 					=> 'Input Pengalaman',
											'rows' 							=> '5',
											'value' 						=> $rslt_bio->BioExperince,
										];
										echo form_textarea($data_input) . PHP_EOL;
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<!-- BioNationaly -->
								<div class="form-group">
									<div class="col-md-12">
										<label for="BioNationaly" class="label-control">Kebangsaan</label>
										<?php
										$data_input = [
											'' 							=> '-- Pilih Kebangsaan --',
											'Indonesia' 				=> 'Indonesia',
											'United Kingdom' 			=> 'United Kingdom',
											'United States of America' 	=> 'United States of America',
											'Lainnya' 					=> 'Lainnya',
										];
										$options = [
											'class' 						=> 'form-control select2',
											'id' 							=> 'BioNationaly',
											'data-placeholder' 				=> '- Pilih Kebangsaan -',
										];
										echo form_dropdown('BioNationaly', $data_input, $rslt_bio->BioNationaly, $options) . PHP_EOL;
										?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<!-- BioHobby -->
								<div class="form-group">
									<div class="col-md-12">
										<label for="BioHobby" class="label-control">Hobi</label>
										<?php
										$data_input = [
											'type' 							=> 'text',
											'name' 							=> 'BioHobby',
											'class' 						=> 'form-control',
											'id' 							=> 'BioHobby',
											'placeholder' 					=> 'Input Hobi',
											'value' 						=> $rslt_bio->BioHobby,
											'data-role' 					=> 'tagsinput',
											'style' 						=> 'width: 100% !important;',
										];
										echo form_input($data_input) . PHP_EOL;
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<!-- BioStatusMarital -->
								<div class="form-group">
									<div class="col-md-12">
										<label for="BioStatusMarital" class="label-control">Status</label>
										<?php
										$data_input = [
											'' 			=> '-- Pilih Status --',
											'Lajang' 			=> 'Lajang',
											'Belum Menikah' 	=> 'Belum Menikah',
											'Menikah' 			=> 'Menikah',
											'Pernah Menikah' 	=> 'Pernah Menikah',
										];
										$options = [
											'class' 						=> 'form-control select2',
											'id' 							=> 'BioStatusMarital',
											'data-placeholder' 				=> '- Pilih Status -',
										];
										echo form_dropdown('BioStatusMarital', $data_input, $rslt_bio->BioStatusMarital, $options) . PHP_EOL;
										?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<!-- BioQuote -->
								<div class="form-group">
									<div class="col-md-12">
										<label for="BioQuote" class="label-control">Kutipan</label>
										<?php
										$data_input = [
											'type' 							=> 'text',
											'name' 							=> 'BioQuote',
											'class' 						=> 'form-control',
											'id' 							=> 'BioQuote',
											'placeholder' 					=> 'Input Kutipan',
											'rows' 							=> '5',
											'value' 						=> $rslt_bio->BioQuote,
										];
										echo form_textarea($data_input) . PHP_EOL;
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<div class="row">
							<div class="col-md-12">
								<div class="pull-right">
									<button type="submit" class="btn btn-primary btn-xs">
										<i class="fa fa-upload"></i> Update
									</button>
									<!-- <button type="reset" class="btn btn-danger btn-xs">
										<i class="fa fa-refresh"></i> Reset Form
									</button> -->
								</div>
							</div>
						</div>
					</div>
					<!-- /.box-footer-->
				</div>
				<!-- /.box -->
				<?php echo form_close(); ?>
			</div>
		</div>

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->