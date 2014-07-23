
	<script>
	$(function(){
		$("#tglfoto").datetimepicker({
		dateFormat:'yy-mm-dd',
		timeFormat:'HH:mm:ss',
		stepSecond:10});

		});
			
		</script>
				<div class="laper3"></div>
				<a href="<?=$basedomain?>berita" class="sub_menu_in">Berita</a>
				<a href="<?=$basedomain?>agenda" class="sub_menu_in">Agenda</a>
				<a href="<?=$basedomain?>opini" class="sub_menu_in">Opini</a>
				<a href="<?=$basedomain?>gallery/informasi_gallery_foto_list" class="sub_menu_in on">Gallery Foto</a>
				<a href="<?=$basedomain?>gallery/informasi_gallery_video_list" class="sub_menu_in">Gallery Video</a>
				<a href="<?=$basedomain?>kontak" class="sub_menu_in">Kontak</a>
				<br/>
				<br/>
				
				<?php //echo $basedomain?>
				<h4 class="title_sub_menu_in">Tambah Gallery Foto</h4>
				<div class="new_input">
					<form method="POST" action="<?=$basedomain?>gallery/informasi_gallery_foto_submit" enctype="multipart/form-data">
					<table>
						<tr>
							<td>Judul Gallery Foto</td>
							<td>&nbsp;</td>
							<td><input type="text" name="judul_gallery" required /></td>
						</tr>
						<tr>
							<td>Tanggal dibuat</td>
							<td>&nbsp;</td>
							<td><input type="text" name="tglfoto" id="tglfoto" required /></td>
						</tr>
						<tr>
							<td>Pilih Cover Album</td>
							<td>&nbsp;</td>
							<td><img src="<?=$basedomain?>images/no-images.gif" style="height:150px; margin-bottom:10px;" class="img-polaroid" id="previewplay"/><?=maxupload()?><br/>
							
						
						</tr>
						<tr>
							<td></td>
							<td>&nbsp;</td>
							<td><input type="file" name="image" id="imgInpPlay" required= "required"/><?=maxupload()?></td>
						</tr>
					</table>
					<p><b>Isi Album :</b></p>
					<table class="form-inline">
						<tr>
							<td><center>1.</center></td> 
							<td><img src="<?=$basedomain?>images/no-images.gif" style="height:150px;margin-bottom:10px;" class="img-polaroid" id="previewplay1"/></td>
							<td><input type="file" name="image2" id="imgInpPlay1"required/></td>
							<td>Keterangan : <input type="text" name="keterangan1" /><?=maxupload()?></td>
						</tr>
						<tr>
							<td><center>2.</center></td> 
							<td><img src="<?=$basedomain?>images/no-images.gif" style="height:150px;margin-bottom:10px;" class="img-polaroid" id="previewplay2"/></td>
							<td><input type="file" name="image3" id="imgInpPlay2"/></td>
							<td>Keterangan : <input type="text" name="keterangan2" /><?=maxupload()?></td>
						</tr>
							<td><center>3.</center></td> 
							<td><img src="<?=$basedomain?>images/no-images.gif" style="height:150px;margin-bottom:10px;" class="img-polaroid" id="previewplay3"/></td>
							<td><input type="file" name="image4" id="imgInpPlay3"/></td>
							<td>Keterangan : <input type="text" name="keterangan3" /><?=maxupload()?></td>
						</tr>
					</table>
					<input type="submit" class="btn btn-primary" value="Simpan"/>
					<a href="#" onclick="javascript:window.history.back(-1);return false;"><input type="button" class="btn btn-primary" value="Kembali"/></a>
					</form>
				</div>
				<script>
					function readURLplay(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();
							reader.onload = function (e) {
								$('#previewplay').attr('src', e.target.result);
								$('#previewplay').attr('width', '200px');
								$('#previewplay').attr('height', '200px');
								
							}
							 reader.readAsDataURL(input.files[0]);
						}
					}
					$("#imgInpPlay").change(function(){
						readURLplay(this);
						});
					function readURLplay1(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();
							reader.onload = function (e) {
							
								$('#previewplay1').attr('src', e.target.result);
								$('#previewplay1').attr('width', '200px');
								$('#previewplay1').attr('height', '200px');
							}
							 reader.readAsDataURL(input.files[0]);
						}
					}
					$("#imgInpPlay1").change(function(){
					readURLplay1(this);
					});
					function readURLplay2(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();
							reader.onload = function (e) {
							
								$('#previewplay2').attr('src', e.target.result);
								$('#previewplay2').attr('width', '200px');
								$('#previewplay2').attr('height', '200px');
							}
							 reader.readAsDataURL(input.files[0]);
						}
					}
					$("#imgInpPlay2").change(function(){
					readURLplay2(this);
					});
					function readURLplay3(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();
							reader.onload = function (e) {
							
								$('#previewplay3').attr('src', e.target.result);
								$('#previewplay3').attr('width', '200px');
								$('#previewplay3').attr('height', '200px');
							}
							 reader.readAsDataURL(input.files[0]);
						}
					}
					$("#imgInpPlay3").change(function(){
					readURLplay3(this);
					});
				</script>
				
			