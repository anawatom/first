<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">ข้อมูลตำแหน่งในรุ่นฝึกอบรม</h3>
				<div class="box-tools pull-right">
					<?php echo anchor('term_position/create', '<i class="fa fa-plus"></i>', 'class="btn btn-sm btn-default btn-create" title="เพิ่มข้อมูล"'); ?>
				</div>
			</div><!-- /.box-header -->
			<div class="box-body no-padding">
				<table class="table table-responsive table-bordered table-striped">
					<tr>
						<th><?php echo lang('GMS_TERM_POSITION_POSITION_ID'); ?></th>
						<th><?php echo lang('GMS_TERM_POSITION_POSITION_NAME'); ?></th>
						<th>เครื่องมือ</th>
					</tr>
					<?php foreach ($page_var['gms_term_positions'] as $row) : ?>
						<tr>
							<td><?php echo $row['POSITION_ID']; ?></td>
							<td><?php echo $row['POSITION_NAME']; ?></td>
							<td>
								<?php echo anchor('term_position/update/'.$row['POSITION_ID'],
														'<i class="fa fa-edit"></i>',
														'class="btn btn-default btn-edit"'); ?>
								<?php echo anchor(['term_position', 'delete', $row['POSITION_ID']],
														'<i class="fa fa-times"></i>',
														'class="btn btn-default btn-delete" data-value="'.$row['POSITION_ID'].'"'); ?>
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
