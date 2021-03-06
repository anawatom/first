<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $this->router->class . '-อนุมัติ/ สละสิทธิ์'; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">บันทึกข้อมูล</a></li>
            <li class="active"><?php echo $this->router->class . '-อนุมัติ/ สละสิทธิ์'; ?></li>
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
                                <!--                                <label for="TERM_YEAR">ปีงบประมาณ</label>
                                                                <input type="text" class="form-control" id="TERM_YEAR" name="TERM_YEAR" placeholder="ปีงบประมาณ" value="<?php echo date('Y') + 543; ?>">-->
                                <table style="width: 100%">
                                    <tr>
                                        <td><label for="TERM_YEAR">ปีงบประมาณ</label></td>
                                        <td><input type="text"
                                              class="form-control"
                                              id="TERM_YEAR"
                                              name="TERM_YEAR"
                                              placeholder="ปีงบประมาณ"
                                              value="<?php echo $this->session->userdata('TERM_YEAR'); ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="type_id">ประเภทการฝึกอบรม</label></td>
                                        <td>
                                          <?php
                                            $search_type_id = $this->session->userdata('TYPE_ID');
                                            echo form_dropdown('TYPE_ID',
                                                              isset($gms_type_list)? $gms_type_list: ['all' => 'ทั้งหมด'],
                                                              ( empty($search_type_id) )? 'all': $search_type_id,
                                                              'id="TYPE_ID" class="form-control"');
                                          ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="SPORT_ID">ชนิดกีฬา/ชนิดการฝึกอบรม</label></td>
                                        <td>
                                          <?php
                                            $search_sport_id = $this->session->userdata('SPORT_ID');
                                            echo form_dropdown('SPORT_ID',
                                                            isset($gms_sport_list)? $gms_sport_list: ['all' => 'ทั้งหมด'],
                                                            ( empty($search_sport_id) )? 'all': $search_sport_id,
                                                            'id="sport_ID" class="form-control"');
                                          ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="SPORT_ID">ชื่อหลักสูตร</label></td>
                                        <td>
                                          <?php
                                            $search_course_id = $this->session->userdata('COURSE_ID');
                                            echo form_dropdown('COURSE_ID',
                                                            isset($gms_course_list)? $gms_course_list: ['all' => 'ทั้งหมด'],
                                                            ( empty($search_course_id) )? 'all': $search_course_id,
                                                            'id="COURSE_ID" class="form-control"');
                                          ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="TERM_GEN">รุ่นที่</label></td>
                                        <td><input type="text"
                                                  class="form-control"
                                                  id="TERM_GEN"
                                                  name="TERM_GEN"
                                                  placeholder="รุ่นที่"
                                                  value="<?php echo $this->session->userdata('TERM_GEN'); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="HISTORY_STATUS_REGIS">สถานะ</label></td>
                                        <td>
                                          <?php echo form_dropdown('HISTORY_STATUS_REGIS',
                                                                    $HISTORY_STATUS_REGIS_WITH_ALL,
                                                                    $this->session->userdata('HISTORY_STATUS_REGIS'),
                                                                    'id="HISTORY_STATUS_REGIS" class="form-control"'); ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!--                            <div class="form-group">
                                                            <label for="type_id">ประเภทการฝึกอบรม</label>
                                                            <select name="TYPE_ID" id="TYPE_ID" class="form-control" onchange="searchSport(this.value)">
                                                                <option value="" selected="true">กรุณาเลือกข้อมูล</option>
                            <?php
//                            foreach ($type as $row) {
//                                echo '<option value="' . $row['TYPE_ID'] . '">' . $row['TYPE_SUBJECT'] . '</option>';
//                            }
                            ?>

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="SPORT_ID">ชนิดกีฬา/ชนิดการฝึกอบรม</label>
                                                            <div id="selectSPORT">
                                                                <select name="SPORT_ID" id="SPORT_ID" class="form-control" onchange="searchCourse(this.value)">
                                                                    <option value="" selected="true"></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="SPORT_ID">ชื่อหลักสูตร</label>
                                                            <div id="selectCourse">
                                                                <select name="COURSE_ID" id="COURSE_ID" class="form-control">
                                                                    <option value="" selected="true"></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="TERM_GEN">รุ่นที่</label>
                                                            <input type="text" class="form-control" id="TERM_GEN" name="TERM_GEN" placeholder="รุ่นที่" value="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="HISTORY_STATUS_REGIS">สถานะ</label>
                                                            <div id="selectCourse">
                                                                <select name="HISTORY_STATUS_REGIS" id="HISTORY_STATUS_REGIS" class="form-control">
                                                                    <option value="" selected="true"></option>
                                                                    <option value="0" >รอพิจารณา</option>
                                                                    <option value="1" >อนุมัติ</option>
                                                                    <option value="2" >ไม่ผ่านเกณฑ์</option>
                                                                    <option value="3" >สละสิทธิ์</option>
                                                                </select>
                                                            </div>
                                                        </div>-->

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
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">อนุมัติ/ สละสิทธิ์การสมัครเข้าฝึกอบรม</h3>
                        <!--<div class="box-tools pull-right">
                            <a href="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/insert" class="btn btn-sm btn-default" title="เพิ่มข้อมูล"><i class="fa fa-plus"></i></a>
                        </div>-->
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th style="width: 10%">ปีงบประมาณ</th>
                                <th style="width: 35%">ชื่อหลักสูตร</th>
                                <th style="width: 5%">รุ่น</th>
                                <th style="width: 30%">ชื่อ - นามสกุล</th>
                                <th style="width: 10%">สถานะ</th>
                                <th style="width: 5%" >รุ่นที่</th>
                                <th style="width: 5%" >เครื่องมือ</th>

                            </tr>
                            <?php
                            foreach ($history as $row) {
                                $url = base_url() . 'index.php/' . $this->router->class . '/updateStatus/' . $row['HISTORY_ID'];
                                if ($row['XX'] == 'อนุมัติ') {
                                    $classStatus = "label label-success";
                                } else if ($row['XX'] == 'สละสิทธิ์') {
                                    $classStatus = "label label-danger";
                                } else {
                                    $classStatus = "label label-warning";
                                }

                                echo '<tr>';
                                echo '  <td><a href="' . $url . '">' . $row['TERM_YEAR'] . '</a></td>';
                                echo '  <td><a href="' . $url . '">' . $row['COURSE_SUBJECT'] . '</a></td>';
                                echo '  <td><a href="' . $url . '">' . $row['TERM_GEN'] . '</a></td>';
                                echo '  <td><a data-toggle="modal" data-target=".bs-example-modal-lg" style="cursor: pointer" onclick="selectMember(\'' . $row['MEMBER_ID'] . '\');" >' . $row['FIRST_NAME'] . ' ' . $row['LAST_NAME'] . '</a></td>';
                                echo '  <td><span class="' . $classStatus . '">' . $row['XX'] . '</span></td>';
                                echo '  <td>' . $row['TERM_GEN'] . '</td>';
                                echo '  <td>';
                                echo '      <a href="' . $url . '" class="btn btn-default"><i class="fa fa-edit"></i> อนุมัติ';
                                echo '  </td>';
                                echo '</tr>';
                            }
                            ?>
                            <tr>
                                <td colspan="7">
                                    <?php
                                    $config['base_url'] = base_url() . 'index.php/' . $this->router->class . '/select/';
                                    $config['total_rows'] = $count;
                                    $config['per_page'] = 10;

                                    $this->pagination->initialize($config);
                                    echo $this->pagination->create_links();
                                    ?>
                                </td>
                            </tr>
                        </table>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

            <!-- Large modal -->
            <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>-->

            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="width: 70%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel">รายละเอียด ข้อมูลส่วนตัว</h4>
                        </div>
                        <div class="modal-body">
                            <div id="dataMember">  <!-- แสดงรายละเอียดของ Member -->

                            </div>
                        </div>
                    </div>
                </div>
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
<script type="text/javascript">
  jQuery(function() {
    jQuery('select[name="TYPE_ID"]').on('change', function(e) {
      searchSport(jQuery(this).val());
    });

    jQuery('select[name="SPORT_ID"]').on('change', function(e) {
      searchCourse(jQuery(this).val());
    });
  });
  function selectMember(e) {
      jQuery.ajax({
          url: '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/searchMember/' + e,
          async: false,
          success: function (data) {
              document.getElementById("dataMember").innerHTML = data;
          },
          error: function (xhr, desc, exceptionobj) {
              alert("ERROR:" + xhr.responseText);
          }

      });
  }
  function searchSport(e) {
    if (e !== 'all') {
      jQuery.ajax({
          url: '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/searchSportByType/' + e,
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
  }

  function searchCourse(e) {
    if (e !== 'all') {
      jQuery.ajax({
          url: '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/searchCourseBySport/' + e,
          async: false,
          success: function (data) {
              // alert(data);
              var arrData = new Array();
              arrData = data.split(',');
              jQuery('select[name="COURSE_ID"]').html(arrData[0]);
          },
          error: function (xhr, desc, exceptionobj) {
              alert("ERROR:" + xhr.responseText);
          }

      });
    }
  }
</script>
