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
						<h4><span class="semi-bold">แก้ไขข้อมูลส่วนตัว - <?php echo $user[0]['user_fname'].' '.$user[0]['user_lname'] ?></span></h4>

					</div>
					<div class="grid-body ">

						<?php echo form_open_multipart('/User/userEdit',array('id'=>'form_traditional_validation','class'=>'validate')); ?>

							<div class="form-group">
								<label class="form-label">รหัสประชาชน</label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="user_personal_id" id="form1CardHolderName" maxlength="13" value="<?php echo $user[0]['user_personal_id'] ?>" required>

								</div>
							</div>

							<div class="form-group">
								<label class="form-label">ชื่อ-สกุล</label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
									<div class="row">
										<div class="col-md-3">
											<input type="text" name="user_fname" id="form1CardHolderName" class="form-control" value="<?php echo $user[0]['user_fname'] ?>" maxlength="200" required>
										</div>
										<div class="col-md-3">
											<input type="text" name="user_lname" id="form1CardHolderName" class="form-control" value="<?php echo $user[0]['user_lname'] ?>" maxlength="200" required>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">ที่อยู่</label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
									<textarea name="user_address" id="form1CardNumber" rows="8" cols="80" maxlength="400" required><?php echo $user[0]['user_address'] ?></textarea>
								</div>
							</div>


							<div class="form-group">
								<label class="form-label">จังหวัด</label>
								<span class="help"></span>
								<div class="  right">
									<i class=""></i>
									<select name="user_province" id="user_province" required>
										<option value="">--เลือก--</option>
										<?php foreach ($province as $key): ?>
											<option value="<?php echo $key['PROVINCE_ID'] ?>" <?php if($key['PROVINCE_ID']==$user[0]['user_province']){ echo 'selected'; } ?>><?php echo $key['PROVINCE_NAME'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">อำเภอ</label>
								<span class="help"></span>
								<div class="  right">
									<i class=""></i>
									<select name="user_district" id="DisDrp" required>
										<option value="">--เลือก--</option>
										<?php foreach ($district as $key): ?>
											<option value="<?php echo $key['AMPHUR_ID'] ?>" <?php if($key['AMPHUR_ID']==$user[0]['user_district']){ echo 'selected'; } ?>><?php echo $key['AMPHUR_NAME'] ?></option>
										<?php endforeach; ?>
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
										<?php foreach ($subdistrict as $key): ?>
											<option value="<?php echo $key['DISTRICT_ID'] ?>" <?php if($key['DISTRICT_ID']==$user[0]['user_subdistrict']){ echo 'selected'; } ?>><?php echo $key['DISTRICT_NAME'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>



							<div class="form-group">
								<label class="form-label">รหัสไปรษณีย์</label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="text" name="user_zipcode" id="form1CardHolderName" value="<?php echo $user[0]['user_zipcode'] ?>" maxlength="5" required>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">เบอร์โทร</label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="text" name="user_tel" id="form1CardHolderName" value="<?php echo $user[0]['user_tel'] ?>" maxlength="10" required>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">อีเมล์</label>
								<span class="help"></span>
								<div class="input-with-icon  right">
									<i class=""></i>
									<input type="text" name="user_email" id="form1CardHolderName"  value="<?php echo $user[0]['user_email'] ?>" required>
								</div>
							</div>

							<div class="form-group">
								<label class="form-label">พื้นที่รับผิดชอบ</label>
								<span class="help"></span>
								<div class="  right">
									<i class=""></i>
									<select name="user_area" id="cardType" required>
										<option value="">--เลือก--</option>
										<?php foreach ($area as $akey): ?>
											<option value="<?php echo $akey['DISTRICT_ID'] ?>" <?php if($akey['DISTRICT_ID']==$user[0]['user_area']){ echo 'selected'; } ?>><?php echo $akey['DISTRICT_NAME'] ?></option>
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
											<option value="<?php echo $key['user_type_id'] ?>" <?php if($key['user_type_id']==$user[0]['user_type_id']){ echo 'selected'; } ?>><?php echo $key['user_type_name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>


							<div class="form-actions">
								<div class="pull-right">.
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
