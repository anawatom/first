<div class="row">
	<!-- left column -->
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">เงื่อนไขการค้นหา</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			<?php echo form_open('report/report_TRN1R020',
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
													isset($page_var['sport_list'])? $page_var['sport_list']: [], 
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
					<!-- <div class="form-group">
						<div class="form-inline">
							<?php echo form_label(form_radio(['name' => 'HISTORY_STATUS_APPROVE',
													'value' => '0',
													'checked' => TRUE]).' ผู้ผ่านการฝึกอบรม',
													'HISTORY_STATUS_APPROVE',
													['class' => 'radio']); ?>

							<?php echo form_label(form_radio(['name' => 'HISTORY_STATUS_APPROVE',
													'value' => '1']).' ผู้เข้าร่วมการฝึกอบรม',
													'HISTORY_STATUS_APPROVE',
													['class' => 'radio']); ?>
						</div>
					</div> -->
				</div><!-- /.box-body -->

				<div class="box-footer text-center">
					<input type="submit" value="พิมพ์" class="btn btn-primary">
				</div>
			<?php echo form_close(); ?>
		</div><!-- /.box -->
	</div><!--/.col (left) -->
</div>   <!-- /.row -->