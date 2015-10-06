<aside class="right-side"> 
    <section class="content-header">
        <h1>
            <?php echo $this->router->class . '-หลักสูตรฝึกอบรม'; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">ตารางรหัส</a></li>
            <li class="active"><?php echo $this->router->class . '-เพิ่มหลักสูตรฝึกอบรม'; ?></li>
        </ol> 
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">เพิ่มหลักสูตรฝึกอบรม</h3>
                    </div>

                    <form action="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/insertExc" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group has-error">
                                <label for="">รหัสประเภท *</label>
                                <input type="text" class="form-control" id="" name="" placeholder="ปีงบประมาณ">
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
    </section>
</aside>
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

