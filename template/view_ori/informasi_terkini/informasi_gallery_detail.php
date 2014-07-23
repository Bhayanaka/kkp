
<?php
/*
	Batas Awal dari Isi Content Acuan Untuk di taruh di dalam File app/view
*/		
	$title_menu=array('Berita','Opini','Gallery Foto','Gallery Video');
	$link_menu=array('berita/info_berita','berita/info_opini','informasi_terkini/informasi_gallery','informasi_terkini/informasi_video');
	//sub_top_menu('bg_hijau','trans',$title_menu,$link_menu);
	sub_top_menu('bg_hijau');
	
	// $title_page=array('Informasi Terkini','List Galeri Foto');
	$title_page=array('Informasi TRLP-3-K','Gallery Foto','Galeri Foto Detail');
	$link_title_page=array('#','#');
	//box_legend('box_legend',$title_page,$link_title_page);
	box_legend('box_legend_2',$title_page,$link_title_page);
?>
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">
				  <div class="span8">
							<?php if($data){foreach($data as $key=>$val) ?>
						<h3><?php echo $val['title']; ?></h3>
							
						<?php
							$i=1;
							$j=1;
							$total = count($data);
							// pr($data);
							foreach($data as $key=>$val){
							if($i==1){
								echo "<div class='row-fluid'>";
								
							}
							//echo $val['thumbnail']."<br/>";
							$path=explode("/", $val['thumbnail']);
							//pr($path);
						?>
					
							<div class="span3">
								<p>
									
									<a class="fancybox" rel="group" href="<?=$basedomain?>public_assets/gallery/foto/<?php echo $path[2]?>" title="<?=$val['brief']?>">
									<img src="<?=$basedomain?>public_assets/<?php echo $path[0]?>/<?php echo $path[1]?>/<?php echo $path[2]?>" alt=""/></a>
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
						generate_paging($paging,$url);
						}
						?>
					
				  </div>
				  <?=$sidebar?>
				</div>
				
			</div>
			<div class="span1"></div>
		</div>
<!-- Batas Akhir dari Isi Content-->