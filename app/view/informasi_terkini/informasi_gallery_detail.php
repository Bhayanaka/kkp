<div class="container-fluid big_body" >
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="container-fluid">
				<div class="col-md-8">
					<br/>
					<ul class="breadcrumb" style="margin-bottom: 5px;">
					  <li><a href="#">Informasi TRLP3K</a></li>
					  <li><a href="#">Gallery Foto</a></li>
					   <li class="active">Detail</li>
					</ul>
					<?php if($data){foreach($data as $key=>$val) $title= $val['title'];} ?>
					<h3 class="text-primary"><?=$title?></h3>
					<hr/>
					
					<?php
						if($data){
							foreach($data as $val){
								$path=explode("/", $val['thumbnail']);
					?>
					
					<a class="fancybox" rel="group"
						href="<?=$basedomain?>public_assets/gallery/foto/<?php echo $path[2]?>" data-fancybox-group="gallery" 
						title="<?=$val['brief']?>">
						<img src="<?=$basedomain?>public_assets/<?php echo $path[0]?>/<?php echo $path[1]?>/<?php echo $path[2]?>" width="140px" alt="" />
					</a>
					
					<?php
						}
					} else {
						pr("<center>Tidak Ada Data</center>");
					}
					?>
					
					<center style="clear:both">
						<br/></br>
						<?php generate_paging($paging,$url); ?>
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