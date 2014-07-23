<script>
$(function(){
		$("#postdate").datetimepicker({
		dateFormat:'yy-mm-dd',
		timeFormat:'HH:mm:ss',
		stepSecond:10});
	});
</script>
<h4 class="title_sub_menu_in">Program</h4>
<div class="new_input">
	<form action="<?=$basedomain.'produk/insertProgram/'?>" method="post" enctype="multipart/form-data">
	<input type="hidden" value="<?=(isset($editProgram[0]['id']) ? $editProgram[0]['id'] : '')?>" name="hidden_id" readonly id="hidden_id"  />	
	<table >
		<tr>
			<td>Judul</td>
			<td>&nbsp;</td>
			<td><input type="text" name="judul" required value="<?=(isset($editProgram[0]['title']) ? $editProgram[0]['title'] : '')?>"/></td>
			<td>&nbsp;</td>
			<td>Tanggal Upload</td>
			<td>&nbsp;</td>
			<td><input type="text" name="tgl_upload" required id="postdate" value="<?=(isset($editProgram[0]['postdate']) ? $editProgram[0]['postdate'] : '')?>"/></td>
			<td>&nbsp;</td>
			<td>Tahun Pembuatan</td>
			<td>&nbsp;</td>
			<td><input type="text" name="thn_buat" required value="<?=(isset($editProgram[0]['tahun']) ? $editProgram[0]['tahun'] : '')?>"/></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>
				&nbsp;
			</td>
			<td>&nbsp;</td>
			<td>Lampiran</td>
			<td>&nbsp;</td>
			<td><input type="text" name="lampiran" required value="<?=(isset($editProgram[0]['lampiran']) ? $editProgram[0]['lampiran'] : '')?>"/>
				
			</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>
				&nbsp;
			</td>
		</tr>
		<tr>
			<td>Tipe Artikel</td>
			<td>&nbsp;</td>
			<td>
			<select name="artikel" id="artikel" required>
				<option id="0" value="0" <?=(isset($editProgram[0]['articletype']) ? (0 == $editProgram[0]['articletype'] ? 'selected' : '') : '' );?>>- Pilih Artikel -</option>
				<option id="1" value="1" <?=(isset($editProgram[0]['articletype']) ? (1 == $editProgram[0]['articletype'] ? 'selected' : '') : '' );?>>Penyusunan Rencana Strategis WP-3-K</option>
				<option id="2" value="2" <?=(isset($editProgram[0]['articletype']) ? (2 == $editProgram[0]['articletype'] ? 'selected' : '') : '' );?>>Penyusunan Rencana Zonasi WP-3-K</option>
				<option id="3" value="3" <?=(isset($editProgram[0]['articletype']) ? (3 == $editProgram[0]['articletype'] ? 'selected' : '') : '' );?>>Penyusunan Rencana Pengelolaan WP-3-K</option>	
				<option id="4" value="4" <?=(isset($editProgram[0]['articletype']) ? (2 == $editProgram[0]['articletype'] ? 'selected' : '') : '' );?>>Penyusunan Rencana Aksi WP-3-K</option>
				<option id="5" value="5" <?=(isset($editProgram[0]['articletype']) ? (3 == $editProgram[0]['articletype'] ? 'selected' : '') : '' );?>>Lain-Lain</option>							
			</select>
			</td>
			<td>&nbsp;</td>
			<td>Jumlah Halaman</td>
			<td>&nbsp;</td>
			<td><input type="text" name="jml_hal" required value="<?=(isset($editProgram[0]['jml_hal']) ? $editProgram[0]['jml_hal'] : '')?>"/></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>				
				&nbsp;
			</td>
		</tr>
		<tr>
			<td>Upload Cover Dokumen</td>
			<td>&nbsp;</td>
			<td><input type="file" name="cover" id="imgInpPlay" required/></td>
			<input type="hidden" name="cover_hidden" id="cover_hidden"  value="<?=(isset($editProgram[0]['image']) ? $editProgram[0]['image'] : '')?>"/>
			<td>&nbsp;</td>
			<td>Upload Dokumen</td>
			<td>&nbsp;</td>
			<td><input type="file" name="upload_file" required/></td>
			<input type="hidden" name="file_hidden" id="file_hidden"  value="<?php echo (isset($editProgram[0]['image']) ? $editProgram[0]['file'][0]['files'] : $editProgram[0]['image'])?>"/>
			<td>&nbsp;</td>
			</td>
		</tr>
	</table>
	<?php 
	if($_GET['edit'] != ''){
	?>
	<img src="<?=$app_domain?>public_assets/<?=$editProgram[0]['image']?>" style="height:200px;margin-bottom:10px; width:200px" class="img-polaroid" id="previewplay"/><br/>
	<?php }else{ echo '';}?>
	
	<br/>
	<p><b>Abstraksi :</b></p>
	<!--better diganti Editor text-->
	<textarea style="width:100%;height:200px;" required name="editor"><?=(isset($editProgram[0]['content']) ? $editProgram[0]['content'] : '')?>
	</textarea>
	<input type="hidden" name="fromwho" id="fromwho"  value="<?=(isset($editProgram[0]['fromwho']) ? $editProgram[0]['fromwho'] : $_SESSION['user']['usertype'])?>"/>
	<input type="hidden" name="authorid" id="authorid"  value="<?=(isset($editProgram[0]['authorid']) ? $editProgram[0]['authorid'] : $_SESSION['user']['id'])?>"/>

	<input type="submit" class="btn btn-primary" name="posting" value=" Posting "/>
	</form>
</div>
<script language="javascript">

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

				
				
		