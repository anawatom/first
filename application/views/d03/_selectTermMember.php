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
                                    <a href="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/selectTerm" class="btn btn-primary">รีเซ็ต</a>
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
                        <td><a href="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/updatePositionID/<?php echo $TERM_ID; ?>"  class="btn btn-success btn-sm" style="width: 100%" >กำหนดประธานรุ่น</a></td>
                       
						<?php         
                                        $arrayData['TERM_ID'] = str_replace( 'ID' , '' , $TERM_ID);
                                        $search = base64_encode(serialize($arrayData)); 
						?>
						<td><a href="<?php echo base_url(); ?>index.php/report/report_trn1i0140_tumneab?<?=$search?>"  class="btn btn-success btn-sm" style="width: 100%"  target="_blank">ทำเนียบรุ่น (PDF)</a></td>
                       					
                    </tr>

                    <tr>
                        <td colspan="2"><a href="#" onclick="getTrainedListReport();"  class="btn btn-success btn-sm" style="width: 100%" >รายชื่อสมาชิกที่ผ่านการอบรม (Excel)</a></td>
                    </tr>

					<tr>
                        <td colspan="2"><a href="#" onclick="getTrainMemberReportDetail();"  class="btn btn-success btn-sm" style="width: 100%" >รายชื่อสมาชิกที่เข้าร่วมการอบรม (Excel)</a></td>
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
                    <form method="post" enctype="multipart/form-data" id="form2" name="form2">
                        <div class="box-header">
                            <h3 class="box-title">หลักสูตรฝึกอบรม <?php echo $rd['COURSE_SUBJECT']; ?> รุ่นที่ <?php echo $rd['TERM_GEN']; ?> ปี <?php echo $rd['TERM_YEAR']; ?></h3>
                            <div class="box-tools pull-right">
                                <a href="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/insertMemeber/<?php echo $TERM_ID; ?>" class="btn btn-sm btn-default" title="เพิ่มข้อมูล"><i class="fa fa-plus"></i></a>
                                <a class="btn btn-sm btn-default" title="ลบข้อมูล" id="delMember"><i class="fa fa-minus"></i></a>
                            </div>
                        </div><!-- /.box-header -->

                        <div class="box-body table-responsive no-padding">
                            <table id="example1" class="table table-bordered table-hover">
                                <tr>
                                    <th style="width: 2%"></th>
                                    <th style="width: 10%">เลขรหัสประชาชน</th>
                                    <th style="width: 20%">ชื่อ-นามสกุล</th>
                                    <th style="width: 10%">เลขที่วุฒิบัตร</th>
                                    <th style="width: 14%">สถานะอนุมัติ</th>
                                    <th style="width: 14%">สถานะฝึกอบรม</th>
                                    <th style="width: 10%">ใบสมัคร</th>
                                    <th style="width: 10%">ใบประกาศ</th>
                                    <th style="width: 9%">เครื่องมือ</th>
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

                                        if ($row['HISTORY_STATUS_APPROVE'] == '1') {
                                            $STATUS_APPROVE = "<span class='label label-success'>ผ่านหลักสูตรแล้ว</span>";
                                        } else if ($row['HISTORY_STATUS_APPROVE'] == '0') {
                                            $STATUS_APPROVE = "<span class='label label-danger'>ไม่ผ่าน</span>";
                                        } else if ($row['HISTORY_STATUS_APPROVE'] == '2') {
                                            $STATUS_APPROVE = "<span class='label label-danger'>ไม่เข้าอบรม</span>";
                                        } else {
                                            $STATUS_APPROVE = "<span class='label label-warning'>รอการผลฝึกอบรม</span>";
                                        }
                                        $i++;
                                        echo '<tr>';
                                        echo '  <td><input type="checkbox" value="' . $row['HISTORY_ID'] . '" name="HISTORY_ID[]" id="chkDel' . $i . '" ></td>';
                                        echo '  <td>' . $row['HRS_ID'] . '</td>';
                                        echo '  <td>' . $row['FIRST_NAME'] . ' ' . $row['LAST_NAME'] . '</td>';
                                        // echo '  <td>' . $row['HOME_TEL'] . '</td>';
                                        echo '  <td>' . $row['HISTORY_NO'] . '</td>';
                                        echo '  <td><span class="' . $classStatus . '">' . $row['XX'] . '</span></td>';
                                        echo '  <td>' . $STATUS_APPROVE . '</td>';
                                        $arrayData['MEMBER_ID'] = $row['MEMBER_ID'] ;
                                        $arrayData['TERM_ID'] = $row['TERM_ID'] ;
                                        $search = base64_encode(serialize($arrayData)); 
                                        echo '  <td> <a href="'.base_url().'index.php/report/report_trn1i0140_regis?'.$search.'" class="btn btn-success btn-sm" style="width: 100%" target="_blank" >พิมพ์ใบสมัคร</a></td>';
                                        echo '  <td> <a href="'.base_url().'index.php/report/report_trn1i0140_certify?'.$search.'" class="btn btn-success btn-sm" style="width: 100%" target="_blank" >พิมพ์ใบประกาศ</a></td>';
                                        echo '  <td>';
                                        echo '      <a onclick="delHistoryByID(\'' . $row['HISTORY_ID'] . '\')" class="btn btn-default"><i class="fa fa-minus"></i></a>';
                                        echo '  </td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>
                                <tr>
                                    <td colspan="9">
                                        <div class="box-footer clearfix">
                                            <div class="pull-right">
                                                <?php
                                                $config['base_url'] = base_url() . 'index.php/' . $this->router->class . '/selectTerm/';
                                                $config['total_rows'] = $count;
                                                $config['per_page'] = 10;
                                                $this->pagination->initialize($config);
                                                echo $this->pagination->create_links();
                                                ?>
                                            </div>
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

<?php echo form_open('http://report.dpe.go.th',
                        ['name' => 'formTrainedListReport',
                            'method' => 'POST',
                            'target' => '_blank'],
                        ['report' => '',
                            'promptTERM_ID' => '']); ?>
    <script type="text/javascript">
        function getTrainedListReport() {
            var $form = $('form[name="formTrainedListReport"]');
            $form.find('[name="report"]').val("file:/C:/Program Files (x86)/i-net Clear Reports/startpage/TRAIN/TrainedList.xls");
            $form.find('[name="promptTERM_ID"]').val('<?php echo str_replace('ID' , '' , $TERM_ID); ?>');
            $form.submit();
        }
    </script>
<?php echo form_close(); ?>

<form name="FormClearReports" action="http://report.dpe.go.th" method="POST" target="_blank" >
    <input type="hidden" name="report" >
    <input type="hidden" name="promptTERM_ID" >
    <script type="text/javascript">
        function getTrainMemberReportDetail(){                 
            var form = jQuery('form[name="FormClearReports"]');                
            form.find('[name="report"]').val("file:/C:/Program Files (x86)/i-net Clear Reports/startpage/TRAIN/TrainMember.xls");
            form.find('[name="promptTERM_ID"]').val(<?=str_replace( 'ID' , '' , $TERM_ID)?>);                
            form.submit() ;
        }
    </script>
</form>

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
        $('#delMember').click(function () {
            if (confirm('ลบข้อมูลหรือไม่ ?')) {
                var rows = document.getElementsByName('HISTORY_ID[]');
                var txt = '';
                for (var i = 0, l = rows.length; i < l; i++) {
                    if (rows[i].checked) {
                        txt += rows[i].value + '_';
                    }
                }
                if (txt != '') {
                    jQuery.ajax({
                        url: '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/delMember/' + txt,
                        async: false,
                        success: function (data) {
//                            var arrData = new Array();
//                            arrData = data.split(',');
//                            document.getElementById("selectCourse").innerHTML = arrData[0];
                        },
                        error: function (xhr, desc, exceptionobj) {
                            alert("ERROR:" + xhr.responseText);
                        }
                    })

                    location.reload();
                }

            } //end confirm('ลบข้อมูลหรือไม่ ?')
        });
    })

    function delHistoryByID(txt) {
        if (confirm('ลบข้อมูลหรือไม่ ?')) {
            if (txt != '') {
                jQuery.ajax({
                    url: '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/delMember/' + txt,
                    async: false,
                    success: function (data) {
//                        var arrData = new Array();
//                        arrData = data.split('|');
//                        document.getElementById("selectCourse").innerHTML = arrData[0];
                    },
                    error: function (xhr, desc, exceptionobj) {
                        alert("ERROR:" + xhr.responseText);
                    }
                })
                location.reload();
            }
        }
    }
</script>


