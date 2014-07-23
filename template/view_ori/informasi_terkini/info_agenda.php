
<?php
/*
	Batas Awal dari Isi Content Acuan Untuk di taruh di dalam File app/view
*/		
	$title_menu=array('Berita','Opini','Gallery Foto','Gallery Video');
	$link_menu=array('berita/info_berita','berita/info_opini','informasi_terkini/informasi_gallery','informasi_terkini/informasi_video');
	//sub_top_menu('bg_hijau','trans',$title_menu,$link_menu);
	sub_top_menu('bg_hijau');
	
	$title_page=array('berita','List Opini');
	$link_title_page=array('#','#');
	//box_legend('box_legend',$title_page,$link_title_page);
	box_legend('box_legend_2',$title_page,$link_title_page);
?>
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">
				  <div class="span8">
						<h3>Daftar Agenda</h3>
						 <?php
							 // pr($data);
							  if($data){
							 foreach($data as $key=>$val){
								//echo $val['brief']."<br/>";
								
								?>
						<div class="row-fluid">
							 <div class="span3">
								<?php
									if($val['image']){
								?>
								<a href="<?=$basedomain?>berita/info_agenda_detail/?id=<?=$val['id']?>">
								<img src="<?=$basedomain?>public_assets/<?=$val['image']?>" width="100%" width="160px" height="160px"  style="margin:5px 10px 0px 0px"/>
								</a>
								<?php
								}
								?>
							 </div>
							  <div class="span9">
								<p><i><small><?=$val['postdate']?></small></i></p>
								<p>
									<a href="<?=$basedomain?>berita/info_agenda_detail/?id=<?=$val['id']?>">
										<b><?=$val['title']?></b>
									</a>
								</p>
								<p>	
									<?=$val['brief']?>
									&nbsp;<a href="<?=$basedomain?>berita/info_agenda_detail/?id=<?=$val['id']?>" ><i><small>Selengkapnya</small></i></a>
								</p>
							 </div>
						</div>
						<?php
							echo"&nbsp;";
							 }
							 }else{
							pr("<center>Tidak Ada Data</center>");
						 }
							 ?>
							 <?php
							
						generate_paging($paging,$url);
						?>  	 
						
						
				  </div>
						<?=$sidebar?>
				</div>
				
			</div>
			<div class="span1"></div>
		</div>
<!-- Batas Akhir dari Isi Content-->
