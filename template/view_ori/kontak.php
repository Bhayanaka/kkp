
<!--google map-->
<!--<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>-->
<script>
	var myCenter=new google.maps.LatLng(-6.179139,106.832657);

	function initialize()
	{
	var mapProp = {
	  center:myCenter,
	  zoom:15,
	  mapTypeId:google.maps.MapTypeId.ROADMAP
	  };

	var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

	var marker=new google.maps.Marker({
	  position:myCenter,
	  });

	marker.setMap(map);
	}

	google.maps.event.addDomListener(window, 'load', initialize);
</script>

<?php defined ('TATARUANG') or exit ( 'Forbidden Access' ); 

				
	sub_top_menu('bg_biru');
	
	$title_page=array('Kontak');
	$link_title_page=array('#');
	box_legend('box_legend_2',$title_page,$link_title_page);//<!--LEGEND 2 BIAR AGAK NAIK-->
?>
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">
				  <div class="span8">
					
					<h3>Contact Us</h3>
					
					
					<!--<style>.isi_berita{margin-left:30px;}</style>
						<br/>-->
						<!--<center><img src="assets/images/logo.png" width="200px">-->
						<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.7591264964863!2d112.74468340000001!3d-7.3808696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e4f3d9e65467%3A0xd19c8068a886a78f!2sKementerian+Kelautan+%26+Perikanan!5e0!3m2!1sen!2s!4v1394516171360" width="100%" height="450" frameborder="0" style="border:0"></iframe>
						<br/>
						<br/>
						<center>
						<b>Direktorat Tata Ruang Laut Pesisir dan Pulau-pulau Kecil</b><br/>
						Direktorat Jenderal Kelautan Pesisir dan Pulau-pulau Kecil<br/>
						Kementerian Kelautan dan Perikanan<br/>
						</h5></center>
						<br/>
						<div style="margin-left:60px;">	
						<div>
							<h4>Alamat</h4>
						</div>	
							<p class="isi_berita">
								  Jl. Kebon Sirih No. 31, Jakarta Pusat
							</p>
						<div>
							<h4>Telepon</h4>
						</div>	
							<p class="isi_berita">
								  (021) 314 2142 Ext. 253
							</p>
						<div>
							<h4>E - mail</h4>
						</div>	
							<p class="isi_berita">
								  -
							</p>
						<div>
							<h4>Fax</h4>
						</div>	
							<p class="isi_berita">
								  314 2917
							</p>
						<h4>Map</h4>	
					
						<br/><br/><br/>
						</div>-->
				

					
					<!--<div id="" style="width:600px;height:380px;"></div>-->
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.7591264964863!2d112.74468340000001!3d-7.3808696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e4f3d9e65467%3A0xd19c8068a886a78f!2sKementerian+Kelautan+%26+Perikanan!5e0!3m2!1sen!2s!4v1394516171360" width="100%" height="450" frameborder="0" style="border:0"></iframe>
						
					<?php
						// pr($data);
						if($hasil){
							foreach($hasil as $key=>$val){
							echo "<h3>".$val['title']."</h3>";
							//echo '<center><img src="assets/images/logo.png" /></center>';
							//echo '<center><img src ="'.$basedomain.'public_assets/'.$val['image'].'" style="height:250px" width="auto"/></center>';
							echo"&nbsp;";
							echo $val['content'];
							}
						}
					?>
					
				  </div>
					<div class="span4 bg_rss">
						<h4><font color="white">RSS</h4>
						<table cellpadding="5" width="100%">
							<?php
								// pr($rss);
								if($rss){
								foreach($rss as $key=>$values){
								?>
							<tr>
								<td width="60px">
									<a href="<?="https://".$values['brief']?>" class="thumbnail">
									  <img data-src="holder.js/300x200" src="<?=$basedomain?>public_assets/<?=$values['image']?>" style="width:50px" alt="">
									</a>
								</td>
								<td>
									<a href="<?="https://".$values['brief']?>"><b><?=$values['title']?></b></a>
								</td>
							</tr>
							<?php
								}
							}
							?>
						</table>
							
					</div>	
				</div>
				
			</div>
			<div class="span1"></div>
		</div>