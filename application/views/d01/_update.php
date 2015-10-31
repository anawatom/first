<style>
    .txt_input{
        width: 90%
    }
</style>
<?php
foreach ($term as $row) {
    
}
?>
<aside class="right-side"> 
    <section class="content-header">
        <h1>
            D01-หลักสูตรฝึกอบรม
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">ตารางรหัส</a></li>
            <li class="active"><?php echo $this->router->class . '-เพิ่มหลักสูตรฝึกอบรม'; ?></li>
        </ol> 
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">แก้ไขหลักสูตรฝึกอบรม</h3>
                    </div>
                     <form action="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/updateExc" method="post" name="form1" id="form1" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();">
                        <div class="box-body">
                            <table style="width: 100%" >
                                <tr class="form-group has-error">
                                    <td style="width: 20%;"><label> ปีงบประมาณ*</label></td>
                                    <td style="width: 30%">
                                        <input type="hidden" name="TERM_ID" id="TERM_ID" value="<?php echo $row['TERM_ID']; ?>">
                                        <input size="4" maxlength="4" type="text" name="TERM_YEAR" readonly="true" id="TERM_YEAR" value="<?php echo $row['TERM_YEAR']; ?>" class="form-control txt_input">
                                    </td>
                                    <td style="width: 20%;"></td>
                                    <td style="width: 30%"></td>
                                </tr>
                                <tr class="form-group has-error">
                                    <td><label> ประเภทการฝึกอบรม</label></td>
                                    <td>
                                        <select name="TYPE_ID" id="TYPE_ID" class="form-control txt_input" >
                                            <?php
                                            foreach ($type as $rd) {
                                                if ($rd['TYPE_ID'] == $row['TYPE_ID']) {
                                                    echo '<option selected="true" value="' . $rd['TYPE_ID'] . '">' . $rd['TYPE_SUBJECT'] . '</option>';
                                                } else {
                                                    // echo '<option value="' . $rd['TYPE_ID'] . '">' . $rd['TYPE_SUBJECT'] . '</option>';
                                                }
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
                                            <select name="SPORT_ID" id="SPORT_ID" class="form-control txt_input" >
                                                <?php
                                                $this->gms_sport->TYPE_ID = $row['TYPE_ID'];
                                                $sport = $this->gms_sport->_searchByType();
                                                foreach ($sport as $rd) {
                                                    if ($rd['SPORT_ID'] == $row['SPORT_ID']) {
                                                        echo '<option selected="true" value="' . $rd['SPORT_ID'] . '">' . $rd['SPORT_SUBJECT'] . '</option>';
                                                    } else {
                                                        // echo '<option value="' . $rd['SPORT_ID'] . '">' . $rd['SPORT_SUBJECT'] . '</option>';
                                                    }
                                                }
                                                ?>
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
                                            <select name="COURSE_ID" id="COURSE_ID" class="form-control txt_input" >
                                                <?php
                                                $this->gms_course->SPORT_ID = $row['SPORT_ID'];
                                                $course = $this->gms_course->_searchGmsCourse();
                                                foreach ($course as $rd) {
                                                    if ($rd['COURSE_ID'] == $row['COURSE_ID']) {
                                                        echo '<option selected="true" value="' . $rd['COURSE_ID'] . '">' . $rd['COURSE_SUBJECT'] . '</option>';
                                                        $course_subject_en = $rd['COURSE_SUBJECT_EN'] ;
                                                    } else {
                                                        // echo '<option value="' . $rd['COURSE_ID'] . '">' . $rd['COURSE_SUBJECT'] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </td>
                                    <td> <label> ชื่อหลักสูตร (อังกฤษ) </label></td>
                                    <td> <?=$course_subject_en; ?></td>
                                </tr>
                                <tr>
                                    <td valign="top"><label> หัวหน้าวิทยากร</label></td>
                                    <td>
                                        <div id="selectDIRECTOR">
                                            <table class="table table-hover" style="width: 90%; height: 50px">
                                                <thead>
                                                    <tr>
                                                        <th style="background-color: #F5F5F5; width: 60%">วิทยากร</th>
                                                        <th style="background-color: #F5F5F5; width: 20%">หัวหน้า</th>
                                                        <th style="background-color: #F5F5F5; width: 20%">
                                                            <button class="btn btn-default btn-create" type="button" title="เพิ่มข้อมูล" data-toggle="modal" data-target="#modalAddDirector">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $this->director_term->TERM_ID = $row['TERM_ID'];
                                                    $director_term = $this->director_term->_selectAllDirectorTerm();
                                                    foreach ($director_term as $rd) {
                                                        $MASTER = '';
                                                        if ($rd['DIRECTOR_TERM_MASTER'] == 1) {
                                                            $MASTER = "checked='true'";
                                                        }
                                                        echo '<tr>';
                                                        echo '  <td>' . $rd['FIRST_NAME'] . ' ' . $rd['LAST_NAME'] . '</td>';
                                                        echo '  <td valign="center"><input ' . $MASTER . ' type="radio" name="DIRECTOR_TERM_ID" value="' . $rd['DIRECTOR_TERM_ID'] . '">';
                                                        echo '  </td>';
                                                        echo '  <td>'
                                                                .anchor(['director_term', 'delete', $rd['DIRECTOR_TERM_ID']],
                                                                                '<i class="fa fa-times"></i>',
                                                                                'class="btn btn-default btn-delete"'
                                                                                .' data-redirect-path="d01___update___'.$row['TERM_ID'].'"'
                                                                                .' data-value="'.$rd['DIRECTOR_TERM_ID'].'"')
                                                                .'</td>';
                                                        echo '</tr>';
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><label> รุ่นที่</label></td>
                                    <td>
                                        <input placeholder="รุ่นที่" size="3" maxlength="3" type="text" name="TERM_GEN" id="TERM_GEN" value="<?php echo $row['TERM_GEN'] ?>" class="form-control txt_input">
                                    </td>
                                    <td> <label>สถานที่ </label></td>
                                    <td><input placeholder="สถานที่" type="text" name="TERM_LOCATION" id="TERM_LOCATION" value="<?php echo $row['TERM_LOCATION'] ?>" class="form-control txt_input"></td>
                                </tr>
                                <tr>
                                    <td valign="top"><label> รายละเอียด</label></td>
                                    <td colspan="3">
                                        <textarea name="TERM_DETAIL" id="TERM_DETAIL" rows="8" style="width: 95%"><?php echo $row['TERM_DETAIL'] ?></textarea>
                                    </td>

                                </tr>
                                <tr>
                                    <td><label> วันที่เริ่มรับสมัคร</label></td>
                                    <td>
                                        <input placeholder="วัน/เดือน/ปี" type="text" name="TERM_TIME_OPEN" id="TERM_TIME_OPEN" value="<?php echo $this->configAll->_dbToDate($row['TERM_TIME_OPEN']); ?>" class="form-control txt_input datepicker" data-type="normal-date">
                                    </td>
                                    <td> <label>ถึงวันที่ </label></td>
                                    <td><input placeholder="วัน/เดือน/ปี" type="text" name="TERM_TIME_CLOSE" id="TERM_TIME_CLOSE" value="<?php echo $this->configAll->_dbToDate($row['TERM_TIME_CLOSE']); ?>" class="form-control txt_input datepicker" data-type="normal-date"></td>
                                </tr>
                                <tr>
                                    <td><label> วันที่อบรม</label></td>
                                    <td>
                                        <input placeholder="วัน/เดือน/ปี" type="text" name="TERM_TIME_START" id="TERM_TIME_START" value="<?php echo $this->configAll->_dbToDate($row['TERM_TIME_START']); ?>" class="form-control txt_input datepicker" data-type="normal-date">
                                    </td>
                                    <td> <label>ถึงวันที่ </label></td>
                                    <td><input placeholder="วัน/เดือน/ปี" type="text" name="TERM_TIME_END" id="TERM_TIME_END" value="<?php echo $this->configAll->_dbToDate($row['TERM_TIME_END']); ?>" class="form-control txt_input datepicker" data-type="normal-date"></td>
                                </tr>
                                <tr>
                                    <td><label> จังหวัด</label></td>
                                    <td>
                                        <select name="PROVINCE_ID" id="PROVINCE_ID" class="form-control txt_input" onchange="searchPROV(this.value)">
                                            <option value=""></option>
                                            <?php
                                            foreach ($province as $rd) {
                                                if ($rd['PROV_ID'] == $row['PROVINCE_ID']) {
                                                    echo '<option selected="true" value="' . $rd['PROV_ID'] . '">' . $rd['PROV_NAME'] . '</option>';
                                                } else {
                                                    echo '<option value="' . $rd['PROV_ID'] . '">' . $rd['PROV_NAME'] . '</option>';
                                                }
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
                                            <select name="AMPHUR_ID" id="AMPHUR_ID" class="form-control txt_input" onclick="searchAMPHUR(this.value)">
                                                <option value=""></option>
                                                <?php
                                                $this->amphur->PROV_ID = $row['PROVINCE_ID'];
                                                $amphur = $this->amphur->_getAllAmphur();
                                                foreach ($amphur as $rd) {
                                                    if ($rd['AMPHUR_ID'] == $row['AMPHUR_ID']) {
                                                        echo '<option selected="true" value="' . $rd['AMPHUR_ID'] . '">' . $rd['AMPHUR_NAME'] . '</option>';
                                                    } else {
                                                        echo '<option value="' . $rd['AMPHUR_ID'] . '">' . $rd['AMPHUR_NAME'] . '</option>';
                                                    }
                                                }
                                                ?>
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
                                                <?php
                                                $this->tumbol->AMPHUR_ID = $row['AMPHUR_ID'];
                                                $this->tumbol->PROV_ID = $row['PROVINCE_ID'];
                                                $tumbol = $this->tumbol->_getAllTumbol();
                                                foreach ($tumbol as $rd) {
                                                    if ($rd['TUMBOL_ID'] == $row['TUMBOL_ID']) {
                                                        echo '<option selected="true" value="' . $rd['TUMBOL_ID'] . '">' . $rd['TUMBOL_NAME'] . '</option>';
                                                    } else {
                                                        echo '<option value="' . $rd['TUMBOL_ID'] . '">' . $rd['TUMBOL_NAME'] . '</option>';
                                                    }
                                                }
                                                ?>
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
                                                if ($rd['SIGN_ID'] == $row['SIGN_ID']) {
                                                    echo '<option selected="true" value="' . $rd['SIGN_ID'] . '">' . $rd['GENERAL_NAME'] . '</option>';
                                                }else{
                                                    echo '<option value="' . $rd['SIGN_ID'] . '">' . $rd['GENERAL_NAME'] . '</option>';
                                                }
                                                
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td><label> สถานะ</label></td>
                                    <td>
                                        <select name="TERM_STATUS" id="TERM_STATUS" class="form-control txt_input">
                                            <option <?php echo ($row['TERM_STATUS'] == 1 ? 'selected="true"' : '');  ?> value="1">ใช้งาน</option>
                                            <option <?php echo ($row['TERM_STATUS'] == 0 ? 'selected="true"' : '');  ?> value="0">ยกเลิก</option>
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

        <div id="modalAddDirector" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <?php echo form_open('d01/ajax_add_director', 
                                        ['name' => 'formDirectorTerm',
                                            'method' => 'POST'],
                                        ['TERM_ID' => $row['TERM_ID'],
                                            'MEMBER_ID' => '']); ?>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">วิทยากร</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php echo form_label('ชื่อ/นามสกุล วิยากร', 'MEMBER_NAME'); ?>
                                        <div class="input-group">
                                            <input type="text" name="MEMBER_NAME" class="form-control">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <?php echo form_label('ตำแหน่ง', 'JOB_POSITION'); ?>
                                        <input type="text" name="JOB_POSITION" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-save">บันทึก</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                        </div>
                    <?php echo form_close(); ?>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
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
        // $('#selectDIRECTOR').on('click', '.btn-create', function(e) {
        //     alert('OK');
        // });

        $('input[name="MEMBER_NAME"]').autocomplete({
            source: '<?php echo site_url('view_member_detail_all/ajax_get_autocomplete_data'); ?>',
            minLength: 2,
            select: function(e, ui) {
                $('input[name="MEMBER_ID"]').val(ui.item.data.MEMBER_ID);
                if (ui.item.data.JOB_POSITION) {
                    $('input[name="JOB_POSITION"]').val(ui.item.data.JOB_POSITION);
                }
                else {
                    $('input[name="JOB_POSITION"]').val('');
                }
            }
        });

        $('form[name="formDirectorTerm"').on('submit', function(e) {
            e.preventDefault();
            var $form = $(this);
            
            $.ajax({
                method: $form.attr('method'),
                url: $form.attr('action'),
                dataType: 'JSON',
                data: {
                    MEMBER_ID: $form.find('input[name="MEMBER_ID"]').val(),
                    TERM_ID: $form.find('input[name="TERM_ID"]').val()
                },
                success: function(data, textStatus, jqXHR) {
                    alert(data.message);

                    if (data.status === true) {
                        window.location.reload();
                    }
                },
                error: function(jqXHR, textStatus, error) {
                    alert('เกิดข้อผิดพลาด');
                }
            });
        });
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

