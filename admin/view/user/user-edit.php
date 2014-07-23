
				<h4 class="title_sub_menu_in">List User</h4>
				<form method="post" action="<?=$basedomain?>user/edit" enctype="multipart/form-data">
				<table border="0" style="margin:30px">
					<tr>
						<td rowspan="6" >
							<img src="<?=$app_domain?>public_assets/user/<?=$listuser[0]['image_profile']?>" style="height:200px;margin-bottom:10px; width:200px" class="img-polaroid" id="previewplay"/><br/>
							<input type="file" name="image" id="imgInpPlay"/>
						</td>
						<td>Nama</td>
						<td>:</td>
						<td><input type="text" name="name" class="name" required="required" value="<?=$listuser[0]['name']?>"/></td>
					</tr>
					<!--<tr>
						<td>Tanggal Pembuatan</td>
						<td>:</td>
						<td><input type="text" name="" /></td>
					</tr>-->
					<tr>
						<td>Username</td>
						<td>:</td>
						<td><input type="text" name="username" class="username" disabled="disabled" value="<?=$listuser[0]['username']?>"/></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="password" name="password" class="password"  value=""/></td>
					</tr>
					<tr>
						<td>E-mail</td>
						<td>:</td>
						<td><input type="text" name="email" class="email" required="required" value="<?=$listuser[0]['email']?>"/></td>
					</tr>
					<tr>
						<td>Kategori User</td>
						<td>:</td>
						<td>
							<select name="usertype">
								<?php
								if($listuser[0]['usertype'] =='1'){
									$a ='selected';
									$b ='';
									$c ='';
									
								}elseif($listuser[0]['usertype'] =='2'){
									$a ='';
									$b ='selected';
									$c ='';
								}else{
									$a ='';
									$b ='';
									$c ='selected';
								}
								
								?>
								<option value="1" <?=$a?>>Administrator</option>
								<option value="2" <?=$b?>>Publisher</option>
								<option value="3" <?=$c?>>Operator</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><br/>
						<input type="hidden" name="token" value="1"/>
						<input type="hidden" name="id" value="<?=$listuser[0]['id']?>"/>
						<input type="submit" name="adduser" value="Update User" class="btn btn-primary submit"/>
						<a href="#" onclick="javascript:window.history.back(-1);return false;"><input type="button" class="btn btn-primary" value="Kembali"/></a>
					
						
						</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table>
				</form>
				
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
	
	$(document).on('submit', '.submit', function(){
		if ($('.name').val()=='') return false;
		if ($('.username').val()=='') return false;
		if ($('.password').val()=='') return false;
		if ($('.email').val()=='') return false;
	})
</script>			