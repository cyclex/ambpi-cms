<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo assets; ?>uploads/original/profile.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo strtoupper($_SESSION['USERNAME']) ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree" id="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li class="menus">
                <a href="<?php echo base_url('home'); ?>">
                    <i class="fa fa-folder-o"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview">
                <a href="<?php echo base_url(); ?>">
                    <i class="fa fa-folder-o"></i>
                    <span>Redeem</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="menus"><a href="<?php echo base_url('redeem'); ?>"><i class="fa fa-circle-o"></i><span>Data Redeem</span></a></li>
                    <li class="menus"><a href="<?php echo base_url('validation'); ?>"><i class="fa fa-circle-o"></i><span>History Validasi Data</span></a></li>
                    <li class="menus"><a href="<?php echo base_url('job/download'); ?>"><i class="fa fa-circle-o"></i><span>Daftar Download</span></a></li>
                </ul>
            </li>

            <li class="menus">
                <a href="<?php echo base_url('summary'); ?>">
                    <i class="fa fa-folder-o"></i>
                    <span>Ringkasan Stok Hadiah</span>
                </a>
            </li>

            <?php if ($isAdmin){ ?>
            <li class="menus">
                <a href="<?php echo base_url('campaign'); ?>">
                    <i class="fa fa-folder-o"></i>
                    <span>Program Management</span>
                </a>
            </li>
            <?php } ?>

            <li class="treeview">
                <a href="<?php echo base_url(); ?>">
                    <i class="fa fa-folder-o"></i>
                    <span>Urutan Hadiah</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="menus"><a href="<?php echo base_url('prizes'); ?>"><i class="fa fa-circle-o"></i><span>Data Urutan</span></a></li>
                    <li class="menus"><a href="<?php echo base_url('job/upload'); ?>"><i class="fa fa-circle-o"></i><span>Daftar Upload</span></a></li>
                </ul>
            </li>

            <?php if ($isAdmin){ ?>
            <li class="menus">
                <a href="<?php echo base_url('user'); ?>">
                    <i class="fa fa-folder-o"></i>
                    <span>User Management</span>
                </a>
            </li>
            <?php } ?>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>