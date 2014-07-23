<div class="container-fluid big_body" >
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="container-fluid">
				<div class="col-md-8">
					<br/>
					<ul class="breadcrumb" style="margin-bottom: 5px;">
					  <li><a href="#">Informasi TRLP3K</a></li>
					   <li class="active">Gallery Video</li>
					</ul>
					<?php if($data){foreach($data as $key=>$val) $title= $val['title'];} ?>
					<h3 class="text-primary"><?=$title?></h3>
					<hr/>
					<iframe width="100%" height="400" src="<?=$basedomain?>public_assets/<?php echo $val['image']?>" frameborder="0" allowfullscreen></iframe>
					
				</div>
				
				<div class="col-md-4">
					<?=$sidebar?>
						
				</div>
				
			</div>	
		
		</div>
		<div class="col-md-1"></div>

</div>

<div class="container-fluid" style="padding:0">