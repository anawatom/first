<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$row = $course[0] ;

?>

<style>
    .txt_input{
        width: 90%
    }
    //#tallModal .modal-body p { margin-bottom: 900px }
/*    .modal.modal-wide .modal-dialog {
        width: 90%;
    }*/
    .modal-wide .modal-body {
        overflow-y: auto;
    }
</style>
<aside class="right-side"> 
    <section class="content-header">
        <h1>
            <?php echo $this->router->class . '-หลักสูตรและวิทยากร'; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">บันทึก</a></li>
            <li class="active"><?php echo $this->router->class . '-หลักสูตรและวิทยากร'; ?></li>
        </ol> 
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">เพิ่มหลักสูตรและวิทยากร</h3>
                    </div>                    
                    <form action="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/updateExc" method="post" enctype="multipart/form-data" id="form1" name="form1" onSubmit="JavaScript:return fncSubmit();" >
                        <div class="box-body">
                            <div class="form-group">
                                <table style="width: 100%" >
                                    <tr>
                                        <td colspan="4" style=" height: 30px; background: #f5f5f5"><b>รายละเอียด หลักสูตรและวิทยากร</b></td>
                                    </tr>
                                    <tr class="form-group has-error">
                                        <td style="width: 20%;">

                                            <label> ประเภทการฝึกอบรม *</label>

                                        </td>
                                        <td style="width: 30%">
                                           <select name="TYPE_ID" id="TYPE_ID" class="form-control txt_input" >
                                            <?= '<option selected="true" value="' . $type[0]['TYPE_ID'] . '">' . $type[0]['TYPE_SUBJECT'] . '</option>';  ?>
                                            </select>
                                        </td>
                                        <td style="width: 20%;"></td>
                                        <td style="width: 30%"></td>
                                    </tr>
                                    <tr class="form-group has-error">
                                        <td><label>ชนิดกีฬา/ชนิดการฝึกอบรม</label></td>
                                        <td>
                                            <div id="selectSPORT">
                                                <select name="SPORT_ID" id="SPORT_ID" class="form-control txt_input">
                                                    <?= '<option selected="true" value="' . $sport[0]['SPORT_ID'] . '">' . $sport[0]['SPORT_SUBJECT'] . '</option>';  ?>
                                                </select>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>เลขที่หลักสูตร</td>
                                        <td><input type="hidden" name="COURSE_ID" id="COURSE_ID" value="<?php echo $row['COURSE_ID']; ?>">
                                            <input size="50" maxlength="50" type="text" name="COURSE_CODE" id="COURSE_CODE" value="<?php echo $row['COURSE_CODE']; ?>" class="form-control txt_input">
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="form-group has-error"><label>ชื่อหลักสูตร(ไทย)*</label></td>
                                        <td class="form-group has-error">
                                            <input size="50" maxlength="50" type="text" name="COURSE_SUBJECT" id="COURSE_SUBJECT" value="<?php echo $row['COURSE_SUBJECT']; ?>" class="form-control txt_input">
                                        </td>
                                        <td>ชื่อหลักสูตร(อังกฤษ)</td>
                                        <td><input size="50" maxlength="50" type="text" name="COURSE_SUBJECT_EN" id="COURSE_SUBJECT_EN" value="<?php echo $row['COURSE_SUBJECT_EN']; ?>" class="form-control txt_input"></td>
                                    </tr>
                                    <tr>
                                        <td>เนื้อหาหลักสูตร</td>
                                        <td>
                                            <textarea name="COURSE_DETAIL" id="COURSE_DETAIL" rows="8" class="form-control txt_input"><?php if( isset($row['COURSE_DETAIL'])) { echo $row['COURSE_DETAIL']->load(); }?></textarea>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>สถานะใช้งาน </td>
                                        <td>
                                            <?php 
                                                if ( $row['COURSE_STATUS'] == '1') {
                                                    $course_active = 'selected="true"' ; $course_inactive = '' ;
                                                } else {
                                                    $course_active = '' ; $course_inactive = 'selected="true"' ;
                                                }
                                            ?>
                                            <select name="COURSE_STATUS" id="COURSE_STATUS" class="form-control txt_input">
                                                <option value="1"  <?=$course_active; ?> >ใช้งาน</option>
                                                <option value="0" <?=$course_inactive; ?> >ไม่ใช้งาน</option>
                                            </select>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
<!--                                    <tr>
                                        <td valign="top"><label> วิทยากร</label></td>
                                        <td>
                                            <div id="selectDIRECTOR">
                                                <table border="0" style="width: 90%; height: 50px" id="tbDIRECTOR">
                                                    <thead>
                                                        <tr>
                                                            <th style="background-color: #F5F5F5; width: 10%"></th>
                                                            <th style="background-color: #F5F5F5; width: 90%">วิทยากร</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                <span id="txtCustomerName">
                                                    
                                                </span>
                                            </div>
                                        </td>
                                        <td><a data-toggle="modal" href="#tallModal" class="btn">เพิ่ม</a></button></td>
                                        <td></td>
                                    </tr>-->
                                </table>
                            </div>
                            <div class="box-footer">
                                <div class="span5 col-md-5" id="sandbox-container"></div>
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </div>
                        </div>
                    </form>

                    <div id="tallModal" class="modal modal-wide fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <iframe id="gggg" frameborder="0" scrolling="no" width="100%" height="700" src="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/searchDIRECTOR">
                                    </iframe>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                </div>
            </div>
        </div>
        
                <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">รายชื่อวิทยากร</h3>
                        <div class="box-tools pull-right">
                            <a data-toggle="modal" href="#tallModal" class="btn">เพิ่ม</a>
                        </div>
                      
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered" style="width: 100%">
                            
                            <tr>
                                <th style="width: 2%"></th>
                                <th style="width: 10%">รหัสบัตรประชาชน</th>
                                <th style="width: 25%">ชื่อ - นามสกุล</th>
                                <th style="width: 25%">ตำแหน่ง</th>
                                <th style="width: 10%">เครื่องมือ</th>
                            </tr>
                            <?php
                            foreach ($director as $row) {
                                $COURSE_ID = $row['COURSE_ID'];
                                $HRS_ID = $row['HRS_ID'];
                                $FIRST_NAME = $row['FIRST_NAME'];
                                $LAST_NAME = $row['LAST_NAME'];
                                $JOB_POSITION = $row['JOB_POSITION'];
                                $DIRECTOR_COURSE_ID = $row['DIRECTOR_COURSE_ID'];
//                                $COURSE_SUBJECT = $row['COURSE_SUBJECT'];
//                                $SPORT_SUBJECT = $row['SPORT_SUBJECT'];
//                                $COURSE_STATUS = $row['COURSE_STATUS'];
//                                if ($COURSE_STATUS) {
//                                    $COURSE_STATUS = '<span class="label label-success">ใช้งาน</span>';
//                                } else {
//                                    $COURSE_STATUS = '<span class="label label-danger">ยกเลิก</span>';
//                                }
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="DIRECTOR_COURSE_ID[]" id="<?php echo $DIRECTOR_COURSE_ID; ?>" value="<?php echo $DIRECTOR_COURSE_ID; ?>"></td>
                                    <td><?php echo $HRS_ID; ?></td>
                                    <td><?php echo $FIRST_NAME . ' - ' .$LAST_NAME ; ?></td>
                                    <td><?php echo $JOB_POSITION; ?></td>
                                    <td>                                       
                                        <a class="btn btn-default" onclick="delDirectorCourseByID('<?php echo $row['DIRECTOR_COURSE_ID']; ?>')"><i class='fa fa-times'></i></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <?php
                                        /*$config['base_url'] = base_url() . 'index.php/' . $this->router->class . '/selectCourse/';
                                        $config['total_rows'] = $count;
                                        $config['per_page'] = 10;

                                        $this->pagination->initialize($config);
                                        echo $this->pagination->create_links(); */
                                        ?>
                                    </ul>
                                </td>
                            </tr>

                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
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
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>js/jquery.datetimepicker.css">  
<script src="<?php echo base_url(); ?>js/jquery.datetimepicker.js"></script>  
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script language="JavaScript">
                                                $(".modal-wide").on("show.bs.modal", function () {
                                                    var height = $(window).height() - 200;
                                                    $(this).find(".modal-body").css("max-height", height);
                                                });
                                                function searchSport(e) {
                                                    jQuery.ajax({
                                                        url: '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/searchSportByType/' + e,
                                                        async: false,
                                                        success: function (data) {
                                                            var arrData = new Array();
                                                            arrData = data.split(',');
                                                            document.getElementById("selectSPORT").innerHTML = arrData[0];
                                                        },
                                                        error: function (xhr, desc, exceptionobj) {
                                                            alert("ERROR:" + xhr.responseText);
                                                        }

                                                    });
                                                }
                                                function searchDIRECTOR(id,name){ //id,name
                                                    alert('xxx');
                                                }
                                                function fncSubmit() {
                                                    if (document.form1.TYPE_ID.value == '') {
                                                        alert('กรุณาเลือก ประเภทการฝึกอบรม');
                                                        document.form1.TYPE_ID.focus();
                                                        return false;
                                                    }
                                                    if (document.form1.SPORT_ID.value == '') {
                                                        alert('กรุณาเลือก ชนิดกีฬา/ชนิดการฝึกอบรม');
                                                        document.form1.SPORT_ID.focus();
                                                        return false;
                                                    }
                                                    if (document.form1.COURSE_SUBJECT.value == '') {
                                                        alert('กรุณากรอกชื่อหลักสูตร');
                                                        document.form1.COURSE_SUBJECT.focus();
                                                        return false;
                                                    }

                                                }

</script>


                    <div id="tallModal" class="modal modal-wide fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <iframe frameborder="0" scrolling="no" width="100%" height="700" src="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/searchDIRECTOR">
                                    </iframe>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    
                    <script type="text/javascript">
                            function closeIframe() {
                                $('#tallModal').modal('hide');
                                location.reload();
                                return false;
                            }                            
                            function delDirectorCourseByID(directorCourseId){
                                    if (confirm('ต้องการลบ ID นี้หรือไม่ ?')) {
                                            var dataPost = {    'DIRECTOR_COURSE_ID': directorCourseId   } ;
                                            $.post('<?=base_url();?>/index.php/s03/deleteDirectorCourse/', dataPost , function(html) {}).success(function(data) {                        
                                                    alert('ลบข้อมูลสำเร็จ') ;
                                                    location.reload();
                                                    return false;      
                                            });                                                            
                                    }
                            }
                    </script>