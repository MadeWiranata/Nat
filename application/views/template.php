<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>wiranata</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/kunci/kk.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/kunci/datepicker.js'); ?>"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/kunci/bootstrap-select.min.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/kunci/bootstrap-select.min.js'); ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/kunci/select2.min.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/kunci/select2.min.js'); ?>" defer></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/kunci/dataTables.bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/kunci/datatables.min.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/kunci/datatables.min.js'); ?>" defer></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/kunci/tulisan.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/head/bootstrap.min.js'); ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/head/bootstrap.min.css'); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/kunci/bootstrap-glyphicons.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/kunci/timepicker.min.js'); ?>" defer></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/kunci/timepicker.min.css'); ?>">
    <link href='<?= base_url() ?>picture/logo.png' rel='shortcut icon'>

    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js" defer></script>
    <!-- Google Font -->
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url() ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>W</b>N</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Wiranata</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->

                        <!-- Notifications: style can be found in dropdown.less -->
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">

                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                        role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url() ?>picture/nopicture.png" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $this->fungsi->user_login()->username ?></span>
                            </a>
                            <ul class="dropdown-menu">

                                <li class="user-header">
                                    <img src="<?= base_url() ?>picture/nopicture.png" class="img-circle"
                                        alt="User Image">

                                    <p>
                                        <?= $this->fungsi->user_login()->username ?>
                                        <small><?= $this->fungsi->user_login()->nama_jabatan ?></small>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?= site_url('C_Profile') ?>"
                                            class="btn btn-default btn-flat fa fa-user-circle"> Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= site_url('login/logout') ?>"
                                            class="btn btn-default btn-flat fa fa-sign-out"> Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <!-- Control Sidebar Toggle Button -->

                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url() ?>picture/nopicture.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $this->fungsi->user_login()->username ?></p>
                        <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
                        <a><?= $this->fungsi->user_login()->nama_jabatan ?></a>
                    </div>
                </div>

                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Menu</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-suitcase"></i> <span>Master</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="<?= site_url('User') ?>"><i class="fa fa-address-book"></i> <span>Data Karyawan</span></a>
                            </li>
                            <li>
                                <a href="<?= site_url('Unit') ?>"><i class="fa fa-th"></i> <span>Data Unit</span></a>
                            </li>
                            <li>
                                <a href="<?= site_url('Jabatan') ?>"><i class="fa fa-address-card-o"></i> <span>Data Jabatan</span></a>
                            </li>
                        </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- ==== =========================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php echo $contents ?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2024 <a>Wiranata</a></strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
    <script>
    $(document).ready(function() {
        var url = window.location;
        // for sidebar menu but not for treeview submenu
        $('ul.sidebar-menu a').filter(function() {
            return this.href == url;
        }).parent().siblings().removeClass('active').end().addClass('active');
        // for treeview which is like a submenu
        $('ul.treeview-menu a').filter(function() {
                return this.href == url;
            }).parentsUntil(".sidebar-menu > .treeview-menu").siblings().removeClass('active menu-open').end()
            .addClass('active menu-open');
    })
    </script>
</body>

</html>