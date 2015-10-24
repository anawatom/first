<div class="row">
	<!-- left column -->
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">เงื่อนไขการค้นหา</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			<?php echo form_open('report/report_TRN1R060',
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
								data-dependency-for="TERM_ID"
								data-url-dependency-for-term-id="<?php echo site_url(['term', 'get_html_options_for_dropdown_term']); ?>" 
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
													isset($page_var['sport_list'])? $page_var['sport_list']: [], 
													[], 
													'class="form-control require-field has-dependency"'
													.' data-require-field-alert-text="กรุณาเลือก ชนิดกีฬา"'
													.' data-dependency-for="TERM_ID"'
													.' data-url-dependency-for-term-id="'.site_url(['term', 'get_html_options_for_dropdown_term']).'"'
													.' disabled'); ?>
					</div>
					<div class="form-group has-error">
						<?php echo form_label('หลักสูตร *', 'TERM_ID'); ?>
						<?php echo form_dropdown( 'TERM_ID', 
													isset($page_var['term_list'])? $page_var['term_list']: [], 
													[], 
													'class="form-control require-field"'
													.' data-require-field-alert-text="กรุณาเลือก หลักสูตร"'
													.' disabled'); ?>
						<?php echo form_error('TERM_ID'); ?>
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
				</div><!-- /.box-body -->

				<div class="box-footer">
					<input type="submit" value="ค้นหา" class="btn btn-primary">
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