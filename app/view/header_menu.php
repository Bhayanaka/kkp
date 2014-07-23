					<?php
					
					if($pages=="beranda"){
						$activeBeranda="class=\"active\"";
					}else{
						$activeBeranda="";
					}
					if($pages=="berita" || $pages=="informasi_terkini" || $pages=="profil"){
						$activeInformasi="class=\"active\"";
					}else{
						$activeInformasi="";
					}
					if($pages=="peraturan"){
						$activePeraturan="class=\"active\"";
					}else{
						$activePeraturan="";
					}
					if($pages=="dok_perencanaan" || $pages=="norma_std_psdr_kriteria_c" || $pages=="program" || $pages=="one_map" || $pages=="minapolitan"){
						$activeProduk="class=\"active\"";
					}else{
						$activeProduk="";
					}
					if($pages=="kontak"){
						$activeKontak="class=\"active\"";
					}else{
						$activeKontak="";
					}
					if($pages=="kotaksaran"){
						$activeKotaksaran="class=\"active\"";
					}else{
						$activeKotaksaran="";
					}
					if($pages=="register"){
						$activeRegister="class=\"active\"";
					}else{
						$activeRegister="";
					}
					?>
					<div class="header">
						<a href="index.php"><img src="<?=$basedomain?>assets/img/header.jpg" width="100%"></a>
					</div>
					<div class="navbar navbar-inverse" style="margin-bottom:0">
					  <div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						</button>
					  </div>
					  <div class="navbar-collapse collapse navbar-inverse-collapse">
						<ul class="nav navbar-nav">
							<li <?=$activeBeranda?>><a href="<?=$basedomain?>beranda">BERANDA</a></li>
							<li <?=$activeInformasi?>>
								<a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">INFORMASI TRLP3K <span class="caret"></a>
								<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
									<li class="dropdown-submenu">
											<a tabindex="-1" href="#">Berita</a>
											<ul class="dropdown-menu">
											<li><a href="<?=$basedomain?>berita/info_berita">Berita</a></li>
											<li><a href="<?=$basedomain?>berita/info_opini">Opini</a></li>
											<li><a href="<?=$basedomain?>informasi_terkini/informasi_gallery">Galeri Foto</a></li>
											<li><a href="<?=$basedomain?>informasi_terkini/informasi_video">Galeri Video</a></li>
											</ul>
									 </li>
									<li class="dropdown-submenu">
											<a tabindex="-1" href="#">Profil</a>
											<ul class="dropdown-menu">
											<li><a href="<?=$basedomain?>profil/struktur_organisasi">Struktur Organisasi</a></li>
											<li><a href="<?=$basedomain?>profil/sejarah">Sejarah</a></li>
											<li><a href="<?=$basedomain?>profil/tupoksi">Tupoksi</a></li>
											</ul>
									 </li>
									 <li><a href="<?=$basedomain?>berita/info_agenda">Agenda</a></li>
								</ul>
							</li>
							<li <?=$activePeraturan?>>
								<a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">PERATURAN <span class="caret"></a>
									<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
											<li><a href="<?=$basedomain?>peraturan/undangundang">Undang-undang</a></li>
											<li><a href="<?=$basedomain?>peraturan/pemerintah">Peraturan Pemerintah</a></li>
											<li><a href="<?=$basedomain?>peraturan/presiden">Peraturan Presiden</a></li>
											<li><a href="<?=$basedomain?>peraturan/keppres">Keputusan Presiden</a></li>
											<li><a href="<?=$basedomain?>peraturan/inspres">Instruksi Presiden</a></li>
											<li><a href="<?=$basedomain?>peraturan/menteri">Peraturan Menteri</a></li>
											<li><a href="<?=$basedomain?>peraturan/kepment">Keputusan Menteri</a></li>
											<li><a href="<?=$basedomain?>peraturan/perkep_dirjen">Peraturan / Keputusan Direktur Jenderal</a></li>
											<li><a href="<?=$basedomain?>peraturan/sni">Standar Nasional Indonesia / SNI</a></li>
										  
										</ul>
							</li>
							<li <?=$activeProduk?>>
								<a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
											Produk dan Program <span class="caret"></span>
										</a>
										<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
										  `<li class="dropdown-submenu"><a href="#">Produk</a>
											<ul class="dropdown-menu">
											  <li class="dropdown-submenu">
												<a href="#">Dokumen Perencanaan WP-3-K</a>
												<ul class="dropdown-menu">
													<li><a tabindex="-1" href="<?=$basedomain?>dok_perencanaan/typewp3k/?type=1">Rencana Strategis  WP-3-K</a></li>
													<li><a tabindex="-1" href="<?=$basedomain?>dok_perencanaan/typewp3k/?type=2">Rencana Zonasi  WP-3-K</a></li>
													<li><a tabindex="-1" href="<?=$basedomain?>dok_perencanaan/typewp3k/?type=3">Recana Pengelolaaan  WP-3-K</a></li>
													<li><a tabindex="-1" href="<?=$basedomain?>dok_perencanaan/typewp3k/?type=4">Recana Aksi  WP-3-K</a></li>
												</ul>
											  </li>
											   <li class="dropdown-submenu">
												<a href="#">Norma, Standart, Prosedur dan Kriteria</a>
												<ul class="dropdown-menu">
													<li><a href="<?=$basedomain?>norma_std_psdr_kriteria_c/pedoman_umum">Pedoman Umum</a></li>
													<li><a href="<?=$basedomain?>norma_std_psdr_kriteria_c/pedoman_teknis">Pedoman Teknis</a></li>
													<li><a href="<?=$basedomain?>norma_std_psdr_kriteria_c/modul_pelatihan">Modul Pelatihan</a></li>
													<li><a href="<?=$basedomain?>norma_std_psdr_kriteria_c/prosedur_kriteria">Prosedur dan Kriteria</a></li>
												</ul>
											  </li>
											</ul>
										  </li>
										   <li class="dropdown-submenu"><a href="#">Program</a>
											<ul class="dropdown-menu">
											  <li><a href="<?=$basedomain?>program/strategis">Penyusunan Rencana <br/>Strategis WP-3-K</a></li>
												<li><a href="<?=$basedomain?>program/zonasi">Penyusunan Rencana <br/>Zonasi  WP-3-K</a></li>
												<li><a href="<?=$basedomain?>program/pengelolaan">Penyusunan Rencana <br/>Pengelolaan  WP-3-K</a></li>
												<li><a href="<?=$basedomain?>program/aksi">Penyusunan Rencana <br/>Aksi  WP-3-K</a></li>
												<li><a href="<?=$basedomain?>program/lainLain">Lain-lain</a></li>
											</ul>
										   </li>
										   <li class="dropdown-submenu"><a href="#">Aplikasi</a>
											<ul class="dropdown-menu">
											  <li><a href="<?=$basedomain?>one_map/sejarah">One Map Sumberdaya Pesisir <br/>dan Laut Nasional</a></li>
												<li><a href="#">SIG Minapolitan</a></li>
												<li><a href="<?=$basedomain?>minapolitan/polaruangnasional">SIG Pengelolaan Pesisir <br/>dan Pulau - Pulau Kecil</a></li>
											</ul>
										   </li>
										 
										</ul>
							</li>

							<li <?=$activeKontak?>><a href="<?=$basedomain?>kontak">KONTAK</a></li>
							<li <?=$activeKotaksaran?>><a href="<?=$basedomain?>kotaksaran">KOTAK SARAN</a></li>
							<li <?=$activeRegister?>><a href="<?=$basedomain?>register">LOGIN</a></li>
						</ul>
						
						<ul class="nav navbar-nav navbar-right">
							<form class="navbar-form navbar-left" id="1312211968" style="width:100%">
							  <input type="text" class="form-control col-lg-8"  style="margin-left:15px;" placeholder="Pencarian">
							</form>
						</ul>
					  </div>
					 
					</div>