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
                    foreach ($page_var['type'] as $row) {
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