<div class="row">
	<!-- left column -->
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">เงื่อนไขการค้นหา</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			<?php echo form_open('http://report.dpe.go.th',
								['method' => 'POST',
									'name' => 'FormClearReports',
									'target' => '_blank']); ?>
				<div class="box-body">
					<div class="form-group">
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
												[], 
												'class="form-control has-dependency" data-url-dependency="'.site_url(['sports', 'get_html_options_by_type_id']).'"'
												.''); ?>
					</div>
					<div class="form-group">
						<?php echo form_label('ชนิดกีฬา', 'SPORT_ID'); ?>
						<?php echo form_dropdown( 'SPORT_ID', 
													isset($page_var['sport_list'])? $page_var['sport_list']: [], 
													[], 
													'class="form-control has-dependency"'
													.' data-dependency-for="TERM_ID"'
													.' data-url-dependency-for-term-id="'.site_url(['term', 'get_html_options_for_dropdown_term']).'"'
													.' disabled'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label('หลักสูตร', 'TERM_ID'); ?>
						<?php echo form_dropdown( 'TERM_ID', 
													isset($page_var['term_list'])? $page_var['term_list']: [], 
													[], 
													'class="form-control"'
													.' disabled'); ?>
						<?php echo form_error('TERM_ID'); ?>
					</div>
					<div class="form-group">
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
					</div>
					<div class="form-group">
						<?php echo form_label('ประเภทของรายงาน', 'REPORT_TYPE'); ?>
						<select name="report" id="report" class="form-control">
							<option value="file:/C:/Program Files (x86)/i-net Clear Reports/startpage/Report_train_history7.pdf" selected="true">PDF</option>
							<option value="file:/C:/Program Files (x86)/i-net Clear Reports/startpage/Report_train_history7.xls" >EXCEL</option>
						</select>
					</div>
				</div><!-- /.box-body -->

				<div class="box-footer">
					<input type="submit" name="search" value="ค้นหา" class="btn btn-primary">
				</div>
			<?php echo form_close(); ?>
		</div><!-- /.box -->
	</div><!--/.col (left) -->
</div>   <!-- /.row -->