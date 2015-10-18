<?php echo form_open_multipart($page_var['form_url']); ?>
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?php echo $page_var['form_header']; ?></h3>
		</div>
		<div class="box-body">
			<div class="form-group require">
				<?php echo form_hidden('MEMBER_ID', set_form_value('MEMBER_ID', $page_var['model'])); ?>

				<?php echo lang('GMS_WORK_WORK_YEAR', 'WORK_YEAR'); ?>
				<input type="text" name="WORK_YEAR" class="form-control" value="<?php echo set_form_value('WORK_YEAR', $page_var['model'], (date('Y') + 543)); ?>">
				<?php echo form_error('WORK_YEAR'); ?>
			</div>
			<div class="form-group require">
				<?php echo lang('GMS_WORK_WORK_SUBJECT', 'WORK_SUBJECT'); ?>
				<input type="text" name="WORK_SUBJECT" class="form-control" value="<?php echo set_form_value('WORK_SUBJECT', $page_var['model']); ?>">
				<?php echo form_error('WORK_SUBJECT'); ?>
			</div>
			<div class="form-group">
				<?php echo form_label('ประเภทการฝึกอบรม', 'TYPE_ID'); ?>
				<?php echo form_dropdown('TYPE_ID', $page_var['gms_type_list'], set_form_value('TYPE_ID', $page_var['model']), 'class="form-control"'); ?>
				<?php echo form_error('TYPE_ID'); ?>
			</div>
			<div class="form-group">
				<?php echo lang('GMS_WORK_SPORT_ID', 'SPORT_ID'); ?>
				<?php echo form_dropdown( 'SPORT_ID', 
											isset($page_var['sport_list'])? $page_var['sport_list']: [], 
											set_form_value('SPORT_ID', $page_var['model']), 
											'class="form-control"'.(isset($page_var['sport_list'])? '': ' disabled') ); ?>
				<?php echo form_error('SPORT_ID'); ?>
			</div>
			<div class="form-group">
				<?php echo lang('GMS_WORK_WORK_LEVEL', 'WORK_LEVEL'); ?>
				<?php echo form_dropdown('WORK_LEVEL', $page_var['gms_work_level_list'], set_form_value('WORK_LEVEL', $page_var['model']), 'class="form-control"'); ?>
				<?php echo form_error('WORK_LEVEL'); ?>
			</div>
			<div class="form-group">
				<?php echo lang('GMS_WORK_WORK_TIME_START', 'WORK_TIME_START'); ?>
				<input type="text" name="WORK_TIME_START" class="form-control datepicker" data-type="normal-date" value="<?php echo set_form_value_date('WORK_TIME_START', $page_var['model']); ?>">
				<?php echo form_error('WORK_TIME_START'); ?>
			</div>
			<div class="form-group">
				<?php echo lang('GMS_WORK_WORK_TIME_END', 'WORK_TIME_END'); ?>
				<input type="text" name="WORK_TIME_END" class="form-control datepicker" data-type="normal-date" value="<?php echo set_form_value_date('WORK_TIME_END', $page_var['model']); ?>">
				<?php echo form_error('WORK_TIME_END'); ?>
			</div>
			<div class="form-group">
				<?php echo lang('GMS_WORK_WORK_DETAIL', 'WORK_DETAIL'); ?>
				<textarea name="WORK_DETAIL" class="form-control"><?php echo set_form_value('WORK_DETAIL', $page_var['model']); ?></textarea>
				<?php echo form_error('WORK_DETAIL'); ?>
			</div>
			<div class="form-group">
				<?php echo lang('GMS_WORK_WORK_LOCATION', 'WORK_LOCATION'); ?>
				<input type="text" name="WORK_LOCATION" class="form-control" value="<?php echo set_form_value('WORK_LOCATION', $page_var['model']); ?>">
				<?php echo form_error('WORK_LOCATION'); ?>
			</div>
			<div class="form-group">
				<?php echo lang('GMS_WORK_PROVINCE_ID', 'PROVINCE_ID'); ?>
				<?php echo form_dropdown('PROVINCE_ID', $page_var['province_list'], set_form_value('PROVINCE_ID', $page_var['model']), 'class="form-control"'); ?>
				<?php echo form_error('PROVINCE_ID'); ?>
			</div>
			<div class="form-group">
				<?php echo lang('GMS_WORK_AMPHUR_ID', 'AMPHUR_ID'); ?>
				<?php echo form_dropdown( 'AMPHUR_ID', 
											isset($page_var['amphur_list'])? $page_var['amphur_list']: [], 
											set_form_value('AMPHUR_ID', $page_var['model']), 
											'class="form-control"'.(isset($page_var['amphur_list'])? '': ' disabled') ); ?>
				<?php echo form_error('AMPHUR_ID'); ?>
			</div>
			<div class="form-group">
				<?php echo lang('GMS_WORK_TUMBOL_ID', 'TUMBOL_ID'); ?>
				<?php echo form_dropdown( 'TUMBOL_ID', 
											isset($page_var['tumbol_list'])? $page_var['tumbol_list']: [], 
											set_form_value('TUMBOL_ID', $page_var['model']), 
											'class="form-control"'.(isset($page_var['tumbol_list'])? '': ' disabled') ); ?>
				<?php echo form_error('TUMBOL_ID'); ?>
			</div>
		</div>
		<div class="box-footer text-center">
			<button type="submit" name="submit" class="btn btn-primary btn-save">บันทึก</button>
			<button type="reset" name="reset" class="btn btn-warning btn-reset">ยกเลิก</button>
			<?php if (isset($page_var['model']['WORK_ID']) === TRUE): ?>
				<?php echo anchor(['member', $page_var['model']['MEMBER_ID'], 'work', 'delete', $page_var['model']['WORK_ID']],
								'<i class="fa fa-times"></i> ลบ',
								'class="btn btn-danger btn-delete" data-value="'.$page_var['model']['WORK_ID'].'"'); ?>
			<?php endif; ?>
		</div>
	</div>
<?php echo form_close(); ?>

<script type="text/javascript">
	$(function() {
		$('select[name="TYPE_ID"]').on('change', function(event) {
			$.ajax({
                url: '<?php echo site_url(['sports', 'get_html_options_by_type_id']); ?>/' + $(this).val(),
                dataType: 'json',
                success: function (data) {
                	$('select[name="SPORT_ID"]').prop('disabled', false);
                    $('select[name="SPORT_ID"]').html(data.data);
                },
                error: function (xhr, desc, exceptionobj) {
                    alert("ERROR:" + xhr.responseText);
                }
            });
		});

		$('select[name="PROVINCE_ID"]').on('change', function(event) {
			$.ajax({
                url: '<?php echo site_url(['amphur', 'get_html_options']); ?>/' + $(this).val(),
                dataType: 'json',
                success: function (data) {
                	$('select[name="AMPHUR_ID"]').prop('disabled', false);
                    $('select[name="AMPHUR_ID"]').html(data.data);
                },
                error: function (xhr, desc, exceptionobj) {
                    alert("ERROR:" + xhr.responseText);
                }
            });
		});

		$('select[name="AMPHUR_ID"]').on('change', function(event) {
			var provinceId = $('select[name="PROVINCE_ID"]').val(),
				amphurId = $(this).val();

			$.ajax({
                url: '<?php echo site_url(['tumbol', 'get_html_options']); ?>/' + provinceId + '/' + amphurId,
                dataType: 'json',
                success: function (data) {
                	$('select[name="TUMBOL_ID"]').prop('disabled', false);
                    $('select[name="TUMBOL_ID"]').html(data.data);
                },
                error: function (xhr, desc, exceptionobj) {
                    alert("ERROR:" + xhr.responseText);
                }
            });
		});
	});
</script>