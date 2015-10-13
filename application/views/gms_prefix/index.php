<?php echo form_open('prefix/index', ['method' => 'GET', 'class' => 'form-search']) ?>
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">เงื่อนไขการค้นหา</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
			<div class="form-group">
				<?php echo form_label('คำนำหน้าภาษาไทย', 'PREFIX_TH'); ?>
				<input type="text"
						name="PREFIX_TH"
						class="form-control"
						value="<?php echo set_form_value('PREFIX_TH', $page_var['search_params']); ?>">
			</div>
			<div class="form-group">
				<?php echo form_label('คำนำหน้าภาษาไทยย่อ', 'PREFIX_TH_SH'); ?>
				<input type="text"
						name="PREFIX_TH_SH"
						class="form-control"
						value="<?php echo set_form_value('PREFIX_TH_SH', $page_var['search_params']); ?>">
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
				<h3 class="box-title">ข้อมูลคำนำหน้านาม</h3>
				<div class="box-tools pull-right">
					<?php echo anchor('prefix/create', '<i class="fa fa-plus"></i>', 'class="btn btn-sm btn-default btn-create" title="เพิ่มข้อมูล"'); ?>
				</div>
			</div><!-- /.box-header -->
			<div class="box-body no-padding">
				<table class="table table-responsive table-bordered">
					<tr>
						<th>คำนำหน้าภาษาไทย</th>
						<th>คำนำหน้าภาษาไทยย่อ</th>
						<th>คำนำหน้าภาษาอังกฤษ</th>
						<th>คำนำหน้าภาษาอังกฤษย่อ</th>
						<th>สถานะ</th>
						<th>เครื่องมือ</th>
					</tr>
					<?php foreach ($page_var['gms_prefixs'] as $row) : ?>
						<tr>
							<td><?php echo $row['PREFIX_TH']; ?></td>
							<td><?php echo $row['PREFIX_TH_SH']; ?></td>
							<td><?php echo $row['PREFIX_EN']; ?></td>
							<td><?php echo $row['PREFIX_EN_SH']; ?></td>
							<td><?php echo get_element_status($row['PREFIX_STATUS']); ?></td>
							<td>
								<?php echo anchor('prefix/update/'.$row['PREFIX_ID'], '<i class="fa fa-edit"></i>', 'class="btn btn-default btn-edit"'); ?>
								<a class="btn btn-default btn-delete"
										href="<?php echo site_url(['prefix', 'delete', $row['PREFIX_ID']]); ?>"
										data-value="<?php echo $row['PREFIX_ID']; ?>">
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
