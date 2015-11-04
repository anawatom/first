<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">เงื่อนไขการค้นหา</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open('s01/index', ['method' => 'GET', 'class' => 'form-search']) ?>
                <div class="box-body">
                    <div class="form-group">
                        <?php echo form_label('รหัสประเภท', 'TYPE_CODE'); ?>
                        <input type="text"
                                class="form-control"
                                id="TYPE_CODE"
                                name="TYPE_CODE"
                                placeholder="รหัสประเภท"
                                value="<?php echo set_form_value('TYPE_CODE', $page_var['search_params']); ?>">
                    </div>
                    <div class="form-group">
                        <?php echo form_label('ชื่อประเภท', 'TYPE_SUBJECT'); ?>
                        <input type="text"
                              class="form-control"
                              id="TYPE_SUBJECT"
                              name="TYPE_SUBJECT"
                              placeholder="ชื่อประเภท"
                              value="<?php echo set_form_value('TYPE_SUBJECT', $page_var['search_params']); ?>">
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>
                </div>
            <?php echo form_close(); ?>
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
                                <?php echo anchor(['s01', 'updateType', $row['TYPE_ID']],
                                                    '<i class="fa fa-edit"></i>',
                                                    'class="btn btn-default btn-edit" target="_parent"'); ?>
                                <?php echo anchor(['s01', 'delTypeExc', $row['TYPE_ID']],
                                                    '<i class="fa fa-times"></i>',
                                                    'class="btn btn-default btn-delete" data-value="'.$row['TYPE_ID'].'"'); ?>
                        </tr>
                        <?php
                    }
                    ?>

                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>
