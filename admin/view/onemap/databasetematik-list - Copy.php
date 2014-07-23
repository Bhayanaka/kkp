				<div class="laper3"></div>
				<a class="sub_menu_in" href="http://localhost/tataruang/admin/onemap/index/?categoryid=10">Visi Misi</a>
				<a class="sub_menu_in" href="http://localhost/tataruang/admin/onemap/index/?categoryid=11">Rencana Aksi</a>
				<a class="sub_menu_in" href="http://localhost/tataruang/admin/onemap/index/?categoryid=12">Target dan Capaian</a>
				<a class="sub_menu_in" href="http://localhost/tataruang/admin/onemap/index/?categoryid=13">Dokumentasi</a>
				<a class="sub_menu_in on" href="http://localhost/tataruang/admin/onemap/dbtematik_view">Database Tematik</a>
				<a class="sub_menu_in" href="http://localhost/tataruang/admin/onemap/indeksPeta_view">Indeks Peta Tematik</a>
				<a class="sub_menu_in" href="http://localhost/tataruang/admin/onemap/dbspasial_view">Database Spasial</a>
				<br />
				<br />
				<h4 class="title_sub_menu_in">List Database Tematik </h4>
				<?php 
				if($_SESSION['user']['usertype'] == '1' || $_SESSION['user']['usertype'] == '2' || $_SESSION['user']['usertype'] == '3' ){
				?>
				<div class="row-fluid" >
					<div class="span6"><a href="<?=$basedomain?>onemap/add_dbtematik" class="btn btn-primary">Tambah Data</a></div>
				</div>
				<?php
				}
				?>
				<br />
				<table class="table table-striped" id="tableajax">
					<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Upload</th>
						<th>Judul</th>
						<th>Status</th>
						<th>Operator</th>
						<th>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
					// pr($data);
					$no = 1;
					if($result){
					foreach($result as $key=>$val){
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $val['postdate']; ?></td>
						<td><?php echo $val['title']; ?></td>
						
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
							/*if ($val['fromwho'] == '1'){
								echo $_SESSION['user']['name'].' As Administrator';
							}elseif($val['fromwho'] == '2'){
								echo $_SESSION['user']['name'].' As Guest';
							}
							else{	
								echo $_SESSION['user']['name'].' As User';
							} */
							if ($val['fromwho'] == '1'){
								$as = ' As Administrator';
							}elseif($val['fromwho'] == '2'){
								$as =' As Publisher';
							}else{	
								$as =' As Operator';
							}
							
							foreach($user as $key=>$value){
									if($value['id'] == $val['authorid'] && $value['usertype'] == $val['fromwho'] ){
										echo $value['name'].$as;
									} 
								}	
							
							?></td>
						<td>
						<?php
							// echo $val['fromwho'];
							if($_SESSION['user']['usertype'] == '1'){
							?>
								<a href="status_dbtematik/?id=<?php echo $val['id'];?>&status_peta=<?php echo $val['n_status'];?>" class="icon-globe" title="Publish"></a>&nbsp;&nbsp;&nbsp;
								<a href="add_dbtematik/?id=<?php echo $val['id'];?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp; 
								<a href="del_dbtematik/?id=<?php echo $val['id'];?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						
							<?php
							}elseif($_SESSION['user']['usertype'] == '2' && $val['fromwho'] !='1'){
							?>	
								<a href="status_dbtematik/?id=<?php echo $val['id'];?>&status_peta=<?php echo $val['n_status'];?>" class="icon-globe" title="Publish"></a>&nbsp;&nbsp;&nbsp;
								<a href="add_dbtematik/?id=<?php echo $val['id'];?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp; 
								<a href="del_dbtematik/?id=<?php echo $val['id'];?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
							
							<?php
							}elseif($_SESSION['user']['usertype'] == '3' && $val['fromwho'] =='3'){
							?>		
								<a href="add_dbtematik/?id=<?php echo $val['id'];?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp; 
								<a href="del_dbtematik/?id=<?php echo $val['id'];?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
							
							<?php
							}else{
								//no action
							}
							?>
						
						
						
						
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
				
		
		