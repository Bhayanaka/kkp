<div class="container-fluid big_body">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="container-fluid">
							
							<div class="col-md-8">
								<br/>
								<ul class="breadcrumb" style="margin-bottom: 5px;">
								  <li><a href="#">Informasi TRLP3K</a></li>
								  <li class="active">Opini</li>
								</ul>
								<h3 class="text-primary">Index Opini</h3>
								<hr/>
								<table style="font-size:14px;">
								<?php
								 if($data){
									foreach($data as $key=>$val){
								?>
									<tr>
										<td rowspan="3" width="150px" style="vertical-align:top;">
											<?php if($val['image']){?>
												<a href="<?=$basedomain?>berita/info_opini_detail/?id=<?=$val['id']?>">
												<img src="<?=$basedomain?>public_assets/<?=$val['image']?>" width="130px" height="80px"/>
												</a>
											<?php }?>
										</td>
										<td><span class="text-muted"><?=date2Ind($val['postdate'])?></span></td>
									</tr>
									<tr>
										<td><a href="<?=$basedomain?>berita/info_opini_detail/?id=<?=$val['id']?>"><b class="text-primary"><?=$val['title']?></b></a></td>
									</tr>
									<tr>
										<td><?=$val['brief']?></td>
									</tr>
									<tr><td>&nbsp;</td></tr>
								<?php 
									} 
								} else {
									echo "<tr><td colspan=\"3\" align=\"center\">Tidak Ada Data</td></tr>";
								}

								?>	
								</table>
								<?=generate_paging($paging,$url);?>
							</div>
							
							<div class="col-md-4">
								<?=$sidebar?>
								
							</div>
							
						</div>	
					
					</div>
					<div class="col-md-1"></div>
			
			</div>
			
			<div class="container-fluid" style="padding:0">