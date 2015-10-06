
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">                

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-solid box-primary">
                    <form method="post" enctype="multipart/form-data" id="form3" name="form3">

                        <div class="box-body table-responsive no-padding">
                            <table id="example1" class="table table-bordered table-hover">
                                <tr>
                                    <th style="width: 40%; height: 30px; background-color: #F5F5F5">หลักสูตร</th>
                                    <th style="width: 10%; background-color: #F5F5F5">เลขที่วุฒิบัตร</th>
                                    <th style="width: 25%; background-color: #F5F5F5">สถานะอนุมัติ</th>
                                    <th style="width: 25%; background-color: #F5F5F5">สถานะฝึกอบรม</th>
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
                                        echo '  <td>' . $row['COURSE_SUBJECT'] . ' รุ่นที่ '.$row['TERM_GEN'].'</td>';
                                        echo '  <td align="center">' . $row['HISTORY_NO'] . '</td>';
                                        echo '  <td align="center"><span class="' . $classStatus . '">' . $row['XX'] . '</span></td>';
                                        echo '  <td align="center">' . $STATUS_APPROVE . '</td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>
                                
                            </table>
                        </div><!-- /.box-body -->
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->