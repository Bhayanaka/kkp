
<?php
if ($DATA['default']['page']==$CONFIG['default']['default_view']){
?>
		<div class="box_menu">
			<?php include 'menu_detail.php';?>
		</div>
		<div class="logo">
			<img src="<?=$basedomain?>assets/images/header-index.png" align="right"  style="margin:0px 0px 0px 0px"/>
		</div>
<?php
}else{
?>
		<div class="row-fluid">
			<div class="span12"></div>
		</div>
		<div class="row-fluid">
			<div class="span1"></div>
			<div class="span6">
				<div class="laper2"></div>
				<?php include 'menu_detail.php';?>

			</div>
			<div class="span4">
				<img src="<?=$basedomain?>assets/images/header-sub.png" style="border:0px solid red" />
			</div>
			<div class="span1"></div>
		</div>	
<?php
}
?>	