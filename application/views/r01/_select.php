<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $this->router->class . '-จำนวนผู้ผ่านการฝึกอบรมในแต่ละประเภท'; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">บันทึกข้อมูล</a></li>
            <li class="active"><?php echo $this->router->class . '-จำนวนผู้ผ่านการฝึกอบรมในแต่ละประเภท'; ?></li>
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
                    <form action="http://report.dpe.go.th" name="FormClearReports" method="post" target="_blank">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="prompt0">ปีงบประมาณ</label>
                                <input type="text" class="form-control" id="prompt0" name="prompt0" placeholder="ปีงบประมาณ" value="<?php echo date('Y') + 543; ?>">
                            </div>
                            <div class="form-group">
                                <label for="prompt1">ประเภทการฝึกอบรม</label>
                                <select name="prompt1" id="prompt1" class="form-control">
                                    <?php
                                    foreach ($type as $row) {
                                        echo '<option value="' . $row['TYPE_ID'] . '">' . $row['TYPE_SUBJECT'] . '</option>';
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type_id">ประเภทของรายงาน</label>
                                <select name="report" id="report" class="form-control">
                                    <option value="file:/C:/Program Files (x86)/i-net Clear Reports/startpage/Report_train_history7.pdf" selected="true">PDF</option>
                                    <option value="file:/C:/Program Files (x86)/i-net Clear Reports/startpage/Report_train_history7.xls" >EXCEL</option>
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


