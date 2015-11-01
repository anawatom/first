<?php echo form_open_multipart($page_var['form_url']); ?>
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?php echo $page_var['form_header']; ?></h3>
		</div>
		<div class="box-body">
			<div class="form-group require">
				<?php echo lang('GMS_CERTIFICATE_SIGN_GENERAL_NAME', 'GENERAL_NAME'); ?>
				<input type="text" name="GENERAL_NAME" class="form-control" value="<?php echo set_form_value('GENERAL_NAME', $page_var['model']); ?>">
				<?php echo form_error('GENERAL_NAME'); ?>
			</div>
			<div class="form-group require">
				<?php echo lang('GMS_CERTIFICATE_SIGN_GENERAL_SIGN', 'GENERAL_SIGN'); ?>
				<?php echo form_upload(['name' => 'GENERAL_SIGN', 
										'class' => 'has-preview']); ?>
				<?php echo form_error('GENERAL_SIGN'); ?>
				<?php echo isset($page_var['upload_error']['GENERAL_SIGN'])? $page_var['upload_error']['GENERAL_SIGN']: ''; ?>
			</div>
			<div class="form-group text-left">
				<?php echo get_element_image_preview( (isset($page_var['model']['GENERAL_SIGN']) === FALSE) ? 
															'' :
															base_url('uploads/images/gms_certificate_sign/'.$page_var['model']['GENERAL_SIGN']),
														'GENERAL_SIGN' ); ?>
			</div>
			<div class="form-group require">
				<?php echo lang('GMS_CERTIFICATE_SIGN_MANAGER_NAME', 'MANAGER_NAME'); ?>
				<input type="text" name="MANAGER_NAME" class="form-control" value="<?php echo set_form_value('MANAGER_NAME', $page_var['model']); ?>">
				<?php echo form_error('MANAGER_NAME'); ?>
			</div>
			<div class="form-group require">
				<?php echo lang('GMS_CERTIFICATE_SIGN_MANAGER_SIGN', 'MANAGER_SIGN'); ?>
				<?php echo form_upload(['name' => 'MANAGER_SIGN', 
										'class' => 'has-preview']); ?>
				<?php echo form_error('MANAGER_SIGN'); ?>
				<?php echo isset($page_var['upload_error']['MANAGER_SIGN'])? $page_var['upload_error']['MANAGER_SIGN']: ''; ?>
			</div>
			<div class="form-group text-left">
				<?php echo get_element_image_preview( (isset($page_var['model']['MANAGER_SIGN']) === FALSE) ? 
															'' :
															base_url($UPLOAD_PATH_GMS_CERTIFICATE_SIGN.$page_var['model']['MANAGER_SIGN']),
														'MANAGER_SIGN' ); ?>
			</div>
			<div class="form-group require">
				<?php echo lang('GMS_CERTIFICATE_SIGN_TEMPLATE_USE', 'TEMPLATE_USE'); ?>
				<?php echo form_upload(['name' => 'TEMPLATE_USE', 
										'class' => 'has-preview']); ?>
				<?php echo form_error('TEMPLATE_USE'); ?>
				<?php echo isset($page_var['upload_error']['TEMPLATE_USE'])? $page_var['upload_error']['TEMPLATE_USE']: ''; ?>
			</div>
			<div class="form-group text-left">
				<?php echo get_element_image_preview( (isset($page_var['model']['TEMPLATE_USE']) === FALSE) ? 
															'' :
															base_url('uploads/images/gms_certificate_sign/'.$page_var['model']['TEMPLATE_USE']),
														'TEMPLATE_USE' ); ?>
			</div>
		</div>
		<div class="box-footer text-center">
			<button type="submit" name="submit" class="btn btn-primary btn-save">บันทึก</button>
			<button type="reset" name="reset" class="btn btn-warning btn-reset">ยกเลิก</button>
			<?php if (empty($page_var['model']) === FALSE): ?>
				<?php echo anchor(['cancel_result', 'delete', $page_var['model']['SIGN_ID']],
								'<i class="fa fa-times"></i> ลบ',
								'class="btn btn-danger btn-delete" data-value="'.$page_var['model']['SIGN_ID'].'"'); ?>
			<?php endif; ?>
		</div>
	</div>
<?php echo form_close(); ?>
