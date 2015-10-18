<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">ทะเบียนประวัติ</h3>
				<div class="box-tools pull-right">
					<?php echo anchor(['member', $page_var['member_id'], 'director_work', 'create'], 
										'<i class="fa fa-plus"></i>', 
										'class="btn btn-sm btn-default btn-create" title="เพิ่มข้อมูล" target="_parent"'); ?>
				</div>
			</div><!-- /.box-header -->
			<div class="box-body no-padding">
				<table class="table table-responsive table-bordered">
					<tr>
						<th><?php echo lang('GMS_DIRECTOR_WORK_WORK_YR'); ?></th>
						<th><?php echo lang('GMS_DIRECTOR_WORK_WORK_POSITION'); ?></th>
						<th><?php echo lang('GMS_DIRECTOR_WORK_WORK_DEPT'); ?></th>
						<th>เครื่องมือ</th>
					</tr>
					<?php foreach ($page_var['gms_director_works'] as $row) : ?>
						<tr>
							<td><?php echo $row['WORK_YR']; ?></td>
							<td><?php echo $row['WORK_POSITION']; ?></td>
							<td><?php echo $row['WORK_DEPT']; ?></td>
							<td>
								<?php echo anchor(['member', $row['MEMBER_ID'], 'director_work','update', $row['DI_WORK_ID']],
													'<i class="fa fa-edit"></i>',
													'class="btn btn-default btn-edit" target="_parent"'); ?>
								<?php echo anchor(['member', $row['MEMBER_ID'], 'director_work','delete', $row['DI_WORK_ID']],
													'<i class="fa fa-times"></i>',
													'class="btn btn-default btn-delete" data-value="'.$row['DI_WORK_ID'].'" data-target="_parent"'); ?>
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
