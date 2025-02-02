<!DOCTYPE html>
<html manifest="demo.appcache">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin CMS</title>
    <link rel="icon" href="<?php echo assets.'image/favicon.ico'; ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_assets; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_assets; ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_assets; ?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_assets; ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_assets; ?>dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery 3 -->
    <!--<script src="<?php /*echo base_assets; */?>bower_components/jquery/dist/jquery.min.js"></script>-->
    <script src="<?php echo assets.'AdminLTE/bower_components/jquery/dist/jquery-2.2.4.min.js' ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_assets; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="<?php echo assets.'datatables/js/jquery.dataTables.min.js'; ?>"></script>
    <script src="<?php echo assets.'datatables/js/dataTables.bootstrap.min.js'; ?>"></script>
    <script src="<?php echo assets.'datatables/js/dataTables.buttons.min.js'; ?>"></script>
    <script src="<?php echo assets.'datatables/js/jszip.min.js'; ?>"></script>
    <script src="<?php echo assets.'datatables/js/pdfmake.min.js'; ?>"></script>
    <script src="<?php echo assets.'datatables/js/vfs_fonts.js'; ?>"></script>
    <script src="<?php echo assets.'datatables/js/buttons.html5.min.js'; ?>"></script>
    <script src="<?php echo assets.'datatables/js/dataTables.select.min.js'; ?>"></script>
    <script src="<?php echo assets.'datatables/js/dataTables.fixedColumns.min.js'; ?>"></script>
    <script src="<?php echo assets . 'datatables/js/dataTables.fixedColumns.min.js'; ?>"></script>

    <link rel="stylesheet" href="<?php echo assets.'datatables/css/dataTables.bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo assets.'datatables/css/buttons.dataTables.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo assets.'datatables/css/select.dataTables.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo assets.'datatables/css/fixedColumns.bootstrap.min.css'; ?>">

    <script src="<?php echo assets . 'sweetAlert/sweetalert.min.js' ?>"></script>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    <!-- CUSTOM CSS -->
    <script>
        $(document).ready(function () {
            $('.sidebar-menu').tree();
            // $("input").val().toUpperCase();
            $('a[href="http://localhost' + this.location.pathname + '"]').parents().addClass('active');
        })

        $(window).load(function () {
            $(".se-pre-con").fadeOut("slow");
        });
    </script>

    <style type="text/css">
        /* input{text-transform: uppercase} */

        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }

        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(<?php echo assets.'image/Preloader_3.gif'; ?>) center no-repeat #fff;
        }

        td.details-control {
            cursor: help;
        }
    </style>

</head>
<body class="sidebar-mini skin-yellow fixed layout-boxed">
<div class="se-pre-con"></div>
<!-- Site wrapper -->
<div class="wrapper">