
			<div class="container-fluid big_body" >
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="container-fluid">
							
							<div class="col-md-8">
								<br/>
								<ul class="breadcrumb" style="margin-bottom: 5px;">
								  <li><a href="#">Informasi TRLP3K</a></li>
								  <li><a href="#">Opini</a></li>
								  <li class="active">Detail</li>
								</ul>
								<h3 class="text-primary"><?=$data['opini_detail']['title']?></h3>
								<hr/>
								<?php if($data['opini_detail']['image']){?>
									<center><img src="<?=$basedomain?>public_assets/<?=$data ['opini_detail']['image']?>" width="448" height="336px"/></center>
								<?php } ?>
								<br>
								<small class="text-muted"><?=date2Ind($data['opini_detail']['postdate'])?></small>
								<p>
									<?=html_entity_decode($data['opini_detail']['content'])?>
								</p>
								
								<!--Pagination-->
				                <div class="text-center">
									<ul class="pagination blogs"></ul>
				                </div>
								
								<script type="text/javascript">
									var itemPerPage = 5;
									var data_html="";
									var data = $.ajax({
													type: 'POST',       
													url: basedomain+"berita/paging_opini_count",
													async:false,
													success: function(data) {
														return data;
													}
												}).responseText;
									var count = Math.ceil(data/itemPerPage);
									$('.blogs').bootpag({
									   total: count,
									   page: 1,
									   maxVisible: 5 
									}).on('page', function(event, num){
										// some ajax content loading...
										var start = itemPerPage*(num-1);
										var end = start+itemPerPage;
										$.ajax({
											type: 'GET',       
											url: basedomain+'berita/paging_opini_data/?start=' + start + '&end=' + end,
											async:false,
											dataType: 'json',
											success: function(data) {
												for(var i = 0;i < data.length; i++){
													data_html = data_html+'<tr>\
													<td>\
														<img src="img/berita.jpg" style="width:70px;height:70px">\
													</td>\
													<td>\
														<p class="time"><span class="label label-info">'+data[i].date+'</span></p>\
														<p class="username"><b>'+data[i].userid+'</b></p>\
														<p>'+data[i].comment+'</p>\
													</td>\
												</tr>';
											
												}
												$(".paging_opini_com").html(data_html);
												data_html = "";
											}
										});
									});
								</script>
				                <!--End Pagination-->
								<h4><?=$data['opini_comment_total']['total']?> Komentar</h4>
								<table class="paging_opini_com table table-striped table-hover">
									
									<?php
										if($data['opini_comment']){
											foreach ($data['opini_comment'] as $key => $value) {
									?>
									<tr>
										<td>
											<img src="<?=$basedomain?>public_assets/user/user_default/<?=$value['avatar']?>" style="width:70px;height:70px">
										</td>
										<td>
											<p class="time"><span class="label label-info"><?=date2Ind($value['date'])?></span></p>
											<p class="username"><b><?=$value['userid']?></b></p>
											<p><?=$value['comment']?></p>
										</td>
									</tr>
									<?php
											}
										}
									?>
									
									</table>

									<table class="paging_opini_com2 table table-striped table-hover">
									<tr>
										<td colspan="2">
											<h4>Berikan Komentar</h4>
										</td>
									</tr>
									<tr>
										<td>
											<img src="img/berita.jpg" style="width:70px;height:70px;margin-top:30px;">
										</td>
										<td>
											
											
											<form class="form-horizontal" id="800441944" style="margin-top:40px;">
												 <fieldset>
													<div class="form-group">
													  <label for="textArea" class="col-lg-2 control-label">Komentar</label>
													  <div class="col-lg-10">
														<textarea class="form-control" rows="3" id="textArea"></textarea>
														</div>
													</div>
													<div class="form-group">
													  <label for="inputNama" class="col-lg-2 control-label">Nama</label>
													  <div class="col-lg-10">
														<input type="text" class="form-control" id="inputEmail" placeholder="Nama">
													  </div>
													</div>
													<div class="form-group">
													  <label for="inputEmail" class="col-lg-2 control-label">Email</label>
													  <div class="col-lg-10">
														<input type="text" class="form-control" id="inputEmail" placeholder="Email">
													  </div>
													</div>
													<div class="form-group">
													  <label for="inputWebsite" class="col-lg-2 control-label">Website (optional)</label>
													  <div class="col-lg-10">
														<input type="text" class="form-control" id="inputEmail" placeholder="Website">
													  </div>
													</div>
													<div class="form-group">
													  <div class="col-lg-10 col-lg-offset-2">
														<button type="submit" class="btn btn-primary btn-sm">Berikan Komentar</button>
													  </div>
													</div>
												 </fieldset>
												 
											</div>
											
										</td>
									</tr>
								</table>
								
								
							</div>
							<div class="col-md-4">
								<?=$sidebar?>
							</div>
							
						</div>	
					
					</div>
					<div class="col-md-1"></div>
			</div>
			
			<div class="container-fluid" style="padding:0">