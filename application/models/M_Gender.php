<?php
class M_Gender extends CI_Model {
	private $_tbl_Gender = 'tbl_gender';

	public function __construct() {
		parent::__construct();
	}

	public function get_all() {
		$this->db->from($this->_tbl_Gender);
		$this->db->order_by('GenderName', 'ASC');
		$query = $this->db->get();

		return $query->result();
	}
}