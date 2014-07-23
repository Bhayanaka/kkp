
				<div class="row-fluid" >
					<div class="span12">
						<h4 class="title_sub_menu_in">Norma, Standart, Prosedur dan Kriteria</h4>
					</div>
					<?php 
					if($_SESSION['user']['usertype'] == '1' || $_SESSION['user']['usertype'] == '2' || $_SESSION['user']['usertype'] == '3' ){
					?>
				<a href="<?=$basedomain?>produk/addNorma" class="btn btn-primary"> Tambah Data</a>
				</div><?php
				}
				echo "&nbsp";
				?>	
				<table class="table table-striped" id="tableajax">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Upload</th>
						<th>Judul</th>						
						<th>Kategori</th>
						<th>Operator</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					// pr($data);
					$i = 1;
					if($get_data){
						foreach ($get_data as $val){
						
					?>
					<tr>
						<td><?= $i;?></td>
						<td><?= $val['createdate'];?></td>
						<td class="berita"><?= $val['title'];?></td>						
						<td>
						<?php
						
						if($kat){
						foreach ($kat as $valst){
							
							if($val['articletype'] == $valst['id']){
								if($valst['value'] != ''){
									echo $valst['value'];
								}
							}
						}
						}
						?>
						</td>
						<td>
						<?php /*if($user){
						foreach ($user as $var){
							if($val['fromwho'] == $var['id']){
								if($var['name'] != ''){
									if($var['usertype'] == '1'){
										echo $var['name'];
										echo " As Administrator";
									}elseif($var['usertype'] == '2'){
										echo $var['name'];
										echo " As Publisher";
									}else{
										echo $var['name'];
										echo " As Operator";
									}
								}
							}
						}
						}*/
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
						?>
						</td>
						<td>
						<?php
						  if($val['n_status'] == '1'){
							echo "Publish";
						  }else{
							echo "Unpublish";
						  }
						  ?>
						</td>
						<td>
							<?php
							if($_SESSION['user']['usertype'] == '1'){
							?>
								<?php if($val['n_status'] == '1'){?>
								<a href="<?=$basedomain?>produk/change_status_norma/?id=<?=$val['id']?>&status=<?=$val['n_status']?>" class='icon-globe' title='Unpublish'></a>
								<?php }else{ ?>
								<a href="<?=$basedomain?>produk/change_status_norma/?id=<?=$val['id']?>&status=<?=$val['n_status']?>" class='icon-globe' title='Publish'></a>
								<?php } ?>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain.'produk/addNorma/?edit='.$val['id']?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain.'produk/updateStatusNorma/?delete='.$val['id']?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						
							<?php
							}elseif($_SESSION['user']['usertype'] == '2' && $val['fromwho'] !='1'){
							?>	
								<?php if($val['n_status'] == '1'){?>
								<a href="<?=$basedomain?>produk/change_status_norma/?id=<?=$val['id']?>&status=<?=$val['n_status']?>" class='icon-globe' title='Unpublish'></a>
								<?php }else{ ?>
								<a href="<?=$basedomain?>produk/change_status_norma/?id=<?=$val['id']?>&status=<?=$val['n_status']?>" class='icon-globe' title='Publish'></a>
								<?php } ?>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain.'produk/addNorma/?edit='.$val['id']?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain.'produk/updateStatusNorma/?delete='.$val['id']?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						
							<?php
							}elseif($_SESSION['user']['usertype'] == '3' && $val['fromwho'] =='3'){
							?>		
									
								<a href="<?=$basedomain.'produk/addNorma/?edit='.$val['id']?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain.'produk/updateStatusNorma/?delete='.$val['id']?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						
							<?php
							}else{
								//no action
							}
							?>
							
							
							
							
						</td>
					</tr>
					<?php
					$i++;
						}
					}
					?>					
				</tbody>
				<tfoot>
					<td colspan="7"></td>
				</tfoot>
				</table>
			