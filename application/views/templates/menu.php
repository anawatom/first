
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
        <li class="treeview">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>ตารางรหัส</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/s01"> S01-ประเภทการฝึกอบรม</a>
                </li>
                <li class="<?php echo ($active_menu === 'sports')? 'active': ''; ?>">
                    <?php echo anchor('sports/index', 'S02-ชนิดกีฬา/การฝึกอบรม'); ?>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/s03"> S03-หลักสูตรและวิทยากร</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/s04"> S04-คำนำหน้านาม</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/s05"> S05-เหตุผลการไม่อนุมัติ</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/s06"> S06-ผู้มีอำนาจลงนาม</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/s07"> S07-ตำแหน่งในรุ่นฝึกอบรม</a>
                </li>
            </ul>
        </li> 
        <li class="treeview">
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>บันทึกข้อมูล</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>index.php/d01"> D01-หลักสูตรฝึกอบรม</a></li>

                <li><a href="<?php echo base_url(); ?>index.php/d02"> D02-อนุมัติ/สละสิทธิ</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/d03"> D03-รายละเอียดหลักสูตร</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/d04"> D04-ทะเบียนประวัติ</a></li> 
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