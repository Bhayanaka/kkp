<?php defined ('TATARUANG') or exit ( 'Forbidden Access' ); ?>
				
				
				<style>
					
				</style>
				<div class="slider">
					<div id="Fader" class="fader">
						<div class="wrapper">
							<?php 
							// pr($data);
							if($data){
							foreach($data as $key=>$val){
								if($val['tags'] == "image"){
								?>
									<div class="slide">
										<div class="box_title"><center><h2 class="title_slide"><?=$val['title']?></h2></center></div>
										<img src="<?=$basedomain."public_assets/".$val['image']?>"/>
									</div>
									
								<?php
								}else{
								?>
									<div class="slide">
										<iframe width="100%" height="100%" src="<?=$basedomain.'public_assets/'.$val['image']?>" frameborder="0" allowfullscreen></iframe>
									</div>
								<?php
								}
							?>
							<?php
							}
							}
							?>
							</div>
							
						<div class="fader_controls">
							<div class="pager prev" data-target="prev">&lsaquo;</div>
							<div class="pager next" data-target="next">&rsaquo;</div>
							<ul class="pager-list" style="list-style-type:none;"></ul>
						</div>
					</div>
				</div>
				<!-- end SLIDE -->
				
				<!--RUNNING TEXT-->
				<div class="row-fluid" style="margin-top:0px;background:#a21616;color:white;padding-top:0px">
					<div class="span2" align="center" style="background:#c92b2b;padding:10px;margin-right:0"><b>HEADLINE</b></div>
					<div class="span10"  style="padding-top:10px;margin-left:0">
						<marquee>
								<?php
								// pr($text);
								if($text){
								foreach($text as $key=>$values){
									echo $values['title'];
									echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
									
									}
								}
								?>
						</marquee>
					</div>
				</div>
				
				<!-- SEARCH -->
				<div class="row-fluid search">
					<div class="span1"></div>
					<div class="span10"  style="margin:auto;text-align:center;padding:0px 0px">
						<div class="input-append">
							<form class="bs-docs-example form-inline" method="POST" action="<?=$basedomain?>home/search">
							  <input id="appendedInputButtons" class="input-xxlarge" name="keywords" type="text" style="padding:10px">
							  <button class="btn btn-success" type="submit" name="search" style="padding:10px">Search</button>
							</form>
						</div>
					</div>
					<div class="span1"></div>
				</div>
				<!-- KIRI KANAN -->
				<div class="row-fluid" style="margin-top:30px;">
					<div class="span1"></div>
					<div class="span6">
						<center>
							<?php
							if($tabel){
								foreach($tabel as $key=>$image){
							?>
							<img src="<?=$basedomain."public_assets/".$image['image']?>" width="100%">
							<?php
								}
							}
							?>
						</center>
					</div>
					
					<!-- SEARCH -->
					<div class="span4">
						<!-- SHORT MENU -->
							<a href="<?=$basedomain?>berita/info_berita">
								<div class="row-fluid">

									<!--<center><a href="<?=$basedomain?>berita/info_berita"><img src="<?=$basedomain?>assets/images/icon-1.png" width="70px"></a></center><br/>
									  <div class="isi-short-menu" >-->

									<div class="span2">
										<center>
										<img src="<?=$basedomain?>assets/images/icon-1.png" width="70px">
										</center>
									</div>
									<div class="span10">
										<div class="isi-short-menu" align="justify">
										<b>Berita & Informasi Terkini</b><br/>
										Informasi Terkini
										Direktorat Tata Ruang Laut
										Pesisir & Pulau-pulau Kecil

									 </div>
									</div>
								</div>
							</a><br/>
							
							<a href="<?=$basedomain?>minapolitan/polaruangnasional">
								<div class="row-fluid">
									<div class="span2">
										<center><img src="<?=$basedomain?>assets/images/icon-2.png" width="70px"></center>
									</div>
									<div class="span10">
										<div class="isi-short-menu" align="justify">
										<b>Sistem Informasi Geografis
											Perencanaan WP-3-K
										</b><br/>
										Informasi Geopasial
										Perencanaan Pengelolaan WP-3-K 

									 </div>
									</div>
								</div>
							</a><br/>
							
							<a href="<?=$basedomain?>">
								<div class="row-fluid">
									<div class="span2">
										<center><img src="<?=$basedomain?>assets/images/icon-3.png" width="70px"></center>
									</div>
									<div class="span10">
										<div class="isi-short-menu" align="justify">
											<b>Geoportal GIS
												Minapolitan
											</b><br/>
											Informasi Geopasial
											Perencanaan Pengelolaan
											Kawasan Minapolitan Terpadu

										 </div>
									</div>
								</div>
							</a><br/>
							
							<a href="<?=$basedomain?>one_map/sejarah">

							<!--<div class="row-fluid">
								<center><a href="<?=$basedomain?>one_map/sejarah"><img src="<?=$basedomain?>assets/images/icon-4.png" width="70px"></a></center><br/>
								  <div class="isi-short-menu" align="justify">
									<b>One Map 
									Sumberdaya Pesisir & LautNasional
									</b><br/>
									One Gate Data dan Informasi Geospasial
									Sumberdaya Pesisir & Laut -->

								<div class="row-fluid">
									<div class="span2">
										<center><img src="<?=$basedomain?>assets/images/icon-4.png" width="70px"></center>
									</div>
									<div class="span10">
										 <div class="isi-short-menu" align="justify">
											<b>One Map 
											Sumberdaya Pesisir & LautNasional
											</b><br/>
											One Gate Data dan Informasi Geospasial
											Sumberdaya Pesisir & Laut 



										 </div>
									</div>
								</div>
							</a>
							
							
					</div>
					<div class="span1"></div>
				</div>
				
				
				<!--<div class="row-fluid short-menu">
					<div class="span1"></div>
					<div class="span10">
					<center>
					<table class="table_byr" cellpadding="15" width="100%">
					<thead>
						<tr>
							<td colspan="4" class="td_head td_orange"><h4>TABEL KEMAJUAN RENSTRA RENZO DLL</h4></td>
						</tr>
						<tr>
							<td class="td_head td_ijo">
								<h4>NO</h4>
							</td>
							<td class="td_head td_ijo">
								<h4>STATUS DOKUMEN RENCANA ZONASI WP-3-K</h4>
							</td>
							<td class="td_head td_ijo">
								<h4>PROVINSI</h4>
							</td>
							<td class="td_head td_ijo">
								<h4>KABUPATEN/KOTA </h4>
							</td>
						</tr>
					</thead>
					
					<tbody>
						<tr class="">
							<td><center>1</center></td>
							<td>Disahkan dalam bentuk PERDA</td>
							<td><center>4</center></td>
							<td><center>9</center></td>
						</tr>
						<tr class="">
							<td><center>2</center></td>
							<td>Sudah Mendapatkan Saran dan/atau Tanggapan Menteri</td>
							<td><center>-</center></td>
							<td><center>-</center></td>
						</tr>
						<tr class="">
							<td><center>3</center></td>
							<td>Substansi Sudah Dibahas dengan Eselon 1 KKP dan BKPRN</td>
							<td><center>-</center></td>
							<td><center>-</center></td>
						</tr>
						<tr class="">
							<td><center>4</center></td>
							<td>Proses Penyusunan </td>
							<td><center>25</center></td>
							<td><center>5</center></td>
						</tr>
						<tr class="">
							<td><center>5</center><br/></td>
							<td>Belum Menyusun</td>
							<td><center>5</center></td>
							<td><center>204</center></td>
						</tr>
							
					</tbody>
					
					<tfoot>
						<tr>
							<td colspan="2"><h4>TOTAL</h4></td>
							<td><h4>33</h4></td>
							<td><h4>319</h4></td>
						</tr>
						<tr >
							<td colspan="2"><h4>PERSENTASE PERDA (%)</h4></td>
							<td><h4>12%</h4></td>
							<td><h4>3%</h4></td>
						</tr>
					</tfoot>
				</table>
				</center>
				</div>
				</div>-->