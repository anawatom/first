<?php echo form_open_multipart($page_var['form_url']); ?>
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?php echo $page_var['form_header']; ?></h3>
		</div>
		<div class="box-body">
			<div class="form-group require">
				<?php echo lang('GMS_TERM_POSITION_POSITION_NAME', 'POSITION_NAME'); ?>
				<input type="text" name="POSITION_NAME" class="form-control" value="<?php echo set_form_value('POSITION_NAME', $page_var['model']); ?>">
				<?php echo form_error('POSITION_NAME'); ?>
			</div>
		</div>
		<div class="box-footer text-center">
			<button type="submit" name="submit" class="btn btn-primary btn-save">บันทึก</button>
			<button type="reset" name="reset" class="btn btn-warning btn-reset">ยกเลิก</button>
			<?php if (empty($page_var['model']) === FALSE): ?>
				<?php echo anchor(['term_position', 'delete', $page_var['model']['POSITION_ID']],
								'<i class="fa fa-times"></i> ลบ',
								'class="btn btn-danger btn-delete" data-value="'.$page_var['model']['POSITION_ID'].'"'); ?>
			<?php endif; ?>
		</div>
	</div>
<?php echo form_close(); ?>
