<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public $data = []; // set public data

	function __construct() {
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
		$this->data['title'] = 'Blank Page Index1';

		// load view dashboard
		$this->load->view('layout/header', $this->data);
		$this->load->view('layout/sidebar', $this->data);
		$this->load->view('dashboard/dashboard', $this->data);
		$this->load->view('layout/footer', $this->data);
	}

	public function index2() {
		// set title
		$this->data['title'] = 'Blank Page Index2';

		// load view dashboard
		$this->load->view('layout/header', $this->data);
		$this->load->view('layout/sidebar', $this->data);
		$this->load->view('dashboard/dashboard', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}