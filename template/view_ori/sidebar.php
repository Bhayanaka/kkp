

<!--Foto kegiatan -->
	
	<?php


	if (isset($album)){
		
		echo '<br/><h4><a href="'.$basedomain.'/informasi_terkini/informasi_gallery" class="sub_head">'.$foto.'</a></h4><hr>';
		
		?>
		
		<?php
		// vd($album);
		
		if ($album){
			$i=1;
			$j=1;
			$total = count($album);
			echo"<div class=\"side_blue_block\">
			<table class=\"table_foto_side\">";
			if ($album){
				foreach ($album as $val){
					// pr ($foto);
					if($i==1){
						echo "<tr>";
						
					}
					?>
						<td><a href="<?=$basedomain?>informasi_terkini/informasi_gallery_detail/?id=<?=$val['id']?>"><img src="<?=$basedomain?>public_assets/<?php echo $val['image']?>" title="Gambar" width="20%" /></a></td>				
					<?php
					$i++;
					$j++;
					if($i>3 || $j>$total){
						echo "</tr>";
						$i=1;
					}
				}
			}
			echo"</table><br/>
				<p><a href=\"\"><strong>Index Foto Kegiatan</strong></a><br/></p>
								</div>";
		}else{
		
		?>
			
				<p>kosong</p>
		
		<?php
		}
	}
	?>
		
	<!--video -->

		
	<?php
	
	if (isset($video)){
	
		echo '<br/><h4><a href="'.$basedomain.'/informasi_terkini/informasi_video" class="sub_head">'.$titlevideo.'</a></h4><hr>';
		if($video){
		echo"<div class=\"side_blue_block\">
			<table class=\"table_foto_side\">";
			foreach ($video as $val){
			//echo $val['image']
			?>
			<tr>
											<td><a href="">
													
													<div class="box_video">
														<a href="<?=$basedomain?>informasi_terkini/informasi_video_detail/?id=<?=$val['id']?>">	<video width="100%" style="margin:5px 10px 0px 0px">
														<source src="<?=$basedomain?>public_assets/<?php echo $val['image']?>">
														</object>
													</video></a>
														<div class="video"><div class="arrow-right"></div></div>
													</div><br/>
													<a href=""><strong>Index Video Kegiatan</strong></a
													
													
												</a>
											</td>
										</tr>
			<?php
			}
			echo"</table>
				</div>";
		}else{
		
		?>
			
			<p>kosong</p>
			
		<?php
		}
	}
	?>
	
	<!---BERITA TERKINI-->
	
	<?php
	
	if (isset($berita)){
		echo '<br/><h4><a href="'.$basedomain.'berita/info_berita" class="sub_head">'.$judulberita.'</a></h4><hr>';
		echo"	<div class=\"side_blue_block\">";
		if ($berita){
			// pr($berita);
			foreach ($berita as $val){
			?>
				<p>
					<small><?=$val['postdate']?></small></br>
					<a href="<?=$basedomain?>berita/info_berita_detail/?id=<?=$val['id']?>" ><b><?=$val['title']?></b></a>
				</p>
				
			<?php
			}
		}
		echo"<p><a href=\"\"><strong>Index Berita</strong></a><br/></p>
			 </div>";
		
	}
	?>
	<!---AGENDA-->
	<?php
	if (isset($agenda)){
		// echo '<h3>'.$judulagenda.'</h3>';
		echo '<br/><h4><a href="'.$basedomain.'/berita/info_agenda" class="sub_head">'.$judulagenda.'</a></h4><hr>';
		echo"	<div class=\"side_blue_block\">";
		if ($agenda){
			foreach ($agenda as $val){
			?>
			<p><small><?=$val['postdate']?></small>
			<a href="<?=$basedomain?>berita/info_agenda_detail/?id=<?=$val['id']?>" ><?=$val['title']?></a>
			</p>
			<?php
			}
		}
		echo"<p><a href=\"\"><strong>Index Agenda</strong></a><br/></p>
			 </div>";

		// echo '<p><a href="">Index Agenda</a></p>';
		
	}
	?>
	
	<!--Opini -->
	<?php
	
	if (isset($opini)){
		echo '<br/><h4><a href="'.$basedomain.'/berita/info_opini" class="sub_head">'.$judulopini.'</a></h4><hr>';
		echo"<div class=\"side_blue_block\">";
		if ($opini){
			foreach ($opini as $val){
			?>
			<p>
				<small><?=$val['postdate']?></small></br>
				<a href="<?=$basedomain?>berita/info_opini_detail/?id=<?=$val['id']?>" ><b><?=$val['title']?></b></a>
			</p>
			<?php
			}
		}
		echo"<p><a href=\"\"><strong>Index Opini</strong></a><br/></p>
								</div>";
		
	}
	?>
	
	
		
		<!--PERATURAN -->
	<?php
	if(isset($produk)){
	
		echo'<br/><h4>'.$title.'</h4><hr>
			<div class="panel panel-default">
								  <div class="panel-body">
									<ul class="link_terkait">
										<li><b>Dokumen Perencanaan WP-3-K</b>
											<ul>
												<li><a href="'.$basedomain.'dok_perencanaan/typewp3k/?type=1">Rencana Strategis WP-3-K</a></li>
												<li><a href="'.$basedomain.'dok_perencanaan/typewp3k/?type=2">Rencana Tata Ruang Laut dan Zonasi WP-3-K</a></li>
												<li><a href="'.$basedomain.'dok_perencanaan/typewp3k/?type=3">Rencana Pengelolaan WP-3-K</a></li>
												<li><a href="'.$basedomain.'dok_perencanaan/typewp3k/?type=4">Rencana Aksi WP-3-K</a><br/><br/></li>
											</ul>
										</li>
										<li><b>Norma,Standart,Prosedur & Kriteria</b>
											<ul>
												<li><a href="'.$basedomain.'norma_std_psdr_kriteria_c/pedoman_umum">Pedoman Umum</a></li>
												<li><a href="'.$basedomain.'norma_std_psdr_kriteria_c/pedoman_teknis">Pedoman Teknis</a></li>
												<li><a href="'.$basedomain.'norma_std_psdr_kriteria_c/modul_pelatihan">Modul Pelatihan</a></li>
												<li><a href="'.$basedomain.'norma_std_psdr_kriteria_c/prosedur_kriteria">Prosedur Pelatihan</a></li>
											</ul>
										</li>
									</ul>
								  </div>
								</div>
					';
	}
	?>
	<?php
	if(isset($minapolitan)){
		echo '	
					<h4>'.$title.'</h4>
					<a class="menu m4_on m_right" href="#"><div><center>Peta Pola Ruang </center></div></a>
					<a class="menu m4 m_right" href="'.$basedomain.'minapolitan/polaruangnasional"><div>Nasional</div></a>
					<a class="menu m4 m_right" href="'.$basedomain.'minapolitan/polaruangprovinsi"><div>Provinsi</div></a>
					<a class="menu m4 m_right" href="'.$basedomain.'minapolitan/polaruangkabkot"><div>Kabupaten/Kota</div></a>
					<a class="menu m4 m_right" href="'.$basedomain.'minapolitan/polaruangkabkotrinci"><div>Kabupaten/Kota Rinci</div></a>
					
					<div class="laper2"></div>
					<a class="menu m4_on m_right" href="#"><div><center>Peta Struktur Ruang</center></div></a>
					<a class="menu m4 m_right" href="'.$basedomain.'minapolitan/strukturruangnasional"><div>Nasional</div></a>
					<a class="menu m4 m_right" href="'.$basedomain.'minapolitan/strukturruangprovinsi"><div>Provinsi</div></a>
					<a class="menu m4 m_right" href="'.$basedomain.'minapolitan/strukturruangkabkot"><div>Kabupaten/Kota</div></a>
					<a class="menu m4 m_right" href="'.$basedomain.'minapolitan/strukturruangkabkotrinci"><div>Kabupaten/Kota Rinci</div></a>
						
					';
	
	}
	
	?>
	<?php
	if(isset($aplikasi)){
		echo' 
					<br/>
					<h4><i>Link <span class="text-primary">One Map</span> </i></h4>
					<hr>
					<div class="panel panel-default">
								  <div class="panel-body">
									<ul class="link_terkait">
										<ul class="link_terkait">
										<li><a href="'.$basedomain.'one_map/sejarah">Sejarah</a></li>
										<li><a href="'.$basedomain.'one_map/visi_misi">Visi & Misi</a></li>
										<li><a href="'.$basedomain.'one_map/organisasi">Organisasi</a></li>
										<li><a href="'.$basedomain.'one_map/rencana_aksi">Rencana Aksi</a></li>
										<li><a href="'.$basedomain.'one_map/database_tematik">Database Tematik</a></li>
										<li><a href="'.$basedomain.'one_map/target_capaian">Target & Capaian</a></li>
										<li><a href="'.$basedomain.'one_map/dokumentasi">Dokumentasi</a></li>
										<li><a href="'.$basedomain.'one_map/indeksPeta">Index Peta Tematik</a></li>
										<li><a href="'.$basedomain.'one_map/databasespasial">Database Spacial</a></li>
									</ul>
									</ul>
								  </div>
								</div>
					<br/>
					
					<hr>
					<div class="panel panel-default">
								  <div class="panel-body">
									<ul class="link_terkait">
										<ul class="link_terkait">
										<li><a href="#">SIG Minapolitan</a></li>
										<li><a href="#">SIG Pengelolaan Pesisir<br/>dan Pulau - Pulau Kecil</a></li>
										<li><a href="'.$basedomain.'minapolitan/polaruangnasional">Pola Ruang</a></li>
										<li><a href="'.$basedomain.'minapolitan/strukturruangnasional">Struktur Ruang</a></li>
									</ul>
									</ul>
								  </div>
								</div>
					';
	
	}
	?>
	<?php
	
	if (isset($peraturan)){
		echo '<br/><h4><a href="" class="sub_head">'.$title.'</a></h4><hr>';
			if ($peraturan){
				$i=1;
				
					foreach($peraturan as $key=>$val){
					
					if($val['files'] != ''){
									$patch = explode("/", $val['files']);
									$directory= $patch[0];
									$file = $patch[1];
									$download_file = "<a class=\"btn btn-mini btn-success\" href=\"{$basedomain}public_assets/{$directory}/{$file}\">Unduh Dokumen <i class=\" icon-arrow-down icon-white\"></i> </a>";
								}else{
									$directory = '-';
									$file = '-';
									$download_file ="";
								}
					
					echo'<table class="peraturan_kanan">
					<tr>
						<td><b>'.$i++.'</b></td>
						<td colspan="3"><b>'.$val['title'].'</b></td>
					</tr>
					<tr>
						<td rowspan="5"></td>
						<td>Tanggal Terbit</td>
						<td>:</td>
						<td>'.$val['postdate'].'</td>
					</tr>
					<tr>
						<td>Tentang</td>
						<td>:</td>
						<td>'.$val['deskripsi'].'</td>
					</tr>
					<tr>
						<td>Ketegori</td>
						<td>:</td>
						<td>';
								if($kategori_side){	
										foreach($kategori_side as $keykat=>$valkat){
											if($valkat['id']==$val['articletype']){
												echo $valkat['value'];
											}
										}
									}
								
							echo"</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>$download_file</td>
					</tr>
				</table>";
							
							
			}
			
			}
				
	}
	?>
	<?php
	if(isset($program)){
		echo'<br/>
				<h4><i>'.$title.'</i></h4>
				<hr>
				<div class="panel panel-default">
				  <div class="panel-body">
					<ul>
						<li><a href="'.$basedomain.'program/strategis">Penyusunan Rencana Strategis WP3K</a></li>
						<li><a href="'.$basedomain.'program/zonasi">Penyusunan Rencana Zonasi WP3K</a></li>
						<li><a href="'.$basedomain.'program/pengelolaan">Penyusunan Rencana Pengelolaan WP3K</a></li>
						<li><a href="'.$basedomain.'program/aksi">Penyusunan Rencana Aksi WP3K</a></li>
						<li><a href="'.$basedomain.'program/lainLain">Lain-lain</a></li>
					</ul>
				  </div>
				</div>
					';
					
	
	}
	?>
	