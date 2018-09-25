<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div class="clearfix"></div>
	<div class="content">
		<div class="row-fluid">
			<div class="span12">
				<div class="grid simple ">
					<div class="grid-title">
						<h4><span class="semi-bold">สาขาวิชา/ปีการศึกษา/หมู่เรียน</span></h4>
						<div class="tools">
							<button type="button" class="btn btn-primary" onclick="location.href='<?php echo site_url('home/class_insert')?>'">เพิ่ม</button>
						</div>
					</div>
					<div class="grid-body ">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>รหัส</th>
									<th>สาขาวิชา</th>
									<th>ปีการศึกษา</th>
									<th>หมู่เรียน</th>
									<th>จัดการ</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($c_class as $skey): ?>
									<tr class="odd gradeX">
										<td><?php echo $skey['tb_class_id'] ?></td>
										<td class="center"><?php echo $skey['tb_class_name'] ?></td>
										<td class="center"><?php echo $skey['tb_class_year']+543 ?></td>
										<td class="center"><?php echo $skey['tb_class_major'] ?></td>
										<td class="center">
											<button type="button" class="btn btn-warning" onclick="location.href='<?php echo site_url('home/class_edit/'.$skey['tb_class_id'])?>'">แก้ไข</button>
											<a class="btn btn-danger" href="JavaScript:if(confirm('ยืนยันการลบ?') == true){window.location='<?php echo site_url('Member/class_delete/'.$skey['tb_class_id']); ?>';}">ลบ</a>
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
