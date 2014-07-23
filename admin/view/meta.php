<!DOCTYPE html>	
<html>
	<head>
		<title>CMS Portalsite Direktorat TRLP3K</title>
		

        <link rel="shortcut icon" href="../favicon.ico"> 
        <?php if ($this->isUserOnline()){?>
		<link rel="stylesheet" type="text/css" href="<?=$basedomain?>css/bootstrap.css" />
		<?php } ?>
		<link rel="stylesheet" type="text/css" href="<?=$basedomain?>css/bootstrap-responsive.css">      
		<link rel="stylesheet" type="text/css" href="<?=$basedomain?>css/kkp_byr.css" />
		<link rel="stylesheet" type="text/css" href="<?=$basedomain?>css/login_cms.css" />
		<link rel="stylesheet" href="<?=$basedomain?>js/jquery-ui.css">
		<link rel="stylesheet" href="<?=$basedomain?>js/jquery-ui-timepicker-addon.css">
		<link rel="stylesheet" href="<?=$basedomain?>js/DT_bootstrap.css" type="text/css" />
		
		
		<script type="text/javascript" src="<?=$basedomain?>js/jquery.js"></script>
		<script type="text/javascript" src="<?=$basedomain?>js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="<?=$basedomain?>js/jquery-ui.js"></script>
		<script type="text/javascript" src="<?=$basedomain?>js/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="<?=$basedomain?>js/bootstrap-transition.js"></script>
		<script type="text/javascript" src="<?=$basedomain?>js/bootstrap-button.js"></script>
		<script type="text/javascript" src="<?=$basedomain?>js/bootstrap-dropdown.js"></script>
		<script type="text/javascript" src="<?=$basedomain?>js/bootstrap-modal.js"></script>	
		<script type="text/javascript" src="<?=$basedomain?>js/whizzywig63.js"></script>
		<script type="text/javascript" src="<?=$basedomain?>js/ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="<?=$basedomain?>js/helper.js"></script>
		<script type="text/javascript" src="<?=$basedomain?>js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="<?=$basedomain?>js/additional-methods.min.js"></script>
				
		
		<!-- Datatables -->
		<style type="text/css" title="currentStyle">
			@import "<?=$basedomain?>css/demo_table.css";
		</style>
		<script type="text/javascript" language="javascript" src="<?=$basedomain?>js/jquery.dataTables.min.js"></script>
		<!-- End Datatables -->
		
		<link href="<?=$basedomain?>images/1.png" rel='shortcut icon' type='image/vnd.microsoft.icon'/>	
	</head>
	
	<!-- Untuk kebutuhan menu Produk -->
	<!--<script>
	$(function(){
	$("#kategori").ready(function(){
		$("#provinsi_h").attr("disabled",true);
		$("#kabupaten_h").attr("disabled",true);
		$("#kecamatan_h").attr("disabled",true);
		$("#4,#7").click(function(){ 
			$("#provinsi").show();
			$("#provinsi_h").hide();
			$("#provinsi").removeAttr('disabled');
			$("#kabupaten").attr("disabled",true);
			$("#kecamatan").attr("disabled",true);
			$('#kecamatan').val("");
			$('select#provinsi').val('0');
			$('select#kabupaten').val('0');
			$('select#kecamatan').val('0');
		});
		$("#0,#1,#2,#3,#5,#6").click(function(){ 
			//$("#provinsi").hide();
			//$("#provinsi_h").show();
			//$("#kabupaten").hide();
			//$("#kabupaten_h").show();
			//$("#kecamatan").hide();		
			$("#provinsi").attr("disabled",true);
			$("#kabupaten").attr("disabled",true);
			$("#kecamatan").attr("disabled",true);
			$('#kecamatan').val("");
			$('select#provinsi').val('0');
			$('select#kabupaten').val('0');
			$('select#kecamatan').val('0');
		});
		$("#8").click(function(){ 
			$("#provinsi").show();
			$("#provinsi_h").hide();
			//$("#kabupaten_h").show();
			//$("#kabupaten").hide();	
			$("#provinsi").removeAttr('disabled');
			$("#kabupaten").removeAttr('disabled');
			$("#kecamatan").attr("disabled",true);		
			$('#kecamatan').val("");			
			$('select#provinsi').val('0');
			$('select#kabupaten').val('0');
			$('select#kecamatan').val('0');
		});
		$("#9").click(function(){ 
			$("#provinsi").show();
			$("#provinsi_h").hide();
			//$("#kabupaten_h").show();
			$("#kabupaten").show();
			// $("#kecamatan").hide();
			$('#kecamatan').val("");
			$("#provinsi").removeAttr('disabled');
			$("#kabupaten").removeAttr('disabled');
			$("#kecamatan").removeAttr('disabled');
			$('select#provinsi').val('0');
			$('select#kabupaten').val('0');
			$('select#kecamatan').val('0');
		});
		
		//
		$("#k1, #k3").click(function(){ 
			// $("#artikel0").hide();
			// $("#artikel1").show();
			// $("#artikel2").hide();
			// $("#artikel3").hide();
			// $('select#artikel1').val('0');
			// $('select#artikel2').val('0');
			$('#kecamatan').val("");
			$('select#artikel').val('0');
			$("#provinsi").hide();
			$("#provinsi_h").show();
			$('select#provinsi').val('0');
			$('select#kabupaten').val('0');
			$('select#kecamatan').val('0');
		});
		$("#k2").click(function(){ 
			// $("#artikel0").hide();
			// $("#artikel1").hide();
			// $("#artikel2").show();
			// $("#artikel3").hide();
			// $('select#artikel1').val('0');
			// $('select#artikel2').val('0');
			// $('select#artikel3').val('0');
			$('#kecamatan').val("");
			$('select#artikel').val('0');
			$("#provinsi").hide();
			$("#provinsi_h").show();
			$('select#provinsi').val('0');
			$('select#kabupaten').val('0');
			$('select#kecamatan').val('0');
		});
		$("#k4").click(function(){ 
			// $("#artikel0").hide();
			// $("#artikel1").hide();
			// $("#artikel2").hide();
			// $("#artikel3").show();
			// $('select#artikel1').val('0');
			// $('select#artikel2').val('0');
			// $('select#artikel3').val('0');
			$('#kecamatan').val("");
			$('select#artikel').val('0');
			$("#provinsi").hide();
			$("#provinsi_h").show();
			$('select#provinsi').val('0');
			$('select#kabupaten').val('0');
			$('select#kecamatan').val('0');
		});
		$("#k0").click(function(){ 
			// $("#artikel0").show();
			// $("#artikel1").hide();
			// $("#artikel2").hide();
			// $("#artikel3").hide();
			// $('select#artikel1').val('0');
			// $('select#artikel2').val('0');
			// $('select#artikel3').val('0');
			// $('select#provinsi').val('0');
			$('#kecamatan').val("");
			$('select#artikel').val('0');
			$('select#kabupaten').val('0');
			$('select#kecamatan').val('0');
		});
	 });
	});
	</script>-->	
	<!-- ||||||||||||||||||||||||||| -->