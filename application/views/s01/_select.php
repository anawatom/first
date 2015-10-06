<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $this->router->class . '-ประเภทการฝึกอบรม'; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">ตารางรหัส</a></li>
            <li class="active"><?php echo $this->router->class . '-ประเภทการฝึกอบรม'; ?></li>
        </ol> 
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">เงื่อนไขการค้นหา</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/selectType" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">รหัสประเภท</label>
                                <input type="text" class="form-control" id="TYPE_CODE" name="TYPE_CODE" placeholder="รหัสประเภท">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">ชื่อประเภท</label>
                                <input type="text" class="form-control" id="TYPE_SUBJECT" name="TYPE_SUBJECT" placeholder="ชื่อประเภท">
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>
                        </div>
                    </form>
                </div><!-- /.box -->



            </div><!--/.col (left) -->


        </div>   <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">ข้อมูลประเภทการฝึกอบรม</h3>
                        <div class="box-tools pull-right">
                            <a href="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/insertType" class="btn btn-sm btn-default" title="เพิ่มข้อมูล"><i class="fa fa-plus"></i></a>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered" style="width: 100%">
                            <tr>
                                <th style="width: 2%"></th>
                                <th style="width: 10%">รหัสประเภท</th>
                                <th style="width: 70%">ประเภทการฝึกอบรม</th>
                                <th style="width: 8%">สถานะ</th>
                                <th style="width: 10%">เครื่องมือ</th>
                            </tr>
                            <?php
                            foreach ($type as $row) {
                                $TYPE_ID = $row['TYPE_ID'];
                                $TYPE_CODE = $row['TYPE_CODE'];
                                $TYPE_SUBJECT = $row['TYPE_SUBJECT'];
                                $TYPE_STATUS = $row['TYPE_STATUS'];
                                if ($TYPE_STATUS) {
                                    $TYPE_STATUS = '<span class="label label-success">ใช้งาน</span>';
                                } else {
                                    $TYPE_STATUS = '<span class="label label-danger">ยกเลิก</span>';
                                }
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="TYPE_ID[]" id="<?php echo $TYPE_ID; ?>" value="<?php echo $TYPE_ID; ?>"></td>
                                    <td><?php echo $TYPE_CODE; ?></td>
                                    <td><?php echo $TYPE_SUBJECT; ?></td>
                                    <td><?php echo $TYPE_STATUS; ?></td>
                                    <td>
                                        <a  class="btn btn-default" onclick="delTypeByID('<?php echo $row['TYPE_ID']; ?>')"><i class='fa fa-times'></i></a></td>
                                </tr>
                                <?php
                            }
                            ?>

                        </table>
                    </div><!-- /.box-body -->
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

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>js/AdminLTE/dashboard.js" type="text/javascript"></script> 
<script language="JavaScript">
    function delTypeByID(e) {
        if (confirm('ต้องการลบ ID นี้หรือไม่ ?')) {
            window.location.href = '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/delTypeExc/' + e;
        }
    }
</script>