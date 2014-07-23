<script>
$(function(){
		$("#postdate").datetimepicker({
		dateFormat:'yy-mm-dd',
		timeFormat:'HH:mm:ss',
		stepSecond:10});
	});
	
	function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
	}
		
	function isNumber2(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
	}
</script>
<?php 

// pr($data);
?>
<h4 class="title_sub_menu_in">Norma, Standart, Prosedur dan Kriteria</h4>
<div class="new_input">
	<form action="<?=$basedomain.'produk/insertNorma/'?>" method="post" enctype="multipart/form-data">
	<input type="hidden" value="<?=(isset($editNorma[0]['id']) ? $editNorma[0]['id'] : '')?>" name="hidden_id" readonly id="hidden_id"  />	
	<table border="0">
		<tr>
			<td>Judul</td>
			<td>&nbsp;</td>
			<td><input type="text" name="judul" required="required" value="<?=(isset($editNorma[0]['title']) ? $editNorma[0]['title'] : '')?>"/></td>
			<td>&nbsp;</td>
			<td>Tanggal Upload</td>
			<td>&nbsp;</td>
			<td><input type="text" name="tgl_upload"  id="postdate" value="<?=(isset($editNorma[0]['postdate']) ? $editNorma[0]['postdate'] : '')?>"/></td>
			
			<td>Tahun Pembuatan</td>
			<td><input type="text" name="thn_buat" onkeypress="return isNumber2(event)" maxlength ="4" value="<?=(isset($editNorma[0]['tahun']) ? $editNorma[0]['tahun'] : date('Y'))?>"/></td>
		</tr>
		<tr>
			<td>Tipe Artikel</td>
			<td>&nbsp;</td>
			<td>
			<select name="artikel" id="artikel" required="required">
				<option id="" value="" <?=(isset($editNorma[0]['articletype']) ? (0 == $editNorma[0]['articletype'] ? 'selected' : '') : '' );?>>- Pilih Artikel -</option>
				<option id="1" value="1" <?=(isset($editNorma[0]['articletype']) ? (1 == $editNorma[0]['articletype'] ? 'selected' : '') : '' );?>>Pedoman Umum</option>
				<option id="2" value="2" <?=(isset($editNorma[0]['articletype']) ? (2 == $editNorma[0]['articletype'] ? 'selected' : '') : '' );?>>Pedoman Teknis</option>
				<option id="3" value="3" <?=(isset($editNorma[0]['articletype']) ? (3 == $editNorma[0]['articletype'] ? 'selected' : '') : '' );?>>Modul Pelatihan</option>	
				<option id="4" value="4" <?=(isset($editNorma[0]['articletype']) ? (4 == $editNorma[0]['articletype'] ? 'selected' : '') : '' );?>>Prosedur dan Kriteria</option>	
			</select>
			</td>
			<td>&nbsp;</td>
			<td>Lampiran</td>
			<td>&nbsp;</td>
			<td><input type="text" name="lampiran"  value="<?=(isset($editNorma[0]['lampiran']) ? $editNorma[0]['lampiran'] : '')?>"/>	</td>
			<td>Jumlah Halaman </td>
			<td><input type="number" name="jml_hal" onkeypress="return isNumber(event)" placeholder="hanya nomor" value="<?=(isset($editNorma[0]['jml_hal']) ? $editNorma[0]['jml_hal'] : '')?>"/></td>
		</tr>
		<tr>
			<td>Upload Dokumen final</td>
			<td>&nbsp;</td>
			<td><input type="file" name="df" id="files"/></td>
			<input type="hidden" name="df_hidden" id="df_hidden"  value="<?=(isset($data['df'][0]['files']) ? $data['df'][0]['files'] : '')?>"/>
			<input type="hidden" name="df_tags_hidden" id="df_hidden"  value="<?=(isset($data['df'][0]['tags']) ? $data['df'][0]['tags'] : '')?>"/>
			
			<td>&nbsp;</td>
			<td>Upload Dokumen</td>
			<td>&nbsp;</td>
			<td><input type="file" name="upload_file" id="files_2"/></td>
			<input type="hidden" name="file_hidden" id="file_hidden"  value="<?=(isset($data['dok'][0]['files']) ? $data['dok'][0]['files'] : '')?>"/>
			<input type="hidden" name="file_tags_hidden" id="file_hidden" value="<?=(isset($data['dok'][0]['tags']) ? $data['dok'][0]['tags'] : '')?>"/>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<?php 
		/*if(isset($data['df'][0]['files']) && ($data['df'][0]['files'] != '')){
		$exp_naskah =explode("/", $data['df'][0]['files']);
		$prev_doc = "<input type=\"text\" name=\"\" value=\"{$exp_naskah[1]}\" readonly>";
		}
	
		if(isset($data['dok'][0]['files']) && ($data['dok'][0]['files'] != '')){
			$exp_final =explode("/", $data['dok'][0]['files']);
			$prev_doc2 = "<input type=\"text\" name=\"\" value=\"{$exp_final[1]}\" readonly>";
		}*/
		if(isset($data['df'][0]['tags']) && ($data['df'][0]['tags'] != '')){
			$exp_naskah =explode("/", $data['df'][0]['files']);
			$directory= $exp_naskah[0];
			$file = $exp_naskah[1];
			$ex  = explode('.',$data['df'][0]['tags']);
			$sub = substr($ex[0],0,18);
			$join= $sub.".".$ex[1];
			// $prev_doc ="<a class=\"btn btn-success\"  href=\"{$app_domain}public_assets/{$directory}/{$file}\">{$data['df'][0]['tags']}<i class=\"icon-arrow-down icon-white\"></i> </a>";
			$prev_doc ="<a class=\"btn btn-success\"  title=\"{$data['df'][0]['tags']}\" href=\"{$app_domain}public_assets/{$directory}/{$file}\">{$join}<i class=\"icon-arrow-down icon-white\"></i> </a>";
			
		}
	
		if(isset($data['dok'][0]['tags']) && ($data['dok'][0]['tags'] != '')){
			$exp_final =explode("/", $data['dok'][0]['files']);
			$directory= $exp_final[0];
			$file = $exp_final[1];
			$ex2  = explode('.',$data['dok'][0]['tags']);
			$sub2 = substr($ex2[0],0,18);
			$join2= $sub2.".".$ex2[1];
			$prev_doc2 ="<a class=\"btn btn-success\" title=\"{$data['dok'][0]['tags']}\"  href=\"{$app_domain}public_assets/{$directory}/{$file}\">{$join2}<i class=\"icon-arrow-down icon-white\"></i> </a>";
			// $prev_doc2 ="<a class=\"btn btn-success\"  href=\"{$app_domain}public_assets/{$directory}/{$file}\">{$data['dok'][0]['tags']}<i class=\"icon-arrow-down icon-white\"></i> </a>";
			
		}
		?>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><output id="list"></output></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><output id="list2"></output></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>	
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><output id="list"><?=$prev_doc?></output></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><output id="list2"><?=$prev_doc2?></output></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>	
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Upload Cover Dokumen</td>
			<td>&nbsp;</td>
			<td><input type="file" name="cover" id="imgInpPlay" /></td>
			<input type="hidden" name="cover_hidden" id="cover_hidden"  value="<?=(isset($editNorma[0]['image']) ? $editNorma[0]['image'] : '')?>"/>
			<td>&nbsp;</td>			
			<td>Upload Peta Struktur ruang</td>
			<td>&nbsp;</td>
			<td><input type="file" name="sr" id="imgInpPlay2"/></td>
			<input type="hidden" name="sr_hidden" id="sr_hidden"  value="<?=(isset($data['sr'][0]['files']) ? $data['sr'][0]['files'] : '')?>"/>
			<td>Upload Peta pola ruang</td>
			<td><input type="file" name="ppr" id="imgInpPlay3" /></td>
			<input type="hidden" name="ppr_hidden" id="ppr_hidden" value="<?=(isset($data['ppr'][0]['files']) ? $data['ppr'][0]['files'] : '')?>"/>
		</tr>
		<tr>
			<td></td>
			<td>&nbsp;</td>
			<td><?php 
				if($editNorma[0]['image'] != ''){
				?>
				<img src="<?=$app_domain?>public_assets/<?=$editNorma[0]['image']?>" style="height:200px;margin-bottom:10px; width:200px" class="img-polaroid" id="previewplay"/><br/>
				<?php }else{ ?>
				<img src="<?=$basedomain?>images/no-images.gif" style="height:200px;margin-bottom:10px; width:200px" class="img-polaroid" id="previewplay"/><br/>
				<?php } ?>
			</td>
			<td>&nbsp;</td>
			
			<td></td>
			<td>&nbsp;</td>
			<td><?php 
				if($data['sr'][0]['files'] != ''){
				?>
				<img src="<?=$app_domain?>public_assets/<?=$data['sr'][0]['files']?>" style="height:200px;margin-bottom:10px; width:200px" class="img-polaroid" id="previewplay2"/><br/>
				<?php }else{ ?>
				<img src="<?=$basedomain?>images/no-images.gif" style="height:200px;margin-bottom:10px; width:200px" class="img-polaroid" id="previewplay2"/><br/>
				<?php } ?>
			</td>
			<td>&nbsp;</td>
			<td><?php 
				if($data['ppr'][0]['files'] != ''){
				?>
				<img src="<?=$app_domain?>public_assets/<?=$data['ppr'][0]['files']?>" style="height:200px;margin-bottom:10px; width:200px" class="img-polaroid" id="previewplay3"/><br/>
				<?php }else{ ?>
				<img src="<?=$basedomain?>images/no-images.gif" style="height:200px;margin-bottom:10px; width:200px" class="img-polaroid" id="previewplay3"/><br/>
				<?php } ?>
			</td>		
		</tr>
		<tr>
			<td>Kata Kunci</td>
			<td>&nbsp;</td>
			<td><input type="text"  name="keyword" value="<?=(isset($editNorma[0]['thumbnailimage']) ? $editNorma[0]['thumbnailimage'] : '')?>"/></td>
		</tr>
	</table>
	<input type="hidden" name="id_repo_0" id="id"  value="<?=(isset($data['dok'][0]['id']) ? $data['dok'][0]['id'] : '')?>"/>
	<input type="hidden" name="id_repo_1" id="id"  value="<?=(isset($data['df'][0]['id']) ? $data['df'][0]['id'] : '')?>"/>
	<input type="hidden" name="id_repo_2" id="id"  value="<?=(isset($data['sr'][0]['id']) ? $data['sr'][0]['id'] : '')?>"/>
	<input type="hidden" name="id_repo_3" id="id"  value="<?=(isset($data['ppr'][0]['id']) ? $data['ppr'][0]['id'] : '')?>"/>
	<br/>
	<p><b>Abstraksi :</b></p>
	<!--better diganti Editor text-->
	<textarea style="width:100%;height:200px;" name="editor" id="abstraksi" class="ckeditor"><?=(isset($editNorma[0]['content']) ? $editNorma[0]['content'] : '')?>
	</textarea>
	<br/>
	<p><b>Deskripsi :</b></p>
	<!--better diganti Editor text-->
	<textarea style="width:100%;height:200px;" name="deskripsi" id="deskripsi" class="ckeditor"><?=(isset($editNorma[0]['brief']) ? $editNorma[0]['brief'] : '')?>
	</textarea>
	
	<input type="hidden" name="fromwho" id="fromwho"  value="<?=(isset($editNorma[0]['fromwho']) ? $editNorma[0]['fromwho'] : $_SESSION['user']['usertype'])?>"/>
	<input type="hidden" name="authorid" id="authorid"  value="<?=(isset($editNorma[0]['authorid']) ? $editNorma[0]['authorid'] : $_SESSION['user']['id'])?>"/>
	<input type="hidden" name="createdate" id="postdate"  value="<?=(isset($result[0]['createdate']) ? $result[0]['createdate'] : date('Y-m-d H:i:s'))?>"/>	
	<input type="submit" class="btn btn-primary" name="posting" value="Simpan"/>
	<a href="#" onclick="javascript:window.history.back(-1);return false;"><input type="button" class="btn btn-primary" value="Kembali"/></a>
	</form>
</div>
<script language="javascript">
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
	
	function handleFileSelect2(evt) {
    var files = evt.target.files; // FileList object

    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
      output.push('<li><strong>', escape(f.name), '</strong>  - ',
                  f.size, ' bytes','',
                  '</li>');
    }
    document.getElementById('list2').innerHTML = '<ul>' + output.join('') + '</ul>';
  }

  document.getElementById('files_2').addEventListener('change', handleFileSelect2, false);
  
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

				
				
		