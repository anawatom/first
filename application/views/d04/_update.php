<style>
    .txt_input{
        width: 90%
    }
</style>
<?php
foreach ($page_var['member'] as $row) {
    
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title">แก้ไขทะเบียนประวัติการฝึกอบรม</h3>
            </div>

            <form action="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/updateMemberExc" method="post" enctype="multipart/form-data" id="form1" name="form1" onSubmit="JavaScript:return fncSubmit();" >
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
                                    <input type="hidden" name="MEMBER_ID" id="MEMBER_ID" value="<?php echo $row['MEMBER_ID']; ?>">
                                    <input size="13" maxlength="13" type="text" name="HRS_ID" id="HRS_ID" value="<?php echo $row['HRS_ID']; ?>" class="form-control txt_input" readonly="true" maxlength="13">
                                </td>
                                <td style="width: 20%;"></td>
                                <td style="width: 30%"></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>
                                    <input size="50" maxlength="50" type="text" name="MEMBER_USERNAME" id="MEMBER_USERNAME" value="<?php echo $row['MEMBER_USERNAME']; ?>" class="form-control txt_input">
                                </td>
                                <td>Password</td>
                                <td>
                                    <input size="50" maxlength="50" type="text" name="MEMBER_PASSWORD" id="MEMBER_PASSWORD" value="<?php echo $row['MEMBER_PASSWORD']; ?>" class="form-control txt_input">
                                </td>
                            </tr>
                            <tr class="form-group has-error">
                                <td><label>คำนำหน้า</label></td>
                                <td>
                                    <select name="PREFIX_ID" id="PREFIX_ID" class="form-control txt_input">
                                        <?php
                                        foreach ($page_var['prefix'] as $rd) {
                                            if ($row['PREFIX_ID'] == $rd['PREFIX_ID']) {
                                                echo '<option selected="true" value="' . $rd['PREFIX_ID'] . '">' . $rd['PREFIX_TH'] . '</option>';
                                            } else {
                                                echo '<option value="' . $rd['PREFIX_ID'] . '">' . $rd['PREFIX_TH'] . '</option>';
                                            }
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
                                    <input size="50" maxlength="50" type="text" name="FIRST_NAME" id="FIRST_NAME" value="<?php echo $row['FIRST_NAME']; ?>" class="form-control txt_input">
                                </td>
                                <td><label>นามสกุล *</label></td>
                                <td>
                                    <input size="50" maxlength="50" type="text" name="LAST_NAME" id="LAST_NAME" value="<?php echo $row['LAST_NAME']; ?>" class="form-control txt_input">
                                </td>
                            </tr>
                            <tr class="form-group has-error">
                                <td><label>ชื่อ(ภาษาอังกฤษ)*</label></td>
                                <td>
                                    <input size="50" maxlength="50" type="text" name="FIRST_NAME_ENG" id="FIRST_NAME_ENG" value="<?php echo $row['FIRST_NAME_ENG']; ?>" class="form-control txt_input">
                                </td>
                                <td><label>นามสกุล(ภาษาอังกฤษ)*</label></td>
                                <td>
                                    <input size="50" maxlength="50" type="text" name="LAST_NAME_ENG" id="LAST_NAME_ENG" value="<?php echo $row['LAST_NAME_ENG']; ?>" class="form-control txt_input">
                                </td>
                            </tr>
                            <tr>
                                <td class="form-group has-error"><label>เพศ*</label></td>
                                <td class="form-group has-error">
                                    <select name="SEX" id="SEX" class="form-control txt_input">
                                        <option <?php
                                        if ($row['SEX'] == 1) {
                                            echo 'selected="true"';
                                        }
                                        ?> value="1">ชาย</option>
                                        <option <?php
                                        if ($row['SEX'] == 2) {
                                            echo 'selected="true"';
                                        }
                                        ?> value="2">หญิง</option>
                                    </select>
                                </td>
                                <td>อีเมล</td>
                                <td>
                                    <input size="100" maxlength="100" type="text" name="E_MAIL" id="E_MAIL" value="<?php echo $row['E_MAIL']; ?>" class="form-control txt_input">
                                </td>
                            </tr>
                            <tr>
                                <td class="form-group has-error"><label>วัน/เดือน/ปี เกิด *</label></td>
                                <td class="form-group has-error">
                                    <input type="text" name="BIRTH_DATE" id="BIRTH_DATE" value="<?php
                                    if ($row['BIRTH_DATE'] != '') {
                                        echo $this->configAll->_dbToDate($row['BIRTH_DATE']);
                                    } else {
                                        echo date('d/m/') . (date('Y') + 543);
                                    }
                                    ?>" class="form-control txt_input datepicker" data-type="birthdate" />
                                </td>
                                <td>ศาสนา</td>
                                <td>
                                    <input type="text" name="RELIGION" id="RELIGION" value="<?php echo $row['RELIGION']; ?>" class="form-control txt_input">
                                </td>
                            </tr>
                            <tr>
                                <td>ระดับการศึกษา</td>
                                <td>
                                    <select name="EDU_ID" id="EDU_ID" class="form-control txt_input">
                                        <option value=""></option>
                                        <?php
                                        foreach ($page_var['education'] as $rd) {
                                            if ($rd['EDU_ID'] == $row['EDU_ID']) {
                                                echo '<option selected="true" value="' . $rd['EDU_ID'] . '">' . $rd['EDU_NAME'] . '</option>';
                                            } else {
                                                echo '<option value="' . $rd['EDU_ID'] . '">' . $rd['EDU_NAME'] . '</option>';
                                            }
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
                                    <input type="text" name="JOB_SUBJECT" id="JOB_SUBJECT" value="<?php echo $row['JOB_SUBJECT']; ?>" class="form-control txt_input">
                                </td>
                                <td>ตำแหน่ง</td>
                                <td>
                                    <input type="text" name="JOB_POSITION" id="JOB_POSITION" value="<?php echo $row['JOB_POSITION']; ?>" class="form-control txt_input">
                                </td>
                            </tr>
                            <tr>
                                <td>น้ำหนัก (กิโลกรัม)</td>
                                <td>
                                    <input size="3" maxlength="3" type="text" name="WEIGHT" id="WEIGHT" value="<?php echo $row['WEIGHT']; ?>" class="form-control txt_input" onKeyPress="CheckNum()">
                                </td>
                                <td>ส่วนสูง (เซนติเมตร)</td>
                                <td>
                                    <input size="3" maxlength="3" type="text" name="TALL" id="TALL" value="<?php echo $row['TALL']; ?>" class="form-control txt_input" onKeyPress="CheckNum()">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" style=" height: 30px; background: #f5f5f5"><b>รายละเอียด ที่อยู่ปัจจุบัน</b></td>
                            </tr>
                            <tr>
                                <td>บ้านเลขที่</td>
                                <td>
                                    <input type="text" name="HOME_ADDR" size="10" maxlength="10" id="HOME_ADDR" value="<?php echo $row['HOME_ADDR']; ?>" class="form-control txt_input">
                                </td>
                                <td>หมู่บ้าน</td>
                                <td>
                                    <input type="text" name="HOME_ADDR_NAME" size="80" maxlength="80" id="HOME_ADDR_NAME" value="<?php echo $row['HOME_ADDR_NAME']; ?>" class="form-control txt_input">
                                </td>
                            </tr>
                            <tr>
                                <td>หมู่</td>
                                <td>
                                    <input type="text" name="HOME_MOO" size="3" maxlength="3" id="HOME_MOO" value="<?php echo $row['HOME_MOO']; ?>" class="form-control txt_input">
                                </td>
                                <td>ซอย</td>
                                <td>
                                    <input size="40" maxlength="40" type="text" name="HOME_SOI" id="HOME_SOI" value="<?php echo $row['HOME_SOI']; ?>" class="form-control txt_input">
                                </td>
                            </tr>
                            <tr>
                                <td>ถนน</td>
                                <td>
                                    <input size="40" maxlength="40" type="text" name="HOME_ROAD" id="HOME_ROAD" value="<?php echo $row['HOME_ROAD']; ?>" class="form-control txt_input">
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>รหัสไปรษณีย์</td>
                                <td>
                                    <input size="5" maxlength="5" type="text" name="HOME_POST" id="HOME_POST" value="<?php echo $row['HOME_POST']; ?>" class="form-control txt_input">
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>โทรศัพท์</td>
                                <td>
                                    <input size="40" maxlength="40" type="text" name="HOME_TEL" id="HOME_TEL" value="<?php echo $row['HOME_TEL']; ?>" class="form-control txt_input" ata-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                                </td>
                                <td>โทรสาร</td>
                                <td>
                                    <input size="30" maxlength="30" type="text" name="HOME_FAX" id="HOME_FAX" value="<?php echo $row['HOME_FAX']; ?>" class="form-control txt_input">
                                </td>
                            </tr>
                            <tr>
                                <td>จังหวัด</td>
                                <td>
                                    <select name="HOME_PROV" id="HOME_PROV" class="form-control txt_input" onchange="searchPROV(this.value)">
                                        <option value=""></option>
                                        <?php
                                        foreach ($page_var['province'] as $rd) {
                                            if ($rd['PROV_ID'] == $row['HOME_PROV']) {
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
                                <td>อำเภอ</td>
                                <td>
                                    <div id="selectAMPHUR">
                                        <select name="HOME_AMPHUR" id="HOME_AMPHUR" class="form-control txt_input">
                                            <?php
                                            if ($row['HOME_PROV'] != '') {
                                                $this->amphur->PROV_ID = $row['HOME_PROV'];
                                                $amphur = $this->amphur->_getAllAmphur();
                                                foreach ($page_var['amphur'] as $rd) {
                                                    if ($rd['AMPHUR_ID'] == $row['HOME_AMPHUR']) {
                                                        echo '<option selected="true" value="' . $rd['AMPHUR_ID'] . '">' . $rd['AMPHUR_NAME'] . '</option>';
                                                    } else {
                                                        echo '<option value="' . $rd['AMPHUR_ID'] . '">' . $rd['AMPHUR_NAME'] . '</option>';
                                                    }
                                                }
                                            }
                                            ?>
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
                                    <input size="40" maxlength="40" type="text" name="HOME_TUMBOL" id="HOME_TUMBOL" class="form-control txt_input" value="<?php echo $row['HOME_TUMBOL']; ?>">
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
                                    <input type="text" name="CON_NAME" id="CON_NAME" value="<?php echo $row['CON_NAME']; ?>" class="form-control txt_input">
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>สถานที่ทำงาน</td>
                                <td>
                                    <input size="80" maxlength="80" type="text" name="CON_ADDR_NAME" id="CON_ADDR_NAME" value="<?php echo $row['CON_ADDR_NAME']; ?>" class="form-control txt_input">
                                </td>
                                <td>เลขที่</td>
                                <td>
                                    <input size="10" maxlength="10" type="text" name="CON_ADDR" id="CON_ADDR" value="<?php echo $row['CON_ADDR']; ?>" class="form-control txt_input">
                                </td>
                            </tr>
                            <tr>
                                <td>หมู่</td>
                                <td>
                                    <input size="3" maxlength="3" type="text" name="CON_MOO" size="3" maxlength="3" id="CON_MOO" value="<?php echo $row['CON_MOO']; ?>" class="form-control txt_input">
                                </td>
                                <td>ซอย</td>
                                <td>
                                    <input size="40" maxlength="40" type="text" name="CON_SOI" id="CON_SOI" value="<?php echo $row['CON_SOI']; ?>" class="form-control txt_input">
                                </td>
                            </tr>
                            <tr>
                                <td>ถนน</td>
                                <td>
                                    <input size="40" maxlength="40" type="text" name="CON_ROAD" id="CON_ROAD" value="<?php echo $row['CON_ROAD']; ?>" class="form-control txt_input">
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>รหัสไปรษณีย์</td>
                                <td>
                                    <input size="5" maxlength="5" type="text" name="CON_POST" id="CON_POST" value="<?php echo $row['CON_POST']; ?>" class="form-control txt_input">
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>โทรศัพท์</td>
                                <td>
                                    <input size="30" maxlength="30" type="text" name="CON_TEL" id="CON_TEL" value="<?php echo $row['CON_TEL']; ?>" class="form-control txt_input">
                                </td>
                                <td>โทรสาร</td>
                                <td>
                                    <input size="30" maxlength="30" type="text" name="CON_FAX" id="CON_FAX" value="<?php echo $row['CON_FAX']; ?>" class="form-control txt_input">
                                </td>
                            </tr>
                            <tr>
                                <td>จังหวัด</td>
                                <td>
                                    <select name="CON_PROV" id="CON_PROV" class="form-control txt_input" onchange="searchPROVCON(this.value)">
                                        <option value=""></option>
                                        <?php
                                        foreach ($page_var['province'] as $rd) {
                                            if ($rd['PROV_ID'] == $row['CON_PROV']) {
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
                                <td>อำเภอ</td>
                                <td>
                                    <div id="selectAMPHURCON">
                                        <select name="CON_AMPHUR" id="CON_AMPHUR" class="form-control txt_input">
                                            <option value=""></option>
                                            <?php
                                            if ($row['CON_AMPHUR'] != '') {
                                                $this->amphur->PROV_ID = $row['CON_AMPHUR'];
                                                $amphur = $this->amphur->_getAllAmphur();
                                                foreach ($page_var['amphur'] as $rd) {
                                                    if ($rd['AMPHUR_ID'] == $row['CON_AMPHUR']) {
                                                        echo '<option selected="true" value="' . $rd['AMPHUR_ID'] . '">' . $rd['AMPHUR_NAME'] . '</option>';
                                                    } else {
                                                        echo '<option value="' . $rd['AMPHUR_ID'] . '">' . $rd['AMPHUR_NAME'] . '</option>';
                                                    }
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
                                <td>ตำบล</td>
                                <td>
                                    <input size="40" maxlength="40" type="text" name="CON_TUMBOL" id="CON_TUMBOL" class="form-control txt_input" value="<?php echo $row['CON_TUMBOL']; ?>">
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4" style=" height: 30px; background: #f5f5f5"><b>รายละเอียด ภาพถ่าย</b></td>
                            </tr>
                            <tr>
                                <td>ภาพถ่ายหน้าตรง<br><code>(เพื่อใช้ในการติดบัตร)</code></td>
                                <td>
                                    <?php
                                    if ($row['MEMBER_IMAGE'] != '') {
                                        echo '<img src="http://ipeshd.dpe.go.th/files/member/' . $row['MEMBER_IMAGE'] . '" width="100" height="100">';
                                    } else {
                                        echo '<img src="http://ipeshd.dpe.go.th/files/member/noImage.jpg" width="100" height="100">';
                                    }
                                    ?>
                                    <input type="hidden" name="MEMBER_IMAGE_BK" value="<?php echo $row['MEMBER_IMAGE']; ?>">
                                    <input type="file" name="MEMBER_IMAGE" id="MEMBER_IMAGE" value="" class="form-control txt_input">
                                </td>
                                <td colspan="2"><code>*ไฟล์ภาพ (jpg,bmp,gif,png)</code></td>
                            </tr>
                            <tr>
                                <td>ภาพแสดงในเวบบอร์ด</td>
                                <td>
                                    <?php
                                    if ($row['MEMBER_AVARTAR'] != '') {
                                        echo '<img src="http://ipeshd.dpe.go.th/files/member/' . $row['MEMBER_AVARTAR'] . '" width="100" height="100">';
                                    } else {
                                        echo '<img src="http://ipeshd.dpe.go.th/files/member/noImage.jpg" width="100" height="100">';
                                    }
                                    ?>
                                    <input type="hidden" name="MEMBER_AVARTAR_BK" value="<?php echo $row['MEMBER_AVARTAR']; ?>">
                                    <input type="file" name="MEMBER_AVARTAR" id="MEMBER_AVARTAR" value="" class="form-control txt_input">
                                </td>
                                <td colspan="2"><code>*ไฟล์ภาพ (jpg,bmp,gif,png)</code></td>
                            </tr>
                            <tr>
                                <td>รูปบัตรประจำตัวประชาชน</td>
                                <td>
                                    <?php
                                    if ($row['MEMBER_CARD'] != '') {
                                        echo '<img src="http://ipeshd.dpe.go.th/files/member/' . $row['MEMBER_CARD'] . '" width="100" height="100">';
                                    } else {
                                        echo '<img src="http://ipeshd.dpe.go.th/files/member/noImage.jpg" width="100" height="100">';
                                    }
                                    ?>
                                    <input type="hidden" name="MEMBER_CARD_BK" value="<?php echo $row['MEMBER_CARD']; ?>">
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
                                        foreach ($page_var['class'] as $rd) {
                                            if ($row['CLASS_ID'] == $rd['CLASS_ID']) {
                                                echo '<option selected="true" value="' . $rd['CLASS_ID'] . '">' . $rd['CLASS_SUBJECT'] . '</option>';
                                            } else {
                                                echo '<option value="' . $rd['CLASS_ID'] . '">' . $rd['CLASS_SUBJECT'] . '</option>';
                                            }
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
                                        foreach ($page_var['type'] as $rd) {
                                            if ($row['TYPE_ID'] == $rd['TYPE_ID']) {
                                                echo '<option selected="true" value="' . $rd['TYPE_ID'] . '">' . $rd['TYPE_SUBJECT'] . '</option>';
                                            } else {
                                                echo '<option value="' . $rd['TYPE_ID'] . '">' . $rd['TYPE_SUBJECT'] . '</option>';
                                            }
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
                                        <option <?php
                                        if ($row['MEMBER_ADMIN'] == 0) {
                                            echo 'selected="true"';
                                        }
                                        ?> value="0">ไม่ใช่</option>
                                        <option <?php
                                        if ($row['MEMBER_ADMIN'] == 1) {
                                            echo 'selected="true"';
                                        }
                                        ?> value="1">ใช่</option>
                                    </select>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td>เจ้าหน้าที่พลศึกษา</td>
                                <td>
                                    <select name="DPE_OFFICER" id="DPE_OFFICER" class="form-control txt_input">
                                        <option <?php
                                        if ($row['DPE_OFFICER'] == 0) {
                                            echo 'selected="true"';
                                        }
                                        ?> value="0">ไม่เป็น</option>
                                        <option <?php
                                        if ($row['DPE_OFFICER'] == 1) {
                                            echo 'selected="true"';
                                        }
                                        ?> value="1">เป็น</option>
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

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title">ข้อมูลการใช้งานในระบบ</h3>
            </div>
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#gmsHistory" aria-controls="gmsHistory" role="tab" data-toggle="tab">ประวัติการฝึกอบรม</a>
                    </li>
                    <li role="presentation">
                        <a href="#gmsWork" aria-controls="gmsWork" role="tab" data-toggle="tab">ประวัติการปฏิบัติงาน</a>
                    </li>
                    <li role="presentation">
                        <a href="#gmsDirectoryTerm" aria-controls="gmsDirectoryTerm" role="tab" data-toggle="tab">ประวัติวิทยากร</a>
                    </li>
                    <li role="presentation">
                        <a href="#gmsDirectoryWork" aria-controls="gmsDirectoryWork" role="tab" data-toggle="tab">ประวัติการทำงาน</a>
                    </li>
                    <li role="presentation">
                        <a href="#gmsDirectoryEdu" aria-controls="gmsDirectoryEdu" role="tab" data-toggle="tab">ประวัติการศึกษา</a>
                    </li>
                    <li role="presentation">
                        <a href="#gmsDirectoryProduce" aria-controls="gmsDirectoryProduce" role="tab" data-toggle="tab">หัวข้อที่บรรยาย</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="gmsHistory">
                        <iframe class="member-tab-iframe" src="<?php echo site_url(['member', $row['MEMBER_ID'], 'history', 'index']); ?>"></iframe>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="gmsWork">
                        <iframe class="member-tab-iframe" src="<?php echo site_url(['member', $row['MEMBER_ID'], 'work', 'index']); ?>"></iframe>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="gmsDirectoryTerm">
                        <iframe class="member-tab-iframe" src="<?php echo site_url(['member', $row['MEMBER_ID'], 'director_term', 'index']); ?>"></iframe>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="gmsDirectoryWork">
                         <iframe class="member-tab-iframe" src="<?php echo site_url(['member', $row['MEMBER_ID'], 'director_work', 'index']); ?>"></iframe>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="gmsDirectoryEdu">
                        <iframe class="member-tab-iframe" src="<?php echo site_url(['member', $row['MEMBER_ID'], 'director_edu', 'index']); ?>"></iframe>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="gmsDirectoryProduce">
                        <iframe class="member-tab-iframe" src="<?php echo site_url(['member', $row['MEMBER_ID'], 'director_produce', 'index']); ?>"></iframe>
                    </div>
                </div>
            </div><!-- /role="tabpanel" -->
        </div>
    </div>
</div>

<script language="JavaScript">
    $(function () {
        //$("#BIRTH_DATE").inputmask("", {"placeholder": "dd/mm/yyyy"});
        //$("[data-mask]").inputmask();

        // var thaiYear = function (ct) {
        //     var leap = 3;
        //     var dayWeek = ["พฤ.", "ศ.", "ส.", "อา.", "จ.", "อ.", "พ."];
        //     if (ct) {
        //         var yearL = new Date(ct).getFullYear() - 543;
        //         leap = (((yearL % 4 == 0) && (yearL % 100 != 0)) || (yearL % 400 == 0)) ? 2 : 3;
        //         if (leap == 2) {
        //             dayWeek = ["ศ.", "ส.", "อา.", "จ.", "อ.", "พ.", "พฤ."];
        //         }
        //     }
        //     this.setOptions({
        //         i18n: {th: {dayOfWeek: dayWeek}}, dayOfWeekStart: leap,
        //     })
        // };
        // $("#BIRTH_DATE").datepicker({
        //     timepicker: false,
        //     format: 'd/m/Y', // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000              
        //     lang: 'th', // แสดงภาษาไทย  
        //     onChangeMonth: thaiYear,
        //     onShow: thaiYear,
        //     yearOffset: 543, // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ  
        //     closeOnDateSelect: true,
        // });
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


