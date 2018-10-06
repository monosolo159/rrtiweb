<div class="page-container row-fluid">
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar" id="main-menu">
    <!-- BEGIN MINI-PROFILE -->
    <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
      <!-- END MINI-PROFILE -->
      <!-- BEGIN SIDEBAR MENU -->
      <!-- <p class="menu-title">BROWSE <span class="pull-right"><a href="javascript:;"><i class="fa fa-refresh"></i></a></span></p> -->
      <ul>
        <!-- <li class=""> <a href="<?php echo site_url('Home/dashboard'); ?>"> <i class="fa fa-tachometer"></i>  <span class="title">ภาพรวม</span></a></li> -->
        <li class=""> <a href="<?php echo site_url('Home/riskpoint'); ?>"> <i class="fa fa-exclamation-triangle"></i>  <span class="title">จุดเสี่ยง</span></a></li>
        <!-- <li class="start"> <a href="<?php echo base_url(); ?>"> <i class="icon-custom-home"></i>  <span class="title">ภาพรวม</span></a></li> -->
        <!-- <li class=""> <a href="<?php echo site_url('Home/teacher'); ?>"> <i class="fa fa-user"></i>  <span class="title">อุบัติเหตุ</span></a></li> -->
        <!-- <li class=""> <a href="<?php echo site_url('Home/user'); ?>"> <i class="fa fa-user" aria-hidden="true"></i>  <span class="title">ผู้ใช้</span></a></li> -->
        <!-- <li class=""> <a href="<?php echo site_url('Home/student'); ?>"> <i class="fa fa-users"></i>  <span class="title">รายงาน</span></a></li> -->

        <?php if ($_SESSION['USER_TYPE']==1): ?>
          <?php $menu_user = $this->Usermodel->userType(); ?>
          <li class=""> <a href="javascript:;"> <i class="fa fa-user"></i> <span class="title">ผู้ใช้</span> <span class="arrow"></span> </a>
            <ul class="sub-menu" style="display: none;">
              <?php foreach ($menu_user as $key => $value): ?>
                <li> <a href="<?php echo site_url('Home/user/'.$value['user_type_id']); ?>"><?php echo $value['user_type_name'] ?> </a> </li>
              <?php endforeach; ?>
            </ul>
          </li>
        <?php endif; ?>



      </ul>

      <div class="clearfix"></div>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
  <a href="#" class="scrollup">Scroll</a>
