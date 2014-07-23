
<div class="span2">
				<div class="navbar">
					<div class="navbar-inner menu_head">
						<ul class="nav">
							<li class="menu_label" >Informasi TRLP3K</li>
						</ul>
					</div>
					<div class="navbar-inner">
						<ul class="nav">
							<li ><a href="<?=$basedomain?>berita">Informasi</a></li>
						</ul>
					</div>
					<div class="navbar-inner">
						<ul class="nav">
							<li ><a href="<?=$basedomain?>profil">Profile</a></li>
						</ul>
					</div>
					<div class="navbar-inner menu_head">
						<ul class="nav">
							<li ><a href="<?=$basedomain?>peraturan">Peraturan</a></li>
						</ul>
					</div>
					<div class="navbar-inner menu_head">
						<ul class="nav">
							<li class="menu_label" >Produk & Program</li>
						</ul>
					</div>
					<div class="navbar-inner">
						<ul class="nav ">
							<li class="dropdown">
								  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
								 Produk &raquo;</a>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
										<li><a href="<?=$basedomain?>produk/perencanaan" >Dokumen Perencanaan WP3K</a></li>
										<li><a href="<?=$basedomain?>produk/norma">Norma, Standart, Prosedur dan Kriteria</a></li>
								  </ul>					
							</li>
						</ul>
					</div>
					<div class="navbar-inner">
						<ul class="nav">

							<li ><a href="<?=$basedomain?>program/program_view">Program</a></li>

						</ul>
					</div>
					<div class="navbar-inner">
						<ul class="nav">
							<li ><a href="<?=$basedomain?>onemap">Onemap</a></li>
						</ul>
					</div>
					<div class="navbar-inner">
						<ul class="nav ">
							<li class="dropdown">
								  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
								  SIG Pengelolaan Pesisir<br/>dan Pulau - Pulau Kecil &raquo;</a>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
										<li><a href="<?=$basedomain?>sig/pola" >Peta Pola Ruang</a></li>
										<li><a href="<?=$basedomain?>sig/struktur">Peta Strukutur Ruang</a></li>
								  </ul>					
							</li>
						</ul>
					</div>
					
					<div class="navbar-inner menu_head">
						<ul class="nav">
							<li ><a href="<?=$basedomain?>slideshow/slide_view">Slide Show</a></li>
						</ul>
					</div>
					
					<div class="navbar-inner menu_head">
						<ul class="nav">
							<li ><a href="<?=$basedomain?>rss/rss_view">RSS</a></li>
						</ul>
					</div>
					<?php
					if($_SESSION['user']['usertype'] == '1') {
					?>
					<div class="navbar-inner menu_head">
						<ul class="nav">
							<li ><a href="<?=$basedomain?>user">User</a></li>
						</ul>
					</div><?php
					}
					?>
					<div class="navbar-inner menu_head">
						<ul class="nav">
							<li ><a href="<?=$basedomain?>tabelKemajuan">Tabel Progres Perda</a></li>
						</ul>
					</div>
					<div class="navbar-inner menu_head">
						<ul class="nav">
							<li ><a href="<?=$basedomain?>kotaksaran">Kotak Saran</a></li>
						</ul>
					</div>
				</div>
			</div>