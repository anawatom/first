<!-- Right side column. Contains the navbar and content of the page -->
<!-- bootstrap 3.0.2 -->
<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="<?php echo base_url(); ?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo base_url(); ?>css/morris/morris.css" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url(); ?>css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<!-- fullCalendar -->
<link href="<?php echo base_url(); ?>css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url(); ?>css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="<?php echo base_url(); ?>css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="<?php echo base_url(); ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
<aside class="right-side">                
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-solid box-primary">
                    <!-- form start 
                    <form method="post" id="select-director-form" action="<?=base_url() . 'index.php/' . $this->router->class . '/update/118'?>" > -->
                    <form method="post">    
                        <div class="box-body">
                            <div class="form-group">
                                <table class="table table-hover">
                                    <tr>
                                        <td>เลขบัตรประชาชน</td>
                                        <td><input type="text" class="form-control" id="HRS_ID" name="HRS_ID" placeholder="เลขบัตรประชาชน" value=""></td>
                                        <td>ชื่อ</td>
                                        <td><input type="text" class="form-control" id="FIRST_NAME" name="FIRST_NAME" placeholder="ชื่อ" value=""></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" name="search" value="ค้นหา" class="btn btn-primary"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                </div><!-- /.box -->



            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-solid box-primary">
                    <form method="post" enctype="multipart/form-data" id="form2" name="form2">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th style="width: 100%">ชื่อ-นามสกุล</th>
                                </tr>
                                <?php
                                $i = 0;
                                if ($member != NULL) {
                                    foreach ($member as $row) {
                                        $url = base_url() . 'index.php/' . $this->router->class . '/updateMember/' . $row['MEMBER_ID'];
                                        echo '<tr>';
                                        echo '  <td><a style="cursor: pointer" onclick="selectMember(\''.$row['MEMBER_ID'].'\',\'' . $row['FIRST_NAME'] . ' ' . $row['LAST_NAME'] . '\')">' . $row['FIRST_NAME'] . ' ' . $row['LAST_NAME'] . '</a></td>';
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
                                                $config['base_url'] = base_url() . 'index.php/' . $this->router->class . '/searchDIRECTOR/';
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
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
    
    function selectMember(id,name){     
            if (!confirm('ยืนยันการบันทึกข้อมูล')) {
                return false ;
            }            
            var dataPost = {    'COURSE_ID': $("#COURSE_ID",parent.document).val()   ,
                                'MEMBER_ID': id ,
                                'NAME' : name   };
            $.post('<?=base_url();?>/index.php/s03/insertDirectorCourse/', dataPost , function(html) {}).success(function(data) {                        
                    if (data.return.DUP_RESULT)  {
                            alert('บันทึกข้อมูลไม่สำเร็จเนื่องจากมีการบันทึกข้อมูลซ้ำ') ;
                            return false ;
                    } else {
                            alert('บันทึกข้อมูลสำเร็จ') ;
                            window.parent.closeIframe();       
                    }
            });                                       
            return false;               
    }

</script>
