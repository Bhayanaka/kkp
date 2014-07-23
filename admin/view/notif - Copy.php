<h4 class="title_sub_menu_in">Notifications</h4>
	<table class="table table-striped table-hover" id="tableajax">
	<thead>
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Activity</th>
			<th>Title</th>
			<th>Date</th>
		</tr>
	</thead>
	<tbody>
		<?php
				pr($data);
				 if($notif){
				 $no=1;
				 foreach($notif as $key=>$val){
				 
				 
					//echo $val['brief']."<br/>";
					
					?>
		<tr>
			<td><?=$no++?></td>
			<td><?=$val['username']?></td>
			<td><?=$val['activityValue']?></td>
			<td><?=$val['title']?></td>
			<td><?=date("d M Y",strtotime($val['datetimes']))?></td>
		</tr>
		
		<?php
				 }
				 }
				 ?>
				 
	</tbody>
	<tfoot>
	<td colspan="6"></td>
	</tfoot>
	</table>