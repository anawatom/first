<?php echo form_open_multipart($page_var['form_url']); ?>
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">เพิ่มคำนำหน้านาม</h3>
		</div>
		<div class="box-body">
			<div class="form-group require">
				<?php echo form_label('ชื่อคำนำหน้า(ไทย)', 'PREFIX_TH'); ?>
				<input type="text" name="PREFIX_TH" class="form-control" value="<?php echo set_form_value('PREFIX_TH', $page_var['model']); ?>">
				<?php echo form_error('PREFIX_TH'); ?>
			</div>
			<div class="form-group">
				<?php echo form_label('ชื่อย่อคำนำหน้า(ไทย)', 'PREFIX_TH_SH'); ?>
				<input type="text" name="PREFIX_TH_SH" class="form-control" value="<?php echo set_form_value('PREFIX_TH_SH', $page_var['model']); ?>">
				<?php echo form_error('PREFIX_TH_SH'); ?>
			</div>
			<div class="form-group">
				<?php echo form_label('ชื่อคำนำหน้า(อังกฤษ)', 'PREFIX_EN'); ?>
				<input type="text" name="PREFIX_EN" class="form-control" value="<?php echo set_form_value('PREFIX_EN', $page_var['model']); ?>">
				<?php echo form_error('PREFIX_EN'); ?>
			</div>
			<div class="form-group">
				<?php echo form_label('ชื่อย่อคำนำหน้า(อังกฤษ)', 'PREFIX_EN_SH'); ?>
				<input type="text" name="PREFIX_EN_SH" class="form-control" value="<?php echo set_form_value('PREFIX_EN_SH', $page_var['model']); ?>">
				<?php echo form_error('PREFIX_EN_SH'); ?>
			</div>
			<div class="form-group require">
				<?php echo form_label( 'สถานะ', 'PREFIX_STATUS' ); ?>
				<?php echo form_dropdown( 'PREFIX_STATUS', $STATUSES, set_form_value('PREFIX_STATUS', $page_var['model']), 'class="form-control"' ); ?>
				<?php echo form_error( 'PREFIX_STATUS' ); ?>
			</div>
		</div>
		<div class="box-footer text-center">
			<button type="submit" name="submit" class="btn btn-primary btn-save">บันทึก</button>
			<button type="reset" name="reset" class="btn btn-warning btn-reset">ยกเลิก</button>
			<?php if (empty($page_var['model']) === FALSE): ?>
				<?php echo anchor(['prefix', 'delete', $page_var['model']['PREFIX_ID']],
								'<i class="fa fa-times"></i> ลบ',
								'class="btn btn-danger btn-delete" data-value="'.$page_var['model']['PREFIX_ID'].'"'); ?>
			<?php endif; ?>
		</div>
	</div>
<?php echo form_close(); ?>
