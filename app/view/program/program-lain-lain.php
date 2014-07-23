
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
								  <li><a href="#">Program</a></li>
								  <li class="active">Lain-lain</li>
								</ul>
								<h3 class="text-primary">Program - Lain-lain</h3>
								<hr/>
								
									<?php 
										$no = 1;
										// pr($data);
										$limit = $paging[item_per_page];
										if($data){
											if(isset($_GET['page']))
											{
												if($_GET['page'] == 1){
													$no = 1;
												}else{
													$no = ((($_GET['page'] - 1) * $limit) + 1);	
												}
											} else {
												$no=1;
											}
										// pr($data);	
										foreach($data as $key=>$val){
										 echo "<h3 class=\"text-primary\">{$val['title']}</h3><br/>";
											if($val['files']){
											$path=explode("/", $val['files']);
											// pr($path);
											echo"<center><img src=\"{$basedomain}public_assets/{$path[0]}/{$path[1]}\" width=\"448\" height=\"336px\"></center>";
											}
											echo"&nbsp;";
											echo "<p>{$val['content']}</p>";
										 }
									 }else{
										pr("<center>Tidak Ada Data</center>");
									 }
									// generate_paging($paging,$url);
								?>
							</div>
							</div>
							
							
						</div>	
					
					</div>
					<div class="col-md-1"></div>
			
			</div>