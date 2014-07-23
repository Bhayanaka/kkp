<script>
$(function(){
		$("#postdate").datetimepicker({
		dateFormat:'yy-mm-dd',
		timeFormat:'HH:mm:ss',
		stepSecond:10});
	});
</script>
<?php
date_default_timezone_set('Asia/Jakarta');
// pr($data);
?>			
				<h4 class="title_sub_menu_in">Tambah Peraturan</h4>
				<div class="new_input">
					<form method="post" action="<?=$basedomain?>peraturan/inputData"  enctype="multipart/form-data">
					<table>
						<tr><input type="hidden" name="id" Value="<?=(isset($data['edit'][0]['id']) ? $data['edit'][0]['id'] : '');?>"/>
							<td>Judul Peraturan</td>
							<td>&nbsp;</td>
							<td><input type="text" name="title" required ="required" Value="<?=(isset($data['edit'][0]['title']) ? $data['edit'][0]['title'] : '');?>"/></td>
						</tr>
						<tr>
							<td>Pilih Kategori</td>
							<td>&nbsp;</td>
							<td>
								<select name="articletype" required>
								<option value="" >Pilih Kategori</option>
									<?php
										if($kategori){	
											$i=1;
											if(isset($data['edit'][0]['articletype'])){
												foreach($kategori as $key=>$val){
													if($data['edit'][0]['articletype']==$val['id']){
														$selected="selected";
													}else{
														$selected="";
													}
													echo'<option value="'.$val['id'].'" '.$selected.'>'.$val['value'].'</option>';
												}
											}else{
												foreach($kategori as $key=>$val){
													echo'<option value="'.$val['id'].'">'.$val['value'].'</option>';
												}
											}
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Tanggal dibuat</td>
							<td>&nbsp;</td>
							<td><input type="text" name="postdate" id="postdate" value="<?=(isset($data['edit'][0]['postdate']) ? $data['edit'][0]['postdate'] : '');?>"/></td>
						</tr>
						<?php
						
						if(isset($data['edit'][0]['tags']) != '' && $data['edit'][0]['tags'] != ''){
								$patch = explode("/",$data['edit'][0]['files']);
								$directory= $patch[0];
								$file = $patch[1];
								$download_file ="<a class=\"btn btn-success\"  href=\"{$app_domain}public_assets/{$directory}/{$file}\">{$data['edit'][0]['tags']}<i class=\"icon-arrow-down icon-white\"></i> </a>";
						}	
						?>
						<tr>
							<td>Upload File</td>
							<td>&nbsp;</td>
							<td>
								<input type="file" name="image" id="files"/>
								<input type="hidden" name="image_hidden" value="<?=(isset($data['edit'][0]['files']) ? $data['edit'][0]['files'] : '');?>"/>
								<input type="hidden" name="tags_hidden" value="<?=(isset($data['edit'][0]['tags']) ? $data['edit'][0]['tags'] : '');?>"/>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><output id="list"></output></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><output id="list"><?=$download_file?></output></td>
						</tr>
					
					</table>
					<p><b>Isi Peraturan :</b></p>
					<!--better diganti Editor text-->
					<textarea style="width:100%;height:200px;" name="deskripsi" class="ckeditor"><?=(isset($data['edit'][0]['deskripsi']) ? $data['edit'][0]['deskripsi'] : '');?>
					</textarea>
					<input type="hidden" name="createdate" id="postdate"  value="<?=(isset($data['edit'][0]['createdate']) ? $data['edit'][0]['createdate'] : date('Y-m-d H:i:s'))?>"/>
					<input type="hidden" name="fromwho" id="fromwho"  value="<?=(isset($data['edit'][0]['fromwho']) ? $data['edit'][0]['fromwho'] : $_SESSION['user']['usertype'])?>"/>
					<input type="hidden" name="authorid" id="authorid"  value="<?=(isset($data['edit'][0]['authorid']) ? $data['edit'][0]['authorid'] : $_SESSION['user']['id'])?>"/>
			
					<input type="submit" class="btn btn-primary" value="Simpan"/>
					<a href="#" onclick="javascript:window.history.back(-1);return false;"><input type="button" class="btn btn-primary" value="Kembali"/></a>
					</form>
				</div>
<script>
	function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
      output.push('<li><strong>', escape(f.name), '</strong>  - ',
                  f.size, ' bytes','',
                  '</li>');
    }
    document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
	
</script>
				
			