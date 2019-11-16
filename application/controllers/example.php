<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	public function index() {
		// echo 'Browser Anda: '. $this->agent->agent_string();
		// echo '<br />Platform: '. $this->agent->platform();

		echo 'Hai page Index';

		Accesscontrol_Helper::Visitor_Counter('Page Index');
	}
	public function index2() {
		echo 'Hai page Index 2';

		Accesscontrol_Helper::Visitor_Counter('Page Index2');
	}
}
