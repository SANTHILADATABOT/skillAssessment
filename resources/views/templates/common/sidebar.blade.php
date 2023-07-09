<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
  <!-- Sidebar mobile toggler -->
  <div class="sidebar-mobile-toggler text-center">
    <a href="#" class="sidebar-mobile-main-toggle">
      <i class="icon-arrow-left8"></i>
    </a>
    Navigation
    <a href="#" class="sidebar-mobile-expand">
      <i class="icon-screen-full"></i>
      <i class="icon-screen-normal"></i>
    </a>
  </div>
  <!-- /sidebar mobile toggler -->
  <!-- Sidebar content -->
  <div class="sidebar-content">
    <!-- Main navigation -->
    <div class="card card-sidebar-mobile">
      <ul class="nav nav-sidebar" data-nav-type="accordion">
        <!-- Main -->
        <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
        <li class="nav-item">
            <a href="<?php echo env('APP_URL');?>" class="nav-link active">
                <i class="icon-home4"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- /main -->
        <!-- Menus -->
	      <li class="nav-item nav-item-submenu">
            <a href="<?php echo env('APP_URL').'companies';?>" class="nav-link"><i class="icon-office"></i> <span>Companies</span></a>
        </li>
        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-users4"></i> <span>Employees</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="ECharts library">
                <li class="nav-item"><a href="<?php echo env('APP_URL').'employees';?>" class="nav-link">List Employees</a></li>
            </ul>
        </li>
        <!-- Menus -->
      </ul>
    </div>
    <!-- /main navigation -->
  </div>
  <!-- /sidebar content -->
  </div>
  <!-- /main sidebar -->
  <!-- Main content -->
  <div class="content-wrapper">
  <!-- Page header -->
  <div class="page-header page-header-light">
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
      <div class="d-flex">
        <div class="breadcrumb">
          <a href="<?php echo env('APP_URL');?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
          <!--<span class="breadcrumb-item active">Dashboard</span>-->
        </div>
		<!--{{Route::currentRouteName()}}-->
<?php	switch(Route::currentRouteName()) {
			case 'companies.index' :?>
				<a href="#" class="header-elements-toggle text-default"></a>
          		<span class="breadcrumb-item active">&nbsp;/&nbsp;&nbsp;<i class="icon-office mr-2"></i> Companies</span>
<?php			break;
			case 'companies.create'	: ?>
				<span class="breadcrumb-item">&nbsp;/&nbsp;&nbsp;<a href="<?php echo env('APP_URL').'companies';?>" class="header-elements-toggle text-default"><i class="icon-office mr-2"></i> Companies</a></span>
          		<span class="breadcrumb-item active"><i class="icon-office mr-2"></i> Create Company</span>
<?php			break;
			case 'companies.edit':?>
				<span class="breadcrumb-item">&nbsp;/&nbsp;&nbsp;<a href="<?php echo env('APP_URL').'companies';?>" class="header-elements-toggle text-default"><i class="icon-office mr-2"></i> Companies</a></span>
          		<span class="breadcrumb-item active"><i class="icon-office mr-2"></i> Edit Company</span>
<?php			break;
			case 'employees.index' :?>
				<a href="#" class="header-elements-toggle text-default"></a>
	  			<span class="breadcrumb-item active">&nbsp;/&nbsp;&nbsp;<i class="icon-users4 mr-2"></i> Employees</span>
<?php			break;
			case 'employees.create'	:  ?>
				<span class="breadcrumb-item">&nbsp;/&nbsp;&nbsp;<a href="<?php echo env('APP_URL').'employees';?>" class="header-elements-toggle text-default"><i class="icon-users4 mr-2"></i> Employees</a></span>
				<span class="breadcrumb-item active"><i class="icon-office mr-2"></i> Create Employee</span>
<?php			break;
			case 'employees.edit':?>
					<span class="breadcrumb-item">&nbsp;/&nbsp;&nbsp;<a href="<?php echo env('APP_URL').'employees';?>" class="header-elements-toggle text-default"><i class="icon-users4 mr-2"></i> Employees</a></span>
					<span class="breadcrumb-item active"><i class="icon-office mr-2"></i> Edit Employee</span>
<?php			break;
		}?>
      </div>
    </div>
  </div>
  <!-- /page header -->
  <!-- Content area -->
  <div class="content">
