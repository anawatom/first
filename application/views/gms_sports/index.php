<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">ข้อมูลนิดกีฬา/ชนิดการฝึกอบรม</h3>
				<div class="box-tools pull-right">
					<a href="<?php echo base_url('index.php/sports/create'); ?>" class="btn btn-sm btn-default" title="เพิ่มข้อมูล"><i class="fa fa-plus"></i></a>
				</div>
			</div><!-- /.box-header -->
			<div class="box-body no-padding">
				<table class="table table-responsive table-bordered">
					<tr>
						<th style="width: 10%">รหัสประเภทการฝึกอบรม</th>
						<th style="width: 70%">ชื่อชนิดกีฬา</th>
						<th style="width: 8%">สถานะ</th>
						<th style="width: 10%">เครื่องมือ</th>
					</tr>
					<?php foreach ($page_var['gms_sports'] as $row) : ?>
						<tr>
							<td><?php echo $row['TYPE_SUBJECT']; ?></td>
							<td><?php echo $row['SPORT_SUBJECT']; ?></td>
							<td>
								<?php
									if ($row['SPORT_STATUS'] === '1') {
										echo '<span class="label label-success">'
												.$STATUSES[$row['SPORT_STATUS']]
												.'</span>';
									} else {
										echo '<span class="label label-danger">'
												.$STATUSES[$row['SPORT_STATUS']]
												.'</span>';
									}
								?>
							</td>
							<td>
								<a class="btn btn-default btn-edit" href="<?php echo site_url('sports/update/'.$row['SPORT_ID']); ?>">
									<i class='fa fa-edit'></i>
								</a>
								<a class="btn btn-default btn-delete" 
										href="<?php echo site_url(['sports', 'delete', $row['SPORT_ID']]); ?>"
										data-value="<?php echo $row['SPORT_ID']; ?>">
									<i class='fa fa-times'></i>
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div><!-- /.box-body -->
			<div class="box-footer text-right">
				<?php echo $page_var['pagination']->create_links(); ?>
			</div><!-- /.box-footer -->
		</div><!-- /.box -->
	</div>
</div>