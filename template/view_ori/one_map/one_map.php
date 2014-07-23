<!--[if gt IE 9]><!-->
<?php
/*
	Batas Awal dari Isi Content Acuan Untuk di taruh di dalam File app/view
*/		
	//$title_menu=array('Berita','Opini','Gallery Foto','Gallery Video');
	//$link_menu=array('info_berita','info_opini','informasi_gallery','informasi_video');
	sub_top_menu('bg_ungu');
	
	$title_page=array('One Map');
	$link_title_page=array('#');
	box_legend('box_legend_2',$title_page,$link_title_page);
?>
		
	
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">
				 
				  <div class="span8">
				  
					<h3><?=$data['detail']['title']?></h3>
					<img src="<?=$basedomain?>public_assets/berita/gambar1.jpg" width="100%" align="left" style="margin:5px 10px 20px 0px"/>
					<p><?=$data['detail']['content']?></p>
					
						<br/><br/>
					</p>
					
						
				  </div>
				 <?=$sidebar?>
				</div>
				
			</div>
			<div class="span1"></div>
		</div>

