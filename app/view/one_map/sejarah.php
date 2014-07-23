
				<div class="container-fluid big_body" >
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="container-fluid">
							<div class="col-md-4">
								<?=$sidebar?>
									
							</div>
							<div class="col-md-8">
								<br/>
								<ul class="breadcrumb" style="margin-bottom: 5px;">
								  <li><a href="#">Produk & Program</a></li>
								  <li><a href="#">Aplikasi</a></li>
								  <li><a href="#">One Map</a></li>
								  <li class="active">Sejarah</li>
								</ul>
								   <?php
					 
						 if($data){
							// pr($data);
							foreach($data as $key=>$val){
							 echo "<h3 class=\"text-primary\">{$val['title']}</h3><br/>";
								if($val['image']){
								$path=explode("/", $val['image']);
								// pr($path);
								echo"<center><img src=\"{$basedomain}public_assets/{$path[0]}/{$path[1]}\" width=\"448\" height=\"336px\"></center>";
								}
								echo"&nbsp;";
								$tgl = date2ind($val['createdate']);
								echo "<p>{$tgl}</p>";
								echo "<p>{$val['content']}</p>";
							 }
						 }else{
							pr("<center>Tidak Ada Data</center>");
						 }
					 ?>
							</div>
							
							
						</div>	
					
					</div>
					<div class="col-md-1"></div>
			
			</div>