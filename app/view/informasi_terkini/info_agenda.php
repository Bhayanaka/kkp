
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
								   <li class="active">Agenda Tentatif</li>
								</ul>
								<h3 class="text-primary">Index Agenda Tentatif</h3>
								<hr/>
								<table style="font-size:14px;">
									
									<?php
									 // pr($data);
									if($data){
										foreach($data as $key=>$val){
											//echo $val['brief']."<br/>";
											
										?>

										<tr>
											<td width="150px"><span class="text-muted"><?=date2Ind($val['postdate'])?></span></td>
											<td><a href="<?=$basedomain?>berita/info_agenda_detail/?id=<?=$val['id']?>"><b class="text-primary"><?=$val['title']?></b></a></td>
										</tr>
										<tr>
											<td colspan=""></td>
											<td><?=$val['brief']?>
									&nbsp;<a href="<?=$basedomain?>berita/info_agenda_detail/?id=<?=$val['id']?>" ><i><small>Selengkapnya</small></i></a></td>
										</tr>
										<tr><td>&nbsp;</td></tr>
										<?php
										echo"&nbsp;";
										}
									}else{
										echo "<tr><td><center>Tidak Ada Data</center></td></tr>";
									}
								 ?>	

								</table>
								<center>
									<ul class="pagination">
									  	<?php
							
										generate_paging($paging,$url);
										?>  	
									</ul>
								</center>
							</div>
							
							<div class="col-md-4">
								<br/>
								<?=$sidebar?>
							</div>
							
						</div>	
					
					</div>
					<div class="col-md-1"></div>
			
			</div>
			

