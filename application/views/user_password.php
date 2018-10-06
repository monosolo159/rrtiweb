<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div class="clearfix"></div>
	<div class="content">
		<div class="row-fluid">
			<div class="span12">
				<div class="grid simple ">
					<div class="grid-title">
						<h4><span class="semi-bold">แก้ไขรหัสผ่าน - <?php echo $user[0]['user_fname'].' '.$user[0]['user_lname'] ?></span></h4>

					</div>
					<div class="grid-body ">

						<?php echo form_open_multipart('/user/userPassword',array('id'=>'form_traditional_validation','class'=>'validate')); ?>
						<?php if ($this->uri->segment(4)=='error'): ?>
							<div class="form-group">
								<div class="input-with-icon  right">
									<i class=""></i>
									<h4 style="color:red">รหัสผ่านไม่ตรงกัน</h4>
								</div>
							</div>
						<?php endif; ?>


							<div class="form-group">
								<label class="form-label">รหัสผ่าน</label>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="password" name="user_password" id="form1Amount"  required>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">ยืนยันรหัสผ่าน</label>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="password" name="user_password_confirm" id="form1Amount" required>
								</div>
							</div>

							<div class="form-actions">
								<div class="pull-right">
									<input type="hidden" name="user_id" value="<?php echo $user[0]['user_id'] ?>">
									<button type="submit" class="btn btn-success btn-cons"><i class="icon-ok"></i> บันทึก</button>
								</div>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
