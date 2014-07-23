
				<h4 class="title_sub_menu_in">List User</h4>
				<div class="row-fluid" >
				<div class="span6"><a href="<?=$basedomain?>user/add" class="btn btn-primary">Tambah User</a></div>
				</div>
				<br />
				<table class="table table-striped" id="tableajax">
					<thead>
					<tr>
						<th>No</th>
						<th>Register Date</th>
						<th>Nama User</th>
						<th>Level</th>
						<th>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no= 1;
					foreach ($listuser as $val){
					?>
					<tr>
						<td><?=$no?></td>
						<td><?=$val['register_date']?></td>
						<td><?=$val['name']?></td>
						<td>
							<?php 
							if ($val['usertype']==1)echo 'Administrator';
							if ($val['usertype']==2)echo 'Publisher';
							if ($val['usertype']==3)echo 'Operator';
							
							?>
						
						</td>
						<td>
							<?php
							// pr($_SESSION['user']);
							if ($_SESSION['user']['usertype']==1){
							?>
							
							<a href="<?=$basedomain?>user/edit/?id=<?=$val['id']?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;
							<?php if ($val['id']!=$_SESSION['user']['usertype']){ ?>
							<a href="javascript:void(0)" class="icon-trash delete" title="Hapus" prop="<?=$val['id']?>"></a>
							<?php 
							}
							}else{
								if ($val['usertype']==$_SESSION['user']['usertype']){
							?>
							<a href="<?=$basedomain?>user/edit/?id=<?=$val['id']?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;
							<?php }}  ?>
						</td>
					</tr>
					<?php
					$no++;
					}
					?>
					</tbody>
					<tfoot>
						<td colspan="5"></td>
					</tfoot>
				</table>
				
				
				<div class="row-fluid" >
					
					<div class="span6">
						<!--
						<div class="pagination" align="right" style="margin-top:0">
						  <ul>
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">Next</a></li>
						  </ul>
						</div>-->
					</div>
				</div>
<script>
	$(document).on('click', '.delete', function(){
		var userid = $(this).attr('prop');
		
		var r=confirm("Delete Acount ?");
		if (r==true){
		
			$.post(basedomain+'user/delete', {deleteUser:true, id:userid}, function(data){
				
				if (data.status==true){
					alert('User deleted');
					location.reload(); 
				}
			},"JSON")
		}else{
			return false;
		} 
  
		
	})
</script>			