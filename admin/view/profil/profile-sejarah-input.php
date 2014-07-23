<script>
	$(function(){
		$("#postdate").datetimepicker({
		dateFormat:'yy-mm-dd',
		timeFormat:'HH:mm:ss',
		stepSecond:10});
		
	});
	function myFunction(){
		// alert("Page is loaded");
		$('#btn-primary').attr('disabled','disabled');
		$('#btn-primary').css('background','grey');
		$('#title').attr('disabled','disabled');
		$('#postdate').attr('disabled','disabled');
		// $('#content').attr('disabled','disabled');
		$('#img_strtr').attr('disabled','disabled');
	} 
	
	/*function check_edit(){
		var checked=false;
		var elements = document.getElementsByName("check_sejarah");
		if(elements[0].checked){
				checked = true;
				$('#btn-primary').removeAttr('disabled');
				$('#btn-primary').css("background","#006DCC");
				$('#title').removeAttr('disabled');
				$('#postdate').removeAttr('disabled');
				$('#content').removeAttr('disabled');
				$('#img_strtr').removeAttr('disabled');
		}
		else if (!checked){
			$('#btn-primary').attr('disabled','disabled');
			$('#btn-primary').css('background','grey');
			$('#title').attr('disabled','disabled');
			$('#postdate').attr('disabled','disabled');
			$('#content').attr('disabled','disabled');
			$('#img_strtr').attr('disabled','disabled');
		}
		return checked;
	}*/
	function edit(){
		var elements = $("#edit").val();
		if(elements == 0){
				$('#title').removeAttr('disabled');
				$('#postdate').removeAttr('disabled');
				$('#img_strtr').removeAttr('disabled');
				$('#btn-primary').removeAttr('disabled');
				$('#btn-primary').css("background","#006DCC");
				$('#createdate').removeAttr('disabled');
				$('#imgInpPlay').removeAttr('disabled');
				$('#edit').val('1');
				$('#edit').html('Kembali');
				$('#edit').css("background","#BD362F");
		}
		else {
				$('#title').attr('disabled','disabled');
				$('#postdate').attr('disabled','disabled');
				$('#img_strtr').attr('disabled','disabled');
				$('#btn-primary').attr('disabled','disabled');
				$('#btn-primary').css('background','grey');
				$('#createdate').attr('disabled','disabled');
				$('#imgInpPlay').attr('disabled','disabled');
				$('#edit').val('0');
				$('#edit').html('Edit');
				$('#edit').css("background","#006DCC");
		}
	}
	
</script>


<?php

date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.?>
<div class="laper3"></div>
<a href="<?=$basedomain?>profil/sejarah" class="sub_menu_in on">Sejarah</a>
<a href="<?=$basedomain?>profil/struktur" class="sub_menu_in">Struktur Organisasi</a>
<a href="<?=$basedomain?>profil/tupoksi" class="sub_menu_in">Tupoksi</a>
<br/>
<br/>
<h4 class="title_sub_menu_in">Sejarah</h4>
<div class="new_input" >
	<form method="post"  action="<?=$basedomain?>profil/input_sejarah" enctype = "multipart/form-data">
		<table border = '0'>
			<tr>
				<?php 
				//echo"<td><input type=\"checkbox\" name=\"check_sejarah\" id=\"check_sejarah\" value=\"Edit\" onchange=\"return check_edit(this)\" >&nbsp;Edit ";?>
			</td>
			</tr>
			<tr>
				<td>Judul</td>
				<td>&nbsp;</td>
				<td><input type="text" name="title" id="title" required="required" value="<?=(isset($result[0]['title']) ? $result[0]['title'] : '')?>"/></td>
			</tr>
			<tr>
				<td>Tanggal dibuat</td>
				<td>&nbsp;</td>
				<td><input type="text" name="postdate" id="postdate" value="<?=(isset($result[0]['postdate']) ? $result[0]['postdate'] : '')?>"/></td>
			</tr>
			<tr>
				<td>Upload Gambar</td>
				<td>&nbsp;</td>
				<td><input type="file" name="img_strtr" id="img_strtr"/></td>
				<input type="hidden" name="img_hidden" value="<?=(isset($result[0]['image']) ? $result[0]['image'] : '')?>">
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<?php 
			if(isset($data['result'][0])){
				$directory = explode("/",$result[0]['image']);
			}else{
				$directory = '';
			}
			if(isset($result[0]['image']) != ''){
				$default_image_cover = 'public_assets/'.$directory[0].'/'.$directory[1];
				$prev_image_cover = $app_domain.$default_image_cover;
			}else{
				
				$default_image_cover = 'images/no-images.gif';
				$prev_image_cover = $basedomain.$default_image_cover;
			}
			?>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><img src="<?=$prev_image_cover?>" style="height:160px;margin-bottom:10px;" class="img-polaroid" id="previewplay"/></td>
			</tr>
		</table>
			<p><b>Isi Sejarah :</b></p>
			<!--better diganti Editor text-->
			<textarea style="width:100%;height:200px;" name="content" id="content" class="ckeditor">
				<?=(isset($result[0]['content']) ? $result[0]['content'] : '');?>
			</textarea>
			
			<!-- input type hidden-->
			<input type="hidden" name="id" id="id"  value="<?=(isset($result[0]['id']) ? $result[0]['id'] : '')?>"/>
			<input type="hidden" name="categoryid" id="categoryid"  value="<?=(isset($result[0]['categoryid']) ? $result[0]['categoryid'] : '1') ?>"/>
			<input type="hidden" name="articletype" id="articletype"  value="<?=(isset($result[0]['articletype']) ? $result[0]['articletype'] : '1')?>"/>
			<input type="hidden" name="createdate" id="postdate"  value="<?=(isset($result[0]['createdate']) ? $result[0]['createdate'] : date('Y-m-d H:i:s'))?>"/>
			<input type="hidden" name="fromwho" id="fromwho"  value="<?=(isset($result[0]['fromwho']) ? $result[0]['fromwho'] : $_SESSION['user']['usertype'])?>"/>
			<input type="hidden" name="authorid" id="authorid"  value="<?=(isset($result[0]['authorid']) ? $result[0]['authorid'] : $_SESSION['user']['id'])?>"/>
			<input type="hidden" name="n_status" id="n_status"  value="<?=(isset($result[0]['n_status']) ? $result[0]['n_status'] : '1')?>"/>
			
		<input type="submit" class="btn btn-primary" id="btn-primary" value="Simpan" />
		<?php if($_SESSION['user']['usertype'] =='1' || $_SESSION['user']['usertype'] =='2'){ ?>
			<a href="#" onclick="return edit()"><button type="button" class="btn btn-primary" id="edit" value="0"/>Edit</button></a>
		<?php } ?>
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
    
    $("#img_strtr").change(function(){
        readURLplay(this);
    });
</script>
				
			