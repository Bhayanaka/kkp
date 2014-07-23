<div style="margin:10px">
	
	<div style="border-style:solid;">
		
		<table class="table table-striped">
			<tr>
				<th>No</th>
				<th>Title</th>
				<th>Post Date</th>
			</tr>
		
		<?php
		// pr($listBerita);
		$no = 1;
		if($listBerita){
		foreach ($listBerita as $val){
			echo '<tr>';
			echo '<td>'.$no.'</td>';
			echo '<td>'.$val['title'].'</td>';
			echo '<td>'.$val['postdate'].'</td>';
			echo '</tr>';
			$no++;
		}
		}
		?>
		
		</table>
	</div>
	</br>
	<div style="border-style:solid;">
		<table class="table table-striped">
			<tr>
				<th>No</th>
				<th>Title</th>
				<th>Post Date</th>
			</tr>
		
		<?php
		// pr($listGallery);
		$no = 1;
		if($listGallery){
		foreach ($listGallery as $val){
			echo '<tr>';
			echo '<td>'.$no.'</td>';
			echo '<td>'.$val['title'].'</td>';
			echo '<td>'.$val['createdate'].'</td>';
			echo '</tr>';
			$no++;
		}
		}
		?>
		
		</table>
	</div>
	
</div>

			