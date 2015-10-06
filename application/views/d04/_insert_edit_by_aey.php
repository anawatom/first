<style>
    .txt_input{
        width: 90%
    }
</style>
<aside class="right-side"> 
    <section class="content-header">
        <h1>
            <?php echo $this->router->class . '-ทะเบียนประวัติการฝึกอบรม'; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">บันทึก</a></li>
            <li class="active"><?php echo $this->router->class . '-เพิ่มทะเบียนประวัติการฝึกอบรม'; ?></li>
        </ol> 
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">เพิ่มทะเบียนประวัติการฝึกอบรม</h3>
                    </div>

                    <form action="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/insertExc" method="post" enctype="multipart/form-data" id="form1" name="form1" onSubmit="JavaScript:return fncSubmit();" >
                        <div class="box-body">
                            <div class="form-group">
                                <table style="width: 100%" >
                                    <tr>
                                        <td colspan="4" style=" height: 30px; background: #f5f5f5"><b>รายละเอียด ข้อมูลส่วนตัว</b></td>
                                    </tr>
                                    <tr class="form-group has-error">
                                        <td style="width: 20%;">

                                            <label> เลขประจำตัวประชาชน *</label>

                                        </td>
                                        <td style="width: 30%">
                                            <input size="13" maxlength="13" type="text" name="HRS_ID" id="HRS_ID" value="" class="form-control txt_input" onblur="chkIDCard();" maxlength="13">
                                        </td>
                                        <td style="width: 20%;"></td>
                                        <td style="width: 30%"></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>
                                            <input size="50" maxlength="50" type="text" name="MEMBER_USERNAME" id="MEMBER_USERNAME" value="" class="form-control txt_input">
                                        </td>
                                        <td>Password</td>
                                        <td>
                                            <input size="50" maxlength="50" type="text" name="MEMBER_PASSWORD" id="MEMBER_PASSWORD" value="" class="form-control txt_input">
                                        </td>
                                    </tr>
                                    <tr class="form-group has-error">
                                        <td><label>คำนำหน้า</label></td>
                                        <td>
                                            <select name="PREFIX_ID" id="PREFIX_ID" class="form-control txt_input">
                                                <?php
                                                foreach ($prefix as $rd) {
                                                    echo '<option value="' . $rd['PREFIX_ID'] . '">' . $rd['PREFIX_TH'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr class="form-group has-error">
                                        <td><label>ชื่อ *</label></td>
                                        <td>
                                            <input size="50" maxlength="50" type="text" name="FIRST_NAME" id="FIRST_NAME" value="" class="form-control txt_input">
                                        </td>
                                        <td><label>นามสกุล *</label></td>
                                        <td>
                                            <input size="50" maxlength="50" type="text" name="LAST_NAME" id="LAST_NAME" value="" class="form-control txt_input">
                                        </td>
                                    </tr>
                                    <tr class="form-group has-error">
                                        <td><label>ชื่อ(ภาษาอังกฤษ)*</label></td>
                                        <td>
                                            <input size="50" maxlength="50" type="text" name="FIRST_NAME_ENG" id="FIRST_NAME_ENG" value="" class="form-control txt_input">
                                        </td>
                                        <td><label>นามสกุล(ภาษาอังกฤษ)*</label></td>
                                        <td>
                                            <input size="50" maxlength="50" type="text" name="LAST_NAME_ENG" id="LAST_NAME_ENG" value="" class="form-control txt_input">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-group has-error"><label>เพศ*</label></td>
                                        <td class="form-group has-error">
                                            <select name="SEX" id="SEX" class="form-control txt_input">
                                                <option value="1">ชาย</option>
                                                <option value="2">หญิง</option>
                                            </select>
                                        </td>
                                        <td>อีเมล</td>
                                        <td>
                                            <input size="100" maxlength="100" type="text" name="E_MAIL" id="E_MAIL" value="" class="form-control txt_input">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-group has-error"><label>วัน/เดือน/ปี เกิด *</label></td>
                                        <td class="form-group has-error">
<!--                                            <input type="text" name="BIRTH_DATE" id="BIRTH_DATE" value="" class="form-control txt_input" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>-->
                                            <input type="text" name="BIRTH_DATE" id="BIRTH_DATE" value="<?php echo date('d/m/') . (date('Y') + 543); ?>" class="form-control txt_input" />
                                        </td>
                                        <td>ศาสนา</td>
                                        <td>
                                            <input type="text" name="RELIGION" id="RELIGION" value="" class="form-control txt_input">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ระดับการศึกษา</td>
                                        <td>
                                            <select name="EDU_ID" id="EDU_ID" class="form-control txt_input">
                                                <option value=""></option>
                                                <?php
                                                foreach ($education as $rd) {
                                                    echo '<option value="' . $rd['EDU_ID'] . '">' . $rd['EDU_NAME'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td></td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>อาชีพ</td>
                                        <td>
                                            <input type="text" name="JOB_SUBJECT" id="JOB_SUBJECT" value="" class="form-control txt_input">
                                        </td>
                                        <td>ตำแหน่ง</td>
                                        <td>
                                            <input type="text" name="JOB_POSITION" id="JOB_POSITION" value="" class="form-control txt_input">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>น้ำหนัก (กิโลกรัม)</td>
                                        <td>
                                            <input size="3" maxlength="3" type="text" name="WEIGHT" id="WEIGHT" value="" class="form-control txt_input" onKeyPress="CheckNum()">
                                        </td>
                                        <td>ส่วนสูง (เซนติเมตร)</td>
                                        <td>
                                            <input size="3" maxlength="3" type="text" name="TALL" id="TALL" value="" class="form-control txt_input" onKeyPress="CheckNum()">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style=" height: 30px; background: #f5f5f5"><b>รายละเอียด ที่อยู่ปัจจุบัน</b></td>
                                    </tr>
                                    <tr>
                                        <td>บ้านเลขที่</td>
                                        <td>
                                            <input type="text" name="HOME_ADDR" size="10" maxlength="10" id="HOME_ADDR" value="" class="form-control txt_input">
                                        </td>
                                        <td>หมู่บ้าน</td>
                                        <td>
                                            <input type="text" name="HOME_ADDR_NAME" size="80" maxlength="80" id="HOME_ADDR_NAME" value="" class="form-control txt_input">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>หมู่</td>
                                        <td>
                                            <input type="text" name="HOME_MOO" size="3" maxlength="3" id="HOME_MOO" value="" class="form-control txt_input">
                                        </td>
                                        <td>ซอย</td>
                                        <td>
                                            <input size="40" maxlength="40" type="text" name="HOME_SOI" id="HOME_SOI" value="" class="form-control txt_input">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ถนน</td>
                                        <td>
                                            <input size="40" maxlength="40" type="text" name="HOME_ROAD" id="HOME_ROAD" value="" class="form-control txt_input">
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>รหัสไปรษณีย์</td>
                                        <td>
                                            <input size="5" maxlength="5" type="text" name="HOME_POST" id="HOME_POST" value="" class="form-control txt_input">
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>โทรศัพท์</td>
                                        <td>
                                            <input size="40" maxlength="40" type="text" name="HOME_TEL" id="HOME_TEL" value="" class="form-control txt_input" ata-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                                        </td>
                                        <td>โทรสาร</td>
                                        <td>
                                            <input size="30" maxlength="30" type="text" name="HOME_FAX" id="HOME_FAX" value="" class="form-control txt_input">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>จังหวัด</td>
                                        <td>
                                            <select name="HOME_PROV" id="HOME_PROV" class="form-control txt_input" onchange="searchPROV(this.value)">
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
                                        <td>อำเภอ</td>
                                        <td>
                                            <div id="selectAMPHUR">
                                                <select name="HOME_AMPHUR" id="HOME_AMPHUR" class="form-control txt_input">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>ตำบล</td>
                                        <td>
                                            <input size="40" maxlength="40" type="text" name="HOME_TUMBOL" id="HOME_TUMBOL" class="form-control txt_input" value="">
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style=" height: 30px; background: #f5f5f5"><b>รายละเอียด สถานที่ทำงาน</b></td>
                                    </tr>
                                    <tr>
                                        <td>หน่วยงาน</td>
                                        <td>
                                            <input type="text" name="CON_NAME" id="CON_NAME" value="" class="form-control txt_input">
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>สถานที่ทำงาน</td>
                                        <td>
                                            <input size="80" maxlength="80" type="text" name="CON_ADDR_NAME" id="CON_ADDR_NAME" value="" class="form-control txt_input">
                                        </td>
                                        <td>เลขที่</td>
                                        <td>
                                            <input size="10" maxlength="10" type="text" name="CON_ADDR" id="CON_ADDR" value="" class="form-control txt_input">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>หมู่</td>
                                        <td>
                                            <input size="3" maxlength="3" type="text" name="CON_MOO" size="3" maxlength="3" id="CON_MOO" value="" class="form-control txt_input">
                                        </td>
                                        <td>ซอย</td>
                                        <td>
                                            <input size="40" maxlength="40" type="text" name="CON_SOI" id="CON_SOI" value="" class="form-control txt_input">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ถนน</td>
                                        <td>
                                            <input size="40" maxlength="40" type="text" name="CON_ROAD" id="CON_ROAD" value="" class="form-control txt_input">
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>รหัสไปรษณีย์</td>
                                        <td>
                                            <input size="5" maxlength="5" type="text" name="CON_POST" id="CON_POST" value="" class="form-control txt_input">
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>โทรศัพท์</td>
                                        <td>
                                            <input size="30" maxlength="30" type="text" name="CON_TEL" id="CON_TEL" value="" class="form-control txt_input">
                                        </td>
                                        <td>โทรสาร</td>
                                        <td>
                                            <input size="30" maxlength="30" type="text" name="CON_FAX" id="CON_FAX" value="" class="form-control txt_input">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>จังหวัด</td>
                                        <td>
                                            <select name="CON_PROV" id="CON_PROV" class="form-control txt_input" onchange="searchPROVCON(this.value)">
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
                                        <td>อำเภอ</td>
                                        <td>
                                            <div id="selectAMPHURCON">
                                                <select name="CON_AMPHUR" id="CON_AMPHUR" class="form-control txt_input">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>ตำบล</td>
                                        <td>
                                            <input size="40" maxlength="40" type="text" name="CON_TUMBOL" id="CON_TUMBOL" class="form-control txt_input">
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style=" height: 30px; background: #f5f5f5"><b>รายละเอียด ภาพถ่าย</b></td>
                                    </tr>
                                    <tr>
                                        <td>ภาพแสดงในเวบบอร์ด</td>
                                        <td>
                                            <input type="file" name="MEMBER_IMAGE" id="MEMBER_IMAGE" value="" class="form-control txt_input">
                                        </td>
                                        <td colspan="2"><code>*ไฟล์ภาพ (jpg,bmp,gif,png)</code></td>
                                    </tr>
                                    <tr>
                                        <td>ภาพถ่ายหน้าตรง<br><code>(เพื่อใช้ในการติดบัตร)</code></td>
                                        <td>
                                            <input type="file" name="MEMBER_AVARTAR" id="MEMBER_AVARTAR" value="" class="form-control txt_input">
                                        </td>
                                        <td colspan="2"><code>*ไฟล์ภาพ (jpg,bmp,gif,png)</code></td>
                                    </tr>
                                    <tr>
                                        <td>รูปบัตรประจำตัวประชาชน</td>
                                        <td>
                                            <input type="file" name="MEMBER_CARD" id="MEMBER_CARD" value="" class="form-control txt_input">
                                        </td>
                                        <td colspan="2"><code>*ไฟล์ภาพ (jpg,bmp,gif,png)</code></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style=" height: 30px; background: #f5f5f5"><b>รายละเอียด กำหนดสิทธิ</b></td>
                                    </tr>
                                    <tr>
                                        <td>ระดับสมาชิก</td>
                                        <td>
                                            <select name="CLASS_ID" id="CLASS_ID" class="form-control txt_input">
                                                <?php
                                                foreach ($class as $rd) {
                                                    echo '<option value="' . $rd['CLASS_ID'] . '">' . $rd['CLASS_SUBJECT'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>กลุ่มหลักสูตร</td>
                                        <td>
                                            <select name="TYPE_ID" id="TYPE_ID" class="form-control txt_input">
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
                                    <tr>
                                        <td>สถานะAdmin</td>
                                        <td>
                                            <select id="MEMBER_ADMIN" name="MEMBER_ADMIN"  class="form-control txt_input">
                                                <option value="0" selected="true">ไม่ใช่</option>
                                                <option value="1">ใช่</option>
                                            </select>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>เจ้าหน้าที่พลศึกษา</td>
                                        <td>
                                            <select name="DPE_OFFICER" id="DPE_OFFICER" class="form-control txt_input">
                                                <option value="0">ไม่เป็น</option>
                                                <option value="1">เป็น</option>
                                            </select>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group">
                                <!-- Button trigger modal -->


                                <!-- Modal -->

                            </div>
                            <div class="box-footer">
                                <div class="span5 col-md-5" id="sandbox-container"></div>
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
                                                $(function () {
                                                    //$("#BIRTH_DATE").inputmask("", {"placeholder": "dd/mm/yyyy"});
                                                    //$("[data-mask]").inputmask();

                                                    var thaiYear = function (ct) {
                                                        var leap = 3;
                                                        var dayWeek = ["พฤ.", "ศ.", "ส.", "อา.", "จ.", "อ.", "พ."];
                                                        if (ct) {
                                                            var yearL = new Date(ct).getFullYear() - 543;
                                                            leap = (((yearL % 4 == 0) && (yearL % 100 != 0)) || (yearL % 400 == 0)) ? 2 : 3;
                                                            if (leap == 2) {
                                                                dayWeek = ["ศ.", "ส.", "อา.", "จ.", "อ.", "พ.", "พฤ."];
                                                            }
                                                        }
                                                        this.setOptions({
                                                            i18n: {th: {dayOfWeek: dayWeek}}, dayOfWeekStart: leap,
                                                        })
                                                    };

                                                    $("#BIRTH_DATE").datetimepicker({
                                                        timepicker: false,
                                                        format: 'd/m/Y', // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000              
                                                        lang: 'th', // แสดงภาษาไทย  
                                                        onChangeMonth: thaiYear,
                                                        onShow: thaiYear,
                                                        yearOffset: 543, // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ  
                                                        closeOnDateSelect: true,
                                                    });
                                                });
                                                document.onkeydown = chkEvent

                                                function chkEvent(e) {
                                                    var keycode;
                                                    if (window.event)
                                                        keycode = window.event.keyCode; //*** for IE ***//
                                                    else if (e)
                                                        keycode = e.which; //*** for Firefox ***//
                                                    if (keycode == 13)
                                                    {
                                                        return false;
                                                    }
                                                }

                                                function chkIDCard() {
                                                    var HRS_ID = document.getElementById("HRS_ID").value;
                                                    jQuery.ajax({
                                                        url: '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/searchIDCard/' + HRS_ID,
                                                        async: false,
                                                        success: function (data) {
                                                            //alert(data);
                                                            if (data == 'Yes') {
                                                                alert('ขออภัย Username นี้ได้ถูกใช้งานเรียบร้อยแล้ว กรุณาใช้ Username อื่น');

                                                                //document.getElementById("ChkUsername").value = 1;
                                                                document.getElementById("HRS_ID").value = '';
                                                                document.form1.HRS_ID.focus();
                                                            } else {
                                                                // document.getElementById("ChkUsername").value = 0;
                                                            }
                                                        }
                                                    })
                                                }

                                                function id_card() {
                                                    var idNo = document.getElementById('HRS_ID').value;

                                                    if (check_idcard(idNo)) {

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
                                                                document.getElementById("selectAMPHUR").innerHTML = arrData[0];
                                                            },
                                                            error: function (xhr, desc, exceptionobj) {
                                                                alert("ERROR:" + xhr.responseText);
                                                            }

                                                        });
                                                    }
                                                }

                                                function searchPROVCON(e) {
                                                    if (e != '') {
                                                        jQuery.ajax({
                                                            url: '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/searchAMPHURCON/' + e,
                                                            async: false,
                                                            success: function (data) {
                                                                var arrData = new Array();
                                                                arrData = data.split(',');
                                                                document.getElementById("selectAMPHURCON").innerHTML = arrData[0];
                                                            },
                                                            error: function (xhr, desc, exceptionobj) {
                                                                alert("ERROR:" + xhr.responseText);
                                                            }

                                                        });
                                                    }
                                                }
                                                function CheckNum() {
                                                    if (event.keyCode < 48 || event.keyCode > 57) {
                                                        event.returnValue = false;
                                                    }
                                                }
                                                function check_idcard(idcard) {
                                                    if (idcard.value == "") {
                                                        return false;
                                                    }
                                                    if (idcard.length < 13) {
                                                        return false;
                                                    }

                                                    var num = str_split(idcard); // function เพิ่มเติม
                                                    var sum = 0;
                                                    var total = 0;
                                                    var digi = 13;

                                                    for (i = 0; i < 12; i++) {
                                                        sum = sum + (num[i] * digi);
                                                        digi--;
                                                    }
                                                    total = ((11 - (sum % 11)) % 10);

                                                    if (total == num[12]) { 	//alert('รหัสหมายเลขประจำตัวประชาชนถูกต้อง');
                                                        return true;
                                                    } else { 	//alert('รหัสหมายเลขประจำตัวประชาชนไม่ถูกต้อง');
                                                        alert('รหัสหมายเลขประจำตัวประชาชนไม่ถูกต้อง');
                                                        return false;
                                                    }
                                                }
                                                function str_split(f_string, f_split_length) {
                                                    f_string += '';
                                                    if (f_split_length == undefined) {
                                                        f_split_length = 1;
                                                    }
                                                    if (f_split_length > 0) {
                                                        var result = [];
                                                        while (f_string.length > f_split_length) {
                                                            result[result.length] = f_string.substring(0, f_split_length);
                                                            f_string = f_string.substring(f_split_length);
                                                        }
                                                        result[result.length] = f_string;
                                                        return result;
                                                    }
                                                    return false;
                                                }
                                                function fncSubmit() {
                                                    if (document.form1.HRS_ID.value == '') {
                                                        alert('กรุณากรอกบัตรประชาชน');
                                                        document.form1.HRS_ID.focus();
                                                        return false;
                                                    }
                                                    if (document.form1.PREFIX_ID.value == 0) {
                                                        alert('กรุณาระบุคำนำหน้าชื่อ');
                                                        document.form1.PREFIX_ID.focus();
                                                        return false;
                                                    }
                                                    if (document.form1.FIRST_NAME.value == '') {
                                                        alert('กรุณากรอกช่ือ');
                                                        document.form1.FIRST_NAME.focus();
                                                        return false;
                                                    }
                                                    if (document.form1.LAST_NAME.value == '') {
                                                        alert('กรุณากรอกนามสกุล');
                                                        document.form1.LAST_NAME.focus();
                                                        return false;
                                                    }
                                                    if (document.form1.FIRST_NAME_ENG.value == '') {
                                                        alert('กรุณากรอกช่ือ ENG');
                                                        document.form1.FIRST_NAME_ENG.focus();
                                                        return false;
                                                    }
                                                    if (document.form1.LAST_NAME_ENG.value == '') {
                                                        alert('กรุณากรอกนามสกุล ENG');
                                                        document.form1.LAST_NAME_ENG.focus();
                                                        return false;
                                                    }
                                                    if (document.form1.BIRTH_DATE.value == '') {
                                                        alert('กรุณากรอกวันเกิด');
                                                        document.form1.BIRTH_DATE.focus();
                                                        return false;
                                                    }
                                                }

</script>


