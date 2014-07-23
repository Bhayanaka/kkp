	<script>
	$(function(){
		$("#postdate").datetimepicker({
		dateFormat:'yy-mm-dd',
		timeFormat:'HH:mm:ss',
		stepSecond:10});

		});
		</script>
				<?php echo $menu;
				//pr($data);
				
				?>
				<h4 class="title_sub_menu_in">Tambah Berita</h4>
				<div class="new_input">
					<form method="post"  action="<?=$basedomain?>berita/add_aksi" enctype = "multipart/form-data">
					<table border=0>
						<tr>
						
							<td>Judul Berita</td>
							<td>&nbsp;<input type="hidden" name="id" value = "<?=(isset($data[0]['id'])?$data[0]['id'] : '');?>"/></td>
							<td><input type="text" name="title" required="required" value = "<?=(isset($data[0]['title'])?$data[0]['title'] : '');?>"/></td>
						</tr>
						
						<tr>
							<td>Tanggal Publish</td>
							<td>&nbsp;</td>
							<td><input type="text" id="postdate" name="postdate" value = "<?=(isset($data[0]['postdate'])?$data[0]['postdate'] : '');?>" /></td>
						</tr>
						<tr>
							<td>Upload Dokumen</td>
							<td>&nbsp;</td>
							<td><input type="file" name="image" id="imgInpPlay"/></td>
								<input type="hidden" name="image_hidden" value = "<?=(isset($data[0]['image'])?$data[0]['image'] : '');?>"/>
						</tr>
						<?php
						if(isset($data)){
							$directory = explode("/",$data[0]['image']);
						}else{
							$directory = '';
						}
						if((isset($data[0]['image'])) != '' && ($data[0]['image']) != ''){
							$default_image = 'public_assets/'.$directory[0].'/'.$directory[1];
							$prev_image = $app_domain.$default_image;
						}else{
							$default_image = 'images/no-images.gif';
							$prev_image = $basedomain.$default_image;
						}
						?>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><img src="<?=$prev_image?>" style="height:160px; margin-bottom:10px;" class="img-polaroid" id="previewplay"/></td>
						</tr>
						<tr>
							<td>Brief Berita</td>
							<td>&nbsp;</td>
							<td><textarea style="width:100%;height:200px;" id="brief_berita" name = "brief" class="ckeditor"> <?=(isset($data[0]['brief'])?$data[0]['brief'] : '');?> 
								</textarea></td>
						</tr>
						<tr>
							<td>Isi Berita</td>
							<td>&nbsp;</td>
							<td><textarea style="width:100%;height:200px;" id="isi_berita" name = "content" class="ckeditor"> <?=(isset($data[0]['content'])?$data[0]['content'] : '');?> 
								</textarea></td>
						</tr>
						<!-- input type hidden-->
						<input type="hidden" name="n_status" value = "<?=(isset($data[0]['n_status'])?$data[0]['n_status'] : '0');?>"/>
						
	
					</table>
					
					<!--better diganti Editor text-->
					
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
				</script>
				
			