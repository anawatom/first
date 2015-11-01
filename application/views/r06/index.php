<div class="row">
	<!-- left column -->
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">เงื่อนไขการค้นหา</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			<?php echo form_open('report/report_TRN1I060',
								['name' => 'formReport',
									'class' => 'has-js-validation',
									'method' => 'GET',
									'target' => '_blank']); ?>
				<div class="box-body">
					<div class="form-group has-error">
						<?php echo form_label('ปีงบประมาณ *', 'TERM_YEAR'); ?>
						<input type="text" 
								name="TERM_YEAR" 
								class="form-control require-field has-dependency"
								data-require-field-alert-text="กรุณาเลือก ปีงบประมาณ"
								data-dependency-for="TERM_GEN"
								data-url-dependency-for-term-gen="<?php echo site_url(['term', 'get_html_options_for_dropdown_term_gen']); ?>" 
								value="<?php echo set_form_value('TERM_YEAR', isset($page_var['gms_term'])? $page_var['gms_term']: null, (date('Y') + 543)); ?>">
					</div>
					<div class="form-group has-error">
						<?php echo form_label('ประเภทการฝึกอบรม *', 'TYPE_ID'); ?>
						<?php echo form_dropdown('TYPE_ID', 
												$page_var['gms_type_list'], 
												[], 
												'class="form-control require-field has-dependency" data-url-dependency="'.site_url(['sports', 'get_html_options_by_type_id']).'"'
												.' data-require-field-alert-text="กรุณาเลือก ประเภทการฝึกอบรม"'); ?>
					</div>
					<div class="form-group has-error">
						<?php echo form_label('ชนิดกีฬา *', 'SPORT_ID'); ?>
						<?php echo form_dropdown( 'SPORT_ID', 
													[], 
													[], 
													'class="form-control require-field has-dependency"'
													.' data-require-field-alert-text="กรุณาเลือก ชนิดกีฬา"'
													.' data-dependency-for="COURSE_ID"'
													.' data-url-dependency-for-course-id="'.site_url(['course', 'get_html_options']).'"'
													.' disabled'); ?>
					</div>
					<div class="form-group has-error">
						<?php echo form_label('หลักสูตร *', 'COURSE_ID'); ?>
						<?php echo form_dropdown( 'COURSE_ID', 
													[], 
													[], 
													'class="form-control require-field has-dependency"'
													.' data-require-field-alert-text="กรุณาเลือก หลักสูตร"'
													.' data-dependency-for="TERM_GEN"'
													.' data-url-dependency-for-term-gen="'.site_url(['term', 'get_html_options_for_dropdown_term_gen']).'"'
													.' disabled'); ?>
					</div>
					<div class="form-group has-error">
						<?php echo form_label('รุ่น *', 'TERM_GEN'); ?>
						<?php echo form_dropdown( 'TERM_GEN', 
													[], 
													[], 
													'class="form-control require-field"'
													.' data-require-field-alert-text="กรุณาเลือก รุ่น"'
													.' disabled' ); ?>
					</div>
					<div class="form-group">
						<div class="form-inline">
							<?php echo form_label(form_radio(['name' => 'HISTORY_NO',
													'value' => '0',
													'checked' => TRUE]).' พิมพ์ทั้งหมด',
													'HISTORY',
													['class' => 'radio']); ?>

							<?php echo form_label(form_radio(['name' => 'HISTORY_NO',
													'value' => '1']).' เลือกช่วงในการพิมพ์',
													'HISTORY',
													['class' => 'radio']); ?>
						</div>
					</div>
					<div class="form-group has-error history-no-1 hidden">
						<?php echo form_label('เลขวุฒิบัตร *', 'HISTORY_NO_START'); ?>
						<?php echo form_input('HISTORY_NO_START', '',
												'class="form-control only-number"'
												.' data-require-field-alert-text="กรุณาเลือก เลขวุฒิบัตร"'); ?>
					</div>
					<div class="form-group has-error history-no-1 hidden">
						<?php echo form_label('ถึงเลขที่ *', 'HISTORY_NO_END'); ?>
						<?php echo form_input('HISTORY_NO_END', '',
												'class="form-control only-number"'
												.' data-require-field-alert-text="กรุณาเลือก ถึงเลขที่"'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label('รูปแบบรายงาน', 'REPORT_TYPE'); ?>
						<?php echo form_dropdown( 'REPORT_TYPE', 
													$REPORT_TYPE, 
													[], 
													'class="form-control require-field"'
													.' data-require-field-alert-text="กรุณาเลือก รูปแบบรายงาน"' ); ?>
					</div>
				</div><!-- /.box-body -->

				<div class="box-footer text-center">
					<input type="submit" value="พิมพ์" class="btn btn-primary btn-export-report">
				</div>
			<?php echo form_close(); ?>
		</div><!-- /.box -->
	</div><!--/.col (left) -->
</div>   <!-- /.row -->

<script type="text/javascript">
	$(function() {
		$('input[name="HISTORY_NO"]').on('ifClicked', function(event) {
			var $historyNo1 = $('.history-no-1');

			if ($(this).val() === '1') {
				$historyNo1
				.removeClass('hidden')
				.each(function(index, value) {
					var $this = $(this);

					$(this)
						.find('input[name="HISTORY_NO_START"]')
						.addClass('require-field')
						.val('');
					$(this)
						.find('input[name="HISTORY_NO_END"]')
						.addClass('require-field')
						.val('');
				});
			}
			else {
				$historyNo1
				.addClass('hidden')
				.each(function(index, value) {
					var $this = $(this);

					$(this)
						.find('input[name="HISTORY_NO_START"]')
						.removeClass('require-field');
					$(this)
						.find('input[name="HISTORY_NO_END"]')
						.removeClass('require-field');
				});
			}
		});
	});
</script>