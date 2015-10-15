<?php echo form_open('cancel_result/index', ['method' => 'GET', 'class' => 'form-search']) ?>
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">เงื่อนไขการค้นหา</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
			<div class="form-group">
				<?php echo lang('GMS_CANCEL_RESULT_CANCEL_CODE', 'CANCEL_CODE'); ?>
				<input type="text"
						name="CANCEL_CODE"
						class="form-control"
						value="<?php echo set_form_value('CANCEL_CODE', $page_var['search_params']); ?>">
			</div>
			<div class="form-group">
				<?php echo lang('GMS_CANCEL_RESULT_CANCEL_SUBJECT', 'CANCEL_SUBJECT'); ?>
				<input type="text"
						name="CANCEL_SUBJECT"
						class="form-control"
						value="<?php echo set_form_value('CANCEL_SUBJECT', $page_var['search_params']); ?>">
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
				<h3 class="box-title">ข้อมูลเหตุผลที่ไม่อนุมัติ'</h3>
				<div class="box-tools pull-right">
					<?php echo anchor('cancel_result/create', '<i class="fa fa-plus"></i>', 'class="btn btn-sm btn-default btn-create" title="เพิ่มข้อมูล"'); ?>
				</div>
			</div><!-- /.box-header -->
			<div class="box-body no-padding">
				<table class="table table-responsive table-bordered table-striped">
					<tr>
						<th><?php echo lang('GMS_CANCEL_RESULT_CANCEL_CODE'); ?></th>
						<th><?php echo lang('GMS_CANCEL_RESULT_CANCEL_SUBJECT'); ?></th>
						<th><?php echo lang('GMS_CANCEL_RESULT_CANCEL_STATUS'); ?></th>
						<th>เครื่องมือ</th>
					</tr>
					<?php foreach ($page_var['gms_cancel_results'] as $row) : ?>
						<tr>
							<td><?php echo $row['CANCEL_CODE']; ?></td>
							<td><?php echo $row['CANCEL_SUBJECT']; ?></td>
							<td><?php echo get_element_status($row['CANCEL_STATUS']); ?></td>
							<td>
								<?php echo anchor('cancel_result/update/'.$row['CANCEL_ID'],
														'<i class="fa fa-edit"></i>',
														'class="btn btn-default btn-edit"'); ?>
								<?php echo anchor(['cancel_result', 'delete', $row['CANCEL_ID']],
														'<i class="fa fa-times"></i>',
														'class="btn btn-default btn-delete" data-value="'.$row['CANCEL_ID'].'"'); ?>
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
