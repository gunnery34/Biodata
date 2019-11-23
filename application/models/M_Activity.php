<?php
class M_Activity extends CI_Model {
	// private $_table_AL = 'tbl_imprt_activity_log';
	private $_table_LAL = 'tbl_imprt_login_activity_log';
	private $_tbl_VC = 'tbl_vc';

	public function __construct() {
		parent::__construct();
	}

	public function Save_VisitorCounter($param) {
		$sql = $this->db->insert_string($this->_tbl_VC, $param);
		$ex = $this->db->query($sql);

		return $this->db->affected_rows($sql);
	}

	public function Save_LoginActivityLog($param) {
		$sql = $this->db->insert_string($this->_table_LAL, $param);
		$ex = $this->db->query($sql);

		return $this->db->affected_rows($sql);
	}
}