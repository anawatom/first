<?php

class report extends CI_Controller {

    public $dir;

    public function __construct() {
        parent::__construct();

        $this->load->model('model_gms_term', 'gms_term');
        $this->load->model('model_gms_sport', 'gms_sport');
    }

    private function checkJavaExtension() {
        if(!extension_loaded('java'))
        {
                $sapi_type = php_sapi_name();
                $port = (isset($_SERVER['SERVER_PORT']) && (($_SERVER['SERVER_PORT'])>1024)) ? $_SERVER['SERVER_PORT'] : '38080';
                if ($sapi_type == "cgi" || $sapi_type == "cgi-fcgi" || $sapi_type == "cli") 
                {
                        if(!(PHP_SHLIB_SUFFIX=="so" && @dl('java.so'))&&!(PHP_SHLIB_SUFFIX=="dll" && @dl('php_java.dll'))&&!(@include_once("java/Java.inc"))&&!(require_once("http://192.168.2.11:38080/JavaBridge/java/Java.inc"))) 
                                if(!(require_once("./java/Java.inc"))) 
                        {
                                return "java extension not installed.";
                        }
                } 
                else
                {
                        if(!(@include_once("java/Java.inc")))
                        {
                                require_once("http://192.168.2.11:38080/JavaBridge/java/Java.inc");
                        }
                }
        }
        if(!function_exists("java_get_server_name")) 
        {
                return "The loaded java extension is not the PHP/Java Bridge";
        }

        return true;
    }
    
    private function convertValue($value, $className)  {  
        // if we are a string, just use the normal conversion  
        // methods from the java extension...  
        try   
        {  
                if ($className == 'java.lang.String')  
                {  
                        $temp = new Java('java.lang.String', $value);  
                        return $temp;  
                }  
                else if ($className == 'java.lang.Boolean' ||  
                        $className == 'java.lang.Integer' ||  
                        $className == 'java.lang.Long' ||  
                        $className == 'java.lang.Short' ||  
                        $className == 'java.lang.Double' ||  
                        $className == 'java.math.BigDecimal')  
                {  
                        $temp = new Java($className, $value);  
                        return $temp;  
                }  
                else if ($className == 'java.sql.Timestamp' ||  
                        $className == 'java.sql.Time')  
                {  
                        $temp = new Java($className);  
                        $javaObject = $temp->valueOf($value);  
                        return $javaObject;  
                }  
        }  
        catch (Exception $err)  
        {  
                echo (  'unable to convert value, ' . $value .  
                                ' could not be converted to ' . $className);  
                return false;  
        }
  
        echo (  'unable to convert value, class name '.$className.  
                        ' not recognised');  
        return false;  
    }
    
    public function report_trn1i0140_regis() {
        
        if (sizeof($_GET) > 0) {
                $getData = array_keys($_GET);
                $getData = base64_decode($getData[0]);
                $arrayData = unserialize($getData);

                $this->checkJavaExtension();
                $compileManager = new JavaClass("net.sf.jasperreports.engine.JasperCompileManager");
  //              $report = $compileManager->compileReport("C:/DPE/apache-tomcat-6.0.32/reports/TRN1I040_Regis_v2.jrxml");
                $fillManager = new JavaClass("net.sf.jasperreports.engine.JasperFillManager");
                
                $params = new Java("java.util.HashMap");
				$str_member_id = (string) $arrayData['MEMBER_ID'] ;
				$str_term_id = (string) $arrayData['TERM_ID'] ;
                $params->put("p_memberId", $str_member_id);
                $params->put("p_termId", $str_term_id) ;//$arrayData['TERM_ID'] );

                $class = new JavaClass("java.lang.Class");
				$class->forName("oracle.jdbc.driver.OracleDriver");
				$driverManager = new JavaClass("java.sql.DriverManager");
				$conn = $driverManager->getConnection("jdbc:oracle:thin:@192.168.2.13:1521:OSRDDB2","train","train");

//               $emptyDataSource = new Java("net.sf.jasperreports.engine.JREmptyDataSource");
//               $jasperPrint = $fillManager->fillReport($report, $params, $conn);
				$jasperPrint = $fillManager->fillReport("C:/DPE/apache-tomcat-6.0.32/reports/TRN1I040_Regis.jasper", $params, $conn);              
				$filename = uniqid('Report_');
				$outputPath = "E:/dd/"."{$filename}.pdf";

                $exportManager = new JavaClass("net.sf.jasperreports.engine.JasperExportManager");
                $exportManager->exportReportToPdfFile($jasperPrint, $outputPath);

                header("Content-type: application/pdf");
                readfile($outputPath);
                unlink($outputPath);                  
        } 
       
    }

    public function report_trn1i0140_certify() {
        
        if (sizeof($_GET) > 0) {
                $getData = array_keys($_GET);
                $getData = base64_decode($getData[0]);
                $arrayData = unserialize($getData);

                $this->checkJavaExtension();
                $compileManager = new JavaClass("net.sf.jasperreports.engine.JasperCompileManager");
  //              $report = $compileManager->compileReport("C:/DPE/apache-tomcat-6.0.32/reports/TRN1I040_Regis_v2.jrxml");
                $fillManager = new JavaClass("net.sf.jasperreports.engine.JasperFillManager");
                
                $params = new Java("java.util.HashMap");
				$str_member_id = (string) $arrayData['MEMBER_ID'] ;
				$str_term_id = (string) $arrayData['TERM_ID'] ;
                $params->put("p_memberId", $str_member_id);
                $params->put("p_termId", $str_term_id) ;//$arrayData['TERM_ID'] );

                $class = new JavaClass("java.lang.Class");
				$class->forName("oracle.jdbc.driver.OracleDriver");
				$driverManager = new JavaClass("java.sql.DriverManager");
				$conn = $driverManager->getConnection("jdbc:oracle:thin:@192.168.2.13:1521:OSRDDB2","train","train");

//               $emptyDataSource = new Java("net.sf.jasperreports.engine.JREmptyDataSource");
//               $jasperPrint = $fillManager->fillReport($report, $params, $conn);
				$jasperPrint = $fillManager->fillReport("C:/DPE/apache-tomcat-6.0.32/reports/TRN1I040_Certify.jasper", $params, $conn);              
				$filename = uniqid('Report_');
				$outputPath = "E:/dd/"."{$filename}.pdf";

                $exportManager = new JavaClass("net.sf.jasperreports.engine.JasperExportManager");
                $exportManager->exportReportToPdfFile($jasperPrint, $outputPath);

                header("Content-type: application/pdf");
                readfile($outputPath);
                unlink($outputPath);                  
        } 
       
    }

    public function report_trn1i0140_tumneab() {
        
        if (sizeof($_GET) > 0) {
                $getData = array_keys($_GET);
                $getData = base64_decode($getData[0]);
                $arrayData = unserialize($getData);

                $this->checkJavaExtension();
                $compileManager = new JavaClass("net.sf.jasperreports.engine.JasperCompileManager");
  //              $report = $compileManager->compileReport("C:/DPE/apache-tomcat-6.0.32/reports/TRN1I040_Regis_v2.jrxml");
                $fillManager = new JavaClass("net.sf.jasperreports.engine.JasperFillManager");
                
                $params = new Java("java.util.HashMap");
				$str_term_id = (string) $arrayData['TERM_ID'] ;
                $params->put("p_termId", $str_term_id) ;//$arrayData['TERM_ID'] );

                $class = new JavaClass("java.lang.Class");
				$class->forName("oracle.jdbc.driver.OracleDriver");
				$driverManager = new JavaClass("java.sql.DriverManager");
				$conn = $driverManager->getConnection("jdbc:oracle:thin:@192.168.2.13:1521:OSRDDB2","train","train");

//               $emptyDataSource = new Java("net.sf.jasperreports.engine.JREmptyDataSource");
//               $jasperPrint = $fillManager->fillReport($report, $params, $conn);
				$jasperPrint = $fillManager->fillReport("C:/DPE/apache-tomcat-6.0.32/reports/TRN1I040_Tumneab.jasper", $params, $conn);              
				$filename = uniqid('Report_');
				$outputPath = "E:/dd/"."{$filename}.pdf";

                $exportManager = new JavaClass("net.sf.jasperreports.engine.JasperExportManager");
                $exportManager->exportReportToPdfFile($jasperPrint, $outputPath);

                header("Content-type: application/pdf");
                readfile($outputPath);
                unlink($outputPath);                  
        } 
       
    }

	public function report_TRN1R020() {
        // if (sizeof($_GET) > 0) {
        $get_data = $this->input->get(NULL, TRUE);
        if (empty($get_data) === FALSE)
        {
            // $getData = array_keys($_GET);
            // $getData = base64_decode($getData[0]);
            // $arrayData = unserialize($getData);

            $this->checkJavaExtension();
            $compileManager = new JavaClass("net.sf.jasperreports.engine.JasperCompileManager");
//              $report = $compileManager->compileReport("C:/DPE/apache-tomcat-6.0.32/reports/TRN1I040_Regis_v2.jrxml");
            $fillManager = new JavaClass("net.sf.jasperreports.engine.JasperFillManager");
            
            // Add parameters
            $params = new Java("java.util.HashMap");

            $str_term_year= (string) $get_data['TERM_YEAR'];
            $params->put("p_termYear", $str_term_year);

            $str_type_id = (string) $get_data['TYPE_ID'];
            $params->put("p_typeId", $str_type_id);

            // GMS_SPORT
            $gms_sport = $this->gms_sport->find_by_id($get_data['SPORT_ID']);
            $str_sport_id = (string) $gms_sport['SPORT_ID'];
            $params->put("p_sportId", $str_sport_id);

            $str_sport_subject = (string) $gms_sport['SPORT_SUBJECT'];
            $params->put("p_sportSubject", $str_sport_subject);
            // End

            // GMS_TERM
            $gms_term = $this->gms_term->find_by_id($get_data['TERM_ID']);
            $str_term_gen = (string) $gms_term['TERM_GEN'];
            $params->put("p_termGen", $str_term_gen);

            $str_course_id = (string) $gms_term['COURSE_ID'];
            $params->put("p_courseId", $str_course_id);
            // End

            $class = new JavaClass("java.lang.Class");
            $class->forName("oracle.jdbc.driver.OracleDriver");
            $driverManager = new JavaClass("java.sql.DriverManager");
            $conn = $driverManager->getConnection("jdbc:oracle:thin:@192.168.2.13:1521:OSRDDB2","train","train");

//          $emptyDataSource = new Java("net.sf.jasperreports.engine.JREmptyDataSource");
//          $jasperPrint = $fillManager->fillReport($report, $params, $conn);
            $jasperPrint = $fillManager->fillReport("C:/DPE/apache-tomcat-6.0.32/reports/TRN1R020.jasper", $params, $conn);              
            $filename = uniqid('Report_');
            $outputPath = "E:/dd/"."{$filename}.pdf";

            $exportManager = new JavaClass("net.sf.jasperreports.engine.JasperExportManager");
            $exportManager->exportReportToPdfFile($jasperPrint, $outputPath);

            header("Content-type: application/pdf");
            readfile($outputPath);
            unlink($outputPath);
        } 
       
    }

    public function report_TRN1R060() {
        $get_data = $this->input->get(NULL, TRUE);

        if (empty($get_data) === FALSE)
        {
            $this->checkJavaExtension();
            $compileManager = new JavaClass("net.sf.jasperreports.engine.JasperCompileManager");
//              $report = $compileManager->compileReport("C:/DPE/apache-tomcat-6.0.32/reports/TRN1I040_Regis_v2.jrxml");
            $fillManager = new JavaClass("net.sf.jasperreports.engine.JasperFillManager");
            
            // Add parameters
            // p_termId
            // p_historyNoStart
            // p_historyNoEnd
            $params = new Java("java.util.HashMap");

            $str_term_id = (string) $get_data['TERM_ID'];
            $params->put("p_termId", $str_term_id);

            if ($get_data['HISTORY_NO'] === '1')
            {
                $str_history_no_start = (string) $get_data['HISTORY_NO_START'];
                $params->put("p_historyNoStart", $str_history_no_start);

                $str_history_no_end = (string) $get_data['HISTORY_NO_END'];
                $params->put("p_historyNoEnd", $str_history_no_end);
            }

            $class = new JavaClass("java.lang.Class");
            $class->forName("oracle.jdbc.driver.OracleDriver");
            $driverManager = new JavaClass("java.sql.DriverManager");
            $conn = $driverManager->getConnection("jdbc:oracle:thin:@192.168.2.13:1521:OSRDDB2","train","train");

//          $emptyDataSource = new Java("net.sf.jasperreports.engine.JREmptyDataSource");
//          $jasperPrint = $fillManager->fillReport($report, $params, $conn);
            $jasperPrint = $fillManager->fillReport("C:/DPE/apache-tomcat-6.0.32/reports/TRN1R060.jasper", $params, $conn);              
            $filename = uniqid('Report_');
            $outputPath = "E:/dd/"."{$filename}.pdf";

            $exportManager = new JavaClass("net.sf.jasperreports.engine.JasperExportManager");
            $exportManager->exportReportToPdfFile($jasperPrint, $outputPath);

            header("Content-type: application/pdf");
            readfile($outputPath);
            unlink($outputPath);
        }
    }
    
}