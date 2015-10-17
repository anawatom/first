<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?php echo base_url(); ?>img/avatar3.png" class="img-circle" alt="User Image" />
			</div>
			<div class="pull-left info">
				<p>Hello, <?php echo $this->session->userdata('LOGIN_USERNAME'); ?></p>

				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="ค้นหาโปรแกรม"/>
				<span class="input-group-btn">
					<button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li>
				<a href="<?php echo base_url(); ?>index.php/dashboard">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			<li class="treeview <?php echo ($active_menu === 's01'
											OR $active_menu === 'sports'
											OR $active_menu === 'prefix'
											OR $active_menu === 'cancel_result'
											OR $active_menu === 'certificate_sign'
											OR $active_menu === 'term_position')? 'active': ''; ?>">
				<a href="#">
					<i class="fa fa-bar-chart-o"></i>
					<span>ตารางรหัส</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li class="<?php echo ($active_menu === 's01')? 'active': ''; ?>">
						<?php echo anchor('s01/index', 'S01-ประเภทการฝึกอบรม'); ?>
					</li>
					<li class="<?php echo ($active_menu === 'sports')? 'active': ''; ?>">
						<?php echo anchor('sports/index', 'S02-ชนิดกีฬา/การฝึกอบรม'); ?>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>index.php/s03"> S03-หลักสูตรและวิทยากร</a>
					</li>
					<li class="<?php echo ($active_menu === 'prefix')? 'active': ''; ?>">
						<?php echo anchor('prefix/index', 'S04-คำนำหน้านาม'); ?>
					</li>
					<li class="<?php echo ($active_menu === 'cancel_result')? 'active': ''; ?>">
						<?php echo anchor('cancel_result/index', 'S05-เหตุผลการไม่อนุมัติ'); ?>
					</li>
					<li class="<?php echo ($active_menu === 'certificate_sign')? 'active': ''; ?>">
						<?php echo anchor('certificate_sign/index', 'S06-ผู้มีอำนาจลงนาม'); ?>
					</li>
					<li class="<?php echo ($active_menu === 'term_position')? 'active': ''; ?>">
						<?php echo anchor('term_position/index', 'S07-ตำแหน่งในรุ่นฝึกอบรม'); ?>
					</li>
				</ul>
			</li> 
			<li class="treeview  <?php echo ($active_menu === 'd04')? 'active': ''; ?>">
				<a href="#">
					<i class="fa fa-laptop"></i>
					<span>บันทึกข้อมูล</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo base_url(); ?>index.php/d01"> D01-หลักสูตรฝึกอบรม</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/d02"> D02-อนุมัติ/สละสิทธิ</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/d03"> D03-รายละเอียดหลักสูตร</a></li>
					<li class="<?php echo ($active_menu === 'd04')? 'active': ''; ?>">
						<?php echo anchor('d04/index', 'D04-ทะเบียนประวัติ'); ?>
					</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-edit"></i> <span>รายงาน</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo base_url(); ?>index.php/r01"> R01-จำนวนผู้ผ่านการฝึกอบรม</a></li>
				</ul>
			</li>
			<!--<li class="treeview">
			<a href="#">
			<i class="fa fa-edit"></i> <span>รายงาน</span>
			<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
			<li><a href="<?php echo base_url(); ?>index.php/r01"> R01-จำนวนผู้ผ่านการฝึกอบรม</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/r02"> R02-รายชื่อผู้ผ่านการฝึกอบรม</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/r03"> R03-ข้อมูลการฝึกอบรม</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/r04"> R04-ข้อมูลเปรียบเทียบ</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/r05"> R05-ข้อมูลการปฏิบัติงาน</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/r06"> R06-พิมพ์วุติบัตรผู้ผ่านการฝึกอบรม</a></li>
			</ul>
			</li> -->
		</ul>
	</section>
</aside>
<!-- End Left side column -->