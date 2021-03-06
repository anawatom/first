<?php echo form_open_multipart($page_var['form_url']); ?>
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?php echo $page_var['form_header']; ?></h3>
		</div>
		<div class="box-body">
			<div class="form-group require">
				<?php echo form_hidden('MEMBER_ID', set_form_value('MEMBER_ID', $page_var['model'])); ?>

				<?php echo form_label('ปีงบประมาณ', 'TERM_YEAR'); ?>
				<input type="text"
						name="TERM_YEAR"
						class="form-control has-dependency"
						data-dependency-for="TERM_ID"
						data-url-dependency-for-term-id="<?php echo site_url(['term', 'get_html_options_for_dropdown_term']); ?>" 
						value="<?php echo set_form_value('TERM_YEAR', isset($page_var['gms_term'])? $page_var['gms_term']: null, (date('Y') + 543)); ?>">
			</div>
			<div class="form-group">
				<?php echo form_label('ประเภทการฝึกอบรม', 'TYPE_ID'); ?>
				<?php echo form_dropdown('TYPE_ID', 
										$page_var['gms_type_list'], 
										set_form_value('TYPE_ID', $page_var['model'], 'any'), 
										'class="form-control has-dependency"'
										.' data-url-dependency="'.site_url(['sports', 'get_html_options_by_type_id']).'"'); ?>
			</div>
			<div class="form-group">
				<?php echo form_label('ชนิดกีฬา', 'SPORT_ID'); ?>
				<?php echo form_dropdown( 'SPORT_ID', 
											isset($page_var['sport_list'])? $page_var['sport_list']: [], 
											set_form_value('SPORT_ID', $page_var['model']), 
											'class="form-control has-dependency"'
											.' data-dependency-for="TERM_ID"'
											.' data-url-dependency-for-term-id="'.site_url(['term', 'get_html_options_for_dropdown_term']).'"'
											.' disabled' ); ?>
			</div>
			<div class="form-group require">
				<?php echo lang('GMS_HISTORY_TERM_ID', 'TERM_ID'); ?>
				<?php echo form_dropdown( 'TERM_ID', 
											isset($page_var['term_list'])? $page_var['term_list']: [], 
											set_form_value('TERM_ID', $page_var['model']), 
											'class="form-control has-detail"'
											.' data-url-dependency="'.site_url(['term', 'get_term_data_by_id']).'"'
											.' disabled' ); ?>
				<?php echo form_error('TERM_ID'); ?>
			</div>
			<div class="form-group">
				<?php echo form_label('วันที่อบรม', 'TERM_TIME_START'); ?>
				<input type="text" name="TERM_TIME_START" class="form-control show-detail" data-detail-for="TERM_ID" readonly value="<?php echo set_form_value('TERM_TIME_START', isset($page_var['gms_term'])? $page_var['gms_term']: null ); ?>">
			</div>
			<div class="form-group">
				<?php echo form_label('ถึงวันที่ ', 'TERM_TIME_END'); ?>
				<input type="text" name="TERM_TIME_END" class="form-control show-detail" data-detail-for="TERM_ID" readonly value="<?php echo set_form_value('TERM_TIME_END', isset($page_var['gms_term'])? $page_var['gms_term']: null ); ?>">
			</div>
			<div class="form-group">
				<?php echo form_label('สถานที่ฝึกอบรม', 'TERM_LOCATION'); ?>
				<input type="text" name="TERM_LOCATION" class="form-control show-detail" data-detail-for="TERM_ID" readonly value="<?php echo set_form_value('TERM_LOCATION', isset($page_var['gms_term'])? $page_var['gms_term']: null ); ?>">
			</div>
		</div>
		<div class="box-footer text-center">
			<button type="submit" name="submit" class="btn btn-primary btn-save">บันทึก</button>
			<button type="reset" name="reset" class="btn btn-warning btn-reset">ยกเลิก</button>
			<?php if (isset($page_var['model']['HISTORY_ID']) === TRUE): ?>
				<?php echo anchor(['member', $page_var['model']['MEMBER_ID'], 'history', 'delete', $page_var['model']['HISTORY_ID']],
								'<i class="fa fa-times"></i> ลบ',
								'class="btn btn-danger btn-delete" data-value="'.$page_var['model']['HISTORY_ID'].'"'); ?>
			<?php endif; ?>
		</div>
	</div>
<?php echo form_close(); ?>
