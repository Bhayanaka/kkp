

<?php
/*
	Batas Awal dari Isi Content Acuan Untuk di taruh di dalam File app/view
*/		
	$title_menu=array('Berita','Opini','Gallery Foto','Gallery Video');
	$link_menu=array('berita/info_berita','berita/info_opini','informasi_terkini/informasi_gallery','informasi_terkini/informasi_video');
	//sub_top_menu('bg_hijau','trans',$title_menu,$link_menu);
	sub_top_menu('bg_hijau');
	
	$title_page=array('Informasi TRLP-3-K','Opini','Opini Detail');
	$link_title_page=array('#','#','#');
	//box_legend('box_legend',$title_page,$link_title_page);
	box_legend('box_legend_2',$title_page,$link_title_page);
?>
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">
				  <div class="span8">
					<h3><h3><?=$data['opini_detail']['title']?></h3></h3>
					<div class="span12">
						<?php if($val['image']){?>
						<center><img src="<?=$basedomain?>public_assets/<?=$data ['opini_detail']['image']?>" width="448" height="336px"/></center>
						<?php } ?>
					</div>
					<?php
					echo"&nbsp;";
					?>
					<p>
						<?=html_entity_decode($data['opini_detail']['content'])?>
					</p>	
					
					
					
					
					<p >
						<center>
						<a href="<?=$basedomain?>berita/info_opini" >
							<b >Index Opini</b>
						</a>
						</center>
					</p>
					
				  </div>
				  <?=$sidebar?>
				</div>
				
			</div>
			<div class="span1"></div>
		</div>
<!-- Batas Akhir dari Isi Content-->
