<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div class="clearfix"></div>
	<div class="content">
		<div class="row-fluid">
			<div class="span12">
				<div class="grid simple ">
					<div class="grid-title">
						<h4><span class="semi-bold">แก้ไขรูปภาพ - <?php echo $user[0]['user_fname'].' '.$user[0]['user_lname'] ?></span></h4>

					</div>
					<div class="grid-body ">
						<?php echo form_open_multipart('/User/user_pic',array('id'=>'form_traditional_validation')); ?>
						<div class="form-group">
							<label class="form-label"></label>
							<span class="help"></span>
							<div class="input-with-icon  right">
								<i class=""></i>
								<?php if (!file_exists(base_url('assets/img/profiles/'.$user[0]['user_id'].'.jpg'))): ?>
									<img src="<?php echo base_url('assets/img/profiles/'.$user[0]['user_id'].'.jpg') ?>">
								<?php else: ?>
									<img src="<?php echo base_url('assets/img/profiles/noimage.png') ?>">
								<?php endif; ?>
							</div>
						</div>
							<div class="form-group">
								<label class="form-label"></label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="file" name="user_pic" accept="image/x-png,image/gif,image/jpeg" required>
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
