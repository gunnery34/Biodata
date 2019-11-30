<?php
class M_Biodata extends CI_Model {
	private $_table_BIO = 'tbl_bio';
	private $_tbl_Gender = 'tbl_gender';

	var $column_order = array(null, null, 'BioName', 'BioBirthPlace', 'BioEmail', 'BioPhoneNum', 'BioReligion', 'BioNationaly', 'BioEducation', 'gender.GenderName', 'BioStatusMarital'); //set column field database for datatable orderable
    var $column_search = array('BioName', 'BioBirthPlace', 'BioBirthDate', 'BioEmail', 'BioPhoneNum', 'BioReligion', 'BioNationaly', 'BioEducation', 'gender.GenderName', 'BioStatusMarital'); //set column field database for datatable searchable
    var $order = array('BioName' => 'ASC'); // default order

	public function __construct() {
		parent::__construct();
	}

	//----
	// config SSP (Server-Side Processing)
	//----
	private function _get_datatables_query() {
		$this->db->from($this->_table_BIO .' bio');
		$this->db->join($this->_tbl_Gender .' gender', 'bio.BioGender = gender.GenderCodeName', 'Left');

        $i = 0;
        foreach ($this->column_search as $item) { // loop column
            if ($_POST['search']['value']) { // if datatable send POST for search
                if ($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables() {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->_table_BIO);
        return $this->db->count_all_results();
    }

	//----
	// create new data
	//----
	public function create($string) {
		$query = $this->db->insert_string($this->_table_BIO, $string);
		$this->db->query($query);

		return $this->db->insert_id();
	}

	//----
	// get by uniqueId
	//----
	public function get_by_uniqueid($arry) {
		return $this->db->get_where(
			$this->_table_BIO,
			[
				'BioUniqueId' 	=> $arry['BioUniqueId'],
			]
		)->row();
	}

	//----
	// update
	//----
	public function update($arry) {
		$str = [
			'BioName' 			=> $arry['BioName'],
			'BioEmail' 			=> $arry['BioEmail'],
			'BioBirthPlace' 	=> $arry['BioBirthPlace'],
			'BioBirthDate' 		=> $arry['BioBirthDate'],
			'BioAddress' 		=> $arry['BioAddress'],
			'BioAddressCurrent' => $arry['BioAddressCurrent'],
			'BioReligion' 		=> $arry['BioReligion'],
			'BioPhoneNum' 		=> $arry['BioPhoneNum'],
			'BioEducation' 		=> $arry['BioEducation'],
			'BioSkill' 			=> $arry['BioSkill'],
			'BioGender' 		=> $arry['BioGender'],
			'BioLanguage' 		=> $arry['BioLanguage'],
			'BioExperince' 		=> $arry['BioExperince'],
			'BioNationaly' 		=> $arry['BioNationaly'],
			'BioHobby' 			=> $arry['BioHobby'],
			'BioStatusMarital' 	=> $arry['BioStatusMarital'],
			'BioQuote' 			=> $arry['BioQuote'],
			'BioModify' 		=> $arry['BioModify'],
			'BioModifyId' 		=> $arry['BioModifyId'],
		];

		$whr_id = [
			'BioUniqueId' => $arry['BioUniqueId'],
		];

		$this->db->update(
			$this->_table_BIO,
			$str,
			$whr_id
		);

		return $this->db->affected_rows();
	}
}