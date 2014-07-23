
				<h4 class="title_sub_menu_in">List User</h4>
				<form method="post" action="<?=$basedomain?>user/add" enctype="multipart/form-data">
				<table border="0" style="margin:30px">
					<tr>
						<td rowspan="6" >
							<img src="<?=$basedomain?>images/no-images.gif" style="height:200px;margin-bottom:10px;" class="img-polaroid" id="previewplay"/><br/>
							<input type="file" name="image" id="imgInpPlay"/>
						</td>
						
						<td>Nama</td>
						<td>:</td>
						<td><input type="text" name="nama" class="nama" required="required"/></td>
					</tr>
					<!--<tr>
						<td>Tanggal Pembuatan</td>
						<td>:</td>
						<td><input type="text" name="" /></td>
					</tr>-->
					<tr>
						<td>Username</td>
						<td>:</td>
						<td><input type="text" name="username" class="username" required="required"/></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="password" name="password" class="password" required="required"/></td>
					</tr>
					<tr>
						<td>E-mail</td>
						<td>:</td>
						<td><input type="text" name="email" class="email" required="required"/></td>
					</tr>
					<tr>
						<td>Kategori User</td>
						<td>:</td>
						<td>
							<select name="level">
								<option value="1">Administrator</option>
								<option value="2">Publisher</option>
								<option value="3">Operator</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><br/>
						<input type="hidden" name="token" value="1"/>
						<input type="submit" name="adduser" value="Simpan" class="btn btn-primary submit"/>
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
		if ($('.nama').val()=='') return false;
		if ($('.username').val()=='') return false;
		if ($('.password').val()=='') return false;
		if ($('.email').val()=='') return false;
	})
</script>			