<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $this->router->class . '-หลักสูตรฝึกอบรม'; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">บันทึกข้อมูล</a></li>
            <li class="active"><?php echo $this->router->class . '-หลักสูตรฝึกอบรม'; ?></li>
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
                                <label for="TERM_YEAR">ปีงบประมาณ</label>
                                <input type="text" class="form-control" id="TERM_YEAR" name="TERM_YEAR" placeholder="ปีงบประมาณ" value="<?php echo date('Y') + 543; ?>">
                            </div>
                            <div class="form-group">
                                <label for="type_id">ประเภทการฝึกอบรม</label>
                                <select name="TYPE_ID" id="TYPE_ID" class="form-control" onchange="searchSport(this.value)">
                                    <option value="" selected="true">กรุณาเลือกข้อมูล</option>
                                    <?php
                                    foreach ($type as $row) {
                                        echo '<option value="' . $row['TYPE_ID'] . '">' . $row['TYPE_SUBJECT'] . '</option>';
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="SPORT_ID">ชนิดกีฬา/ชนิดการฝึกอบรม</label>
                                <div id="selectSPORT">
                                    <select name="SPORT_ID" id="SPORT_ID" class="form-control">
                                        <option value="" selected="true">กรุณาเลือกข้อมูล</option>
                                        <?php
                                        foreach ($sport as $row) {
                                            echo '<option value="' . $row['SPORT_ID'] . '">' . $row['SPORT_SUBJECT'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
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
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">ข้อมูลหลักสูตรฝึกอบรม</h3>
                        <div class="box-tools pull-right">
                            <a href="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/insert" class="btn btn-sm btn-default" title="เพิ่มข้อมูล"><i class="fa fa-plus"></i></a>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th style="width: 2%"></th>
                                <th style="width: 10%">ปีงบประมาณ</th>
                                <th style="width: 15%">ประเภท</th>
                                <th style="width: 15%">ชนิดกีฬา</th>
                                <th style="width: 25%">หลักสูตร</th>
                                <th style="width: 5%">รุ่น</th>
                                <th style="width: 18%">วันที่อบรม</th>
                                <th style="width: 10%">เครื่องมือ</th>
                            </tr>
                            <?php
                            if ($term != NULL) {
                                foreach ($term as $row) {
                                    echo '<tr>';
                                    echo '  <td><input type="checkbox" value="' . $row['TERM_ID'] . '" name="TERM_ID[]"></td>';
                                    echo '  <td>' . $row['TERM_YEAR'] . '</td>';
                                    echo '  <td>' . $row['TYPE_SUBJECT'] . '</td>';
                                    echo '  <td>' . $row['SPORT_SUBJECT'] . '</td>';
                                    echo '  <td>' . $row['COURSE_SUBJECT'] . '</td>';
                                    echo '  <td>' . $row['TERM_GEN'] . '</td>';
                                    echo '  <td>' . $this->configAll->_dbToDate($row['TERM_TIME_START']) . '-' . $this->configAll->_dbToDate($row['TERM_TIME_END']) . '</td>'; //
                                    echo '  <td>';
                                    echo '      <a href="' . base_url() . 'index.php/' . $this->router->class . '/update/' . $row['TERM_ID'] . '" class="btn btn-default"><i class="fa fa-edit"></i>';
                                    echo '      <a class="btn btn-default" onclick="delTERM(\''.$row['TERM_ID'].'\');"><i class="fa fa-times"></i>';
                                    echo '  </td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                            <tr>
                                <td colspan="8">
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
<script>
                                    function searchSport(e) {
                                        jQuery.ajax({
                                            url: '<?php echo base_url(); ?>index.php/d01/searchSportByType/' + e,
                                            async: false,
                                            success: function (data) {
                                                var arrData = new Array();
                                                arrData = data.split(',');
                                                document.getElementById("selectSPORT").innerHTML = arrData[0];
                                            },
                                            error: function (xhr, desc, exceptionobj) {
                                                alert("ERROR:" + xhr.responseText);
                                            }

                                        });
                                    }
                                    function delTERM(e){
                                        if (confirm('ต้องการลบ ID นี้หรือไม่ ?')) {
                                            window.location.href = '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/delExc/' + e;
                                        }
                                    }
</script>