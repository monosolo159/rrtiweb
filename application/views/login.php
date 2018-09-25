<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="utf-8" />
  <title>LOGIN</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <!-- BEGIN CORE CSS FRAMEWORK -->
  <link href="<?php echo base_url(); ?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
  <link href="<?php echo base_url(); ?>assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url(); ?>assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
  <!-- END CORE CSS FRAMEWORK -->
  <!-- BEGIN CSS TEMPLATE -->
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url(); ?>assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
  <!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body no-top">
  <div class="container">
    <div class="row login-container column-seperation">
      <div class="col-md-4 col-md-offset-4"> <br>
        <?php echo form_open('Admin/login',array('id' => 'login-form','class' => 'login-form')); ?>
        <div class="row">
          <div class="control-group  col-md-10">
            <label style="text-align:center;color:red">
              <?php
                if(isset($_SESSION['ADMIN_ID'])){
                  redirect('home');
                }else{
                  if(isset($_SESSION['ADMIN_LOGIN'])){
                    echo $_SESSION['ADMIN_LOGIN'];
                  }
                }
               ?>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-10">
            <!-- <label class="form-label">Username</label> -->
            <div class="controls">
              <div class="input-with-icon">
                <i class=""></i>

                <h2 style="text-align:center">เว็บแอพพลิเคชันอาจารย์ที่ปรึกษา บนระบบปฏิบัติการแอนดรอยด์</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-10">
            <label class="form-label">Username</label>
            <div class="controls">
              <div class="input-with-icon  right">
                <i class=""></i>
                <input type="text" name="txtusername" id="txtusername" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-10">
            <label class="form-label">Password</label>
            <span class="help"></span>
            <div class="controls">
              <div class="input-with-icon  right">
                <i class=""></i>
                <input type="password" name="txtpassword" id="txtpassword" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="control-group  col-md-10">
            <div class="checkbox checkbox check-success">
              <input type="checkbox" id="checkbox1" value="1">
              <label for="checkbox1">จดจำรหัสผ่าน</label>
            </div>
          </div>
        </div> -->

        <div class="row">
          <div class="col-md-10">
            <button class="btn btn-primary btn-cons pull-right" type="submit">Login</button>
          </div>
        </div>

        <?php echo form_close(); ?>
      </div>


    </div>
  </div>
  <!-- END CONTAINER -->
  <!-- BEGIN CORE JS FRAMEWORK-->
  <script src="<?php echo base_url(); ?>assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/pace/pace.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/login.js" type="text/javascript"></script>
  <!-- BEGIN CORE TEMPLATE JS -->
  <!-- END CORE TEMPLATE JS -->
</body>
</html>
