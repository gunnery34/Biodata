<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends CI_Controller {
	public $data = []; // set public data

	function __construct() {
		$this->data['menu_parent'] = '';
		$this->data['menu_child'] = '';

		$this->data['css_outline'] = '';
		$this->data['css_inline'] = '';

		$this->data['js_outline'] = '';
		$this->data['js_inline'] = '';

		parent::__construct();

		if (Accesscontrol_Helper::Is_Loggin_In() == false) {
			$this->session->set_flashdata('error', 'anda harus login');
			redirect(base_url() . 'main/sign_in'); // redirect to page sign in
		} else {
			return;
		}
	}

	public function index() {
		// set title
		$this->data['title'] = 'Biodata - Index';

		$this->data['menu_parent'] = 'Biodata';
		$this->data['menu_child'] = 'Index';

		$this->data['css_outline'] = '
			<!-- DataTables -->
			<link rel="stylesheet" href="'. base_url('assets/theme/AdminLTE-v.2.4/') .'bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
			';
		$this->data['css_inline'] = '';

		$this->data['js_outline'] = '
			<!-- DataTables -->
			<script src="'. base_url('assets/theme/AdminLTE-v.2.4/') .'bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
			<script src="'. base_url('assets/theme/AdminLTE-v.2.4/') .'bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		';
		$this->data['js_inline'] = '
			$("#datatables_bio").DataTable();
		';

		// load view dashboard
		$this->load->view('layout/header', $this->data);
		$this->load->view('layout/sidebar', $this->data);
		$this->load->view('apps/biodata/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}

	public function create() {
		// set title
		$this->data['title'] = 'Biodata - Add New Data';

		$this->data['menu_parent'] = 'Biodata';
		$this->data['menu_child'] = 'Add';

		$this->data['css_outline'] = '
			<!-- DataTables -->
			<link rel="stylesheet" href="'. base_url('assets/theme/AdminLTE-v.2.4/') .'bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

			<!-- Bootstrap Validator  -->
			<link rel="stylesheet" href="'. base_url() .'assets/plugin/more/bootstrapValidator_v0.5.0/dist/css/bootstrapValidator.min.css">

			<!-- Bootstrap Datepicker -->
			<link rel="stylesheet" href="'. base_url('assets/theme/AdminLTE-v.2.4/') .'bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

			<!-- Select2 -->
			<link rel="stylesheet" href="'. base_url('assets/theme/AdminLTE-v.2.4/') .'bower_components/select2/dist/css/select2.min.css">

			<!-- Bootstrap Tag -->
			<link rel="stylesheet" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
		';
		$this->data['css_inline'] = '
			.bootstrap-tagsinput { width: 100%; }
		';

		$this->data['js_outline'] = '
			<!-- DataTables -->
			<script src="'. base_url('assets/theme/AdminLTE-v.2.4/') .'bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
			<script src="'. base_url('assets/theme/AdminLTE-v.2.4/') .'bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

			<!-- Bootstrap Validator -->
			<script src="'. base_url() .'assets/plugin/more/bootstrapValidator_v0.5.0/dist/js/bootstrapValidator.min.js"></script>

			<!-- Bootstrap Datepicker -->
			<script src="'. base_url('assets/theme/AdminLTE-v.2.4/') .'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

			<!-- Select2 -->
			<script src="'. base_url('assets/theme/AdminLTE-v.2.4/') .'bower_components/select2/dist/js/select2.full.min.js"></script>

			<!-- Bootstrap Tag -->
			<script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
		';
		$this->data['js_inline'] = '
			//Date picker
			$(".datepicker").datepicker({
				autoclose: true
			});

			//Initialize Select2 Elements
			$(".select2").select2({
				allowClear: true,
				width: "100%",
			});

			//BootstrapValidator
			$("#form-add-new-bio").bootstrapValidator();
		';

		// load view dashboard
		$this->load->view('layout/header', $this->data);
		$this->load->view('layout/sidebar', $this->data);
		$this->load->view('apps/biodata/create', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}