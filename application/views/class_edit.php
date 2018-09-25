<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div class="clearfix"></div>
	<div class="content">
		<div class="row-fluid">
			<div class="span12">
				<div class="grid simple ">
					<div class="grid-title">
						<h4><span class="semi-bold">สาขาวิชา/ปีการศึกษา/หมู่เรียน</span></h4>

					</div>
					<div class="grid-body ">
						<?php echo form_open_multipart('/Member/classEdit',array('id'=>'form_traditional_validation')); ?>
						<div class="form-group">
							<label class="form-label">สาขาวิชา</label>
							<span class="help"></span>
							<div class="  right">
								<i class=""></i>
								<select name="tb_class_name" id="cardType" class="select2 form-control"  required>
									<option value="">--เลือก--</option>
									<option value="วิทยาการคอมพิวเตอร์" <?php if($c_class[0]['tb_class_name']=='วิทยาการคอมพิวเตอร์'){ echo 'selected'; } ?>>วิทยาการคอมพิวเตอร์</option>
									<option value="เทคโนโลยีสารสนเทศ" <?php if($c_class[0]['tb_class_name']=='เทคโนโลยีสารสนเทศ'){ echo 'selected'; } ?>>เทคโนโลยีสารสนเทศ</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="form-label">ปีการศึกษา</label>
							<span class="help"></span>
							<div class="  right">
								<i class=""></i>
								<select name="tb_class_year" id="cardType" class="select2 form-control"  required>
									<option value="">--เลือก--</option>
									<?php for ($i=date("Y"); $i > 2000; $i--) { ?>
										<option value="<?php echo $i ?>" <?php if($c_class[0]['tb_class_year']==$i){ echo 'selected'; } ?>><?php echo $i+543 ?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="form-label">หมู่เรียน</label>
							<span class="help"></span>
							<div class="  right">
								<i class=""></i>
								<select name="tb_class_major" id="cardType" class="select2 form-control"  required>
									<option value="">--เลือก--</option>
									<option value="1" <?php if($c_class[0]['tb_class_major']=='1'){ echo 'selected'; } ?>>1</option>
									<option value="2" <?php if($c_class[0]['tb_class_major']=='2'){ echo 'selected'; } ?>>2</option>
								</select>
							</div>
						</div>

						<div class="form-actions">
							<div class="pull-right">
								<input type="hidden" name="tb_class_id" value="<?php echo $c_class[0]['tb_class_id'] ?>">
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
