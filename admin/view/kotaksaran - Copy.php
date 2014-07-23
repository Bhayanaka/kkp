<div style="margin:10px">

		<h4 class="title_sub_menu_in">List Kotak Saran</h4>
		<table class="table table-striped" id="tableajax">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Pesan</th>
				<th>Tanggal</th>
			</tr>
		</thead>
		<tbody>
		<?php
		// pr($listBerita);
		$no = 1;
		if($result){
		foreach ($result as $val){
			echo '<tr>';
			echo '<td>'.$no.'</td>';
			echo '<td>'.$val['title'].'</td>';
			echo '<td>'.$val['brief'].'</td>';
			echo '<td>'.$val['content'].'</td>';
			echo '<td>'.$val['createdate'].'</td>';
			echo '</tr>';
			$no++;
		}
		}
		?>
		</tbody>
		<tfoot>
			<td colspan="5"></td>
		</tfoot>
		</table>
	</div>

			