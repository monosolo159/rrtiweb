<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div class="clearfix"></div>
	<div class="content">
		<div class="row-fluid">
			<div class="span12">
				<div class="grid simple ">
					<div class="grid-title">
						<h4><span class="semi-bold">แก้ไขรูปภาพ</span></h4>

					</div>
					<div class="grid-body ">
						<?php echo form_open_multipart('/Member/member_pic',array('id'=>'form_traditional_validation')); ?>
						<div class="form-group">
							<label class="form-label"></label>
							<span class="help"></span>
							<div class="input-with-icon  right">
								<i class=""></i>
								<?php if ($member[0]['member_pic']!=null): ?>
									<img src="<?php echo base_url('assets/img/profiles/'.$member[0]['member_pic']) ?>" alt="<?php echo $member[0]['member_name'] ?>">
								<?php else: ?>
									<img src="<?php echo base_url('assets/img/profiles/noimage.png') ?>" alt="<?php echo $member[0]['member_name'] ?>">
								<?php endif; ?>
							</div>
						</div>
							<div class="form-group">
								<label class="form-label"></label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="file" name="member_pic" accept="image/x-png,image/gif,image/jpeg" required>
								</div>
							</div>

							<div class="form-actions">
								<div class="pull-right">
									<input type="hidden" name="member_id" value="<?php echo $member[0]['member_id'] ?>">
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
