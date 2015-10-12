<?php echo form_open('sports/index', ['method' => 'GET', 'class' => 'form-search']) ?>
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">เงื่อนไขการค้นหา</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
			<div class="form-group">
				<?php echo form_label('ประเภทการฝึกอบรม', 'TYPE_ID'); ?>
				<?php echo form_dropdown('TYPE_ID', 
											$page_var['gms_type_list'], 
											set_value('TYPE_ID', isset($page_var['search_params']['TYPE_ID']) ? $page_var['search_params']['TYPE_ID'] : ''), 'class="form-control"'); ?>
			</div>
			<div class="form-group">
				<?php echo form_label('ชนิดกีฬา/ชนิดการฝึกอบรม', 'TYPE_ID'); ?>
				<input type="text" 
						name="SPORT_SUBJECT" 
						class="form-control" 
						value="<?php echo set_value('SPORT_SUBJECT', isset($page_var['search_params']['SPORT_SUBJECT']) ? $page_var['search_params']['SPORT_SUBJECT'] : ''); ?>">
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
			<div class="box-footer">
				<?php echo $page_var['pagination']->create_links(); ?>
			</div><!-- /.box-footer -->
		</div><!-- /.box -->
	</div>
</div>