<?php //pr($kab);?>
				<div class="row-fluid" >
					<div class="span12">
						<h4 class="title_sub_menu_in">Dokumen Perencanaan WP3K</h4>
					</div>
				</div>
				<?php 
				if($_SESSION['user']['usertype'] == '1' || $_SESSION['user']['usertype'] == '2' || $_SESSION['user']['usertype'] == '3' ){
				?>
				<div class="row-fluid" >
					<div class="span6"><a href="<?=$basedomain?>produk/addPerencanaan" class="btn btn-primary"> Tambah Data</a></div>
				</div><br />
				<?php
				}
				?>
				<table class="table table-striped table-hover" id="tableajax">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Upload</th>
						<th>Judul</th>						
						<th>Kategori</th>
						<th>Provinsi</th>
						<th>Kabupaten</th>
						<th>Kecamatan</th>
						<th>Operator</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
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
						foreach ($kat as $valst){
							if($val['articletype'] == $valst['id']){
								if($valst['value'] != ''){
									echo $valst['value'];
								}
							}
						}
						?>
						</td>						
						<td>
						<?php
						foreach ($prov as $vals){
							if($val['id_provinsi'] == $vals['kode_wilayah']){
								if($vals['nama_wilayah'] != ''){
									echo $vals['nama_wilayah'];
								}
							}
						}
						?>
						</td>
						<td>
						<?php
						foreach ($kab as $valse){
							if($val['id_kabupaten'] == $valse['kode_wilayah']){
								if($valse['nama_wilayah'] != ''){
									echo $valse['nama_wilayah'];
								}
							}
						}
						?>
						</td>
						<td><?= $val['kecamatan'];?></td>
						<td>
						<?php 
						/*if($user){
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
							
							?>	
						<?php
							// echo $val['fromwho'];
							if($_SESSION['user']['usertype'] == '1'){
							?>
								<?php if($val['n_status'] == '1'){?>
								<a href="<?=$basedomain?>produk/change_status/?id=<?=$val['id']?>&status=<?=$val['n_status']?>" class='icon-globe' title='Unpublish'></a>
								<?php }else{ ?>
								<a href="<?=$basedomain?>produk/change_status/?id=<?=$val['id']?>&status=<?=$val['n_status']?>" class='icon-globe' title='Publish'></a>
								<?php } ?>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain.'produk/addPerencanaan/?edit='.$val['id'].'&kode='.$val['id_provinsi']?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain.'produk/updateStatusPerencanaan/?delete='.$val['id']?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						
							<?php
							}elseif($_SESSION['user']['usertype'] == '2' && $val['fromwho'] !='1'){
							?>	
								<?php if($val['n_status'] == '1'){?>
								<a href="<?=$basedomain?>produk/change_status/?id=<?=$val['id']?>&status=<?=$val['n_status']?>" class='icon-globe' title='Unpublish'></a>
								<?php }else{ ?>
								<a href="<?=$basedomain?>produk/change_status/?id=<?=$val['id']?>&status=<?=$val['n_status']?>" class='icon-globe' title='Publish'></a>
								<?php } ?>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain.'produk/addPerencanaan/?edit='.$val['id'].'&kode='.$val['id_provinsi']?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain.'produk/updateStatusPerencanaan/?delete='.$val['id']?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						
							<?php
							}elseif($_SESSION['user']['usertype'] == '3' && $val['fromwho'] =='3'){
							?>		
									
								<a href="<?=$basedomain.'produk/addPerencanaan/?edit='.$val['id'].'&kode='.$val['id_provinsi']?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain.'produk/updateStatusPerencanaan/?delete='.$val['id']?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
							
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
					<td colspan="8"></td>
				</tfoot>
				</table>
				
				
				
			