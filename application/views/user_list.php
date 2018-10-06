<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div class="clearfix"></div>
	<div class="content">
		<div class="row-fluid">
			<div class="span12">
				<div class="grid simple ">
					<div class="grid-title">
						<h4><span class="semi-bold">ผู้ใช้ - <?php echo $user_type[0]['user_type_name'] ?></span></h4>
						<div class="tools">
							<button type="button" class="btn btn-primary" onclick="location.href='<?php echo site_url('Home/user_insert')?>'">เพิ่ม</button>
							<!-- <button type="button" class="btn btn-primary" onclick="location.href='<?php echo site_url('home/student_import')?>'">นำเข้าจากไฟล์</button> -->
						</div>
					</div>
					<div class="grid-body ">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<!-- <th>รหัสประชาชน</th> -->
									<!-- <th>ชื่อผู้ใช้</th> -->
									<th>ชื่อ - นามสกุล</th>
									<!-- <th>ที่อยู่</th> -->
									<!-- <th>ตำบล</th> -->
									<!-- <th>อำเภอ</th> -->
									<!-- <th>จังหวัด</th> -->
									<!-- <th>รหัสไปรษณีย์</th> -->
									<th>เบอร์โทร</th>
									<th>อีเมล์</th>
									<th>พื้นที่ดูแล</th>
									<th>ลงทะเบียน</th>
									<th>แก้ไขล่าสุด</th>
									<th>จัดการ</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($user as $skey): ?>
									<tr class="odd gradeX">
										<td><?php echo $skey['user_id'] ?></td>
										<!-- <td class="center"><?php echo $skey['user_personal_id'] ?></td> -->
										<!-- <td class="center"><?php echo $skey['user_username'] ?></td> -->
										<td class="center"><?php echo $skey['user_fname'].' '.$skey['user_lname'] ?></td>
										<!-- <td class="center"><?php echo $skey['user_address'] ?></td> -->
										<!-- <td class="center"><?php echo $skey['new_subdistrict'] ?></td> -->
										<!-- <td class="center"><?php echo $skey['new_district'] ?></td> -->
										<!-- <td class="center"><?php echo $skey['new_province'] ?></td> -->
										<!-- <td class="center"><?php echo $skey['new_zipcode'] ?></td> -->
										<td class="center"><?php echo $skey['user_tel'] ?></td>
										<td class="center"><?php echo $skey['user_email'] ?></td>
										<td class="center"><?php echo $skey['new_area'] ?></td>
										<td class="center"><?php echo $thaidate->FullDateTime($skey['user_register']) ?></td>
										<td class="center"><?php echo $thaidate->FullDateTime($skey['user_last_update']) ?></td>
										<td class="center">

											<?php if ($_SESSION['USER_TYPE']==1): ?>
												<div class="btn-group"> <a class="btn btn-warning dropdown-toggle" data-toggle="dropdown" href="#"> แก้ไข <span class="caret"></span> </a>
													<ul class="dropdown-menu">
														<li><a href="<?php echo site_url('Home/user_edit/'.$skey['user_id'])?>">ข้อมูลส่วนตัว</a></li>
														<li><a href="<?php echo site_url('Home/user_password/'.$skey['user_id'])?>">แก้ไขรหัสผ่าน</a></li>
													</ul>
												</div>

												<button type="button" class="btn btn-warning" onclick="location.href='<?php echo site_url('Home/user_pic/'.$skey['user_id'])?>'">รูปภาพ</button>
												<a class="btn btn-danger" href="JavaScript:if(confirm('ยืนยันการลบ?') == true){window.location='<?php echo site_url('User/user_delete/'.$skey['user_type_id'].'/'.$skey['user_id']); ?>';}">ลบ</a>
											<?php endif; ?>


										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
