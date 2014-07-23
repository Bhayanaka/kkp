
<?php
/*
	Batas Awal dari Isi Content Acuan Untuk di taruh di dalam File app/view
*/		
	$title_menu=array('Berita','Opini','Gallery Foto','Gallery Video');
	$link_menu=array('berita/info_berita','berita/info_opini','informasi_terkini/informasi_gallery','informasi_terkini/informasi_video');
	//sub_top_menu('bg_hijau','trans',$title_menu,$link_menu);
	sub_top_menu('bg_hijau');
	$title_page=array('Informasi TRLP-3-K','Gallery Foto','List Galeri Foto');
	// $title_page=array('Informasi Terkini','List Galeri Foto');
	$link_title_page=array('#','#');
	//box_legend('box_legend',$title_page,$link_title_page);
	box_legend('box_legend_2',$title_page,$link_title_page);
?>
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">
				<div class="span8">
					<h3>Album Galeri Foto</h3>
					<?php
					//pr($data);
					?>
						
						<?php
						if($data){
						$i=1;
						$j=1;
						$total = count($data);
						foreach($data as $key=>$val){
						if($i==1){
							echo "<div class='row-fluid'>";
							
						}
						$path=explode("/", $val['image']);
						?>
							 <div class="span3 box_gallery">	
							 <a href="<?=$basedomain?>informasi_terkini/informasi_gallery_detail/?id=<?=$val['id']?>">	
								<center><img src="<?=$basedomain?>public_assets/gallery/foto/<?php echo $path[2]?>" style="height:100px" width="auto"/></center>
								<p class="gallery">
									<!--karakternya dbatesin  60 yg tampil-->
									<a href="<?=$basedomain?>informasi_terkini/informasi_gallery_detail/?id=<?=$val['id']?>"><?php echo $val['title']?></a>
									<br/><small><i>9, Desember 2013</i></small>
								</p>
							 </div>
				
						<?php
							$i++;
							$j++;
							if($i>4 || $j>$total){
								echo "</div>";
								$i=1;
							}
						}
						}else{
						pr("<center>Tidak Ada Data</center>");
						
						}
						generate_paging($paging,$url);
						?>
				  </div>
				 <?=$sidebar?>
				
				</div>
			</div>
			<div class="span1"></div>
		</div>
<!-- Batas Akhir dari Isi Content-->