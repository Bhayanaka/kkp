<?php
include 'meta.php';
?>
<body onload="myFunction()"  class="<?php if (!$this->isUserOnline())echo 'body_dashboard';?>">
	<!-- RUNNING GLOBAL VAR -->
	<script>
		var basedomain = "<?=$basedomain?>";
	</script>
	
	<!-- HEADER -->
    
	<?php 
	if ($this->isUserOnline())include 'header.php';
	?>
	
	<!-- CONTENT -->
	<?php
	if ($this->isUserOnline()){
	?>
	<div class="row-fluid" >
		<?php include 'menu.php';?>
		<div class="span10" style="margin-left:10">
			<?=$content?>
		</div>
	</div>
	<?php
	}else{
	
	echo $content;
	
	}
	?>
	
	<!-- FOOTER -->
    
	<?php if ($this->isUserOnline())include 'footer.php';?>
	
	
</body> 
</html>