<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div class="clearfix"></div>
	<div class="content">
		<div class="row-fluid">
			<div class="span12">
				<div class="grid simple ">
					<div class="grid-title">
						<h4><span class="semi-bold">รายการจุดเสี่ยง</span></h4>
						<div class="tools">
							<!-- <button type="button" class="btn btn-primary" onclick="location.href='<?php echo site_url('Home/user_insert')?>'">เพิ่ม</button> -->
							<!-- <button type="button" class="btn btn-primary" onclick="location.href='<?php echo site_url('home/student_import')?>'">นำเข้าจากไฟล์</button> -->
						</div>
					</div>
					<div class="grid-body ">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>หัวข้อ</th>
									<th>สถานะ</th>
									<th>ความสำคัญ</th>
									<th>จากผู้รับผิดชอบพื้นที่</th>
									<th>ถึงผู้เกี่ยวข้อง</th>
									<th>วันที่แจ้ง</th>
									<th>แก้ไขล่าสุด</th>
									<th>จัดการ</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($riskpoint as $skey): ?>
									<tr class="odd gradeX">
										<td><?php echo $skey['riskpoint_id'] ?></td>
										<td class="center"><?php echo $skey['riskpoint_name'] ?></td>
										<td class="center"><?php echo $skey['riskpoint_status_name'] ?></td>
										<td class="center"><?php echo $skey['riskpoint_piority_name'] ?></td>
										<td class="center"><?php echo $skey['user_from_name'] ?></td>
										<td class="center"><?php echo $skey['DISTRICT_NAME'] ?></td>
										<td class="center"><?php echo $thaidate->FullDateTime($skey['riskpoint_date']) ?></td>
										<td class="center"><?php echo $thaidate->FullDateTime($skey['riskpoint_last_update']) ?></td>
										<td class="center">
											<button type="button" class="btn btn-warning" onclick="location.href='<?php echo site_url('Home/riskpoint_manage/'.$skey['riskpoint_id'])?>'">จัดการ</button>
											<a class="btn btn-danger" href="JavaScript:if(confirm('ยืนยันการลบ?') == true){window.location='<?php echo site_url('Riskpoint/riskpoint_delete/'.$skey['riskpoint_id']); ?>';}">ลบ</a>
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
