<!--[if gt IE 9]><!-->
<?php
/*
	Batas Awal dari Isi Content Acuan Untuk di taruh di dalam File app/view
*/		
	//$title_menu=array('Berita','Opini','Gallery Foto','Gallery Video');
	//$link_menu=array('info_berita','info_opini','informasi_gallery','informasi_video');
	sub_top_menu('bg_ungu');
	
	$title_page=array('One Map','Database Tematik');
	$link_title_page=array('#','#',);
	box_legend('box_legend_2',$title_page,$link_title_page);
?>
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">
				  <div class="span8">
						<h3>Database Tematik</h3>
						<style>
							.table_tematik{border-bottom:2px solid #491172}
							.table_tematik .title_tb{width:150px;color:#000;font-weight:bold}
							.table_tematik tr td{vertical-align:top;border-collapse:collapse;font-size:14px;border-top:1px solid #947ea5}
							.table_tematik tr td div{width:150px;min-height:50px;margin-bottom:20px}
						</style>
						 <table class="table_tematik" cellpadding="10">
						<?php
						// pr($data);
						 if($data){
							foreach($data as $key=>$val){
								?>
								<tr>
								<td class="title_tb"><?=$val['title']?></td>
								<?php
								if($val['image']){
								$path=explode("/", $val['image']);
								// pr($path);
								?>
								<td>
									<div>
										<a class="fancybox" rel="group" href="<?=$basedomain?>public_assets/<?=$val['image']?>"">
										<img src="<?=$basedomain?>public_assets/<?=$val['image']?>" width="100%" width="160px" height="160px"  style="margin:5px 10px 0px 0px"/></a>
									</div>
								</td>
								<?
									}
								?>
								<td><?=$val['brief']?></td>
								</tr>
								
						<?php
							}	
						}
						else{
							pr("<center>Tidak Ada Data</center>");
						 }
						 echo"</table>";
						generate_paging($paging,$url);
						?>  	 
				  </div>
						<?=$sidebar?>
				</div>
				
			</div>
			<div class="span1"></div>
		</div>

