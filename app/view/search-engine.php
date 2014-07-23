<?php 
// pr($data);
// pr($_SESSION);
?>
		<div class="row-fluid sub_top_menu bg_biru"></div>
		<div class="row-fluid box_legend_2"><!--LEGEND 2 BIAR AGAK NAIK-->
			<div class="span1"></div>
			<div class="span10">
				<p class="legend">
					<a href="#">Beranda</a>&nbsp;/&nbsp;
					<a href="#">Mesin Pencari</a>
				</p>
			</div>
			<div class="span1"></div>
		</div>
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid" style="min-height:800px"><!--Tinggi minimalnya-->
				  <div class="span12">
						<h3>Mesin Pencari</h3>
						<form class="bs-docs-example form-inline" method="POST" action="<?=$basedomain?>home/search">
							<input class="span10" type="text" style="padding:11px" placeholder="Masukkan Kata Kunci" name="keywords">
							<input type="submit" class="btn btn-large span2" value="Cari" name="search"/>
						</form><br/>
						<?php
						if(isset($_SESSION['search'])){
						?>
						<h4>Hasil Pencarian : <font color="blue"><i>"<?=$_SESSION['search']['keywords']?>"</i></font></h4><br/>
						<?php
						}
						?>
						<?php
						if($data){
							if(!empty($data['content'][0])){
								foreach($data['content'] as $key=>$first){
									if($first){
									foreach($first as $val){
										foreach($data['category'] as $key=>$cat){
											if($cat['id'] == $val['categoryid']){
												$category = $cat['value'];

												if($cat['category']==1 || $cat['category']==4){
													$permalink = $cat['class_function'];
												} else {
													$permalink = $cat['class_function']."?id=".$val['id'];
												}
											}
										}
							?>
							<div class="isi_search">
							<table>
								<tr>
								<td rowspan="4">
								<?php
								if($val['categoryid']!=7){
								?>
								<img width="100px" height="100px" src="<?=$basedomain."public_assets/".$val['image']?>">
								<?php
								} else {
								?>
								<video width="100px" width="100px">
									<source src="<?=$basedomain."public_assets/".$val['image']?>" ></source>
								</video>
								<?php } ?>
								</td>
								<td><a href="<?=$basedomain.$permalink?>"><h5><?=$category."&nbsp;&raquo;&nbsp;".$val['title']?></h5></a></td>
								</tr>
								<tr>
								<td><p><em style="color:gray;"><?=$val['postdate']?></em>
								<?=(isset($val['brief']) ? $val['brief'] : $val['deskripsi'])?><a href="<?=$basedomain.$permalink?>"><i>&nbsp;Selengkapnya</i></a>
								</p></td>
								</tr>
							</table>
							</div>
							<?php
									}
									}
								}
							} else {
									pr("<center>Data tidak ditemukan</center>");
							}
						}
						?>
					<?php // untuk menampilkan paging pada halaman view
						if($data){
							generate_paging($data['paging'],$data['url']);
						}
					?>
				  </div>
				</div>
				
			</div>
			<div class="span1"></div>
		</div>
		