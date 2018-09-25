<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div class="clearfix"></div>
	<div class="content">
		<div class="row-fluid">
			<div class="span12">
				<div class="grid simple ">
					<div class="grid-title">
						<h4><span class="semi-bold">เพิ่มนักศึกษา</span></h4>

					</div>
					<div class="grid-body ">

						<?php echo form_open_multipart('/Member/studentEdit',array('id'=>'form_traditional_validation','class'=>'validate')); ?>

							<div class="form-group">
								<label class="form-label">ชื่อ-สกุล</label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="text" name="member_name" id="form1CardHolderName" class="form-control" value="<?php echo $student[0]['member_name'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">เกรดเฉลี่ย</label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="number" name="member_gpa" id="form1CardHolderName" class="form-control" min="0.00" max="4.00" step="0.01" value="<?php echo $student[0]['member_gpa'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">ที่อยู่</label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="text" name="member_address" id="form1CardNumber" class="form-control" value="<?php echo $student[0]['member_address'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">เบอร์โทร</label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="text" name="member_phone" id="form1CardNumber" class="form-control" value="<?php echo $student[0]['member_phone'] ?>" required>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">สาขาวิชา/ปีที่เข้าศึกษา/หมู่เรียน</label>
								<span class="help"></span>
								<div class="  right">
									<i class=""></i>
									<select name="tb_class_id" id="cardType" class="select2 form-control" required>
										<option value="">--เลือก--</option>
										<?php foreach ($c_class as $key): ?>
											<option value="<?php echo $key['tb_class_id'] ?>" <?php if($key['tb_class_id']==$student[0]['tb_class_id']){ echo 'selected'; } ?>>สาขาวิชา : <?php echo $key['tb_class_name'] ?> / ปีที่เข้า : <?php echo $key['tb_class_year'] ?> / หมู่เรียน : <?php echo $key['tb_class_major'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-actions">
								<div class="pull-right">.
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
