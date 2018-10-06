<?php
if(!isset($_SESSION['USER_ID'])){
  redirect('home/login');
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>r-RTI</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN PLUGIN CSS -->
<link href="<?php echo base_url('assets/plugins/bootstrap-select2/select2.css'); ?>" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo base_url('assets/plugins/jquery-datatable/css/jquery.dataTables.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/plugins/datatables-responsive/css/datatables.responsive.css'); ?>" rel="stylesheet" type="text/css" media="screen"/>

<link href="<?php echo base_url('assets/plugins/pace/pace-theme-flash.css" rel="stylesheet'); ?>" type="text/css" media="screen"/>
<link href="<?php echo base_url('assets/plugins/jquery-slider/css/jquery.sidr.light.css'); ?>" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo base_url('assets/plugins/jquery-superbox/css/style.css" rel="stylesheet'); ?>" type="text/css" media="screen"/>
<!-- END PLUGIN CSS -->
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="<?php echo base_url('assets/plugins/boostrapv3/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/plugins/boostrapv3/css/bootstrap-theme.min.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/plugins/jquery-scrollbar/jquery.scrollbar.css'); ?>" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->

<!-- BEGIN CSS TEMPLATE -->
<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/css/responsive.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/css/custom-icon-set.css'); ?>" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse ">
  <!-- BEGIN TOP NAVIGATION BAR -->
  <div class="navbar-inner">
    <div class="header-seperation">
      <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">
        <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu"  class="" >
          <div class="iconset top-menu-toggle-white"></div>
          </a> </li>
      </ul>
      <!-- BEGIN LOGO -->
      <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/rrtilogo.png" class="logo" alt=""  data-src="<?php echo base_url(); ?>assets/img/rrtilogo.png" data-src-retina="<?php echo base_url(); ?>assets/img/rrtilogo2x.png" width="106" height="21"/></a>
      <!-- END LOGO -->

    </div>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <div class="header-quick-nav" >
      <!-- BEGIN TOP NAVIGATION MENU -->
      <!-- <div class="pull-left">
        <ul class="nav quick-section">
          <li class="quicklinks"> <a href="#" class="" id="layout-condensed-toggle" >
            <div class="iconset top-menu-toggle-dark"></div>
            </a> </li>
        </ul>

      </div> -->
      <!-- END TOP NAVIGATION MENU -->
      <!-- BEGIN CHAT TOGGLER -->
      <div class="pull-right">
        <ul class="nav quick-section ">
          <?php echo $_SESSION['USER_NAME']; ?>
        </ul>
        <ul class="nav quick-section ">
          <a href="<?php echo site_url('Admin/logout'); ?>"><i class="fa fa-power-off"></i></a>
        </ul>
        <!-- <ul class="nav quick-section ">
          <li class="quicklinks"> <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
            <div class="iconset top-settings-dark "></div>
            </a>
            <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
              <li><a href="user-profile.html"> My Account</a> </li>
              <li><a href="calender.html">My Calendar</a> </li>
              <li><a href="email.html"> My Inbox&nbsp;&nbsp;<span class="badge badge-important animated bounceIn">2</span></a> </li>
              <li class="divider"></li>
              <li><a href="login.html"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
            </ul>
          </li>
        </ul> -->
      </div>
      <!-- END CHAT TOGGLER -->
    </div>
    <!-- END TOP NAVIGATION MENU -->
  </div>
  <!-- END TOP NAVIGATION BAR -->
</div>
