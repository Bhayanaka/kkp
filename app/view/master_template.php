<html>
	
		<?php include "head_src.php"?>
	<body>
	<script>
		var basedomain = "<?=$basedomain?>";
	</script>
		<?php include "header_menu.php"?>			
				
	

	<!-- CONTENT -->

	<?=$content?>
	
			
	<!-- FOOTER -->
		
			<div class="container-fluid" style="padding:0">
			
			<?php if ($DATA['default']['page']!=$CONFIG['default']['default_view']){include "sitemap.php";}?>
		
			<?php include "footer.php"?>	
					
			</div>
	
	</body>
</html>