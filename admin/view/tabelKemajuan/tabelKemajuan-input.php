<script>
	function myFunction(){
		// alert("Page is loaded");
		$('#btn-primary').attr('disabled','disabled');
		$('#btn-primary').css('background','grey');
		$('#img_strtr').attr('disabled','disabled');
	} 
	

	function edit(){
		var elements = $("#edit").val();
		if(elements == 0){
				$('#img_strtr').removeAttr('disabled');
				$('#btn-primary').removeAttr('disabled');
				$('#btn-primary').css("background","#006DCC");
				$('#edit').val('1');
				$('#edit').html('Kembali');
				$('#edit').css("background","#BD362F");
		}
		else {
				$('#img_strtr').attr('disabled','disabled');
				$('#btn-primary').attr('disabled','disabled');
				$('#btn-primary').css('background','grey');
				$('#edit').val('0');
				$('#edit').html('Edit');
				$('#edit').css("background","#006DCC");
		}
	}
	
</script>


<?php

date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.?>

<h4 class="title_sub_menu_in">Tabel Progres Perda</h4>
<div class="new_input" >
	<form method="post"  action="<?=$basedomain?>tabelKemajuan/input" enctype = "multipart/form-data">
		<table border = '0'>
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
			// pr($data);
			if(isset($data['result'][0])){
				$directory = explode("/",$result[0]['image']);
			}else{
				$directory = '';
			}
			if(isset($result[0]['image']) != '' && $result[0]['image'] != ''){
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
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" class="btn btn-primary" id="btn-primary" value="Simpan" />
					<?php if($_SESSION['user']['usertype'] =='1' || $_SESSION['user']['usertype'] =='2'){ ?>
					<a href="#" onclick="return edit()"><button type="button" class="btn btn-primary" id="edit" value="0"/>Edit</button></a>
					<?php } ?>
				</td>
			</tr>
		</table>
			
			<!-- input type hidden-->
			<input type="hidden" name="id" id="id"  value="<?=(isset($result[0]['id']) ? $result[0]['id'] : '')?>"/>
			<input type="hidden" name="categoryid" id="categoryid"  value="<?=(isset($result[0]['categoryid']) ? $result[0]['categoryid'] : '20') ?>"/>
			<input type="hidden" name="createdate" id="postdate"  value="<?=(isset($result[0]['createdate']) ? $result[0]['createdate'] : date('Y-m-d H:i:s'))?>"/>
			<input type="hidden" name="fromwho" id="fromwho"  value="<?=(isset($result[0]['fromwho']) ? $result[0]['fromwho'] : $_SESSION['user']['usertype'])?>"/>
			<input type="hidden" name="authorid" id="authorid"  value="<?=(isset($result[0]['authorid']) ? $result[0]['authorid'] : $_SESSION['user']['id'])?>"/>
			<input type="hidden" name="n_status" id="n_status"  value="<?=(isset($result[0]['n_status']) ? $result[0]['n_status'] : '1')?>"/>
			
		
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
				
			