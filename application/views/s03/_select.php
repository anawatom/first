<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            S03-หลักสูตรและวิทยากร
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">ตารางรหัส</a></li>
            <li class="active">S03-หลักสูตรและวิทยากร</li>
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
                    <?php echo form_open('s03/index', ['method' => 'GET', 'class' => 'form-search']); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <?php echo form_label('ประเภทการฝึกอบรม', 'TYPE_ID'); ?>
                                <?php echo form_dropdown('TYPE_ID',
                                                        isset($gms_type_list)? $gms_type_list: [],
                                                        set_form_value('TYPE_ID', $search_params),
                                                        'id="TYPE_ID" class="form-control"'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('ชนิดกีฬา/ชนิดการฝึกอบรม', 'SPORT_ID'); ?>
                                <?php echo form_dropdown('SPORT_ID',
                                                        isset($gms_sport_list)? $gms_sport_list: ['all' => 'ทั้งหมด'],
                                                        set_form_value('SPORT_ID', $search_params),
                                                        'id="SPORT_ID" class="form-control"'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('ชื่อหลักสูตร', 'COURSE_SUBJECT'); ?>
                                <input type="text"
                                        class="form-control"
                                        id="COURSE_SUBJECT"
                                        name="COURSE_SUBJECT"
                                        placeholder="ชื่อหลักสูตร"
                                        value="<?php echo set_form_value('COURSE_SUBJECT', $search_params); ?>">
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input type="submit" name="search" value="ค้นหา" class="btn btn-primary">
                        </div>
                    <?php echo form_close(); ?>
                </div><!-- /.box -->



            </div><!--/.col (left) -->


        </div>   <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">ข้อมูลหลักสูตรและวิทยากร</h3>
                        <div class="box-tools pull-right">
                            <a href="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/insertCourse" class="btn btn-sm btn-default" title="เพิ่มข้อมูล"><i class="fa fa-plus"></i></a>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered" style="width: 100%">
                            <tr>
                                <th style="width: 2%"></th>
                                <th style="width: 60%">ชื่อหลักสูตร</th>
                                <th style="width: 20%">ชนิดกีฬา/ชนิดการฝึกอบรม</th>
                                <th style="width: 8%">สถานะ</th>
                                <th style="width: 10%">เครื่องมือ</th>
                            </tr>
                            <?php
                            foreach ($course as $row) {
                                $COURSE_ID = $row['COURSE_ID'];
                                $COURSE_SUBJECT = $row['COURSE_SUBJECT'];
                                $SPORT_SUBJECT = $row['SPORT_SUBJECT'];
                                $COURSE_STATUS = $row['COURSE_STATUS'];
                                if ($COURSE_STATUS) {
                                    $COURSE_STATUS = '<span class="label label-success">ใช้งาน</span>';
                                } else {
                                    $COURSE_STATUS = '<span class="label label-danger">ยกเลิก</span>';
                                }
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="COURSE_ID[]" id="<?php echo $COURSE_ID; ?>" value="<?php echo $COURSE_ID; ?>"></td>
                                    <td><?php echo $COURSE_SUBJECT; ?></td>
                                    <td><?php echo $SPORT_SUBJECT; ?></td>
                                    <td><?php echo $COURSE_STATUS; ?></td>
                                    <td>
                                        <a href="<?=base_url() . 'index.php/' . $this->router->class . '/update/' . $row['COURSE_ID'] ?>" class="btn btn-default"><i class="fa fa-edit"></i>'
                                        <a class="btn btn-default" onclick="delCourseByID('<?php echo $row['COURSE_ID']; ?>')"><i class='fa fa-times'></i></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div><!-- /.box-body -->
                    <div class="body-footer">
                      <?php echo $pagination->create_links(); ?>
                    </div><!-- /.body-footer -->
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
<!-- <script src="<?php echo base_url(); ?>js/AdminLTE/dashboard.js" type="text/javascript"></script> -->

<script src="<?php echo base_url('js/main.js'); ?>" type="text/javascript"></script>
<script language="JavaScript">
  jQuery('select[name="TYPE_ID"]').on('change', function(e) {
    var value = $(this).val();

    if (value !== 'all') {
      jQuery.ajax({
          url: '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/searchSportByType/' + value,
          async: false,
          success: function (data) {
              var arrData = new Array();
              arrData = data.split(',');
              jQuery('select[name="SPORT_ID"]').html(arrData[0]);
          },
          error: function (xhr, desc, exceptionobj) {
              alert("ERROR:" + xhr.responseText);
          }
      });
    }
  });
  function delCourseByID(e) {
      if (confirm('ต้องการลบ ID นี้หรือไม่ ?')) {
          window.location.href = '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/delCourseExc/' + e;
      }
  }
</script>
