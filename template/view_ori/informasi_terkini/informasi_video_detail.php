
<?php
/*
	Batas Awal dari Isi Content Acuan Untuk di taruh di dalam File app/view
*/		
	$title_menu=array('Berita','Opini','Gallery Foto','Gallery Video');
	$link_menu=array('berita/info_berita','berita/info_opini','informasi_terkini/informasi_gallery','informasi_terkini/informasi_video');
	//sub_top_menu('bg_hijau','trans',$title_menu,$link_menu);
	sub_top_menu('bg_hijau');
	
	// $title_page=array('Informasi Terkini','Video Detail');
	
	$title_page=array('Informasi TRLP-3-K','Gallery Video','Galeri Video Detail');
	$link_title_page=array('#','#');
	//box_legend('box_legend',$title_page,$link_title_page);
	box_legend('box_legend_2',$title_page,$link_title_page);
?>
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">
				  <div class="span8">
						<?php 
						// pr($data);
						if($data){
						foreach($data as $key=>$val){
						}
						
						?>
						<h3><?php echo $val['title']?></h3>
							<!--<video width="800" height="600" controls stop>-->
							<video width="100%"  controls stop>
							 <source src="<?=$basedomain?>public_assets/<?php echo $val['image']?>" type="video/mp4"> 
							  <object data="cinta.mp4" width="320" height="240"> 
								<embed width="640" height="480" src="<?=$basedomain?><?php echo $val['image']?>">
								</object>
							</video>
						<?php }else{
						
						
						}
						?>
				  </div>
				 <?=$sidebar?>
				</div>
				
			</div>
			<div class="span1"></div>
		</div>
<!-- Batas Akhir dari Isi Content-->
	