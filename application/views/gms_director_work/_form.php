<?php echo form_open_multipart($page_var['form_url']); ?>
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?php echo $page_var['form_header']; ?></h3>
		</div>
		<div class="box-body">
			<div class="form-group require">
				<?php echo form_hidden('MEMBER_ID', set_form_value('MEMBER_ID', $page_var['model'])); ?>

				<?php echo lang('GMS_DIRECTOR_WORK_WORK_YR', 'WORK_YR'); ?>
				<input type="text" name="WORK_YR" class="form-control" value="<?php echo set_form_value('WORK_YR', $page_var['model'], (date('Y') + 543)); ?>">
				<?php echo form_error('WORK_YR'); ?>
			</div>
			<div class="form-group require">
				<?php echo lang('GMS_DIRECTOR_WORK_WORK_POSITION', 'WORK_POSITION'); ?>
				<input type="text" name="WORK_POSITION" class="form-control" value="<?php echo set_form_value('WORK_POSITION', $page_var['model']); ?>">
				<?php echo form_error('WORK_POSITION'); ?>
			</div>
			<div class="form-group require">
				<?php echo lang('GMS_DIRECTOR_WORK_WORK_DEPT', 'WORK_DEPT'); ?>
				<input type="text" name="WORK_DEPT" class="form-control" value="<?php echo set_form_value('WORK_DEPT', $page_var['model']); ?>">
				<?php echo form_error('WORK_DEPT'); ?>
			</div>
		</div>
		<div class="box-footer text-center">
			<button type="submit" name="submit" class="btn btn-primary btn-save">บันทึก</button>
			<button type="reset" name="reset" class="btn btn-warning btn-reset">ยกเลิก</button>
			<?php if (isset($page_var['model']['DI_WORK_ID']) === TRUE): ?>
				<?php echo anchor(['member', $page_var['model']['MEMBER_ID'], 'director_work', 'delete', $page_var['model']['DI_WORK_ID']],
								'<i class="fa fa-times"></i> ลบ',
								'class="btn btn-danger btn-delete" data-value="'.$page_var['model']['DI_WORK_ID'].'"'); ?>
			<?php endif; ?>
		</div>
	</div>
<?php echo form_close(); ?>