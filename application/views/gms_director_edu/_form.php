<?php echo form_open_multipart($page_var['form_url']); ?>
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?php echo $page_var['form_header']; ?></h3>
		</div>
		<div class="box-body">
			<div class="form-group require">
				<?php echo form_hidden('MEMBER_ID', set_form_value('MEMBER_ID', $page_var['model'])); ?>

				<?php echo lang('GMS_DIRECTOR_EDU_EDU_YR', 'EDU_YR'); ?>
				<input type="text" name="EDU_YR" class="form-control" value="<?php echo set_form_value('EDU_YR', $page_var['model'], (date('Y') + 543)); ?>">
				<?php echo form_error('EDU_YR'); ?>
			</div>
			<div class="form-group require">
				<?php echo lang('GMS_DIRECTOR_EDU_EDU_LEVEL', 'EDU_LEVEL'); ?>
				<input type="text" name="EDU_LEVEL" class="form-control" value="<?php echo set_form_value('EDU_LEVEL', $page_var['model']); ?>">
				<?php echo form_error('EDU_LEVEL'); ?>
			</div>
			<div class="form-group require">
				<?php echo lang('GMS_DIRECTOR_EDU_EDU_DEPT', 'EDU_DEPT'); ?>
				<input type="text" name="EDU_DEPT" class="form-control" value="<?php echo set_form_value('EDU_DEPT', $page_var['model']); ?>">
				<?php echo form_error('EDU_DEPT'); ?>
			</div>
			<div class="form-group require">
				<?php echo lang('GMS_DIRECTOR_EDU_EDU_INSTITUTE', 'EDU_INSTITUTE'); ?>
				<input type="text" name="EDU_INSTITUTE" class="form-control" value="<?php echo set_form_value('EDU_INSTITUTE', $page_var['model']); ?>">
				<?php echo form_error('EDU_INSTITUTE'); ?>
			</div>
		</div>
		<div class="box-footer text-center">
			<button type="submit" name="submit" class="btn btn-primary btn-save">บันทึก</button>
			<button type="reset" name="reset" class="btn btn-warning btn-reset">ยกเลิก</button>
			<?php if (isset($page_var['model']['DI_EDU_ID']) === TRUE): ?>
				<?php echo anchor(['member', $page_var['model']['MEMBER_ID'], 'director_edu', 'delete', $page_var['model']['DI_EDU_ID']],
								'<i class="fa fa-times"></i> ลบ',
								'class="btn btn-danger btn-delete" data-value="'.$page_var['model']['DI_EDU_ID'].'"'); ?>
			<?php endif; ?>
		</div>
	</div>
<?php echo form_close(); ?>