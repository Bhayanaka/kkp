<div class="container-fluid big_body" >
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="container-fluid">
				<div class="col-md-8">
					<br/>
					<ul class="breadcrumb" style="margin-bottom: 5px;">
					  <li><a href="#">Informasi TRLP3K</a></li>
					   <li class="active">Gallery Foto</li>
					</ul>
					<h3 class="text-primary">Index Gallery Foto</h3>
					<hr/>
					<?php
						if($data){
						foreach($data as $key=>$val){
						?>
					<div class="tmb_box">
						<div class="video_tmb"><div class="arrow-right small"></div></div>
						<a href="<?=$basedomain?>informasi_terkini/informasi_gallery_detail/?id=<?=$val['id']?>" >
							<div class="tmb_img"><?=$val['title']?> </div>
							<img src="<?=$basedomain?>public_assets/<?=$val['image']?>" class="img-thumbnail tmb_height" >
						</a>
					</div>
					<?php
						}
						}else{
						pr("<center>Tidak Ada Data</center>");
						
						}
						?>
					
					<center style="clear:both">
						<br/></br>
						<?php generate_paging($paging,$url);?>
					</center>
					
				</div>
				
				<div class="col-md-4">
					<?=$sidebar?>
						
				</div>
				
			</div>	
		
		</div>
		<div class="col-md-1"></div>

</div>

<div class="container-fluid" style="padding:0">