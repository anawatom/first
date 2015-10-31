<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ระบบฝึกอบรมกรมพลศึกษา</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url(); ?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo base_url(); ?>css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo base_url(); ?>css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="<?php echo base_url(); ?>css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url(); ?>css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo base_url(); ?>css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url('css/jQueryUI/jquery-ui-1.10.3.custom.min.css'); ?>" rel="stylesheet" type="text/css">
        
        <link href="<?php echo base_url('css/bootstrap-datepicker-1.4.0/bootstrap-datepicker.css'); ?>" rel="stylesheet" type="text/css">
        
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>css/override.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <?php echo anchor('dashboard/index', 
                        'IPESHD', 
                        ['class' => 'logo']); ?>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $this->session->userdata('LOGIN_USERNAME'); ?> <i class="caret"></i></span> 
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo base_url(); ?>img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $this->session->userdata('LOGIN_USERNAME'); ?> - Admin Developer
                                        <small><?php echo date("Y-m-d"); ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <?php echo anchor('login/logout',
                                                    'Sign out',
                                                    ['class' => 'btn btn-default btn-flat']); ?>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <!-- <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url(); ?>img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $this->session->userdata('LOGIN_USERNAME'); ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div> -->
                    <!-- search form -->
                    <!-- <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="ค้นหาโปรแกรม"/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form> -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php $active_menu = $this->uri->segment(1); ?>
                    <ul class="sidebar-menu">
                        <li class="active">
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
                        <li class="treeview <?php echo ($active_menu === 'r01'
                                            OR $active_menu === 'r02'
                                            OR $active_menu === 'r06')? 'active': ''; ?>">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>รายงาน</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php echo ($active_menu === 'r01')? 'active': ''?>">
                                    <?php echo anchor('r01/index', 'R01-จำนวนผู้ผ่านการฝึกอบรม'); ?>
                                </li>
                                <li class="<?php echo ($active_menu === 'r02')? 'active': ''?>">
                                    <?php echo anchor('r02/index', 'R02-รายชื่อผู้ผ่านการฝึกอบรม'); ?>
                                </li>
                                <li>
                                    <?php echo anchor('http://ipeshd.dpe.go.th/?actions=report/list', 'R03-ข้อมูลการฝึกอบรม'); ?>
                                </li>
                                <li>
                                    <?php echo anchor('http://ipeshd.dpe.go.th/?actions=report/compare', 'R04-ข้อมูลเปรียบเทียบ'); ?>
                                </li>
                                <li>
                                    <?php echo anchor('http://ipeshd.dpe.go.th/?actions=report/work', 'R05-ข้อมูลการปฏิบัติงาน'); ?>
                                </li>
                                <li class="<?php echo ($active_menu === 'r06')? 'active': ''?>">
                                    <?php echo anchor('r06/index', 'R06-พิมพ์วุติบัตรผู้ผ่านการฝึกอบรม'); ?>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>