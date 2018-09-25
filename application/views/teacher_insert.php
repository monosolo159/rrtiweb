<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div class="clearfix"></div>
	<div class="content">
		<div class="row-fluid">
			<div class="span12">
				<div class="grid simple ">
					<div class="grid-title">
						<h4><span class="semi-bold">เพิ่มอาจารย์ที่ปรึกษา</span></h4>

					</div>
					<div class="grid-body ">
						<?php echo form_open_multipart('/Member/teacherInsert',array('id'=>'form_traditional_validation','class'=>'validate')); ?>

						<!-- <form id="form_traditional_validation" action="#"> -->
						<?php if ($this->uri->segment(3)=="error"): ?>
							<div class="tiles red m-b-10">
								<div class="tiles-body">
									<div class="tiles-title text-black">รหัสผ่านไม่ตรงกัน</div>
								</div>
							</div>
						<?php endif; ?>
						<?php if ($this->uri->segment(3)=="errorid"): ?>
							<div class="tiles red m-b-10">
								<div class="tiles-body">
									<div class="tiles-title text-black">มีรหัสอาจารย์ท่านนี้ในระบบแล้ว</div>
								</div>
							</div>
						<?php endif; ?>

						<div class="form-group">
							<label class="form-label">รหัสอาจารย์</label>
							<span class="help"></span>
							<div class="input-with-icon  right">
								<i class=""></i>
								<input type="text" name="member_id" id="form1CardHolderName" class="form-control" maxlength="11" required>
							</div>
						</div>

						<div class="form-group">
							<label class="form-label">ชื่อ-สกุล</label>
							<span class="help"></span>
							<div class="input-with-icon  right">
								<i class=""></i>
								<input type="text" name="member_name" id="form1CardHolderName" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="form-label">เบอร์โทร</label>
							<span class="help"></span>
							<div class="input-with-icon  right">
								<i class=""></i>
								<input type="text" name="member_phone" id="form1CardNumber" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="form-label">USERNAME</label>
							<span class="help"></span>
							<div class="input-with-icon  right">
								<i class=""></i>
								<input type="text" name="member_username" id="form1CardNumber" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="form-label">PASSWORD</label>
							<span class="help"></span>
							<div class="input-with-icon  right">
								<i class=""></i>
								<input type="password" name="member_password" id="form1CardNumber" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="form-label">PASSWORD Confirm</label>
							<span class="help"></span>
							<div class="input-with-icon  right">
								<i class=""></i>
								<input type="password" name="member_password_confirm" id="form1CardNumber" class="form-control" required>
							</div>
						</div>


						<div class="form-group">
							<label class="form-label">เป็นที่ปรึกษา</label>
							<span class="help"></span>
							<div class="  right">
								<i class=""></i>
								<select name="tb_class_id" id="cardType" class="select2 form-control" required>
									<option value="">--เลือก--</option>
									<?php foreach ($cclass as $key): ?>
										<option value="<?php echo $key['tb_class_id'] ?>">สาขาวิชา : <?php echo $key['tb_class_name'] ?> / ปีที่เข้า : <?php echo $key['tb_class_year']+543 ?> / หมู่เรียน : <?php echo $key['tb_class_major'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="form-actions">
							<label class="form-label"></label>
							<span class="help"></span>
							<div class="input-with-icon  right">
								<i class=""></i>
								<input type="file" name="member_pic" accept="image/x-png,image/gif,image/jpeg" required>
							</div>
						</div>

						<div class="form-actions">
							<div class="pull-right">
								<input type="hidden" name="member_type_id" value="1">
								<button type="submit" class="btn btn-success btn-cons"><i class="icon-ok"></i> บันทึก</button>
								<!-- <button type="button" class="btn btn-white btn-cons">Cancel</button> -->
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
