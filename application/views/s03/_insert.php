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

                    <form action="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/insertCourseExc" method="post" enctype="multipart/form-data" id="form1" name="form1" onSubmit="JavaScript:return fncSubmit();" >
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
                                            <select name="TYPE_ID" id="TYPE_ID" class="form-control txt_input" onchange="searchSport(this.value)">
                                                <option value="" selected="true">กรุณาเลือกข้อมูล</option>
                                                <?php
                                                foreach ($type as $row) {
                                                    echo '<option value="' . $row['TYPE_ID'] . '">' . $row['TYPE_SUBJECT'] . '</option>';
                                                }
                                                ?>

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
                                                    <option value="" selected="true"></option>
                                                </select>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>เลขที่หลักสูตร</td>
                                        <td>
                                            <input size="50" maxlength="50" type="text" name="COURSE_CODE" id="COURSE_CODE" value="" class="form-control txt_input">
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="form-group has-error"><label>ชื่อหลักสูตร(ไทย)*</label></td>
                                        <td class="form-group has-error">
                                            <input size="50" maxlength="50" type="text" name="COURSE_SUBJECT" id="COURSE_SUBJECT" value="" class="form-control txt_input">
                                        </td>
                                        <td>ชื่อหลักสูตร(อังกฤษ)</td>
                                        <td><input size="50" maxlength="50" type="text" name="COURSE_SUBJECT_EN" id="COURSE_SUBJECT_EN" value="" class="form-control txt_input"></td>
                                    </tr>
                                    <tr>
                                        <td>เนื้อหาหลักสูตร</td>
                                        <td>
                                            <textarea name="COURSE_DETAIL" id="COURSE_DETAIL" rows="8" class="form-control txt_input"></textarea>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>สถานะใช้งาน</td>
                                        <td>
                                            <select name="COURSE_STATUS" id="COURSE_STATUS" class="form-control txt_input">
                                                <option value="1" selected="true">ใช้งาน</option>
                                                <option value="0">ไม่ใช้งาน</option>
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


