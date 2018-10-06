</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="<?php echo base_url('assets/plugins/jquery-1.8.3.min.js'); ?>" type="text/javascript"></script>
<!-- <script src="<?php echo base_url('assets/plugins/jquery-2.2.0.min.js'); ?>" type="text/javascript"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/boostrapv3/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/breakpoints.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/jquery-unveil/jquery.unveil.min.js'); ?>" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="<?php echo base_url('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/jquery-block-ui/jqueryblockui.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/pace/pace.min.js" type="text/javascript'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-slider/jquery.sidr.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/jquery-superbox/js/superbox.js'); ?>" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script>
		$(function() {
			// Call SuperBox - that's it!
			$('.superbox').SuperBox();
		});
</script>

<script src="<?php echo base_url('assets/plugins/bootstrap-select2/select2.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/jquery-datatable/js/jquery.dataTables.min.js'); ?>" type="text/javascript" ></script>
<script src="<?php echo base_url('assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js'); ?>" type="text/javascript" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables-responsive/js/datatables.responsive.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables-responsive/js/lodash.min.js'); ?>"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url('assets/js/datatables.js'); ?>" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<script src="<?php echo base_url('assets/js/core.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/chat.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/demo.js'); ?>" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->
<!-- END JAVASCRIPTS -->
<script>
$(document).ready(function(){

	load_data();

	function load_data()
	{
		$.ajax({
			url:"<?php echo site_url(); ?>Member/load_data",
			method:"POST",
			success:function(data)
			{
				$('#imported_csv_data').html(data);
			}
		})
	}

	$('#import_csv').on('submit', function(event){
		event.preventDefault();
		$.ajax({
			url:"<?php echo site_url(); ?>Member/import",
			method:"POST",
			data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			beforeSend:function(){
				$('#import_csv_btn').html('Importing...');
			},
			// success:function(data)
			// {
			// 	$('#import_csv')[0].reset();
			// 	$('#import_csv_btn').attr('disabled', false);
			// 	$('#import_csv_btn').html('Import Done');
			// 	load_data();
			// }
		})
	});

});
</script>
</body>
</html>
