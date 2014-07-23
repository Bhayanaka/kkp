<?php
	// Menu atas
	// pr($_SESSION);
	sub_top_menu('bg_ungu');
	
	$title_page=array('Produk','Dokumen Perencanaan WP-3-K',$data['item']["type"][0]["value"]);
	$link_title_page=array('#','#','#');
	box_legend('box_legend_2',$title_page,$link_title_page);
?>
	<div class="row-fluid ">
		<div class="span1"></div>
		<div class="span10 bg_putih body">
			<div class="row-fluid">
				<div class="span8">
					<h3><?=$data['item']['type'][0]['value']?></h3>
					
					<div class="controls controls-row">
					<form class="form-inline" method="post" action="<?=$basedomain?>dok_perencanaan/typewp3k/?type=<?=$_GET['type']?>">
							
								<select class="span3" name="category">
								<option value="0">Semua Kategori</option>
									<?php
										foreach($data['item']['category'] as $val){
											echo "<option value='".$val['id']."_".$val['value']."'>{$val['value']}</option>";
										}
									?>
								</select>
								
								<?php
								provLocation($data['lokasi'],'on'); echo "&nbsp;";
								kabLocation('off');
								?>
								
								<input class="span2" type="text" placeholder="Kata Kunci" name="keywords">
								
								<!--<input type="submit " class="btn span1" style="padding:0px 5px" >-->
								<button type="submit" class="btn">Cari</button>
								
							
						</form>
						</div>

						<?php
						if(isset($_SESSION['search'])){
						?>
						<p style="margin-right:50px">
							Hasil Pencarian : <i>
							<font color="blue"><?=$_SESSION['search']['value']?></font>&nbsp;
							<?
							if($_SESSION['search']['keywords']){
								echo"+ <font color=\"blue\">";
								echo $_SESSION['search']['keywords'];
							}
							?></font>
							<?
								if($prov){
								echo"+ <font color=\"blue\">";
								echo $prov;
								}
							?></font>
								<?php
								if($kab){
								echo"+ <font color=\"blue\">";
								echo $kab;
								}
								?>
							</font>
							</i>
						</p>
						<?php
						}
						?>
						
					<table class="peraturan" border="0">
					<?php
					// pr($data['content']);
					if($data['content']){
						if(isset($_GET['page'])){$no=(($_GET['page']-1)*$paging['item_per_page']+1);} else {$no=1;}
						foreach($data['content'] as $key=>$val){
					?>
						<tr>
							<td><b><?=$no++?></b></td>
							<td rowspan="6" class="img">
							<?php
							if($val['image']){
							?>
							<img width="136px" height="188px" src="<?=$basedomain."public_assets/".$val['image']?>" /></td>
							<?php }else{
							?>
							<img width="136px" height="188px" src="<?=$basedomain?>public_assets/noImageAvailable.jpg"/></td>
							<?php
							}
							?>
							<td colspan="3"><b><i><?=$val['title']?></i></b></td>
						</tr>
						<!--<tr>
							<td rowspan="6"></td>
							<td colspan="3">
								<b><i><? //$val['title']?></i></b>
							</td>
						</tr>-->
						<tr>
							<td rowspan="6"></td>
							<td style="width:130px">Tahun Penyusunan</td>
							<td style="width:5px">:</td>
							<td><?=$val['tahun']?></td>
						</tr>
						<tr>
							<td>Jumlah Halaman</td>
							<td>:</td>
							<td><?=$val['jml_hal']?></td>
						</tr>
						<tr>
							<td>Lampiran</td>
							<td>:</td>
							<td><?=$val['lampiran']?></td>
						</tr>
						<tr>
							<td>Abstraksi</td>
							<td>:</td>
							<td><p><?=$val['content']?></p>
							</td>
						</tr>
						<tr>
							<td>Dokumen</td>
							<td>:</td>
							<td>
								<?php
								if($val['file']){
									foreach($val['file'] as $key=>$files){
								?>
										<p><a class="btn btn-mini btn-success fancybox" href="<?=$basedomain."public_assets/".$files['files']?>"><?=$files['thumbnail']?>&nbsp;<i class=" icon-arrow-down icon-white"></i></a></p>
								<?php
									}
								}
								?>
							</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<?php
							}
						} else {pr("<center>Tidak Ada Data</center>");} 
						?>
					</table>
					<?php // untuk menampilkan paging pada halaman view
							generate_paging($data['paging'],$data['url'],"&type=".$_GET['type']);
					?>
				</div>
				<?=$sidebar?>
			</div>
		</div>
	</div>