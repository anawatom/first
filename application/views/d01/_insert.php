<style>
    .txt_input{
        width: 90%
    }
</style>
<aside class="right-side"> 
    <section class="content-header">
        <h1>
            D01-หลักสูตรฝึกอบรม
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>
                <?php echo anchor('d01/index', 'หลักสูตรฝึกอบรม'); ?>
            </li>
            <li class="active">เพิ่มหลักสูตรฝึกอบรม</li>
        </ol> 
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">เพิ่มหลักสูตรฝึกอบรม</h3>
                    </div>

                    <form action="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/insertExc" method="post" name="form1" id="form1" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();">
                        <div class="box-body">

                            <table style="width: 100%" >
                                <tr class="form-group has-error">
                                    <td style="width: 20%;"><label> ปีงบประมาณ*</label></td>
                                    <td style="width: 30%">
                                        <input size="4" maxlength="4" type="text" name="TERM_YEAR" id="TERM_YEAR" value="<?php echo date('Y') + 543; ?>" class="form-control txt_input">
                                    </td>
                                    <td style="width: 20%;"></td>
                                    <td style="width: 30%"></td>
                                </tr>
                                <tr class="form-group has-error">
                                    <td><label> ประเภทการฝึกอบรม</label></td>
                                    <td>
                                        <select name="TYPE_ID" id="TYPE_ID" class="form-control txt_input" onclick="searchSPORT(this.value)">
                                            <option value=""></option>
                                            <?php
                                            foreach ($type as $rd) {
                                                echo '<option value="' . $rd['TYPE_ID'] . '">' . $rd['TYPE_SUBJECT'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="form-group has-error">
                                    <td><label> ชนิดกีฬา/ชนิดการฝึกอบรม</label></td>
                                    <td>
                                        <div id="selectSPORT">
                                            <select name="SPORT_ID" id="SPORT_ID" class="form-control txt_input">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="form-group has-error">
                                    <td><label> ชื่อหลักสูตร</label></td>
                                    <td>
                                        <div id="selectCOURSE">
                                            <select name="COURSE_ID" id="COURSE_ID" class="form-control txt_input">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                               <!--  <tr>
                                    <td valign="top"><label> หัวหน้าวิทยากร</label></td>
                                    <td>
                                        <div id="selectDIRECTOR">
                                            <table border="1" style="width: 90%; height: 50px">
                                                <thead>
                                                    <tr>
                                                        <th style="background-color: #F5F5F5; width: 80%">วิทยากร</th>
                                                        <th style="background-color: #F5F5F5; width: 20%">หัวหน้า</th>
                                                    </tr>
                                                </thead>
                                            </table> 
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr> -->
                                <tr>
                                    <td><label> รุ่นที่</label></td>
                                    <td>
                                        <input placeholder="รุ่นที่" size="3" maxlength="3" type="text" name="TERM_GEN" id="TERM_GEN" value="" class="form-control txt_input">
                                    </td>
                                    <td> <label>สถานที่ </label></td>
                                    <td><input placeholder="สถานที่" type="text" name="TERM_LOCATION" id="TERM_LOCATION" value="" class="form-control txt_input"></td>
                                </tr>
                                <tr>
                                    <td valign="top"><label> รายละเอียด</label></td>
                                    <td colspan="3">
                                        <textarea name="TERM_DETAIL" id="TERM_DETAIL" rows="8" style="width: 95%"></textarea>
                                    </td>

                                </tr>
                                <tr>
                                    <td><label> วันที่เริ่มรับสมัคร</label></td>
                                    <td>
                                        <input placeholder="วัน/เดือน/ปี" type="text" name="TERM_TIME_OPEN" id="TERM_TIME_OPEN" value="" class="form-control txt_input datepicker" data-type="normal-date">
                                    </td>
                                    <td> <label>ถึงวันที่ </label></td>
                                    <td><input placeholder="วัน/เดือน/ปี" type="text" name="TERM_TIME_CLOSE" id="TERM_TIME_CLOSE" value="" class="form-control txt_input datepicker" data-type="normal-date"></td>
                                </tr>
                                <tr>
                                    <td><label> วันที่อบรม</label></td>
                                    <td>
                                        <input placeholder="วัน/เดือน/ปี" type="text" name="TERM_TIME_START" id="TERM_TIME_START" value="" class="form-control txt_input datepicker" data-type="normal-date">
                                    </td>
                                    <td> <label>ถึงวันที่ </label></td>
                                    <td><input placeholder="วัน/เดือน/ปี" type="text" name="TERM_TIME_END" id="TERM_TIME_END" value="" class="form-control txt_input datepicker" data-type="normal-date"></td>
                                </tr>
                                <tr>
                                    <td><label> จังหวัด</label></td>
                                    <td>
                                        <select name="PROVINCE_ID" id="PROVINCE_ID" class="form-control txt_input" onchange="searchPROV(this.value)">
                                            <option value=""></option>
                                            <?php
                                            foreach ($province as $rd) {
                                                echo '<option value="' . $rd['PROV_ID'] . '">' . $rd['PROV_NAME'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><label> อำเภอ</label></td>
                                    <td>
                                        <div id="selectAMPHUR">
                                            <select name="AMPHUR_ID" id="AMPHUR_ID" class="form-control txt_input">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><label> ตำบล</label></td>
                                    <td>
                                        <div id="selectTUMBOL">
                                            <select name="TUMBOL_ID" id="TUMBOL_ID" class="form-control txt_input">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><label> ผู้มีอำนาจลงนาม</label></td>
                                    <td>
                                        <select name="SIGN_ID" id="SIGN_ID" class="form-control txt_input">
                                            <?php
                                            foreach ($sign as $rd) {
                                                echo '<option value="' . $rd['SIGN_ID'] . '">' . $rd['GENERAL_NAME'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td><label> สถานะ</label></td>
                                    <td>
                                        <select name="TERM_STATUS" id="TERM_STATUS" class="form-control txt_input">
                                            <option value="1">ใช้งาน</option>
                                            <option value="0">ยกเลิก</option>
                                        </select>
                                    </td>
                                </tr>

                            </table>
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</aside>
<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url('js/bootstrap-datepicker-1.4.0/js/bootstrap-datepicker.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/bootstrap-datepicker-1.4.0/locales/bootstrap-datepicker.th.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('js/main.js'); ?>"></script>

<script language="JavaScript">
                                            $(function () {
                                                
                                            });
//                                            document.onkeydown = chkEvent
//
//                                            function chkEvent(e) {
//                                                var keycode;
//                                                if (window.event)
//                                                    keycode = window.event.keyCode; //*** for IE ***//
//                                                else if (e)
//                                                    keycode = e.which; //*** for Firefox ***//
//                                                if (keycode == 13)
//                                                {
//                                                    return false;
//                                                }
//                                            }
                                            function searchSPORT(e) {
                                                if (e != '') {
                                                    jQuery.ajax({
                                                        url: '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/searchSportByType/' + e,
                                                        async: false,
                                                        success: function (data) {
                                                            //var arrData = new Array();
                                                            //arrData = data.split(',');
                                                            document.getElementById("selectSPORT").innerHTML = data;
                                                        },
                                                        error: function (xhr, desc, exceptionobj) {
                                                            alert("ERROR:" + xhr.responseText);
                                                        }

                                                    });
                                                }
                                            }//

                                            function searchCOURSE(e) {
                                                if (e != '') {
                                                    jQuery.ajax({
                                                        url: '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/searchCourseBySport/' + e,
                                                        async: false,
                                                        success: function (data) {
                                                            //var arrData = new Array();
                                                            //arrData = data.split(',');
                                                            document.getElementById("selectCOURSE").innerHTML = data;
                                                        },
                                                        error: function (xhr, desc, exceptionobj) {
                                                            alert("ERROR:" + xhr.responseText);
                                                        }

                                                    });
                                                }
                                            }

                                            function searchPROV(e) {
                                                if (e != '') {
                                                    jQuery.ajax({
                                                        url: '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/searchAMPHUR/' + e,
                                                        async: false,
                                                        success: function (data) {
                                                            var arrData = new Array();
                                                            arrData = data.split(',');
                                                            document.getElementById("selectAMPHUR").innerHTML = data;
                                                        },
                                                        error: function (xhr, desc, exceptionobj) {
                                                            alert("ERROR:" + xhr.responseText);
                                                        }

                                                    });
                                                }
                                            }

                                            function searchAMPHUR(e) {
                                                if (e != '') {
                                                    var PROVINCE_ID = document.getElementById("PROVINCE_ID").value;
                                                    jQuery.ajax({
                                                        url: '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/searchTUMBOL/' + e + '/' + PROVINCE_ID,
                                                        async: false,
                                                        success: function (data) {
                                                            //var arrData = new Array();
                                                            //arrData = data.split(',');
                                                            document.getElementById("selectTUMBOL").innerHTML = data;
                                                        },
                                                        error: function (xhr, desc, exceptionobj) {
                                                            alert("ERROR:" + xhr.responseText);
                                                        }

                                                    });
                                                }
                                            }

                                            function searchDIRECTOR(e) {
                                                if (e != '') {
                                                    jQuery.ajax({
                                                        url: '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/searchDIRECTOR/' + e,
                                                        async: false,
                                                        success: function (data) {
                                                            //var arrData = new Array();
                                                            //arrData = data.split(',');
                                                            document.getElementById("selectDIRECTOR").innerHTML = data;
                                                        },
                                                        error: function (xhr, desc, exceptionobj) {
                                                            alert("ERROR:" + xhr.responseText);
                                                        }

                                                    });
                                                }
                                            }

                                            function fncSubmit() {
                                            //TERM_YEAR,TYPE_ID,SPORT_ID,COURSE_ID
                                                if (document.form1.TERM_YEAR.value == '')
                                                {
                                                    alert('กรุณากรอก ปีงบประมาณ');
                                                    document.form1.TERM_YEAR.focus();
                                                    return false;
                                                }
                                                if (document.form1.TYPE_ID.value == '')
                                                {
                                                    alert('กรุณาเลือก ประเภทการฝึกอบรม');
                                                    document.form1.TYPE_ID.focus();
                                                    return false;
                                                }
                                                if (document.form1.SPORT_ID.value == '')
                                                {
                                                    alert('กรุณาเลือก ชนิดกีฬา/ชนิดการฝึกอบรม');
                                                    document.form1.SPORT_ID.focus();
                                                    return false;
                                                }
                                                if (document.form1.COURSE_ID.value == '')
                                                {
                                                    alert('กรุณาเลือก ชื่อหลักสูตร');
                                                    document.form1.COURSE_ID.focus();
                                                    return false;
                                                }
                                            }

</script>

