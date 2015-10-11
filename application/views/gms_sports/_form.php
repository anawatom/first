<?php echo form_open_multipart($page_var['form_url']); ?>
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">เพิ่มประเภทการฝึกอบรม</h3>
		</div>
		<div class="box-body">
			<div class="form-group require">
				<?php echo form_label('ประเภทการฝึกอบรม', 'TYPE_ID'); ?>
				<?php echo form_dropdown('TYPE_ID', $page_var['gms_type_list'], set_value('TYPE_ID', isset($page_var['model']['TYPE_ID']) ? $page_var['model']['TYPE_ID'] : ''), 'class="form-control"'); ?>
				<?php echo form_error('TYPE_ID'); ?>
			</div>
			<div class="form-group require">
				<?php echo form_label('เลขที่', 'SPORT_CODE'); ?>
				<input type="text" name="SPORT_CODE" class="form-control" value="<?php echo set_value('SPORT_CODE', isset($page_var['model']['SPORT_CODE']) ? $page_var['model']['SPORT_CODE'] : ''); ?>">
				<?php echo form_error('SPORT_CODE'); ?>
			</div>
			<div class="form-group require">
				<?php echo form_label('ชนิดกีฬา/ชนิดการฝึกอบรม', 'SPORT_SUBJECT'); ?>
				<input type="text" name="SPORT_SUBJECT" class="form-control" value="<?php echo set_value('SPORT_SUBJECT', isset($page_var['model']['SPORT_SUBJECT']) ? $page_var['model']['SPORT_SUBJECT'] : ''); ?>">
				<?php echo form_error('SPORT_SUBJECT'); ?>
			</div>
			<div class="form-group require">
				<?php echo form_label('สถานะ', 'SPORT_STATUS'); ?>
				<?php echo form_dropdown('SPORT_STATUS', $STATUSES, set_value('SPORT_STATUS', isset($page_var['model']['SPORT_STATUS']) ? $page_var['model']['SPORT_STATUS'] : ''), 'class="form-control"'); ?>
				<?php echo form_error('SPORT_STATUS'); ?>
			</div>
			<div class="form-group">
				<?php echo form_label('รูปภาพ', 'SPORT_IMAGE'); ?>
				<?php echo form_upload(['name' => 'SPORT_IMAGE', 'class' => 'form-control']); ?>
				<?php echo form_error('SPORT_IMAGE'); ?>
			</div>
			<div class="form-group text-center">
				<img src="<?php echo base_url('img/no_image.png'); ?>" height="180" id="imgprvw" alt="uploaded image preview" name="pPicture">
			</div>
		</div>
		<div class="box-footer text-center">
			<button type="submit" name="submit" class="btn btn-primary btn-save">บันทึก</button>
			<button type="reset" name="reset" class="btn btn-warning btn-reset">ยกเลิก</button>
			<?php if (isset($page_var['model']) === TRUE): ?>
				<a class="btn btn-danger btn-delete" 
						href="<?php echo site_url(['sports', 'delete', $page_var['model']['SPORT_ID']]); ?>"
						data-value="<?php echo $page_var['model']['SPORT_ID']; ?>">
					<i class='fa fa-times'></i> ลบ
				</a>
			<?php endif; ?>
		</div>
	</div>
<?php echo form_close(); ?>