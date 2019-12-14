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
			<li class="active">Index</li>
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

		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">List All Biodata</h3>

				<div class="box-tools pull-right">
					<a href="<?php echo base_url('biodata/create') ?>" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Add New Data">
						<i class="fa fa-plus"></i> Add New Data
					</a>
					<a href="javascript:void:;" class="btn btn-primary btn-xs btn-refresh-tbl-bio" data-toggle="tooltip" title="Refresh Data Table Biodata">
						<i class="fa fa-refresh"></i> Refresh Table
					</a>
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i>
					</button>
				</div>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table id="datatables_bio" class="table table-bordered table-condensed table-hover" width="100%">
						<thead>
							<tr>
								<th class="text-center">Action</th>
								<th class="text-center">No</th>
								<th class="text-center">Nama</th>
								<th class="text-center">Tempat Tanggal Lahir</th>
								<th class="text-center">Email</th>
								<th class="text-center">No. Telp</th>
								<th class="text-center">Agama</th>
								<th class="text-center">Kebangsaan</th>
								<th class="text-center">Pendidikan</th>
								<th class="text-center">Jenis Kelamin</th>
								<th class="text-center">Status</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<!-- Footer -->
			</div>
			<!-- /.box-footer-->
		</div>
		<!-- /.box -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->