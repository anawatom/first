<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">ข้อมูลประวัติฝึกอบรม</h3>
				<div class="box-tools pull-right">
					<?php echo anchor(['member', $page_var['member_id'], 'history', 'create'], 
										'<i class="fa fa-plus"></i>', 
										'class="btn btn-sm btn-default btn-create" title="เพิ่มข้อมูล" target="_parent"'); ?>
				</div>
			</div><!-- /.box-header -->
			<div class="box-body no-padding">
				<table class="table table-responsive table-bordered">
					<tr>
						<th>ปีงบประมาณ</th>
						<th>หลักสูตร</th>
						<th>วันที่อบรม</th>
						<th>เครื่องมือ</th>
					</tr>
					<?php foreach ($page_var['gms_historys'] as $row) : ?>
						<tr>
							<td><?php echo $row['TERM_YEAR']; ?></td>
							<td><?php echo $row['TERM_NAME']; ?></td>
							<td><?php echo format_db_date_to_show($row['TERM_TIME_START']).' - '.format_db_date_to_show($row['TERM_TIME_END']); ?></td>
							<td>
								<?php echo anchor(['member', $row['MEMBER_ID'], 'history','update', $row['HISTORY_ID']],
													'<i class="fa fa-edit"></i>',
													'class="btn btn-default btn-edit" target="_parent"'); ?>
								<?php echo anchor(['member', $row['MEMBER_ID'], 'history','delete', $row['HISTORY_ID']],
													'<i class="fa fa-times"></i>',
													'class="btn btn-default btn-delete" data-value="'.$row['HISTORY_ID'].'" data-target="_parent"'); ?>
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
