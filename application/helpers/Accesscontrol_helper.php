<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accesscontrol_Helper {
	// Page / Controller
	public static function Visitor_Counter($VC_Page){
		$CI =& get_instance();

		$param['VC_Page'] 			= $VC_Page;
		$param['VC_Version'] 		= $CI->agent->version();
		$param['VC_Browser'] 		= $CI->agent->browser();
		$param['VC_Platform'] 		= $CI->agent->platform();
		$param['VC_IP_Address'] 	= $CI->input->ip_address();
		$param['VC_UserAgent'] 		= $CI->agent->agent_string();
		$param['VC_Date_TypeID'] 	= date('d-F-Y H:i:s');
		$param['VC_Counter'] 		= 1;

		// save to db
		$CI->M_Activity->Save_VisitorCounter($param);
	}

	// UniqeId
	public static function UniqIdReal($length = 13) {
		// uniqid gives 13 chars, but you could adjust it to your needs.
		if (function_exists("random_bytes")) {
			$bytes = random_bytes(ceil($length / 2));
		} elseif (function_exists("openssl_random_pseudo_bytes")) {
			$bytes = openssl_random_pseudo_bytes(ceil($length / 2));
		} else {
			throw new Exception("no cryptographically secure random function available");
		}
		return substr(bin2hex($bytes), 0, $length);
	}

	public static function Is_Loggin_In() {
		$CI =& get_instance();

		if (!empty($CI->session->userdata['UsrName']) && $CI->session->userdata['is_logged_in'] == TRUE) {
			return true;
		} else {
			return false;
		}
	}
}