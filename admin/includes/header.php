<?php include "class/Ems.class.php";
$db = new Ems();
if(!$_SESSION['loggedin'])
    header("Location: entry/login.php");
if (!isset($_GET['page'])||$_GET['page']=='')
    header("Location: ?page=dashboard");


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EMS | Event Management System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="asset/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="asset/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" type="text/css" href="asset/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="asset/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="asset/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="asset/css/fullcalendar.css">
    <!-- jQuery 3 -->
    <script src="asset/jquery/dist/jquery.min.js"></script>

    <!-- Theme style -->
    <link rel="stylesheet" href="asset/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="asset/css/skins/_all-skins.min.css">

        <link rel="stylesheet" href="asset/bootstrap-slider/slider.css" />
        <link rel="stylesheet" href="asset/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" />
        <link rel="stylesheet" href="asset/iCheck/all.css" />
        <link rel="stylesheet" href="asset/timepicker/bootstrap-timepicker.min.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!-- Google Font -->
</head>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>E</b>MS</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>EMS </b>Admin</span>
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
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Suggestion Box</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="asset/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Student A
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Got a problem accessing the site</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 Comments</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 members commented on a post today
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
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
                            <img src="asset/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">Sean Biggy</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="asset/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    Sean Biggy - Developer
                                    <small>Member since Feb. 2018</small>
                                </p>
                            </li>
                            
                            
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="?page=profile" class="btn btn-default btn-flat"><i class="fa fa-user-secret"></i> Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="?page=logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
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
                    <img src="asset/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Sean Biggy</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class=" active">
                    <a href="?page=dashboard">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                    
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-clipboard"></i>
                        <span>Post Options</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="?page=post"><i class="fa fa-th-list"></i> All Posts</a></li>
                        <li><a href="?page=post&type=new"><i class="fa fa-plus-circle"></i> New Post</a></li>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>Event Option</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="?page=event"><i class="fa fa-calendar-o"></i> All Events</a></li>
                        <li><a href="?page=event&type=new"><i class="fa fa-calendar-plus-o"></i> New Event</a></li>
                    </ul>
                </li>
                <li>
                    <a href="?page=comment">
                        <i class="fa fa-comments-o"></i> <span>Comments</span>
                        <span class="pull-right-container">
              <small class="label pull-right bg-green">4</small>
            </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="?page=users">
                        <i class="fa fa-user-circle-o"></i>
                        <span>Users</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="?page=users"><i class="fa fa-users"></i> All Users</a></li>
                        <li><a href="?page=users&type=new"><i class="fa fa-user-plus"></i> New User</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="?page=logout">
                        <i class="fa fa-sign-out"></i> <span>Logout</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php if (isset($_GET['msg'])) { ?>
        <div class="alert alert-info" style="margin: 0px 80px 30px"><?php echo isset($_GET['msg']) ? $_GET['msg'] : '' ?></div>
        <?php } ?>