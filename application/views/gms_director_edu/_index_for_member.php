<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">ข้อมูลประวัติการศึกษา</h3>
				<div class="box-tools pull-right">
					<?php echo anchor(['member', $page_var['member_id'], 'director_edu', 'create'], 
										'<i class="fa fa-plus"></i>', 
										'class="btn btn-sm btn-default btn-create" title="เพิ่มข้อมูล" target="_parent"'); ?>
				</div>
			</div><!-- /.box-header -->
			<div class="box-body no-padding">
				<table class="table table-responsive table-bordered">
					<tr>
						<th><?php echo lang('GMS_DIRECTOR_EDU_EDU_YR'); ?></th>
						<th><?php echo lang('GMS_DIRECTOR_EDU_EDU_LEVEL'); ?></th>
						<th><?php echo lang('GMS_DIRECTOR_EDU_EDU_DEPT'); ?></th>
						<th><?php echo lang('GMS_DIRECTOR_EDU_EDU_INSTITUTE'); ?></th>
						<th>เครื่องมือ</th>
					</tr>
					<?php foreach ($page_var['gms_director_edus'] as $row) : ?>
						<tr>
							<td><?php echo $row['EDU_YR']; ?></td>
							<td><?php echo $row['EDU_LEVEL']; ?></td>
							<td><?php echo $row['EDU_DEPT']; ?></td>
							<td><?php echo $row['EDU_INSTITUTE']; ?></td>
							<td>
								<?php echo anchor(['member', $row['MEMBER_ID'], 'director_edu','update', $row['DI_EDU_ID']],
													'<i class="fa fa-edit"></i>',
													'class="btn btn-default btn-edit" target="_parent"'); ?>
								<?php echo anchor(['member', $row['MEMBER_ID'], 'director_edu','delete', $row['DI_EDU_ID']],
													'<i class="fa fa-times"></i>',
													'class="btn btn-default btn-delete" data-value="'.$row['DI_EDU_ID'].'" data-target="_parent"'); ?>
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
