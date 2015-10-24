<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">ข้อมูลประวัติการปฏิบัติงาน</h3>
				<div class="box-tools pull-right">
					<?php echo anchor(['member', $page_var['member_id'], 'work', 'create'], 
										'<i class="fa fa-plus"></i>', 
										'class="btn btn-sm btn-default btn-create" title="เพิ่มข้อมูล" target="_parent"'); ?>
				</div>
			</div><!-- /.box-header -->
			<div class="box-body no-padding">
				<table class="table table-responsive table-bordered">
					<tr>
						<th><?php echo lang('GMS_WORK_WORK_YEAR'); ?></th>
						<th><?php echo lang('GMS_WORK_WORK_SUBJECT'); ?></th>
						<th><?php echo lang('GMS_WORK_SPORT_ID'); ?></th>
						<th><?php echo lang('GMS_WORK_WORK_LEVEL'); ?></th>
						<th><?php echo lang('GMS_WORK_WORK_TIME_START'); ?></th>
						<th>เครื่องมือ</th>
					</tr>
					<?php foreach ($page_var['gms_works'] as $row) : ?>
						<tr>
							<td><?php echo $row['WORK_YEAR']; ?></td>
							<td><?php echo $row['WORK_SUBJECT']; ?></td>
							<td><?php echo $row['SPORT_SUBJECT']; ?></td>
							<td><?php echo $row['LEVEL_DETAIL']; ?></td>
							<td><?php echo format_db_date_to_show($row['WORK_TIME_START']); ?></td>
							<td>
								<?php echo anchor(['member', $row['MEMBER_ID'], 'work','update', $row['WORK_ID']],
													'<i class="fa fa-edit"></i>',
													'class="btn btn-default btn-edit" target="_parent"'); ?>
								<?php echo anchor(['member', $row['MEMBER_ID'], 'work','delete', $row['WORK_ID']],
													'<i class="fa fa-times"></i>',
													'class="btn btn-default btn-delete" data-value="'.$row['WORK_ID'].'" data-target="_parent"'); ?>
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
