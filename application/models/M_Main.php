<?php
class M_Main extends CI_Model
{
	private $_tbl_usr = 'tbl_usr';

	public function __construct()
	{
		parent::__construct();
	}

	public function add($string)
	{
		$query = $this->db->insert_string($this->_tbl_usr, $string);
		$this->db->query($query);

		return $this->db->insert_id();
	}

	public function get_by_firstname($string)
	{
		return $this->db->get_where(
			'tbl_usr', // table
			[
				'UsrFirstName' => ucwords($string)  // column
			]
		)->row();
	}

	public function get_by_email($string)
	{
		return $this->db->get_where(
			'tbl_usr', // table
			[
				'UsrEmail' => ucwords($string)  // column
			]
		)->row();
	}

	public function verify_by_email($string)
	{
		return $this->db->get_where(
			'tbl_usr', // table
			[
				'UsrEmail' => ucwords($string), // column
				'UsrEmailVerified' => 'Verified', // column
				'UsrStatus' => 'Active' // column
			]
		)->row();
	}

	public function get_by_uniqueid($string)
	{
		return $this->db->get_where(
			'tbl_usr', // table
			[
				'UsrUniqeId' => $string  // column
			]
		)->row();
	}

	public function get_by_verification_key($string)
	{
		return $this->db->get_where(
			'tbl_usr', // table
			[
				'UsrVerificationKey' => $string // column
			]
		)->row();
	}

	public function update_verification_email($array)
	{
		$str = [
			'UsrEmailVerified' => 'Verified',
			'UsrDateEmailVerified' => date('Y-m-d H:i:s'),
		];

		$whr_id = [
			'UsrVerificationKey' => $array['UsrVerificationKey'],
			'UsrEmail' => $array['UsrEmail'],
		];

		$this->db->update(
			$this->_tbl_usr,
			$str,
			$whr_id
		);

		return $this->db->affected_rows();
	}

	public function update_recovery_email($array)
	{
		$str = [
			'UsrForgotPassword' => $array['UsrForgotPassword'],
			'UsrPassword' => $array['UsrPassword'],
			'UsrDateForgotPassword' => date('Y-m-d H:i:s'),
		];

		$whr_id = [
			'UsrEmail' => $array['UsrEmail'],
		];

		$this->db->update(
			$this->_tbl_usr,
			$str,
			$whr_id
		);

		return $this->db->affected_rows();
	}

	public function update_password($array)
	{
		$modify = $array['UsrModify'];
		$modifyId = $array['UsrModifyId'];

		$str = [
			'UsrPassword' => $array['UsrPassword'],
			'UsrModify' => (!empty($modify) ? $modify .', '. date('Y-m-d H:i:s') : date('Y-m-d H:i:s')),
			'UsrModifyId' => (!empty($modifyId) ? $modifyId .', '. $array['UsrId'] : $array['UsrId'])
		];

		$whr_id = [
			'UsrEmail' => $array['UsrEmail'],
			'UsrId' => $array['UsrId']
		];

		$this->db->update(
			$this->_tbl_usr,
			$str,
			$whr_id
		);

		return $this->db->affected_rows();
	}
}
