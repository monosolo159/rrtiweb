<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div class="clearfix"></div>
	<div class="content">
		<div class="row-fluid">
			<div class="span12">
				<div class="grid simple ">
					<div class="grid-title">
						<h4><span class="semi-bold">จัดการจุดเสี่ยง - <?php echo $riskpoint[0]['riskpoint_name'] ?></span></h4>

					</div>
					<div class="grid-body ">

						<?php echo form_open_multipart('/Riskpoint/riskpointEdit',array('id'=>'form_traditional_validation','class'=>'validate')); ?>

							<div class="form-group">
								<label class="form-label">รูปภาพ</label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
                  <div class="row superbox">
                    <?php foreach ($riskpoint_pic as $pkey => $pvalue): ?>
                      <div class="superbox-list"> <img src="<?php echo base_url('assets/img/riskpoint/'.$pvalue['riskpoint_pic_name']) ?>" data-img="<?php echo base_url('assets/img/riskpoint/'.$pvalue['riskpoint_pic_name']) ?>" alt="" class="superbox-img"> </div>
                    <?php endforeach; ?>
                    <div class="superbox-float"></div>
                  </div>
								</div>
							</div>


							<div class="form-group">
								<label class="form-label">สถานะ</label>
								<span class="help"></span>
								<div class="  right">
									<i class=""></i>
									<select name="riskpoint_status_id" id="cardType" required>
										<option value="">--เลือก--</option>
										<?php foreach ($riskpoint_status as $rkey): ?>
											<option value="<?php echo $rkey['riskpoint_status_id'] ?>" <?php if($rkey['riskpoint_status_id']==$riskpoint[0]['riskpoint_status_id']){ echo 'selected'; } ?>><?php echo $rkey['riskpoint_status_name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>


							<div class="form-actions">
								<div class="pull-right">.
									<input type="hidden" name="riskpoint_id" value="<?php echo $riskpoint[0]['riskpoint_id'] ?>">
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
