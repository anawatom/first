
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">เพิ่มประเภทการฝึกอบรม</h3>
            </div>

            <form action="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/insertTypeExc" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group has-error">
                        <label for="TYPE_CODE">รหัสประเภท *</label>
                        <input type="text" class="form-control" id="TYPE_CODE" name="TYPE_CODE" placeholder="รหัสประเภท">
                    </div>
                    <div class="form-group has-error">
                        <label for="TYPE_SUBJECT">ชื่อประเภทการฝึกอบรม *</label>
                        <input type="text" class="form-control" id="TYPE_SUBJECT" name="TYPE_SUBJECT" placeholder="ชื่อประเภทการฝึกอบรม">
                    </div>
                    <div class="form-group">
                        <label>สถานะ</label>
                        <select class="form-control" name="TYPE_STATUS">
                            <option value="0">ยกเลิก</option>
                            <option value="1" selected="true">ใช้งาน</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">รูปภาพ</label>
                        <input type="file" id="exampleInputFile" name="filUpload" onChange="showimagepreview(this)">
                        <p class="help-block">เฉพาะไฟล์รูปภาพเท่านั้น *</p>
                        <img src="<?php echo base_url(); ?>img/no_image.png" height="180" id="imgprvw" alt="uploaded image preview" name="pPicture">
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

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

