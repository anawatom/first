<?php
foreach ($history as $row) {
    $HISTORY_STATUS_REGIS = $row['HISTORY_STATUS_REGIS'];
    $HISTORY_REMARK = '';
    if ($HISTORY_STATUS_REGIS == 0) {
        $select1 = 'selected="true"';
        $select2 = '';
        $select3 = '';
        $select4 = '';
    } else if ($HISTORY_STATUS_REGIS == 1) {
        $select1 = '';
        $select2 = 'selected="true"';
        $select3 = '';
        $select4 = '';
        $HISTORY_REMARK = 'แจ้งจากระบบ : เจ้าหน้าที่ได้ตรวจสอบข้อมูลแล้ว';
        $HISTORY_REMARK .= ' คุณได้ผ่านการอนุมัติเข้ารับการอบรมหลักสูตร '.$row['COURSE_SUBJECT'].' รุ่นที่ '.$row['TERM_GEN'].' ค่ะ';
        $HISTORY_REMARK .= ' วันที่อบรมคือ  '.$this->configAll->_dbToDate($row['TERM_TIME_START']).' ถึง '.$this->configAll->_dbToDate($row['TERM_TIME_END']).' ';
        $HISTORY_REMARK .= ' กรุณามารายงานตัวภายในวันที่กำหนดด้วยค่ะ';
        $HISTORY_REMARK .= ' ตรวจสอบรายละเอียดการอบรมได้ที่นี่';
        $HISTORY_REMARK = str_replace("\n", "<br>\n", "$HISTORY_REMARK"); 
    } else if ($HISTORY_STATUS_REGIS == 2) {
        $select1 = '';
        $select2 = '';
        $select3 = 'selected="true"';
        $select4 = '';
    } else if ($HISTORY_STATUS_REGIS == 3) {
        $select1 = '';
        $select2 = '';
        $select3 = '';
        $select4 = 'selected="true"';
    } else {
        $select1 = 'selected="true"';
        $select2 = '';
        $select3 = '';
        $select4 = '';
    }
}
?>
<aside class="right-side"> 
    <section class="content-header">
        <h1>
            <?php echo $this->router->class . '-อนุมัติ/ สละสิทธิ์การสมัครเข้าฝึกอบรม'; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">ตารางรหัส</a></li>
            <li class="active"><?php echo $this->router->class . '-เพิ่มหลักสูตรฝึกอบรม'; ?></li>
        </ol> 
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">เพิ่ม/แก้ไข-อนุมัติ/ สละสิทธิ์การสมัครเข้าฝึกอบรม</h3>
                    </div>

                    <form action="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/updateStatusExc" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <table style="width: 100%" >
                                <tr>
                                    <td style="width: 30%; height: 30px;"><b>ปีงบประมาณ :</b></td>
                                    <td style="width: 70%">
                                        <input type="hidden" name="HISTORY_ID" value="<?php echo $row['HISTORY_ID']; ?>">
                                        <input type="hidden" name="MEMBER_ID" value="<?php echo $row['MEMBER_ID']; ?>">
                                        <?php echo $row['TERM_YEAR']; ?>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height: 30px;"><b>ชนิดกีฬา/ชนิดการฝึกอบรม :</b></td>
                                    <td><?php echo $row['SPORT_SUBJECT']; ?></td>
                                </tr>
                                <tr>
                                    <td style="height: 30px;"><b>ชื่อหลักสูตร :</b></td>
                                    <td><?php echo $row['COURSE_SUBJECT']; ?> รุ่นที่ <?php echo $row['TERM_GEN']; ?></td>
                                </tr>
                                <tr>
                                    <td style="height: 30px;"><b>ชื่อ - นามสกุล :</b></td>
                                    <td><?php echo $row['FIRST_NAME']; ?> <?php echo $row['LAST_NAME']; ?></td>
                                </tr>
                                <tr>
                                    <td style=" height: 30px;"><b>สถานะ* :</b></td>
                                    <td>
                                        <select class="form-control" name="HISTORY_STATUS_REGIS" id="HISTORY_STATUS_REGIS" onchange="selectCancel(this.value)">
                                            <option value="0" <?php echo $select1; ?> >รอพิจารณา</option>
                                            <option value="1" <?php echo $select2; ?> >อนุมัติ</option>
                                            <option value="2" <?php echo $select3; ?> >ไม่ผ่านเกณฑ์</option>
                                            <option value="3" <?php echo $select4; ?> >สละสิทธิ์</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height: 30px;"><b>เหตุผลการไม่อนุมัติ</b></td>
                                    <td>
                                        <select class="form-control" name="CANCEL_ID" id="CANCEL_ID">
                                            <?php
                                            if (($row['CANCEL_ID'] == '') and ( $row['HISTORY_STATUS_REGIS'] < 2)) {
                                                echo '<option value="" selected="true"></option>';
                                            } else {
                                                echo '<option value=""></option>';
                                            }
                                            $i = 0;
                                            foreach ($cancel as $rd) {
                                                if ($row['CANCEL_ID'] == $rd['CANCEL_ID']) {
                                                    echo '<option value="' . $rd['CANCEL_ID'] . '" selected="true" >' . $rd['CANCEL_SUBJECT'] . '</option>';
                                                } else {
                                                    echo '<option value="' . $rd['CANCEL_ID'] . '" >' . $rd['CANCEL_SUBJECT'] . '</option>';
                                                }
                                                $i++;
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height: 30px;"><b>สถานะแจ้งเตือน :</b></td>
                                    <td>
                                        <select name="chkAlert" id="chkAlert" class="form-control">
                                            <option value="1">เปิดการแจ้งเตือน</option>
                                            <option value="0">ปิด</option>>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height: 30px;"><b>ข้อความแจ้งเตือน :</b></td>
                                    <td>
                                        <textarea name="HISTORY_REMARK" id="HISTORY_REMARK" rows="8" style="width: 100%"><?php echo $HISTORY_REMARK; ?></textarea>
                                    </td>
                                </tr>
                            </table>
                            <div class="box-footer">
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
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>js/bootstrap.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.th.js" charset="UTF-8"></script>

<script language="JavaScript">
                                            function selectCancel(e) {
                                                if (e == 1) {
                                                    var HISTORY_REMARK = 'แจ้งจากระบบ : เจ้าหน้าที่ได้ตรวจสอบข้อมูลแล้ว \r';
                                                    HISTORY_REMARK += 'คุณได้ผ่านการอนุมัติเข้ารับการอบรมหลักสูตร <?php echo $row['COURSE_SUBJECT']; ?> รุ่นที่ <?php echo $row['TERM_GEN']; ?> ค่ะ \r';
                                                    HISTORY_REMARK += 'วันที่อบรมคือ  <?php echo $this->configAll->_dbToDate($row['TERM_TIME_START']); ?> ถึง <?php echo $this->configAll->_dbToDate($row['TERM_TIME_END']); ?> \r';
                                                    HISTORY_REMARK += 'กรุณามารายงานตัวภายในวันที่กำหนดด้วยค่ะ \r';
                                                    HISTORY_REMARK += 'ตรวจสอบรายละเอียดการอบรมได้ที่นี่';
                                                    document.getElementById('HISTORY_REMARK').value = HISTORY_REMARK
                                                } else {
                                                    document.getElementById('HISTORY_REMARK').value = '';
                                                }
                                            }


</script>

