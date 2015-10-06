<?php
foreach ($member as $row) {
    
}
?>
<style>
    table tr{
        height: 20px;
    }
    .txt_input{
        width: 90%
    }
</style>
<table style="width: 100%">
    <tr>
        <td colspan="4" style=" height: 30px; background: #f5f5f5"><b>รายละเอียด ข้อมูลส่วนตัว</b></td>
    </tr>
    <tr>
        <td><label>เลขประจำตัวประชาชน </label></td>
        <td><input readonly="true" type="text" value="<?php echo $row['HRS_ID']; ?>" class="form-control txt_input"></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td><label>Username </label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['MEMBER_USERNAME']; ?>" class="form-control txt_input"></td>
        <td><label>Password </label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['MEMBER_PASSWORD']; ?>" class="form-control txt_input"></td>
    </tr>
    <tr>
        <td><label>ชื่อ </label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['FIRST_NAME']; ?>" class="form-control txt_input"></td>
        <td><label>นามสกุล </label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['LAST_NAME']; ?>" class="form-control txt_input"></td>
    </tr>
    <tr>
        <td><label>ชื่อ(ภาษาอังกฤษ) </label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['FIRST_NAME_ENG']; ?>" class="form-control txt_input"></td>
        <td><label>นามสกุล(ภาษาอังกฤษ) </label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['LAST_NAME_ENG']; ?>" class="form-control txt_input"></td>
    </tr>
    <tr>
        <td><label>เพศ </label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['SEX'] == 1 ? 'ชาย' : 'หญิง'; ?>" class="form-control txt_input"></td>
        <td><label>อีเมล </label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['E_MAIL']; ?>" class="form-control txt_input"></td>
    </tr>
    <tr>
        <td><label>วัน/เดือน/ปี เกิด </label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['BIRTH_DATE'] != '' ? $this->configAll->_dbToDate($row['BIRTH_DATE']) : ''; ?>" class="form-control txt_input"></td>
        <td><label>ศาสนา </label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['RELIGION']; ?>" class="form-control txt_input"></td>
    </tr>
    <tr>
        <td><label>อาชีพ </label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['JOB_SUBJECT']; ?>" class="form-control txt_input"></td>
        <td><label>ตำแหน่ง </label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['JOB_POSITION']; ?>" class="form-control txt_input"></td>
    </tr>
    <tr>
        <td><label>น้ำหนัก (กิโลกรัม) </label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['WEIGHT']; ?>" class="form-control txt_input"></td>
        <td><label>ส่วนสูง (เซนติเมตร) </label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['TALL']; ?>" class="form-control txt_input"></td>
    </tr>
    <tr>
        <td colspan="4" style=" height: 30px; ">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="4" style=" height: 30px; background: #f5f5f5"><b>รายละเอียด ที่อยู่ปัจจุบัน</b></td>
    </tr>
    <tr>
        <td><label>ที่อยู่ </label></td>
        <td colspan="3">
            เลขที่ <?php echo $row['HOME_ADDR']; ?>&nbsp;
            หมู่บ้าน <?php echo $row['HOME_ADDR_NAME']; ?>&nbsp;
            หมู่ <?php echo $row['HOME_MOO']; ?>&nbsp;
            ซอย <?php echo $row['HOME_SOI']; ?>&nbsp;
            ถนน <?php echo $row['HOME_ROAD']; ?>&nbsp;<br>
            ตำบล <?php echo $row['HOME_TUMBOL']; ?>&nbsp;
            อำเภอ <?php
            if ($row['HOME_PROV'] != '') {
                $this->amphur->PROV_ID = $row['HOME_PROV'];
                $amphur = $this->amphur->_getAllAmphur();
                foreach ($amphur as $rd) {
                    if ($rd['AMPHUR_ID'] == $row['HOME_AMPHUR']) {
                        echo $rd['AMPHUR_NAME'];
                    }
                }
            }
            ?>&nbsp;
            จังหวัด <?php
            foreach ($province as $rd) {
                if ($rd['PROV_ID'] == $row['HOME_PROV']) {
                    echo $rd['PROV_NAME'];
                }
            }
            ?>
        </td>
    </tr>
    <tr>
        <td><label>โทรศัพท์</label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['HOME_TEL']; ?>" class="form-control txt_input"></td>
        <td><label>โทรสาร </label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['HOME_FAX']; ?>" class="form-control txt_input"></td>
    </tr>
    <tr>
        <td><label>หน่วยงาน</label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['CON_NAME']; ?>" class="form-control txt_input"></td>
        <td><label>สถานที่ทำงาน </label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['CON_ADDR_NAME']; ?>" class="form-control txt_input"></td>
    </tr>
    <tr>
        <td><label>ที่อยู่ที่ทำงาน </label></td>
        <td colspan="3">
            เลขที่ <?php echo $row['CON_ADDR']; ?>&nbsp;
            หมู่ <?php echo $row['CON_MOO']; ?>&nbsp;
            ซอย <?php echo $row['CON_SOI']; ?>&nbsp;
            ถนน <?php echo $row['CON_ROAD']; ?>&nbsp;<br>
            ตำบล <?php echo $row['CON_TUMBOL']; ?>&nbsp;
            อำเภอ <?php
            if ($row['HOME_PROV'] != '') {
                $this->amphur->PROV_ID = $row['CON_PROV'];
                $amphur = $this->amphur->_getAllAmphur();
                foreach ($amphur as $rd) {
                    if ($rd['AMPHUR_ID'] == $row['CON_AMPHUR']) {
                        echo $rd['AMPHUR_NAME'];
                    }
                }
            }
            ?>&nbsp;
            จังหวัด <?php
            foreach ($province as $rd) {
                if ($rd['PROV_ID'] == $row['CON_PROV']) {
                    echo $rd['PROV_NAME'];
                }
            }
            ?>
        </td>
    </tr>
    <tr>
        <td><label>โทรศัพท์</label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['CON_TEL']; ?>" class="form-control txt_input"></td>
        <td><label>โทรสาร </label></td>
        <td><input readonly="true" type="text"  value="<?php echo $row['CON_FAX']; ?>" class="form-control txt_input"></td>
    </tr>
    <tr>
        <td colspan="4" style=" height: 30px; ">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="4" style=" height: 30px; background: #f5f5f5"><b>รายละเอียด ภาพถ่าย</b></td>
    </tr>
    <tr>
        <td><label>ภาพแสดงในเวบบอร์ด</label></td>
        <td>
            <?php
            if ($row['MEMBER_IMAGE'] != '') {
                echo '<img src="http://ipeshd.dpe.go.th/files/member/' . $row['MEMBER_IMAGE'] . '" width="100" height="100">';
            }else{
                echo '<img src="http://ipeshd.dpe.go.th/files/member/noImage.jpg" width="100" height="100">';
            }
            ?>
        </td>
        <td><label>ภาพถ่ายหน้าตรง</label><br><code>(เพื่อใช้ในการติดบัตร)</code></td>
        <td>
            <?php
            if ($row['MEMBER_AVARTAR'] != '') {
                echo '<img src="http://ipeshd.dpe.go.th/files/member/' . $row['MEMBER_AVARTAR'] . '" width="100" height="100">';
            }else{
                echo '<img src="http://ipeshd.dpe.go.th/files/member/noImage.jpg" width="100" height="100">';
            }
            ?>
        </td>
    </tr>
    <tr>
        <td><label>รูปบัตรประจำตัวประชาชน</label></td>
        <td colspan="3">
            <?php
            if ($row['MEMBER_CARD'] != '') {
                echo '<img src="http://ipeshd.dpe.go.th/files/member/' . $row['MEMBER_CARD'] . '" width="100" height="100">';
            }else{
                echo '<img src="http://ipeshd.dpe.go.th/files/member/noImage.jpg" width="100" height="100">';
            }
            ?>
        </td>
    </tr>
</table>