	<script>
	$(function(){
		$("#postdate").datetimepicker({
		dateFormat:'yy-mm-dd',
		timeFormat:'HH:mm:ss',
		stepSecond:10});

		});
		</script>
				<h4 class="title_sub_menu_in">Tambah Database Tematik</h4>
				<div class="new_input">
					<form method="post" action="<?=$basedomain?>onemap/inputDatadbtematik" enctype="multipart/form-data">
					<table>
						<tr>
							<td>Judul</td>
							<td>&nbsp;</td>
							<td><input type="text" name="title"  value="<?=(isset($data['result'][0]['title']) ? $data['result'][0]['title'] : '')?>" required="required"></td>
						</tr>
						<tr>
							<td>Tanggal dibuat</td>
							<td>&nbsp;</td>
							<td><input type="text" name="postdate" id="postdate" value="<?=(isset($data['result'][0]['postdate']) ? $data['result'][0]['postdate'] : '')?>"/></td>
						</tr>
						<tr>
							<td>Upload Gambar</td>
							<td>&nbsp;</td>
							<td><input type="file" name="files" id="imgInpPlay"/>
								<input type="hidden" name="files_hidden" value="<?=(isset($data['result'][0]['image']) ? $data['result'][0]['image'] : '')?>"/>
							</td>
						</tr>
						<?php 
						if(isset($data['result'][0]['image']) && $data['result'][0]['image']  != ''){
							$directory_cover = explode("/",$data['result'][0]['image']);
							$default_image_cover = 'public_assets/'.$directory_cover[0].'/'.$directory_cover[1];
							$prev_image_cover = $app_domain.$default_image_cover;
							$prev = "<img src=\"{$prev_image_cover}\" style=\"height:160px;margin-bottom:10px;\" class=\"img-polaroid\" id=\"previewplay\">";
							
						}else{

							$default_image_cover = 'images/no-images.gif';
							$prev_image_cover = $basedomain.$default_image_cover;
							$prev = "<img src=\"{$prev_image_cover}\" style=\"height:160px;margin-bottom:10px;\" class=\"img-polaroid\" id=\"previewplay\">";
							
						}
						?>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><?php echo $prev?></td>
						</tr>	
						<tr>
							<td>Brief</td>
							<td>&nbsp;</td>
							<td><textarea style="width:100%;height:200px;" id="brief_berita" name = "brief" class="ckeditor"> <?=(isset($data['result'][0]['brief'])?$data['result'][0]['brief'] : '');?> 
								</textarea></td>
						</tr>	
					</table>
					<br/>
					<!-- input hidden-->
					<input type="hidden" name="id" id="id"  value="<?=(isset($data['result'][0]['id']) ? $data['result'][0]['id'] : '')?>"/>
					<input type="hidden" name="createdate" id="createdate"  value="<?=(isset($data['result'][0]['createdate']) ? $data['result'][0]['createdate'] : date('Y-m-d H:i:s'))?>"/>
					<input type="hidden" name="fromwho" id="fromwho"  value="<?=(isset($data['result'][0]['fromwho']) ? $data['result'][0]['fromwho'] : $_SESSION['user']['usertype'])?>"/>
					<input type="hidden" name="authorid" id="authorid"  value="<?=(isset($data['result'][0]['authorid']) ? $data['result'][0]['authorid'] : $_SESSION['user']['id'])?>"/>
					<input type="hidden" name="n_status" id="n_status"  value="<?=(isset($data['result'][0]['n_status']) ? $data['result'][0]['n_status'] : '0')?>"/>
					
					<input type="submit" class="btn btn-primary" value="Simpan"/>
					<a href="#" onclick="javascript:window.history.back(-1);return false;"><input type="button" class="btn btn-primary" value="Kembali"/></a>
					</form>
				</div>
				<script>
				  $("#imgInpPlay").change(function(){
					readURLplay(this);
					 
					
				});
	
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
				</script>			
				
			