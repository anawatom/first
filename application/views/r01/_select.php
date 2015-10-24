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
                            foreach ($page_var['type'] as $row) {
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