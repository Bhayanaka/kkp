<?php
include 'meta.php';
?>
<body id="<?php if ($DATA['default']['page']==$CONFIG['default']['default_view']){echo 'page';}?>">
	<!-- RUNNING GLOBAL VAR -->
	<script>
		var basedomain = "<?=$basedomain?>";
	</script>

	<!-- CONTENT -->

	<?php  include 'menu_detail.php';?>

	<?=$content?>
	
			
	<!-- FOOTER -->
		
	<?php include 'footer.php';?>
</body> 
</html>