<?php

class model_config_all extends CI_Model {
    
    public $thaiweek = array("JAN" => "01", "FEB" => "02", "MAR" => "03", "APR" => "04", "MAY" => "05", "JUN" => "06", "JUL" => "07", "AUG" => "08", "SEP" => "09", "OCT" => "10", "NOV" => "11", "DEC" => "12");
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }

    public function _recheckVarIFVarZero($recheckVar) {
        if ($recheckVar == 0) {
            return '';
        } else {
            return $recheckVar;
        }
    }
    
    public function _idToVar($var){
       if ($var != '') {
           $arrayMessage1 = explode("ID", $var);
           return $arrayMessage1[1];
       } else{
           return '';
       }
    }
    
    public function _varToID($var){
        if ($var != '') {
           return 'ID'.$var;
       } else{
           return '';
       }
    }

    public function _dbToDate($date) {
        if ($date != '') {
            $arrayMessage1 = explode("-", $date);
            $year = $arrayMessage1[2] + 2543;
            if ($year > 2600) {
                $year = $year - 100;
            }
            $date = $arrayMessage1[0] . '/' . $this->thaiweek[$arrayMessage1[1]] . '/' . $year;
            return $date; //5
        }
        else{
            return '';
        }
    }

    public function _dateToDB($date) {
        if ($date != '') {
            $arrayMessage1 = explode("/", $date);
            $date = ($arrayMessage1[2] - 543) . '-' . $arrayMessage1[1] . '-' . $arrayMessage1[0];
            $date = new DateTime($date);
            return $date->format('d-M-y');
        } else {
            return '';
        }
    }
    
    public function _dateBEToDB($date) {
        if ($date != '') {
            $arrayMessage1 = explode("/", $date);
            $date = $arrayMessage1[2] . '-' . $arrayMessage1[1] . '-' . $arrayMessage1[0];
            $date = new DateTime($date);
            return $date->format('d-M-y');
        } else {
            return '';
        }
    }
    
    public function TIMESTAMP(){
        //return date('Y-m-d H:i:s').".000000000 AM";
        //return "TO_TIMESTAMP('".date('Y-m-d H:i:s').".000000000', 'YYYY-MM-DD HH24:MI:SS.FF')";
        return 'TO_TIMESTAMP("'.date('Y-m-d H:i:s').'.000000000","YYYY-MM-DD HH24:MI:SS.FF")';
    }
    

}
