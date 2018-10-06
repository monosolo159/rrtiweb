<script type="text/javascript"
            src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
            <script type="text/javascript"
               src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
               <script type="text/javascript">
                  $(document).ready(function() {
                     $("#user_province").change(function(){
                     /*dropdown post *///
	                     $.ajax({
	                        url:"<?php echo base_url();?>/Home/buildDropDistricts",
	                        data: {id: $(this).val()},
	                        type: "POST",
	                        success:function(data){
		                        $("#DisDrp").html(data);
			                    }
	                  	});
	               		});
	            		});

									$(document).ready(function() {
                     $("#DisDrp").change(function(){
                     /*dropdown post *///
	                     $.ajax({
	                        url:"<?php echo base_url();?>/Home/buildDropSubDistricts",
	                        data: {id: $(this).val()},
	                        type: "POST",
	                        success:function(data){
		                        $("#subDisDrp").html(data);
			                    }
	                  	});
	               		});
	            		});

         </script>


<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div class="clearfix"></div>
	<div class="content">
		<div class="row-fluid">
			<div class="span12">
				<div class="grid simple ">
					<div class="grid-title">
						<h4><span class="semi-bold">เพิ่มผู้ใช้</span></h4>


					</div>
					<div class="grid-body ">
						<?php if ($this->uri->segment(3)=='error'): ?>
							<div class="form-group">
								<div class="input-with-icon  right">
									<i class=""></i>
									<h4 style="color:red">รหัสผ่านไม่ตรงกัน</h4>
								</div>
							</div>
						<?php endif; ?>

						<?php echo form_open_multipart('/User/userInsert',array('id'=>'form_traditional_validation','class'=>'validate')); ?>

							<div class="form-group">
								<label class="form-label">รหัสประชาชน</label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="user_personal_id" id="form1CardHolderName" maxlength="13" value="" required>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">ชื่อผู้ใช้</label>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="password" name="user_username" id="form1Amount" maxlength="200" required>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">รหัสผ่าน</label>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="password" name="user_password" id="form1Amount" maxlength="200" required>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">ยืนยันรหัสผ่าน</label>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="password" name="user_password_confirm" id="form1Amount" maxlength="200" required>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">ชื่อ-สกุล</label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
									<div class="row">
										<div class="col-md-3">
											<input type="text" name="user_fname" id="form1CardHolderName" class="form-control" value="" maxlength="200" required>
										</div>
										<div class="col-md-3">
											<input type="text" name="user_lname" id="form1CardHolderName" class="form-control" value="" maxlength="200" required>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">ที่อยู่</label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
									<!-- <input type="text" name="user_address" id="form1CardNumber" class="form-control" value="" required> -->
									<textarea name="user_address" id="form1CardNumber" rows="8" cols="80" maxlength="400" required></textarea>
								</div>
							</div>


							<div class="form-group">
								<label class="form-label">จังหวัด</label>
								<span class="help"></span>
								<div class="  right">
									<i class=""></i>
									<?php echo form_dropdown('user_province', $provincesDrop,'',' class="required" id="user_province"'); ?>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">อำเภอ</label>
								<span class="help"></span>
								<div class="  right">
									<i class=""></i>
									<select name="user_district" id="DisDrp" required>
										 <option value="">--เลือก--</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">ตำบล</label>
								<span class="help"></span>
								<div class="  right">
									<i class=""></i>
									<select name="user_subdistrict" id="subDisDrp" required>
										 <option value="">--เลือก--</option>
									</select>
								</div>
							</div>



							<div class="form-group">
								<label class="form-label">รหัสไปรษณีย์</label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="text" name="user_zipcode" id="form1CardHolderName" value="" maxlength="5" required>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">เบอร์โทร</label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="text" name="user_tel" id="form1CardHolderName" value="" maxlength="10" required>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">อีเมล์</label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="text" name="user_email" id="form1CardHolderName" value="" required>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">พื้นที่รับผิดชอบ</label>
								<span class="help"></span>
								<div class="  right">
									<i class=""></i>
									<select name="user_area" id="cardType" required>
										<option value="">--เลือก--</option>
										<?php foreach ($area as $key): ?>
											<option value="<?php echo $key['DISTRICT_ID'] ?>"><?php echo $key['DISTRICT_NAME'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">ประเภทผู้ใช้</label>
								<span class="help"></span>
								<div class="  right">
									<i class=""></i>
									<select name="user_type_id" id="cardType" required>
										<option value="">--เลือก--</option>
										<?php foreach ($usertype as $key): ?>
											<option value="<?php echo $key['user_type_id'] ?>"><?php echo $key['user_type_name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>


							<div class="form-actions">
								<div class="pull-right">.
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
