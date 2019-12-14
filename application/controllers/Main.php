<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
	public $data = []; // set public data

	function __construct()
	{
		parent::__construct();

		$this->load->model('M_Main');
	}

	public function index()
	{
		redirect(base_url('main/sign_in'));
	}

	public function sign_in()
	{
		// set title
		$this->data['title'] = 'Sign In - User Page';

		// load view
		$this->load->view('usr/sign_in', $this->data);

		Accesscontrol_Helper::Visitor_Counter('Sign In');
	}

	public function sign_in_process()
	{
		$this->load->helper('security'); // load security

		$clean = $this->security->xss_clean($this->input->post());

		$email = $clean['UsrEmail'];
		$pass = $clean['UsrPassword'];

		$get_rslt_usr = $this->M_Main->get_by_email($email);
		if (!empty($get_rslt_usr)) { // jika email ditemukan
			$verified_email = $this->M_Main->verify_by_email($email);

			if (!empty($verified_email)) { // jika email sudah diverifikasi
				$this->load->library('password'); // load pass hash

				if (!$this->password->validate_password($pass, $get_rslt_usr->UsrPassword)) { // password false
					// pass false

					// set login actity
					Accesscontrol_Helper::LoginActivity_Log(
						Accesscontrol_Helper::UniqIdReal(),
						'Sign In',
						ucwords($clean['UsrEmail']),
						'',
						'Sign In',
						json_encode($clean),
						'Sign In - Failed (Error Password)'
					);

					$this->session->set_flashdata('error', 'account error');
					redirect(base_url('main/sign_in'));
				} else {
					// pass true
					foreach ($get_rslt_usr as $key => $val) {
						$this->session->set_userdata($key, $val);
					}
					$this->session->set_userdata('is_logged_in', TRUE);

					// set login actity
					Accesscontrol_Helper::LoginActivity_Log(
						Accesscontrol_Helper::UniqIdReal(),
						'Sign In',
						ucwords($clean['UsrEmail']),
						$get_rslt_usr->UsrId,
						'Sign In',
						json_encode($get_rslt_usr),
						'Sign In - Success'
					);

					$this->session->set_flashdata('success', 'success login');
					redirect(base_url('dashboard/index'));
				}
			} else {
				$this->session->set_flashdata('error', 'Please Verify your account Email');
				redirect(base_url('main/sign_in'));
			}
		} else {
			// jika email tidak ditemukan

			// set login actity
			Accesscontrol_Helper::LoginActivity_Log(
				Accesscontrol_Helper::UniqIdReal(),
				'Sign In',
				ucwords($clean['UsrEmail']),
				'',
				'Sign In',
				json_encode($clean),
				'Sign In - Failed (Email not found)'
			);

			$this->session->set_flashdata('error', 'your account not found');
			redirect(base_url('main/sign_in'));
		}
	}

	public function sign_up()
	{
		// set title
		$this->data['title'] = 'Sign Up - User Page';

		// load view
		$this->load->view('usr/sign_up', $this->data);

		Accesscontrol_Helper::Visitor_Counter('Sign Up');
	}

	public function sign_up_process()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->load->library('form_validation'); // dec library formValidation

			// create rules
			$this->form_validation->set_rules(
				'UsrEmail',
				'Email',
				'required|trim|valid_email|is_unique[tbl_usr.UsrEmail]',
				[
					'is_unique' => 'This Email already exists. Please choose another one.', // message if email is have been taken
				]
			);

			if ($this->form_validation->run() == FALSE) { // if error formValidation
				$this->session->set_flashdata('error', validation_errors()); // get message from formValidation
				redirect(base_url('main/sign_up'));
			} else { // if success formValidation
				$this->load->helper('security');
				$clean = $this->security->xss_clean($this->input->post()); // xssClean form

				$get_rslt_usr = $this->M_Main->get_by_firstname($clean['UsrFirstName']);

				if (!isset($get_rslt_usr)) {
					// load lib pass
					$this->load->library('password');
					$pass = $this->password->create_hash($clean['UsrPassword']); // make hash pass

					$name = substr(strtolower(str_replace(' ', '', $clean['UsrFirstName'])), 0, 15); // make user

					$verification_key = Accesscontrol_Helper::base64url_encode(md5(rand()));

					$data_usr = [
						'UsrUniqeId' => Accesscontrol_Helper::UniqIdReal(),
						'UsrName' => $name,
						'UsrFirstName' => ucwords($clean['UsrFirstName']),
						'UsrEmail' => $clean['UsrEmail'],
						'UsrPassword' => $pass,
						'UsrCreatedId' => 0,
						'UsrRole' => 'User',
						'UsrStatus' => 'Active',
						'UsrVerificationKey' => $verification_key,
						'UsrEmailVerified' => 'Pending',
					];

					// create new data
					$get_rslt_usr = $this->M_Main->add($data_usr);

					if ($get_rslt_usr > 0) { // data berhasil
						$subject = "Please verify E-mail for Login";
						$message = "
							<p>Hi, <strong>" . ucwords($clean['UsrFirstName']) . "</strong></p>
							<p>
								This is email verification mail from <strong><em>Biodata System</em></strong>. For complate registration process and login into system. First you want to verify you email by click <a href='" . base_url() . "main/verify_email/" . $verification_key . "'>this link</a>.
							</p>
							<p>
								Once you click this link your email will be verified and you can login into system.
							</p>
							<p>Thanks, <strong><em>Developer— Arigho Gumery</em></strong></p>
						";

						$config = [
							'protocol' => 'smtp',
							'smtp_host' => 'smtp.gmail.com',
							'smtp_crypto' => 'ssl',
							'smtp_port' => 465,
							'smtp_user' => 'developer.rehobot.youth@gmail.com',
							'smtp_pass' => 'developer000',
							'mailtype' => 'html',
							'charset' => 'utf-8',
							'useragent' => 'CodeIgniter',
							'wordwrap' => TRUE,
							// 'set_newline' => "\r\n",
						];

						$this->load->library('email', $config); // dec library email with configuration

						$this->email->initialize($config); // install library email

						$this->email->set_newline("\r\n");
						$this->email->from('developer@rehobotyouthbekasi.com'); // use admin email
						$this->email->to($this->input->post('UsrEmail')); // destination email
						$this->email->subject($subject); // set subject
						$this->email->message($message); // set message

						if ($this->email->send()) { // if email sending - true
							// set login actity
							Accesscontrol_Helper::LoginActivity_Log(
								Accesscontrol_Helper::UniqIdReal(),
								'Sign Up',
								ucwords($clean['UsrEmail']),
								'',
								'Sign Up - Config Email',
								json_encode($data_usr),
								'Sign Up - Success'
							);

							$this->session->set_flashdata('success', 'Check in your Email for Email Verification Mail'); // $this->email->print_debugger() get message from formValidation
							redirect(base_url('main/sign_up'));
						} else {  // if email sending - false
							// set login actity
							Accesscontrol_Helper::LoginActivity_Log(
								Accesscontrol_Helper::UniqIdReal(),
								'Sign Up',
								ucwords($clean['UsrEmail']),
								'',
								'Sign Up - Config Email',
								json_encode($data_usr),
								'Sign Up - False'
							);

							$this->session->set_flashdata('error', $this->email->print_debugger()); // $this->email->print_debugger() get message from formValidation
							// $this->session->set_flashdata('error', 'Error occured, Try again or Tell to Developer by Support [Email].'); // $this->email->print_debugger() get message from formValidation
							redirect(base_url('main/sign_up'));
						}
					} else { // data gagal
						// set login actity
						Accesscontrol_Helper::LoginActivity_Log(
							Accesscontrol_Helper::UniqIdReal(),
							'Sign Up',
							ucwords($clean['UsrEmail']),
							'',
							'Sign Up',
							json_encode($data_usr),
							'Sign Up - Failed (Duplicate Data)'
						);

						$this->session->set_flashdata('error', 'Insert data failed');
						redirect(base_url('main/sign_up'));
					}
				} else {
					// send notif to sign up view
					$this->session->set_flashdata('error', 'Insert data failed. account found!');
					redirect(base_url('main/sign_up'));
				}
			}
		} else {
			redirect(base_url('main/sign_up'));
		}
	}

	public function sign_out()
	{
		$get_rslt_usr = $this->M_Main->get_by_uniqueid($this->session->userdata('UsrUniqeId'));

		// echo $this->session->userdata('UsrUniqeId');

		if ($get_rslt_usr > 0) {
			foreach ($this->session->userdata as $key => $value) { // delete session
				$this->session->unset_userdata($key);
			}

			// set login actity
			Accesscontrol_Helper::LoginActivity_Log(
				Accesscontrol_Helper::UniqIdReal(),
				'Sign Out',
				ucwords($get_rslt_usr->UsrEmail),
				$get_rslt_usr->UsrId,
				'Sign Out',
				json_encode($get_rslt_usr),
				'Sign Out - Success'
			);

			$this->session->set_flashdata('success', 'Success sign out');
			redirect(base_url('main/sign_in'));
		} else {
			// set login actity
			Accesscontrol_Helper::LoginActivity_Log(
				Accesscontrol_Helper::UniqIdReal(),
				'Sign Out',
				'Unknown',
				'',
				'Sign Out',
				'Unknown',
				'Sign Out - Bugs - Important'
			);

			$this->session->set_flashdata('error', 'error');
			redirect(base_url('main/sign_in'));
		}
	}

	public function verify_email($verification_key = null)
	{
		if (!isset($verification_key)) redirect('main/sign_in'); // if verficationKey null, go to main page

		$verif_key = $this->M_Main->get_by_verification_key(($verification_key)); // get data by verificationKey
		if (!isset($verif_key)) redirect('main/sign_in'); // if data verificationKey not found

		$array = [
			'UsrEmailVerified' => 'Verified',
			'UsrDateEmailVerified' => date('Y-m-d H:i:s'),
			'UsrEmail' => $verif_key->UsrEmail,
			'UsrVerificationKey' => $verif_key->UsrVerificationKey,
		];

		$verif_key_update = $this->M_Main->update_verification_email($array);
		// $verif_key_update = $this->M_Main->update_verification_email($verif_key);

		if ($verif_key_update > 0) {
			$this->session->set_flashdata('success', 'Verification Data Completed!');
			redirect(base_url('main/sign_in'));
		} else {
			$this->session->set_flashdata('error', 'Verification Data Failed!');
			redirect(base_url('main/sign_in'));
		}

		// info to get data variabel
		// echo '<pre>';
		// echo print_r($verif_key);
		// echo '</pre>';
	}
}
