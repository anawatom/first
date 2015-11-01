<?php echo form_open('certificate_sign/index', ['method' => 'GET', 'class' => 'form-search']) ?>
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">เงื่อนไขการค้นหา</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
			<div class="form-group">
				<?php echo lang('GMS_CERTIFICATE_SIGN_SIGN_ID', 'SIGN_ID'); ?>
				<input type="text"
						name="SIGN_ID"
						class="form-control"
						value="<?php echo set_form_value('SIGN_ID', $page_var['search_params']); ?>">
			</div>
		</div><!-- /.box-body -->
		<div class="box-footer text-center">
			<input type="submit" value="ค้นหา" class="btn btn-primary">
		</div><!-- /.box-footer -->
	</div><!-- /.box -->
<?php echo form_close(); ?>

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo $page_var['table_title']; ?></h3>
				<div class="box-tools pull-right">
					<?php echo anchor('certificate_sign/create', '<i class="fa fa-plus"></i>', 'class="btn btn-sm btn-default btn-create" title="เพิ่มข้อมูล"'); ?>
				</div>
			</div><!-- /.box-header -->
			<div class="box-body no-padding">
				<table class="table table-responsive table-bordered table-striped">
					<tr>
						<th><?php echo lang('GMS_CERTIFICATE_SIGN_SIGN_ID'); ?></th>
						<th><?php echo lang('GMS_CERTIFICATE_SIGN_GENERAL_NAME'); ?></th>
						<th><?php echo lang('GMS_CERTIFICATE_SIGN_GENERAL_SIGN'); ?></th>
						<th><?php echo lang('GMS_CERTIFICATE_SIGN_MANAGER_NAME'); ?></th>
						<th><?php echo lang('GMS_CERTIFICATE_SIGN_MANAGER_SIGN'); ?></th>
						<th>เครื่องมือ</th>
					</tr>
					<?php foreach ($page_var['gms_certificate_signs'] as $row) : ?>
						<tr>
							<td><?php echo $row['SIGN_ID']; ?></td>
							<td><?php echo $row['GENERAL_NAME']; ?></td>
							<td>
								<?php echo get_element_image( empty($row['GENERAL_SIGN']) === TRUE ?
																'':
																base_url($UPLOAD_PATH_GMS_CERTIFICATE_SIGN.$row['GENERAL_SIGN']) ); ?>
							</td>
							<td><?php echo $row['MANAGER_NAME']; ?></td>
							<td>
								<?php echo get_element_image( empty($row['MANAGER_SIGN']) === TRUE ?
																'':
																base_url($UPLOAD_PATH_GMS_CERTIFICATE_SIGN.$row['MANAGER_SIGN']) ); ?>
							</td>
							<td>
								<?php echo anchor('certificate_sign/update/'.$row['SIGN_ID'],
														'<i class="fa fa-edit"></i>',
														'class="btn btn-default btn-edit"'); ?>
								<?php echo anchor(['certificate_sign', 'delete', $row['SIGN_ID']],
														'<i class="fa fa-times"></i>',
														'class="btn btn-default btn-delete" data-value="'.$row['SIGN_ID'].'"'); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div><!-- /.box-body -->
			<div class="box-footer">
				<?php echo $page_var['pagination']->create_links(); ?>
			</div><!-- /.box-footer -->
		</div><!-- /.box -->
	</div>
</div>
