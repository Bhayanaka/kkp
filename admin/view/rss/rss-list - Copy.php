				
				<h4 class="title_sub_menu_in">List RSS</h4>
				<div class="row-fluid" >
					<div class="span6"><a href="<?=$basedomain?>rss/add" class="btn btn-primary">Tambah Data</a></div>
				</div>
				<br />
				<table class="table table-striped" id="tableajax">
					<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Upload</th>
						<th>Judul</th>
						<th>Link Rss</th>
						<th>Status</th>
						<th>Operator</th>
						<th>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					if($data['result']){
					foreach($data['result'] as $key=>$val){
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $val['postdate']; ?></td>
						<td><?php echo $val['title']; ?></td>
						<td><?php echo $val['brief']; ?></td>
						<td><?php 
							if($val['n_status'] == '0'){
								echo "unpublished";
							}elseif($val['n_status'] == '1'){
								echo "published";
							}else{
								echo "inactive";
							}?>
						</td>
						<td><?php 
							if ($val['fromwho'] == '1'){
								echo $_SESSION['user']['name'].' As Administrator';
							}elseif($val['fromwho'] == '2'){
								echo $_SESSION['user']['name'].' As Guest';
							}
							else{	
								echo $_SESSION['user']['name'].' As User';
							} 
							?></td>
						<td><a href="status_rss/?id=<?php echo $val['id'];?>&status_rss=<?php echo $val['n_status'];?>" class="icon-globe" title="Publish"></a>&nbsp;&nbsp;&nbsp;
							<a href="add/?id=<?php echo $val['id'];?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp; 
							<a href="del_rss/?id=<?php echo $val['id'];?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						</td>
					</tr>
					<?php	
						}	
					}?>
					</tbody>
					<tfoot>
					<td colspan="6"></td>
					</tfoot>
				</table>
				
				
				<div class="row-fluid" >
				</div>
		