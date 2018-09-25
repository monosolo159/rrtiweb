<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div class="clearfix"></div>
	<div class="content">
		<div class="row-fluid">
			<div class="span12">
				<div class="grid simple ">
					<div class="grid-title">
						<h4><span class="semi-bold">นำเข้านักศึกษาจากไฟล์</span></h4>
						<div class="tools">
						</div>
					</div>
					<div class="grid-body ">

            <h3>ขั้นตอนที่ 1</h3><br><img src="<?php echo base_url('assets/img/tutorial/tu_s001.png') ?>" alt="ภาพที่ 1"><br>
						<h3>ขั้นตอนที่ 2</h3><br><img src="<?php echo base_url('assets/img/tutorial/tu_s002.png') ?>" alt="ภาพที่ 2"><br>
            <h3>ขั้นตอนที่ 3</h3><br><img src="<?php echo base_url('assets/img/tutorial/tu_s003.png') ?>" alt="ภาพที่ 3">

            <?php echo form_open_multipart('/Member/student_import',array('id'=>'form_traditional_validation')); ?>

            <input type="file" name="imgfiles" size="20" / required>
            <div class="form-actions">
              <div class="pull-right">
								<input type="hidden" name="member_type_id" value="2">
                <button type="submit" class="btn btn-success btn-cons"><i class="icon-ok"></i> นำเข้า</button>
              </div>
            </div>
            <?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
