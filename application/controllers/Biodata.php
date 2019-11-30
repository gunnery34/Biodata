<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends CI_Controller {
	private $_table_BIO = 'tbl_bio';
	public $data = []; // set public data

	function __construct() {
		parent::__construct();
		$this->data['menu_parent'] = '';
		$this->data['menu_child'] = '';

		$this->data['css_outline'] = '';
		$this->data['css_inline'] = '';

		$this->data['js_outline'] = '';
		$this->data['js_inline'] = '';

		$this->load->model('M_Biodata');
		$this->load->model('M_Gender');

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
			// configuration of datatables
			var tables_bio =$("#datatables_bio").DataTable({
				"processing": false, //Feature control the processing indicator.
       			"serverSide": true, //Feature control DataTables server-side processing mode.
        		"order": [], //Initial no order.

				// Load data for the tables content from an Ajax source
				"ajax": {
					"url": "'. base_url('biodata/ajax_list') .'",
					"type": "POST"
				},

				//Set column definition initialisation properties.
				"columnDefs": [
					{
						"targets": [ 0 ], //first column / numbering column
						"orderable": false, //set not orderable
					},
				],
			});

			// auto reload datatables per miliseconds
			setInterval( function () {
				tables_bio.ajax.reload( null, false ); // user paging is not reset on reload
			}, 1000 ); // set interval of miliseconds

			// btn refresh datatables
			$(document).on("click", ".btn-refresh-tbl-bio", function() {
				tables_bio.ajax.reload(null, false); // reload datatable ajax
			});
		';

		// load view dashboard
		$this->load->view('layout/header', $this->data);
		$this->load->view('layout/sidebar', $this->data);
		$this->load->view('apps/biodata/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}

	public function ajax_list() {
		$list = $this->M_Biodata->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $list_value) {
            $no++;
            $row = array();
			$row[] = '
				<div class="text-center">
					<a href="'. base_url('biodata/edit/'. $list_value->BioUniqueId) .'" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>
					<a href="'. base_url('biodata/delete/'. $list_value->BioUniqueId) .'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
				</div>
			';
            $row[] = $no .'.';
            $row[] = $list_value->BioName;
			$row[] = '
				<div class="text-right">
					'. $list_value->BioBirthPlace .', '. $list_value->BioBirthDate .'
				</div>
			';
            $row[] = $list_value->BioEmail;
            $row[] = $list_value->BioPhoneNum;
            $row[] = $list_value->BioReligion;
            $row[] = $list_value->BioNationaly;
            $row[] = $list_value->BioEducation;
            $row[] = $list_value->GenderName;
            $row[] = $list_value->BioStatusMarital;

            $data[] = $row;
        }

        $output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Biodata->count_all(),
			"recordsFiltered" => $this->M_Biodata->count_filtered(),
			"data" => $data,
		);

        //output to json format
        echo json_encode($output);
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
			<link rel="stylesheet" href="'. base_url('assets/plugin/more/bootstrap-tagsinput-v0.8.0/') .'dist/bootstrap-tagsinput.css">
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
			<script src="'. base_url('assets/plugin/more/bootstrap-tagsinput-v0.8.0/') .'dist/bootstrap-tagsinput.min.js"></script>

			<!-- Typeahead -->
			<script src="'. base_url('assets/plugin/more/typeahead.js-v0.11.1/') .'dist/typeahead.bundle.min.js"></script>

			<!-- Asset JS -->
			<script src="'. base_url('assets/js/') .'app.js"></script>
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

		// get data gender
		$get_all_gender = $this->M_Gender->get_all();

		$this->data['rslt_gender'] = $get_all_gender;

		// load view dashboard
		$this->load->view('layout/header', $this->data);
		$this->load->view('layout/sidebar', $this->data);
		$this->load->view('apps/biodata/create', $this->data);
		$this->load->view('layout/footer', $this->data);
	}

	public function create_process() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->load->helper('security');

			$clean = $this->security->xss_clean($this->input->post()); // clean xss

			// validation data clean xss
			$clean['BioSkill'] = str_replace(',', ', ', $clean['BioSkill']);
			$clean['BioSkill'] = ucwords($clean['BioSkill']);

			$clean['BioLanguage'] = str_replace(',', ', ', $clean['BioLanguage']);
			$clean['BioLanguage'] = ucwords($clean['BioLanguage']);

			$clean['BioExperince'] = str_replace(',', ', ', $clean['BioExperince']);
			$clean['BioExperince'] = ucwords($clean['BioExperince']);

			$clean['BioHobby'] = str_replace(',', ', ', $clean['BioHobby']);
			$clean['BioHobby'] = ucwords($clean['BioHobby']);

			$clean['BioQuote'] = str_replace(',', ', ', $clean['BioQuote']);
			$clean['BioQuote'] = ucwords($clean['BioQuote']);

			$clean['BioEducation'] = implode(',', $clean['BioEducation']);;


			$clean['BioName'] = ucwords($clean['BioName']);
			$clean['BioBirthPlace'] = ucfirst($clean['BioBirthPlace']);
			$clean['BioAddress'] = ucfirst($clean['BioAddress']);
			$clean['BioAddressCurrent'] = ucfirst($clean['BioAddressCurrent']);

			$arry = [
				'BioUniqueId' => Accesscontrol_Helper::UniqIdReal(),
				'BioStatus' => 1,
				'BioCreated' => date('Y-m-d H:i:s'),
				'BioCreatedId' => $this->session->userdata('UsrId'),
			];

			$merge = array_merge($clean, $arry);

			$insert = $this->M_Biodata->create($merge);

			if ($insert > 0) {
				$this->session->set_flashdata('success', 'Berhasil menambahkan Biodata');
				redirect(base_url('biodata/create'));
			} else {
				$this->session->set_flashdata('error', 'Gagal menambahkan Biodata');
				redirect(base_url('biodata/create'));
			}

			// check value from form
			// echo '<pre>';
			// print_r($merge);
			// echo '</pre>';
		} else {
			redirect(base_url('biodata/index'));
		}
	}

	public function edit($uniqueId = null) {
		if (!isset($uniqueId)) redirect('biodata/index'); // if uniqueid null, go to index

		// set title
		$this->data['title'] = 'Biodata - Edit New Data';

		$this->data['menu_parent'] = 'Biodata';
		$this->data['menu_child'] = 'Edit';

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
			<link rel="stylesheet" href="'. base_url('assets/plugin/more/bootstrap-tagsinput-v0.8.0/') .'dist/bootstrap-tagsinput.css">
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
			<script src="'. base_url('assets/plugin/more/bootstrap-tagsinput-v0.8.0/') .'dist/bootstrap-tagsinput.min.js"></script>

			<!-- Typeahead -->
			<script src="'. base_url('assets/plugin/more/typeahead.js-v0.11.1/') .'dist/typeahead.bundle.min.js"></script>

			<!-- Asset JS -->
			<script src="'. base_url('assets/js/') .'app.js"></script>
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

		// get data gender
		$get_all_gender = $this->M_Gender->get_all();

		$this->data['rslt_gender'] = $get_all_gender;

		$get_bio = $this->M_Biodata->get_by_uniqueid(
			[
				'BioUniqueId' => $uniqueId,
			]
		); // get data bio

		if (!isset($get_bio)) redirect('biodata/index'); // if data null, go to index

		$this->data['rslt_bio'] = $get_bio; // set data bio to view

		// load view dashboard
		$this->load->view('layout/header', $this->data);
		$this->load->view('layout/sidebar', $this->data);
		$this->load->view('apps/biodata/edit', $this->data);
		$this->load->view('layout/footer', $this->data);
	}

	public function update() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->load->helper('security');

			$clean = $this->security->xss_clean($this->input->post()); // clean xss

			// validation data clean xss
			$clean['BioSkill'] = str_replace(',', ', ', $clean['BioSkill']);
			$clean['BioSkill'] = ucwords($clean['BioSkill']);

			$clean['BioLanguage'] = str_replace(',', ', ', $clean['BioLanguage']);
			$clean['BioLanguage'] = ucwords($clean['BioLanguage']);

			$clean['BioExperince'] = str_replace(',', ', ', $clean['BioExperince']);
			$clean['BioExperince'] = ucwords($clean['BioExperince']);

			$clean['BioHobby'] = str_replace(',', ', ', $clean['BioHobby']);
			$clean['BioHobby'] = ucwords($clean['BioHobby']);

			$clean['BioQuote'] = str_replace(',', ', ', $clean['BioQuote']);
			$clean['BioQuote'] = ucwords($clean['BioQuote']);

			$clean['BioEducation'] = implode(',', $clean['BioEducation']);;


			$clean['BioName'] = ucwords($clean['BioName']);
			$clean['BioBirthPlace'] = ucfirst($clean['BioBirthPlace']);
			$clean['BioAddress'] = ucfirst($clean['BioAddress']);
			$clean['BioAddressCurrent'] = ucfirst($clean['BioAddressCurrent']);

			$get_bio = $this->M_Biodata->get_by_uniqueid([ 'BioUniqueId' => $clean['BioUniqueId'] ]);

			if (!isset($get_bio->BioModify) || !isset($get_bio->BioModifyId)) {
				$Modify = date('Y-m-d H:i:s');
				$ModifyId = $this->session->userdata('UsrId');
			} else {
				$Modify = $get_bio->BioModify .','. date('Y-m-d H:i:s');
				$ModifyId = $get_bio->BioModifyId .','. $this->session->userdata('UsrId');
			}

			$arry = [
				'BioModify' => $Modify,
				'BioModifyId' => $ModifyId,
			];

			$merge = array_merge($clean, $arry);

			$update = $this->M_Biodata->update($merge);

			if ($update > 0) {
				$this->session->set_flashdata('success', 'Berhasil update Data Biodata');
				redirect(base_url('biodata/edit/'. $clean['BioUniqueId']));
			} else {
				$this->session->set_flashdata('error', 'Gagal update Data Biodata');
				redirect(base_url('biodata/edit/'. $clean['BioUniqueId']));
			}

			// check value from form
			// echo '<pre>';
			// print_r($merge);
			// echo '</pre>';
		} else {
			redirect(base_url('biodata/index'));
		}
	}

	public function delete($uniqueId = null) {
		if (!isset($uniqueId)) redirect('biodata/index'); // if uniqueid null, go to index

		$get_bio = $this->M_Biodata->get_by_uniqueid(
			[
				'BioUniqueId' => $uniqueId,
			]
		); // get data bio

		if (!isset($get_bio)) redirect('biodata/index'); // if data null, go to index

		// process delete data
		$this->db->delete($this->_table_BIO,
			[
				'BioUniqueId' => $uniqueId,
			]
		);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Berhasil delete Data Biodata');
			redirect(base_url('biodata/index'));
		} else {
			$this->session->set_flashdata('error', 'Gagal delete Data Biodata');
			redirect(base_url('biodata/index'));
		}
	}
}