<?php //defined ('TATARUANG') or exit ( 'Forbidden Access' ); ?>
				
				
			
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-top:0">
						  <!-- Indicators -->
						  <ol class="carousel-indicators">
						  <?php
							$count = 0;
							if($data){
							foreach($data as $key=>$val){						  
							if($count == 0){
						  ?>
								<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<?php
							}else{
								?>
								<li data-target="#carousel-example-generic" data-slide-to="<?php echo $count?>"></li>
							<?php
							} 
							$count++;
							}
							}
							?>
						  </ol>

						  <!-- Wrapper for slides -->
						  <div class="carousel-inner">
							<?php 
							// pr($data);
							$tag = 0;
							if($data){
							foreach($data as $key=>$val){
								if($val['tags'] == "image"){
								// pr($val);
									if($tag == 0){
								?>
									<div class="item active">
										<a href="<?=$val['brief']?>"><img src="<?=$basedomain."public_assets/".$val['image']?>"/></a>
										<div class="carousel-caption"></div>
									</div>
								<?php
									}else{
									?>
									<div class="item">
										<a href="<?=$val['brief']?>"><img src="<?=$basedomain."public_assets/".$val['image']?>"/></a>
										<div class="carousel-caption"></div>
									</div>
									<?php
									}
								}else{
									if($tag == 0){
									?>
									<div class="item active">
										<iframe width="100%" height="100%" src="<?=$basedomain.'public_assets/'.$val['image']?>" frameborder="0" allowfullscreen></iframe>
										<div class="carousel-caption"></div>
									</div>
									<?php
									}else{
								?>
									<div class="item">
										<iframe width="100%" height="100%" src="<?=$basedomain.'public_assets/'.$val['image']?>" frameborder="0" allowfullscreen></iframe>
										<div class="carousel-caption"></div>
									</div>
								<?php
									}
								}
							?>
							<?php
							$tag ++;
							// echo "tag=".$tag; 
							}
							}else{
								?>
								<div class="item active">
										<a href="<?=$val['brief']?>"><img src="<?=$basedomain?>assets/img/slide1.jpg"/></a>
										<div class="carousel-caption"></div>
									</div>
								<?php
							}
							?>
							<!--<div class="item active">
							  <img src="<?=$basedomain?>assets/img/slide2.jpg" alt="Tataruang">
							  <div class="carousel-caption"></div>
							</div>
							<div class="item ">
							  <img src="<?=$basedomain?>assets/img/slide1.jpg" alt="Tataruang">
							  <div class="carousel-caption"></div>
							</div>
							<div class="item ">
							  <img src="<?=$basedomain?>assets/img/slide2.jpg" alt="Tataruang">
							  <div class="carousel-caption"></div>
							</div>-->
						  </div>

						  <!-- Controls -->
						  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						  </a>
						  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						  </a>
					</div>
				<div class="container-fluid big_body" >
					<div class="col-md-1"></div>
					<div class="col-md-10">
					<div class="container-fluid">
						
						<div class="col-md-6">
							<h3><i>Headline</i></h3>
							<hr>
							<?php
								// pr($text);
								if($text){
								foreach($text as $key=>$values){
									// echo $values['title'];
									?>
									<h3 class="text-primary"><a href="<?=$basedomain;?>berita/info_berita_detail/?id=<?=$values['id'];?>"><?=$values['title'];?></a></h3>
									<p class="text-muted"><?=$values['postdate'];?></p>
									<p><?=$values['brief'];?>
									<a href="<?=$basedomain;?>berita/info_berita_detail/?id=<?=$values['id'];?>" class="text-primary"><i>Selengkapnya</i></a>
									</p>
									<?php
									
									
									}
								}
								?>
							<!--<h3 class="text-primary"><a href="">Prabowo Vs Jokowi</a></h3>
							<p class="text-muted">Sabtu, 31 Mei 2014</p>
							<p>Nullam quis risus eget rna mollis ornare vel eu leo. Cum sociis natoque penatibus 
								et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.
								Nullam quis risus eget rna mollis ornare vel eu leo. Cum sociis natoque penatibus 
								et magnis dis parturient montes, nascetur ridiculus mus.
								<a href="" class="text-primary"><i>Selengkapnya</i></a>
							</p>-->
						
						</div>
						<div class="col-md-6"><br/>
							<?php
							if($tabel){
								foreach($tabel as $key=>$image){
							?>
							<img src="<?=$basedomain."public_assets/".$image['image']?>" width="100%">
							<?php
								}
							}
							?>
							<!--<table class="table table-striped table-hover table_beranda">
							  <thead>
								<tr>
								  <th colspan="4" class="headtable"><center><h4>Kemuajuan Renstra Renzol dll</h4></center></th>
								</tr>
							  </thead>
							  <tbody>
								<tr class="info">
								  <th >No</th>
								  <th>Status Dokumen</th>
								  <th><center>Provinsi</center></th>
								  <th><center>Kabupaten/Kota</center></th>
								</tr>
								<tr class="active">
								  <td>2</td>
								  <td>Column content</td>
								  <td><center>Column content</center></td>
								  <td><center>Column content</center></td>
								</tr>
								<tr>
								  <td>3</td>
								  <td>Column content</td>
								  <td><center>Column content</center></td>
								  <td><center>Column content</center></td>
								</tr>
								<tr class="active">
								  <td>4</td>
								  <td>Column content</td>
								  <td><center>Column content</center></td>
								  <td><center>Column content</center></td>
								</tr>
								<tr>
								  <td>5</td>
								  <td>Column content</td>
								  <td><center>Column content</center></td>
								  <td><center>Column content</center></td>
								</tr>
								<tr class="active">
								  <td>6</td>
								  <td>Column content</td>
								  <td><center>Column content</center></td>
								  <td><center>Column content</center></td>
								</tr>
								<tr>
								  <td>7</td>
								  <td>Column content</td>
								 <td><center>Column content</center></td>
								  <td><center>Column content</center></td>
								</tr>
								<tr class="success">
								  <td colspan="2"><center><b>Total</b></center></td>
								  <td><center><b>Column content</b></center></td>
								  <td><center><b>Column content</b></center></td>
								</tr>
								<tr class="success">
								   <td colspan="2"><center><b>Persentase Pemda %</b></center></td>
								  <td><center><b>Column content</b></center></td>
								  <td><center><b>Column content</b></center></td>
								</tr>
							  </tbody>
							</table>--> 
						</div>
						
					</div>	
				
				</div>
				<div class="col-md-1"></div>
			
			</div>
			<div class="container-fluid" style="margin-top:50px;">
						<div class="col-md-1"></div>
						<div class="col-md-2">
							<a href="<?=$basedomain;?>berita/info_berita"><div class="circle_menu"><img src="<?=$basedomain?>assets/img/1.png"/></div></a>
							<center>
							<p><strong>Berita dan Informasi</strong></p>
							<p><small>Informasi Terkini Direktorat Tata Ruang Laut Pesisir & Pulau-pulau Kecil</small></p>
							<center>
						</div>
						<div class="col-md-2">
							<a href=""><div class="circle_menu"><img src="<?=$basedomain?>assets/img/2.png"/></div></a>
							<center>
							<p><strong>Sistem Informasi Geografi Perencanaan Geografis</strong></p>
							<p><small>Informasi Geospasial Perencanaan Pengolahaan WP3K</small></p>
							<center>
						</div>
						<div class="col-md-2">
							<a href=""><div class="circle_menu"><img src="<?=$basedomain?>assets/img/3.png"/></div></a>
							<center>
							<p><strong>Geoportal GIS Minapolitan</strong></p>
							<p><small>Informasi Geospasial Perencanaan Pengolahaan Kawasan Minapolitan Terpadu</small></p>
							<center>
						</div>
						<div class="col-md-2">
							<a href="<?=$basedomain;?>one_map/sejarah"><div class="circle_menu"><img src="<?=$basedomain?>assets/img/4.png"/></div></a>
							<center>
							<p><strong>Onemap Sumber Daya Pesisir & Laut Nasional</strong></p>
							<p><small>One Gate Data dan Informasi Geopspasial Sumber Daya Pesisir & Laut Nasional.</small></p>
							<center>
						</div>
						<div class="col-md-2">
							<a href="<?=$basedomain;?>/dok_perencanaan/typewp3k/?type=1"><div class="circle_menu"><img src="<?=$basedomain?>assets/img/5.png"/></div></a>
							<center>
							<p><strong>Produk TRLWP3K</strong></p>
							<p><small>Produk dari Direktorat TRLWP3K</small></p>
							<center>
						</div>
						
						<div class="col-md-1"></div>
					</div>