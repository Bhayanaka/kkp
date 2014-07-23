

<?php
/*
	Batas Awal dari Isi Content Acuan Untuk di taruh di dalam File app/view
*/		
	$title_menu=array('Berita','Opini','Gallery Foto','Gallery Video');
	$link_menu=array('berita/info_berita','berita/info_opini','informasi_terkini/informasi_gallery','informasi_terkini/informasi_video');
	//sub_top_menu('bg_hijau','trans',$title_menu,$link_menu);
	sub_top_menu('bg_hijau');
	
	$title_page=array('Berita','List Berita','Berita Detail');
	$link_title_page=array('#','#','#');
	//box_legend('box_legend',$title_page,$link_title_page);
	box_legend('box_legend_2',$title_page,$link_title_page);
?>
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">
				  <div class="span8">
					<h3><?=$data['detail']['title']?></h3>
					<div class="span12">
						<?php if($data ['detail']['image']){?>
						<center><img src="<?=$basedomain?>public_assets/<?=$data ['detail']['image']?>" width="448" height="336px"/></center>
						<?php
						}
						?>
					</div>
					<?php
					echo"&nbsp;";
					?>
					<p><?=$data['detail']['content']?></p>
					
						<br/><br/>
					</p>
					
					
					<p >
						<center>
						<a href="<?=$basedomain?>berita/info_berita" >
							<b >Index Berita</b>
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
