

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
	// box_legend('box_legend_2',$title_page,$link_title_page);
?>

	<div class="container-fluid big_body" >
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="container-fluid">
							
							<div class="col-md-8">
								<br/>
								<ul class="breadcrumb" style="margin-bottom: 5px;">
								  <li><a href="#">Informasi TRLP3K</a></li>
								  <li><a href="#">Berita</a></li>
								  <li class="active">Detail</li>
								</ul>
								<h3 class="text-primary"><?=$data['detail']['title']?></h3>
								<hr/>
								<?php 
								// pr($data);
								if($data ['detail']['image']){?>
								<center><img src="<?=$basedomain?>public_assets/<?=$data ['detail']['image']?>" width="448" height="336px"/></center>
								<?php
								}
								?>
								<br>
								<small class="text-muted"><?=date2Ind($data['detail']['postdate'])?></small>
								<p><?=$data['detail']['content']?></p>
							
							</div>
							<div class="col-md-4">
								<br/>
								<?=$sidebar?>
							</div>
							
						</div>	
					
					</div>
					<div class="col-md-1"></div>
			
			</div>
