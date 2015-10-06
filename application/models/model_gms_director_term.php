<?php

class Model_gms_director_term extends CI_Model {

    public $DIRECTOR_TERM_ID;
    public $MEMBER_ID;
    public $TERM_ID;
    public $DIRECTOR_TERM_STATUS;
    public $DIRECTOR_TERM_MASTER;
    public $CREATE_DATE;
    public $CREATE_BY;
    public $UPDATE_DATE;
    public $UPDATE_BY;
    public $VERSION = 99;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }

    public function _selectAllDirectorTerm($numF = '', $numL = '') {
        $this->_chkVarForWhere('TERM_ID', $this->TERM_ID);
        $this->db->join('VIEW_MEMBER_DETAIL_ALL', 'VIEW_MEMBER_DETAIL_ALL.MEMBER_ID = GMS_DIRECTOR_TERM.MEMBER_ID');
        $this->db->order_by('DIRECTOR_TERM_ID asc');
        if ($numF == '' and $numL == '') {
            $rs = $this->db->get('GMS_DIRECTOR_TERM');
        } else {
            $rs = $this->db->get('GMS_DIRECTOR_TERM', $numF, $numL);
        }

        return $rs->result_array();
    }

    public function _selectIDDirectorTerm() {
        $this->db->select('DIRECTOR_TERM_ID');
        $this->db->order_by('DIRECTOR_TERM_ID desc');
        $rs = $this->db->get('GMS_DIRECTOR_TERM', 2, 0);
        $id = '';
        $data = $rs->result_array();
        foreach ($data as $rd) {
            $id = $rd['DIRECTOR_TERM_ID'] + 1;
        }
        return $id;
    }

    public function _insertDirectorTerm() {
        $data = array(
            'DIRECTOR_TERM_ID' => $this->DIRECTOR_TERM_ID,
            'MEMBER_ID' => $this->MEMBER_ID,
            'TERM_ID' => $this->TERM_ID,
            'DIRECTOR_TERM_STATUS' => $this->DIRECTOR_TERM_STATUS,
            'DIRECTOR_TERM_MASTER' => $this->DIRECTOR_TERM_MASTER,
            'CREATE_DATE' => $this->CREATE_DATE,
            'CREATE_BY' => $this->CREATE_BY,
            //'UPDATE_DATE' => $this->UPDATE_DATE,
            'UPDATE_BY' => $this->UPDATE_BY,
            'VERSION' => $this->VERSION,
        );
        $this->db->insert('GMS_DIRECTOR_TERM', $data);
    }
    
    public function _updateMasterDirectorTerm() {
        $data = array(
            'DIRECTOR_TERM_MASTER' => $this->DIRECTOR_TERM_MASTER,
            'UPDATE_BY' => $this->UPDATE_BY
        );
        $this->db->where("DIRECTOR_TERM_ID", $this->DIRECTOR_TERM_ID);
        $this->db->update('GMS_DIRECTOR_TERM', $data);
    }

    public function _delDirectorTerm() {
        $this->_chkVarForWhere('TERM_ID', $this->TERM_ID);
        $this->db->delete('GMS_DIRECTOR_TERM');
    }

    public function _chkVarForWhere($var, $data) {
        if ($data != '') {
            return $this->db->where($var, $data);
        }
    }

}
