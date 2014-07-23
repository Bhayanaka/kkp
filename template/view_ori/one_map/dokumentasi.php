<!--[if gt IE 9]><!-->
<?php
/*
	Batas Awal dari Isi Content Acuan Untuk di taruh di dalam File app/view
*/		
	//$title_menu=array('Berita','Opini','Gallery Foto','Gallery Video');
	//$link_menu=array('info_berita','info_opini','informasi_gallery','informasi_video');
	sub_top_menu('bg_ungu');
	
	$title_page=array('One Map','Dokumentasi');
	$link_title_page=array('#','#',);
	box_legend('box_legend_2',$title_page,$link_title_page);
?>
		
	
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">				 
				  <div class="span8">
				   <?php
					 
						 if($data){
							foreach($data as $key=>$val){
							 echo "<h3>{$val['title']}</h3><br/>";
								if($val['image']){
								$path=explode("/", $val['image']);
								// pr($path);
								echo"<center><img src=\"{$basedomain}public_assets/{$path[0]}/{$path[1]}\" width=\"448\" height=\"336px\"></center>";
								}
								echo"&nbsp;";
								echo "<p>{$val['content']}</p>";
							 }
						 }else{
							pr("<center>Tidak Ada Data</center>");
						 }
					 ?>
						
				  </div>
				 <?=$sidebar?>
				</div>
				
			</div>
			<div class="span1"></div>
		</div>

