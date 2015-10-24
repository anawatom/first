<?php echo form_open_multipart($page_var['form_url'], 
                                    ['method' => 'post']); ?>
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title"><?php echo $page_var['form_title']; ?></h3>
        </div>

        <div class="box-body">
            <div class="form-group has-error">
                <?php echo form_hidden('TYPE_ID', set_form_value('TYPE_ID', $page_var['model'])); ?>

                <label for="TYPE_CODE">รหัสประเภท *</label>
                <input type="text" 
                        class="form-control" 
                        id="TYPE_CODE" 
                        name="TYPE_CODE" 
                        placeholder="รหัสประเภท"
                        value="<?php echo set_form_value('TYPE_CODE', $page_var['model']); ?>">
                <?php echo form_error('TYPE_CODE'); ?>
            </div>
            <div class="form-group has-error">
                <label for="TYPE_SUBJECT">ชื่อประเภทการฝึกอบรม *</label>
                <input type="text" 
                        class="form-control" 
                        id="TYPE_SUBJECT" 
                        name="TYPE_SUBJECT" 
                        placeholder="ชื่อประเภทการฝึกอบรม"
                        value="<?php echo set_form_value('TYPE_SUBJECT', $page_var['model']); ?>">
                <?php echo form_error('TYPE_SUBJECT'); ?>
            </div>
            <div class="form-group require">
                <?php echo form_label('สถานะ', 'TYPE_STATUS'); ?>
                <?php echo form_dropdown('TYPE_STATUS', 
                                        $STATUSES, 
                                        set_value('TYPE_STATUS', isset($page_var['model']['TYPE_STATUS']) ? $page_var['model']['TYPE_STATUS'] : ''), 'class="form-control"'); ?>
                <?php echo form_error('TYPE_STATUS'); ?>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">รูปภาพ</label>
                <input type="file" id="exampleInputFile" name="filUpload" onChange="showimagepreview(this)">
                <p class="help-block">เฉพาะไฟล์รูปภาพเท่านั้น *</p>
                <img src="<?php echo base_url(); ?>img/no_image.png" height="180" id="imgprvw" alt="uploaded image preview" name="pPicture">
            </div>
            <div class="box-footer text-center">
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </div>
        </div>
    </div>
<?php echo form_close(); ?>

<script language="JavaScript">
    function showimagepreview(input) {
        if (input.files && input.files[0]) {
            var filerdr = new FileReader();
            filerdr.onload = function (e) {
                $('#imgprvw').attr('src', e.target.result);
            }
            filerdr.readAsDataURL(input.files[0]);
        }
    }


</script>

