<?php

class model_gms_term extends CI_Model {

    public $TERM_ID;
    public $SPORT_ID;
    public $TYPE_ID;
    public $VERSION = 99;
    public $TERM_SUBJECT;
    public $TERM_GEN;
    public $TERM_TIME_UPDATE;
    public $TERM_TIME_OPEN;
    public $TERM_TIME_CLOSE;
    public $TERM_TIME_START;
    public $TERM_TIME_END;
    public $TERM_STATUS;
    public $TERM_DETAIL;
    public $TERM_YEAR;
    public $TERM_LOCATION;
    public $BLOG_SUBJECT;
    public $BLOG_DETAIL;
    public $PROVINCE_ID;
    public $AMPHUR_ID;
    public $TUMBOL_ID;
    public $COURSE_ID;
    public $ANNOUNCE_REGISTER;
    public $ANNOUNCE_APPROVE;
    public $BLOG_ID;
    public $CREATE_DATE;
    public $CREATE_BY;
    public $UPDATE_DATE;
    public $UPDATE_BY;
    public $SIGN_ID;

	public $orderby = '';

    private $table_name;
    private $primary_key;

    /* table GMS_TERM_POSITION */

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');

        $this->table_name = 'GMS_TERM';
        $this->primary_key = 'TERM_ID';
    }

    public function _selectTerm($numF = '', $numL = '') {

        $this->_chkVarForWhere('TERM_ID', $this->TERM_ID);
        $this->_chkVarForWhere('TERM_YEAR', $this->TERM_YEAR);
        $this->_chkVarForWhere('SPORT_ID', $this->SPORT_ID);
        $this->_chkVarForWhere('TYPE_ID', $this->TYPE_ID);
        $this->_chkVarForWhere('TERM_GEN', $this->TERM_GEN);
        $this->_chkVarForWhere('COURSE_ID', $this->COURSE_ID);

		if($this->orderby==''){
			$this->db->order_by('TERM_ID desc');
		}else{
			$this->db->order_by($this->orderby);
		}

        

        if ($numF == '' and $numL == '') {
            $rs = $this->db->get('VIEW_GMS_TERM');
        } else {
            $rs = $this->db->get('VIEW_GMS_TERM', $numF, $numL);
        }

        return $rs->result_array();
    }

    public function _selectCountTerm() {//จำนวนทั้งหมด
        $this->_chkVarForWhere('TERM_ID', $this->TERM_ID);
        $this->_chkVarForWhere('TERM_YEAR', $this->TERM_YEAR);
        $this->_chkVarForWhere('SPORT_ID', $this->SPORT_ID);
        $this->_chkVarForWhere('TYPE_ID', $this->TYPE_ID);
        $this->_chkVarForWhere('TERM_GEN', $this->TERM_GEN);
        $this->_chkVarForWhere('COURSE_ID', $this->COURSE_ID);
        $this->db->from('VIEW_GMS_TERM');
        return $this->db->count_all_results();
    }

    public function _selectTableTerm() {
        $this->db->where("TERM_ID", $this->TERM_ID);
        $rs = $this->db->get('GMS_TYPE');
        return $rs->result_array();
    }
    
    public function _selectIDTerm(){
        $this->db->select('TERM_ID');
        $this->db->order_by('TERM_ID desc');
        $rs = $this->db->get('GMS_TERM',2,0);
        $id = '';
        $data = $rs->result_array();
        foreach($data as $rd){
            $id = $rd['TERM_ID']+1;
        }
        return $id;
    }
    
    public function _selectIDBLOG(){
        $this->db->select('BLOG_ID');
        $this->db->where("BLOG_ID IS NOT NULL");
        $this->db->order_by('BLOG_ID desc');
        $rs = $this->db->get('GMS_TERM',2,0);
        $id = '';
        $data = $rs->result_array();
        foreach($data as $rd){
            $id = $rd['BLOG_ID']+1;
        }
        return $id;
    }

    /* table GMS_TERM_POSITION */

    public function _selectTermPosition() {
        $this->db->order_by('POSITION_ID asc');
        $rs = $this->db->get('GMS_TERM_POSITION');
        return $rs->result_array();
    }

    public function _insertTerm() {
        $data = array(
            'TERM_ID' => $this->TERM_ID,
            'TERM_SUBJECT' => $this->TERM_SUBJECT,
            'TERM_GEN' => $this->TERM_GEN,
            'TERM_TIME_UPDATE' => $this->TERM_TIME_UPDATE,
            'TERM_TIME_OPEN' => $this->TERM_TIME_OPEN,
            'TERM_TIME_CLOSE' => $this->TERM_TIME_CLOSE,
            'TERM_TIME_START' => $this->TERM_TIME_START,
            'TERM_TIME_END' => $this->TERM_TIME_END,
            'TERM_STATUS' => $this->TERM_STATUS,
            'TERM_DETAIL' => $this->TERM_DETAIL,
            'TERM_YEAR' => $this->TERM_YEAR,
            'TERM_LOCATION' => $this->TERM_LOCATION,
            'BLOG_SUBJECT' => $this->BLOG_SUBJECT,
            'BLOG_DETAIL' => $this->BLOG_DETAIL,
            'PROVINCE_ID' => $this->PROVINCE_ID,
            'AMPHUR_ID' => $this->AMPHUR_ID,
            'TUMBOL_ID' => $this->TUMBOL_ID,
            'COURSE_ID' => $this->COURSE_ID,
            'ANNOUNCE_REGISTER' => $this->ANNOUNCE_REGISTER,
            'ANNOUNCE_APPROVE' => $this->ANNOUNCE_APPROVE,
            'BLOG_ID' => $this->BLOG_ID,
            'CREATE_DATE' => $this->CREATE_DATE,
            'CREATE_BY' => $this->CREATE_BY,
            //'UPDATE_DATE' => $this->UPDATE_DATE,
            'UPDATE_BY' => $this->UPDATE_BY,
            'VERSION' => $this->VERSION,
            'SIGN_ID' => $this->SIGN_ID,
        );
        $this->db->insert('GMS_TERM', $data);
    }
    
    public function _updateTerm() {
        $data = array(
            'TERM_GEN' => $this->TERM_GEN,
            'TERM_TIME_UPDATE' => $this->TERM_TIME_UPDATE,
            'TERM_TIME_OPEN' => $this->TERM_TIME_OPEN,
            'TERM_TIME_CLOSE' => $this->TERM_TIME_CLOSE,
            'TERM_TIME_START' => $this->TERM_TIME_START,
            'TERM_TIME_END' => $this->TERM_TIME_END,
            'TERM_STATUS' => $this->TERM_STATUS,
            'TERM_DETAIL' => $this->TERM_DETAIL,
            'TERM_YEAR' => $this->TERM_YEAR,
            'TERM_LOCATION' => $this->TERM_LOCATION,
            'BLOG_SUBJECT' => $this->BLOG_SUBJECT,
            'BLOG_DETAIL' => $this->BLOG_DETAIL,
            'PROVINCE_ID' => $this->PROVINCE_ID,
            'AMPHUR_ID' => $this->AMPHUR_ID,
            'TUMBOL_ID' => $this->TUMBOL_ID,
            'ANNOUNCE_REGISTER' => $this->ANNOUNCE_REGISTER,
            'ANNOUNCE_APPROVE' => $this->ANNOUNCE_APPROVE,
            'UPDATE_BY' => $this->UPDATE_BY,
            'VERSION' => $this->VERSION,
            'SIGN_ID' => $this->SIGN_ID,
        );
        $this->db->where("TERM_ID", $this->TERM_ID);
        $this->db->update('GMS_TERM', $data);
    }
    
    public function _delTerm(){
        $this->db->where("TERM_ID", $this->TERM_ID);
        $this->db->delete('GMS_TERM');
    }

    public function _chkVarForWhere($var, $data) {
        if ($data != '') {
            return $this->db->where($var, $data);
        }
    }

    public function find_by_id($id)
    {
        return $this->find_model($id)->row_array();
    }

    // This function is used in Gms_term
    public function get_data_for_dropdown_term($sport_id = 0, $year = 0)
    {
        $this->db->select($this->table_name.'.*, GMS_COURSE.COURSE_SUBJECT || \' รุ่นที่ \' || '.$this->table_name.'.TERM_GEN AS TERM_NAME');
        $this->db->from($this->table_name);
        $this->db->join('GMS_COURSE', $this->table_name.'.COURSE_ID = GMS_COURSE.COURSE_ID');
        $this->db->where('GMS_COURSE.SPORT_ID', $sport_id);
        $this->db->where($this->table_name.'.TERM_YEAR', $year);
        $this->db->order_by($this->primary_key, 'ASC');

        return $this->db->get()->result_array();
    }

    /*
    * Find this model by id
    *
    * @param string
    * @return object of this model
    */
    private function find_model($id)
    {
        $this->db->where($this->primary_key, $id);
        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            throw new Exception('Cannot found the model.', 1);
        }
    }
}
