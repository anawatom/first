<!-- Right side column. Contains the navbar and content of the page -->
<?php
foreach ($term as $rd) {
    
}
?>
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $this->router->class . '-รายละเอียดหลักสูตรที่จัดฝึกอบรม'; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">บันทึกข้อมูล</a></li>
            <li class="active"><a href="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>"><?php echo $this->router->class . '-รายละเอียดหลักสูตรที่จัดฝึกอบรม'; ?></a></li>
        </ol> 
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">เงื่อนไขการค้นหา</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <table style="width: 100%">
                                    <tr>
                                        <td><label for="HRS_ID">เลขรหัสประชาชน</label></td>
                                        <td><input type="text" class="form-control" id="HRS_ID" name="HRS_ID" placeholder="เลขรหัสประชาชน" value=""></td>
                                    </tr>
                                    <tr>
                                        <td><label for="FIRST_NAME">ชื่อ</label></td>
                                        <td><input type="text" class="form-control" id="FIRST_NAME" name="FIRST_NAME" placeholder="ชื่อ" value=""></td>
                                    </tr>
                                    <tr>
                                        <td><label for="LAST_NAME">นามสกุล</label></td>
                                        <td><input type="text" class="form-control" id="LAST_NAME" name="LAST_NAME" placeholder="นามสกุล" value=""></td>
                                    </tr>
                                    <tr>
                                        <td><label></label></td>
                                        <td></td>
                                    </tr>
                                </table>
                                <div class="box-footer">
                                    <input type="submit" name="search" value="ค้นหา" class="btn btn-primary">
                                    <a href="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/updateHistoryNo" class="btn btn-primary">รีเซ็ต</a>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                </div><!-- /.box -->



            </div><!--/.col (left) -->

            <div class="col-md-6">
                <table>
                    <tr>
                        <td colspan="2"><a href="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>" class="btn btn-success btn-sm" style="width: 100%" >กลับสู่เมนูหลัก</a></td>

                    </tr>
                    <tr>
                        <td><a href="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/selectTerm/<?php echo $TERM_ID; ?>" class="btn btn-success btn-sm" style="width: 100%" >ผู้เข้าฝึกอบรม</a></td>
                        <td><a href="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/updateHistoryNo/<?php echo $TERM_ID; ?>" class="btn btn-success btn-sm" style="width: 100%" >ประกาศผลการฝึกอบรม</a></td>
                    </tr>
                    <tr>
                        <td><a <a href="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/updatePositionID/<?php echo $TERM_ID; ?>"  class="btn btn-success btn-sm" style="width: 100%" >กำหนดประธานรุ่น</a></td>
                        <td></td>
                    </tr>
<!--                    <tr>
                        <td><a  class="btn btn-success btn-sm" style="width: 100%" >กำหนดประธานรุ่น</a></td>
                        <td><a  class="btn btn-success btn-sm" style="width: 100%" >ทำเนียบรุ่น (PDF)</a></td>
                    </tr>
                    <tr>
                        <td><a  class="btn btn-success btn-sm" style="width: 100%">รายชื่อผ่านการอบรม (XLS)</a></td>
                        <td><a  class="btn btn-success btn-sm" style="width: 100%" >รายชื่อสมาชิกที่เข้าาร่วม (XLS)</a></td>
                    </tr>-->
                </table>






            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-solid box-primary">
                    <form action="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/updateHistoryNoExc" method="post" enctype="multipart/form-data" id="form2" name="form2">
                        <div class="box-header">
                            <h3 class="box-title">ประกาศผลการฝึกอบรม (เฉพาะผู้ที่ผ่านการอนุมัติ)</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-sm btn-default" title="บันทึกข้อมูล">บันทึกข้อมูล</button>
                                <input type="hidden" name="numL" value="<?php echo $numL ?>">

                            </div>
                        </div><!-- /.box-header -->

                        <div class="box-body table-responsive no-padding">
                            <table id="example1" class="table table-bordered table-hover">
                                <tr>
                                    <th style="width: 15%">เลขรหัสประชาชน</th>
                                    <th style="width: 20%">ชื่อ-นามสกุล</th>

                                    <th style="width: 10%">สถานะอนุมัติ</th>
                                    <th style="width: 45%">สถานะฝึกอบรม</th>
                                    <th style="width: 10%">เลขที่วุฒิบัตร</th>
                                </tr>
                                <?php
                                $i = 0;
                                if ($history != NULL) {
                                    foreach ($history as $row) {
                                        if ($row['XX'] == 'อนุมัติ') {
                                            $classStatus = "label label-success";
                                        } else if ($row['XX'] == 'สละสิทธิ์') {
                                            $classStatus = "label label-danger";
                                        } else {
                                            $classStatus = "label label-warning";
                                        }

                                        if ($row['HISTORY_STATUS_APPROVE'] == '0') {
                                            $radio1 = "checked";
                                            $radio2 = "";
                                            $radio3 = "";
                                            $radio4 = "";
                                        } else if ($row['HISTORY_STATUS_APPROVE'] == '2') {
                                            $radio1 = "";
                                            $radio2 = "checked";
                                            $radio3 = "";
                                            $radio4 = "";
                                        } else if ($row['HISTORY_STATUS_APPROVE'] == '1') {
                                            $radio1 = "";
                                            $radio2 = "";
                                            $radio3 = "checked";
                                            $radio4 = "";
                                        } else {
                                            $radio1 = "";
                                            $radio2 = "";
                                            $radio3 = "";
                                            $radio4 = "checked";
                                        }
                                        $i++;
                                        echo '<tr>';
                                        echo '  <td>' . $row['HRS_ID'] . '</td>';
                                        echo '  <td>' . $row['FIRST_NAME'] . ' ' . $row['LAST_NAME'] . '</td>';

                                        echo '  <td><span class="' . $classStatus . '">' . $row['XX'] . '</span></td>';
                                        echo '  <td>';
                                        echo '      <input type="hidden" name="HISTORY_ID[]" value="' . $row['HISTORY_ID'] . '">';
                                        echo '      <input type="radio" ' . $radio4 . ' name="HISTORY_STATUS_APPROVE_' . $row['HISTORY_ID'] . '" value=""> รอยืนยัน';
                                        echo '      <input type="radio" ' . $radio1 . ' name="HISTORY_STATUS_APPROVE_' . $row['HISTORY_ID'] . '" value="0"> ไม่เข้าอบรม';
                                        echo '      <input type="radio" ' . $radio2 . ' name="HISTORY_STATUS_APPROVE_' . $row['HISTORY_ID'] . '" value="2"> ไม่ผ่าน';
                                        echo '      <input type="radio" ' . $radio3 . ' name="HISTORY_STATUS_APPROVE_' . $row['HISTORY_ID'] . '" value="1"> ผ่านหลักสูตรแล้ว';
                                        echo '  </td>';
                                        echo '  <td>';
                                        echo '    <input type="text" class="form-control" id="HISTORY_NO_' . $row['HISTORY_ID'] . '" name="HISTORY_NO_' . $row['HISTORY_ID'] . '" value="' . $row['HISTORY_NO'] . '">  ';
                                        echo '  </td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>
                                <tr>
                                    <td colspan="9">
                                        <div class="box-footer clearfix">
                                            <ul class="pagination pagination-sm no-margin pull-right">
                                                <?php
                                                $config['base_url'] = base_url() . 'index.php/' . $this->router->class . '/updateHistoryNo/';
                                                $config['total_rows'] = $count;
                                                $config['per_page'] = 10;

                                                $this->pagination->initialize($config);
                                                echo $this->pagination->create_links();
                                                ?>
                                            </ul>
                                        </div>
                                        <input type="hidden" name="hdnCount" id="hdnCount" value="<?php echo $i; ?>">
                                        <div id="selectCourse"></div>
                                    </td>
                                </tr>
                            </table>
                        </div><!-- /.box-body -->
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
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

<script src="<?php echo base_url(); ?>js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script>
    $(document).ready(function () {
        //$("#example1").dataTable();

    })
</script>
