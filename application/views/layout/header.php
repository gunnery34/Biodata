<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>dist/css/skins/_all-skins.min.css">

    <?php echo $css_outline; ?> <!-- css outline -->

    <style>
        @import url("https://fonts.googleapis.com/css?family=Alata&display=swap");

        body {
            font-family: "Alata", sans-serif !important;
            /* line-height: 1.72222; */
            line-height: normal;
            font-size: 16px;
            color: #34495e;
            /* background-color: #ffffff; */
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        span.logo-mini,
        span.logo-lg {
            font-family: "Alata", sans-serif !important;
        }

        button, a, .box {
            border-radius: 0 !important;
        }

        .select2-selection,
        ul.select2-results__options,
        li.select2-results__option,
        .select2-results,
        .select2-dropdown,
        .select2-dropdown--below { border-radius: 0 !important; }

        .select2-container--default .select2-selection--single { border-color: #d2d6de; }

        .select2-container--default .select2-selection--single .select2-selection__rendered { line-height: 26px; }

        .select2-container--default .select2-selection--single .select2-selection__arrow { right: 6px; top: 3px; }

        .select2-container .select2-selection--single { height: 34px; }

        .select2-container--default .select2-selection--multiple .select2-selection__choice { background-color: #3c8dbc; color: #fff; }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove { color: #fff; }

        <?php echo $css_inline; ?> /* css inline */
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo base_url('dashboard/index'); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>P</b>HP</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>PHP</b> Indonesia</span>
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
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
								<span class="hidden-xs"><?php echo $this->session->userdata('UsrEmail'); ?></span>
							</a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo base_url('assets/theme/AdminLTE-v.2.4/'); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo $this->session->userdata('UsrEmail'); ?>
                                        <small>Member since <?php echo $this->session->userdata('UsrCreated'); ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url('main/sign_out') ?>" class="btn btn-default btn-flat">Sign out</a>
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