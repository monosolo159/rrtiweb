<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div class="clearfix"></div>
	<div class="content">
		<div class="row-fluid">
			<div class="span12">
				<div class="grid simple ">
					<div class="grid-title">
						<h4><span class="semi-bold">อาจารย์ที่ปรึกษา</span></h4>
						<div class="tools">
							<button type="button" class="btn btn-primary" onclick="location.href='<?php echo site_url('home/teacher_insert')?>'">เพิ่ม</button>
							<!-- <button type="button" class="btn btn-primary" onclick="location.href='<?php echo site_url('home/teacher_import')?>'">นำเข้าจากไฟล์</button> -->
						</div>
					</div>
					<div class="grid-body ">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>รหัสอาจารย์</th>
									<th>ชื่อ-สกุล</th>
									<th>เบอรโทร</th>
									<th>ชื่อผู้ใช้</th>
									<th>สาขาวิชา</th>
									<th>ปีการศึกษา</th>
									<th>หมู่เรียน</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($teacher as $tkey): ?>
									<tr class="odd gradeX">
										<td><?php echo $tkey['member_id'] ?></td>
										<td class="center"><?php echo $tkey['member_name'] ?></td>
										<td class="center"><?php echo $tkey['member_phone'] ?></td>
										<td class="center"><?php echo $tkey['member_username'] ?></td>
										<td class="center"><?php echo $tkey['tb_class_name'] ?></td>
										<td class="center"><?php if($tkey['tb_class_year']!=""){echo $tkey['tb_class_year']+543;} ?></td>
										<td class="center"><?php echo $tkey['tb_class_major'] ?></td>
										<td class="center">
											<div class="btn-group"> <a class="btn btn-warning dropdown-toggle" data-toggle="dropdown" href="#"> แก้ไข <span class="caret"></span> </a>
												<ul class="dropdown-menu">
													<li><a href="<?php echo site_url('Home/teacher_edit/'.$tkey['member_id'])?>">ข้อมูลส่วนตัว</a></li>
													<li><a href="<?php echo site_url('Home/teacher_password/'.$tkey['member_id'])?>">แก้ไขรหัสผ่าน</a></li>
												</ul>
											</div>

											<!-- <button type="button" class="btn btn-warning" onclick="location.href='<?php echo site_url('Home/teacher_edit/'.$tkey['member_id'])?>'">แก้ไข</button> -->
											<button type="button" class="btn btn-warning" onclick="location.href='<?php echo site_url('Home/member_pic/'.$tkey['member_id'])?>'">รูปภาพ</button>
											<!-- <button type="button" class="btn btn-warning" onclick="location.href='<?php echo site_url('Home/teacher_password/'.$tkey['member_id'])?>'">แก้ไขรหัสผ่าน</button> -->
											<a class="btn btn-danger" href="JavaScript:if(confirm('ยืนยันการลบ?') == true){window.location='<?php echo site_url('Member/teacher_delete/'.$tkey['member_id'].'/'.$tkey['tb_class_id']); ?>';}">ลบ</a>
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
