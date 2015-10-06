<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $this->router->class . '-ทะเบียนประวัติการฝึกอบรม'; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">บันทึกข้อมูล</a></li>
            <li class="active"><?php echo $this->router->class . '-ทะเบียนประวัติการฝึกอบรม'; ?></li>
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
                    <form action="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/select" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="HRS_ID">เลขบัตรประชาชน</label>
                                <input type="text" class="form-control" id="HRS_ID" name="HRS_ID" placeholder="เลขบัตรประชาชน" value="">
                            </div>
                            <div class="form-group">
                                <label for="FIRST_NAME">ชื่อ</label>
                                <input type="text" class="form-control" id="FIRST_NAME" name="FIRST_NAME" placeholder="ชื่อ" value="">
                            </div>
                            <div class="form-group">
                                <label for="LAST_NAME">นามสกุล</label>
                                <input type="text" class="form-control" id="LAST_NAME" name="LAST_NAME" placeholder="นามสกุล" value="">
                            </div>
                            <div class="form-group">
                                <label for="MEMBER_USERNAME">ชื่อ Login</label>
                                <input type="text" class="form-control" id="MEMBER_USERNAME" name="MEMBER_USERNAME" placeholder="ชื่อ Login" value="">
                            </div>
                            <div class="form-group">
                                <label for="TYPE_ID">กลุ่ม</label>
                                <select name="TYPE_ID" id="TYPE_ID" class="form-control">
                                    <option value="" selected="true">กรุณาเลือกข้อมูล</option>
                                    <?php
                                    foreach ($type as $row) {
                                        echo '<option value="' . $row['TYPE_ID'] . '">' . $row['TYPE_SUBJECT'] . '</option>';
                                    }
                                    ?>

                                </select>
                            </div>





                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input type="submit" name="search" value="ค้นหา" class="btn btn-primary">
                        </div>
                    </form>
                </div><!-- /.box -->



            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-solid box-primary">
                    <form method="post" enctype="multipart/form-data" id="form2" name="form2">
                        <div class="box-header">
                            <h3 class="box-title">ข้อมูลหลักสูตรฝึกอบรม</h3>
                            <div class="box-tools pull-right">
                                <a href="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/insert" class="btn btn-sm btn-default" title="เพิ่มข้อมูล"><i class="fa fa-plus"></i></a>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th style="width: 2%"></th>
                                    <th style="width: 18%">เลขบัตรประชาชน</th>
                                    <th style="width: 30%">ชื่อ-นามสกุล</th>
                                    <th style="width: 10%">ว/ด/ป เกิด</th>
                                    <th style="width: 25%">ชื่อLogin</th>
                                    <th style="width: 5%">เพศ</th>
                                    <th style="width: 10%">เครื่องมือ</th>
                                </tr>
                                <?php
                                $i = 0;
                                if ($member != NULL) {
                                    foreach ($member as $row) {
                                        $SEX = 'ไม่ระบุ';
                                        if ($row['SEX'] == 1) {
                                            $SEX = 'ชาย';
                                        } else if ($row['SEX'] == 2) {
                                            $SEX = 'หญิง';
                                        }
                                        $url = base_url() . 'index.php/' . $this->router->class . '/updateMember/' . $row['MEMBER_ID'];
                                        echo '<tr>';
                                        echo '  <td><input type="checkbox" value="' . $row['MEMBER_ID'] . '" name="MEMBER_ID[]" id="chkDel' . $i . '" ></td>';
                                        echo '  <td><a href="' . $url . '">' . $row['HRS_ID'] . '</a></td>';
                                        echo '  <td><a href="' . $url . '">' . $row['FIRST_NAME'] . ' ' . $row['LAST_NAME'] . '</a></td>';
                                        echo '  <td><a href="' . $url . '">' . $this->configAll->_dbToDate($row['BIRTH_DATE']) . '</a></td>';
                                        echo '  <td><a href="' . $url . '">' . $row['MEMBER_USERNAME'] . '</a></td>';
                                        echo '  <td><a href="' . $url . '">' . $SEX . '</a></td>';
                                        echo '  <td><a onclick="delMemberByID(\'' . $row['MEMBER_ID'] . '\',\'' . $row['HRS_ID'] . '\')" class="btn btn-default"><i class="fa fa-minus"></i></a></td>'; //
                                        echo '</tr>';
                                        $i++;
                                    }
                                }
                                ?>
                                <tr>
                                    <td colspan="8">
                                        <div class="box-footer clearfix">
                                            <ul class="pagination pagination-sm no-margin pull-right">
                                                <?php
                                                $config['base_url'] = base_url() . 'index.php/' . $this->router->class . '/select/';
                                                $config['total_rows'] = $count;
                                                $config['per_page'] = 10;

                                                $this->pagination->initialize($config);
                                                echo $this->pagination->create_links();
                                                ?>
                                            </ul>
                                        </div>
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
<script language="JavaScript">
    function delMemberByID(e, HRS_ID) {
        if (confirm('ต้องการลบ ID นี้หรือไม่ ?')) {
            //alert('xxx');
            window.location.href = '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/delMemberExc/' + e + '/' + HRS_ID;
        }
    }
</script>
