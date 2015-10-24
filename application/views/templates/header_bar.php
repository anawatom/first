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