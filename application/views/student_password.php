<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div class="clearfix"></div>
	<div class="content">
		<div class="row-fluid">
			<div class="span12">
				<div class="grid simple ">
					<div class="grid-title">
						<h4><span class="semi-bold">แก้ไขรหัสผ่านนักศึกษา</span></h4>

					</div>
					<div class="grid-body ">

						<?php echo form_open_multipart('/Member/studentPassword',array('id'=>'form_traditional_validation','class'=>'validate')); ?>

							<div class="form-group">
								<label class="form-label">PASSWORD</label>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="password" name="member_password" id="form1Amount" class="form-control" required>
								</div>
							</div>

							<div class="form-actions">
								<div class="pull-right">
									<input type="hidden" name="member_id" value="<?php echo $student[0]['member_id'] ?>">
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
