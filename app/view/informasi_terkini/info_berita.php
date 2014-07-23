
					
				<div class="container-fluid big_body" >
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="container-fluid">
							
							<div class="col-md-8">
								<br/>
								<ul class="breadcrumb" style="margin-bottom: 5px;">
								  <li><a href="#">Informasi TRLP3K</a></li>
								  <li class="active">Berita</li>
								</ul>
								<h3 class="text-primary">Index Berita</h3>
								<hr/>
								<table style="font-size:14px;">
								
						 <?php
							 //pr($data);
							 if($data){
							 foreach($data as $key=>$val){
							 
								
								?>
									<tr>
										<td rowspan="3" width="150px" style="vertical-align:top;">
										<?php if($val['image']){?> 
										<a href="<?=$basedomain?>berita/info_berita_detail/?id=<?=$val['id']?>">
										<img src="<?=$basedomain?>public_assets/<?=$val['image']?>" width="160px" height="160px" style="margin:5px 10px 0px 0px"/>
										</a>	
										<?php }?></td>
										<td><span class="text-muted"><?=date2Ind($val['postdate'])?></span></td>
									</tr>
									<tr>
										<td><a href="<?=$basedomain?>berita/info_berita_detail/?id=<?=$val['id']?>">
										<b><?=$val['title']?></b>
										</a></td>
									</tr>
									<tr>
										<td><?=$val['brief']?>
									&nbsp;<a href="<?=$basedomain?>berita/info_berita_detail/?id=<?=$val['id']?>" ><i><small>Selengkapnya</small></i></a></td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<?php
									 echo"&nbsp";
									 }
									 }else{
										echo"<tr><td>Tidak Ada Data</tr></td>";
										}
									 ?>
								</table>
								<?php
								generate_paging($paging,$url);
								?>
							</div>
							
							<div class="col-md-4">
							
								<?=$sidebar?>
								
							</div>
							
						</div>	
					
					</div>
					<div class="col-md-1"></div>
			
			</div>