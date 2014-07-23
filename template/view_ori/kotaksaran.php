<?php defined ('TATARUANG') or exit ( 'Forbidden Access' ); 

	global $basedomain;			
	sub_top_menu('bg_merah');
	
	$title_page=array('Kontak');
	$link_title_page=array('#');
	box_legend('box_legend_2',$title_page,$link_title_page);//<!--LEGEND 2 BIAR AGAK NAIK-->
?>
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">
				  <div class="span8">
					
					<h3>Kotak Saran</h3>
					<p>
					    <ul>
							<li>Kirimkan saran, kritik dan pertanyaan Anda pada Rubrik Kritik dan saran.</li>
							<li>Saran, pesan dan pertanyaan Anda akan kami filter terlebih dahulu, sebelum di muat
							     dalam rubrik Kritik dan saran ini. Kami mohon maaf jika saran, pesan dan pertanyaan Anda 
								 tidak kami muat di rubrik ini. 
							</li>
						</ul>
					</p>
					
					<form method="POST" action="<?=$basedomain?>kotaksaran/changeData">
					
					<table style="font-size:12px;vertical-align:top;margin-left:50px;" cellspacing="10px;">
						<tr>
							<td width="100px;">Nama</td>
							<td><input type="text" name="nama" required="required"></td>
						</tr>
						<tr>
							<td>E - mail</td>
							<td><input type="text" name="email" required="required"></td>
						</tr>
						<tr>
							<td>Pesan</td>
							<td><textarea name="pesan" required="required"></textarea></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<?php
									//require_once('recaptcha/recaptchalib.php');
									require_once('engine/recaptchalib.php');
								//  $publickey = "your_public_key"; // you got this from the signup page
									$publickey = "6LeTiPASAAAAAFY09-K67Do3LC2AEnjkyFFdxiKO ";
									echo recaptcha_get_html($publickey, $error);
								?>
							</td>	
								<!--<script type="text/javascript" 
								src="http://www.google.com/recaptcha/api/challenge?k=6LeOueYSAAAAAHgyAob9xb40OYNPStHv_bIz-rfR "></script>-->

							<!--<noscript>
								<iframe src="http://www.google.com/recaptcha/api/noscript?k=6LeOueYSAAAAAHgyAob9xb40OYNPStHv_bIz-rfR " height="300" width="500" frameborder="0"></iframe><br/>
								<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
								<input type="hidden" name="recaptcha_response_field" value="manual_challenge"/>
							</noscript>-->						
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td align="right"><br/>
								<input type="submit" class="btn btn-info" value="Kirim">
								<input type="reset" class="btn" value="Kosongkan">
							</td>
						</tr>
					</table>
					</form>
					
					<br/>
					<br/>
					<!-- Datatables -->
					<!--<style type="text/css" title="currentStyle">
						@import "<?=$basedomain?>admin/css/demo_table.css";
					</style>
					<script type="text/javascript" language="javascript" src="<?=$basedomain?>admin/js/jquery.dataTables.min.js"></script>
					<script type="text/javascript" charset="utf-8">
						$(document).ready(function() {
							$('#tableajax2').dataTable({
								 "aoColumnDefs": [
									{ "sType": "numeric", "aTargets": [ 0 ] },
									{ "bSearchable": false, "aTargets": [ 1 ] }
									
								]
							});
						} );
					</script>-->
					<!-- End Datatables -->
					
				<!--<table class="table table-striped" id="tableajax2">
				  <thead>	
					<tr  style="background:#cc0000;color:white"> 
  						<th width="3%" >No.</th>
  						<th width="20%">Nama</th>
  						<th width="17%">Email</th>
  						<th width="45%">Pesan</th>
  						<th width="10%">Dibuat</th>
  					</tr>
  				</thead>
				<tbody>
            	
  					<tr>
  						<td align="center">1.</td>
  						<td align="center">Herlin</td>
  						<td align="center">herlin_setya@yahoo.com</td>
  						<td align="justify">Pak saya dari disdukcapil Tanjungbalai,tolong diberikan kode wilayah Kabupaten Polewali Mandar sampai Tingkat Kelurahan... atau ada link yg bisa di akses ..??, Penting</td>
  						<td align="center">Tidak Diketahui</td>
  					</tr>
					<tr>
  						<td align="center">2.</td>
  						<td align="center">saHerlin</td>
  						<td align="center">sherlin_setya@yahoo.com</td>
  						<td align="justify">Pak saya dari disdukcapil Tanjungbalai,tolong diberikan kode wilayah Kabupaten Polewali Mandar sampai Tingkat Kelurahan... atau ada link yg bisa di akses ..??, Penting</td>
  						<td align="center">Tidak Diketahui</td>
  					</tr>
				</tbody>
				<tfoot>
					<td colspan="5"></td>
				<tfoot>
				</table>-->

				  </div>
				<div class="span4 bg_rss">
						<h4><font color="white">RSS</h4>
						<table cellpadding="5" width="100%">
							<?php
								// pr($rss);
								if($rss){
								foreach($rss as $key=>$values){
								?>
							<tr>
								<td width="60px">
									<a href="<?="https://".$values['brief']?>" class="thumbnail">
									  <img data-src="holder.js/300x200" src="<?=$basedomain?>public_assets/<?=$values['image']?>" style="width:50px" alt="">
									</a>
								</td>
								<td>
									<a href="<?="https://".$values['brief']?>"><b><?=$values['title']?></b></a>
								</td>
							</tr>
							<?php
								}
							}
							?>
						</table>
							
					</div>	  
				<!--<div class="span4 bg_birumuda">
					<h4>Produk</h4>
					<a class="menu m4_on m_right" href="#"><div>Dokumen Perencanaan WP-3-K</div></a>
					<a class="menu m4 m_right" href="<?=$basedomain?>dok_perencanaan/typewp3k/?type=1"><div>Rencana Strategis  WP-3-K</div></a>
					<a class="menu m4 m_right" href="<?=$basedomain?>dok_perencanaan/typewp3k/?type=2"><div>Rencana Zonasi  WP-3-K</div></a>
					<a class="menu m4 m_right" href="<?=$basedomain?>dok_perencanaan/typewp3k/?type=3"><div>Recana Pengelolaaan  WP-3-K</div></a>
					<a class="menu m4 m_right" href="<?=$basedomain?>dok_perencanaan/typewp3k/?type=4"><div>Recana Aksi  WP-3-K</div></a>
					
					<div class="laper2"></div>
					<a class="menu m4_on m_right" href="#"><div>Norma, Standart, Prosedur dan Kriteria</div></a>
					<a class="menu m4 m_right" href="<?=$basedomain?>norma_std_psdr_kriteria_c/pedoman_umum"><div>Pedoman Umum</div></a>	
					<a class="menu m4 m_right" href="<?=$basedomain?>norma_std_psdr_kriteria_c/pedoman_teknis"><div>Pedoman Teknis</div></a>	
					<a class="menu m4 m_right" href="<?=$basedomain?>norma_std_psdr_kriteria_c/modul_pelatihan"><div>Modul Pelatihan</div></a>					
					<h4>&nbsp;</h4>
					<h4>Program</h4>
					<a class="menu m4_on m_right" href="#"><div>Jenis Program WP-3-K</div></a>
					<a class="menu m4 m_right" href="<?=$basedomain?>program/strategis"><div>Penyusunan Rencana Strategis</div></a>
					<a class="menu m4 m_right" href="<?=$basedomain?>program/zonasi"><div>Penyusunan Rencana Zonasi</div></a>
					<a class="menu m4 m_right" href="<?=$basedomain?>program/pengelolaan"><div>Penyusunan Rencana Pengelolaan</div></a>
					<a class="menu m4 m_right" href="<?=$basedomain?>program/aksi"><div>Penyusunan Rencana Aksi</div></a>
					<a class="menu m4 m_right" href="<?=$basedomain?>program/lainLain"><div>Lain-lain</div></a>
				</div>-->								
			

				
				</div>
				
			</div>
			<div class="span1"></div>
		</div>