<?php

class Model_gms_blog extends CI_Model {

    public $BLOG_ID;
    public $MEMBER_ID;
    public $BLOG_DETAIL;
    public $BLOG_STATUS = 1;

    /* table GMS_TERM_POSITION */

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }

    public function _selectBlog($numF = '', $numL = '') {

        $this->db->order_by('BLOG_ID desc');

        if ($numF == '' and $numL == '') {
            $rs = $this->db->get('GMS_BLOG');
        } else {
            $rs = $this->db->get('GMS_BLOG', $numF, $numL);
        }

        return $rs->result_array();
    }

    public function _selectCountBlog() {//จำนวนทั้งหมด
        $this->db->from('GMS_BLOG');
        return $this->db->count_all_results();
    }

    public function _insertBlog() {
        $data = array(
            'BLOG_ID' => $this->BLOG_ID,
            'MEMBER_ID' => $this->MEMBER_ID,
            'BLOG_DETAIL' => $this->BLOG_DETAIL,
            'BLOG_STATUS' => $this->BLOG_STATUS,
        );
        $this->db->insert('GMS_BLOG', $data);
    }
    
    public function _delBlog(){
        $this->_chkVarForWhere('BLOG_ID', $this->BLOG_ID);
        $this->db->delete('GMS_BLOG');
    }

    public function _chkVarForWhere($var, $data) {
        if ($data != '') {
            return $this->db->where($var, $data);
        }
    }

}
