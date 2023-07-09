<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>:: Santhila Databot :: Assessment Test ::</title>
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo env('APP_URL');?>theme/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo env('APP_URL');?>theme/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo env('APP_URL');?>theme/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo env('APP_URL');?>theme/assets/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo env('APP_URL');?>theme/assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo env('APP_URL');?>theme/assets/css/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="<?php echo env('APP_URL');?>theme/assets/js/main/jquery.min.js"></script>
    <script src="<?php echo env('APP_URL');?>theme/assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="<?php echo env('APP_URL');?>theme/assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="<?php echo env('APP_URL');?>theme/assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script src="<?php echo env('APP_URL');?>theme/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script src="<?php echo env('APP_URL');?>theme/assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script src="<?php echo env('APP_URL');?>theme/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script src="<?php echo env('APP_URL');?>theme/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="<?php echo env('APP_URL');?>theme/assets/js/plugins/pickers/daterangepicker.js"></script>

    <script src="<?php echo env('APP_URL');?>theme/assets/js/app.js"></script>
    <script src="<?php echo env('APP_URL');?>theme/assets/js/demo_pages/dashboard.js"></script>
    <!-- /theme JS files -->
  </head>
  <body>
    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark">
      <div class="navbar-brand">
        <a href="index.html" class="d-inline-block">
          <img src="<?php echo env('APP_URL');?>theme/assets/images/logo_light.png !!}}" alt="">
        </a>
      </div>

      <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
          <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
          <i class="icon-paragraph-justify3"></i>
        </button>
      </div>

      <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
              <i class="icon-paragraph-justify3"></i>
            </a>
          </li>
        </ul>

        <span class="badge bg-info ml-md-3 mr-md-auto"><?php echo env('APP_NAME');?></span>

        <ul class="navbar-nav">
          <li class="nav-item dropdown dropdown-user">
            <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
              <img src="assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
              <span>Santhila Databot</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
              <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('signout') }}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <!-- /main navbar -->
    <!-- Page content -->
    <div class="page-content">

