
<?php
/*
	Batas Awal dari Isi Content Acuan Untuk di taruh di dalam File app/view
*/		
	$title_menu=array('Berita','Opini','Gallery Foto','Gallery Video');
	$link_menu=array('berita/info_berita','berita/info_opini','informasi_terkini/informasi_gallery','informasi_terkini/informasi_video');
	//sub_top_menu('bg_hijau','trans',$title_menu,$link_menu);
	sub_top_menu('bg_hijau');
	
	// $title_page=array('Informasi Terkini','List Galeri Video');
	$title_page=array('Informasi TRLP-3-K','Gallery Video','List Galeri Video');
	$link_title_page=array('#','#');
	//box_legend('box_legend',$title_page,$link_title_page);
	box_legend('box_legend_2',$title_page,$link_title_page);
?>
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">
				  <div class="span8">
						<h3>Album Galeri Video</h3>
						<?php
					
					?>
						
						<?php
						if($data){
						$i=1;
						$j=1;
						$total = count($data);
						foreach($data as $key=>$val){
						//pr($val);
						if($i==1){
							echo "<div class='row-fluid'>";
							
						}
						?>
							 <div class="span3 box_gallery">	
							<a href="<?=$basedomain?>informasi_terkini/informasi_video_detail/?id=<?=$val['id']?>">	<video width="100%" height="140">
									<source src="<?=$basedomain?>public_assets/<?php echo $val['image']?>">
									</object>
								</video></a>
								
								<p class="gallery">
									<!--karakternya dbatesin  60 yg tampil-->
									<!--<a href=""></a>-->
									<?php echo $val['title']?>
									<br/><small><i><?php echo $val['postdate']?></i></small>
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