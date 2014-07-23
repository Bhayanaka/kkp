<?php
	// pr($data);
	$category = $_GET['cat'];
	//Menu atas
	//sub_top_menu('bg_ungu','m4',$data['title_menu'],$data['link_menu']);
	sub_top_menu('bg_ungu');
	
	$title_page=array('Produk','Dokumen Perencanaan WP-3-K',$data['item']["type"][0]["value"],$data['item']["category"][0]["value"]);
	$link_title_page=array('#','#','#','#');
	//box_legend('box_legend',$title_page,$link_title_page);
	box_legend('box_legend_2',$title_page,$link_title_page);
?>
	<div class="row-fluid ">
		<div class="span1"></div>
		<div class="span10 bg_putih body">
			<div class="row-fluid">
				<div class="span8">
					<h3><?=$data['item']['category'][0]['value']?></h3>
					
					<?php
						//search engine for provinsi only
						if($category == 7){
					?>
							<form class="form-inline"  method="post" action="<?=$basedomain?>dok_perencanaan/wp3k/?cat=<?=$_GET['cat']?>&type=<?=$_GET['type']?>">
								<div class="controls">
									<?php
									provLocation($data['lokasi'],'on');
									kabLocation('off');
									?>
									
									<input class="span3" type="text" placeholder="Kata Kunci" name="keywords">
									
									<!--<input type="submit" class="btn" value="Cari" name="search">-->
									
									<button type="submit" class="btn" name="search">Cari</button>
								</div>
							</form>
					<?php
						if(isset($_SESSION['search'])){
						?>
						<p style="margin-left:50px">
							Hasil Pencarian kategori: <i>
							<?php
							if($_SESSION['search']){
								if(isset($_SESSION['search']['provValue'])){
							?>
								<font color="blue"><?=$_SESSION['search']['provValue']?></font>&nbsp;+&nbsp;
							<?php } if(isset($_SESSION['search']['kabValue'])){?>
								<font color="blue"><?=$_SESSION['search']['kabValue']?></font>&nbsp;+&nbsp;
							<?php } ?>
								<font color="blue"><?=$_SESSION['search']['keywords']?></font>
							<?php } ?>
							</i>
						</p>
						<?php
						}
						}
					?>
					<!--
					
					<p style="margin-left:50px">
						Hasil Pencarian kategori: <i>
						<font color="blue">Rencana Strategis</font>&nbsp;+&nbsp;
						<font color="blue">album peta</font>
						</i>
					</p>
					-->
					<table class="peraturan" border="0">
					<?php
					if($data['content']){
						if(isset($_GET['page'])){$no=(($_GET['page']-1)*count($data['content'])+1);} else {$no=1;}
						foreach($data['content'] as $key=>$val){
					?>
						<tr>
							<td><b><?=$no++?></b></td>
							<td rowspan="7" class="img"><img width="136px" height="188px" src="<?=$basedomain."public_assets/".$val['image']?>" /></td>
							<td colspan="3"><b><?=$val['brief']?></b></td>
						</tr>
						<tr>
							<td rowspan="6"></td>
							<td colspan="3">
								<b><i><?=$val['title']?></i></b>
							</td>
						</tr>
						<tr>
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
								if($data['files']){
									foreach($data['files'] as $key=>$files){
										if($val['id']==$files['otherid']){
								?>
										<p><a class="btn btn-mini btn-success" href="<?=$basedomain.$files['files']?>"><?=$files['title']?>&nbsp;<i class=" icon-arrow-down icon-white"></i></a></p>
								<?php
										}
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
							generate_paging($data['paging'],$data['url'],"&cat=".$_GET['cat']."&type=".$_GET['type']);
					?>
				</div>
				<?=$sidebar?>
			</div>
		</div>
	</div>