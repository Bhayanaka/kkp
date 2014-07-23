		<div class="row-fluid head_cms">
			<div class="span7 head_cms_judul">
				<h3>CMS Portalsite Direktorat TRLP3K</h3>
			</div>
			<!--<div class="span5 ">
				<form class="form-search head_cms_search" align="right" style="margin-right:30px;">
					<input type="text" class="input-medium search-query" placeholder="Kata Kunci">
					<button type="submit" class="btn btn-primary">Cari</button>
				</form>
			</div>-->
		</div>
		<?php
		$userInfo = $this->getUser();
		?>
		<div class="row-fluid user_area">
			<div class="span9 foto_user">
					<img src="<?=$app_domain?>public_assets/user/<?=$_SESSION['user']['image_profile']?>"> 
							<span>Welcome, <?=$_SESSION['user']['name']?> as
							<?php 
								if($_SESSION['user']['usertype']=='1'){
									echo "Admin";
								}elseif($_SESSION['user']['usertype']=='2'){
									echo "Publisher";
								}else{
									echo "Operator";
								}
							?>							
							</span>
			</div>
			<?php $notif = $this->notification();?>
			<div class="span3 menu_user" align="right">
				<div style="margin-right:30px;">
					<div class="is_menu_user"  title="Logout" alt="Logout">
						<a href="<?=$basedomain?>logout.php" class="btn btn-danger" ><i class="icon-off icon-white"></i></a>
					</div>
					<?php /*
					<div class="is_menu_user"  title="Help" alt="Help">
						<a href="" class="btn btn-primary" ><i class="icon-question-sign icon-white"></i></a>
					</div>*/?>
					<div class="is_menu_user"  title="Profile" alt="Profile">
						<a href=" <?=$app_domain?>admin/user/edit/?id=<?php echo $_SESSION['user']['id'];?>" class="btn btn-primary" ><i class="icon-user icon-white"></i></a>
					</div>
					<div class="dropdown is_menu_user" title="Notification" alt="Notification">
						<a class="dropdown-toggle btn btn-primary" data-toggle="dropdown" href="javascript:;">
							<i class="icon-bell icon-white"></i>
						</a>
						<ul class="dropdown-menu" role="menu">
							<?php 
							if ($notif):
							foreach($notif as $val){ ?>
							<li>
								<a class="clearfix" href="#">
									<div class="detail">
										<strong><?=$val['username']?></strong>
										<p class="no-margin">
											<i><?=$val['title']?></i><br>
											<?=$val['activityValue']?>
										</p>
										<small class="text-muted"><?=date("d M Y",strtotime($val['datetimes']))?></small>
									</div>
								</a>
							</li>
							<?php } 
							endif;
							?>
							<li><a href="<?=$basedomain?>home/notif"><strong>View all notifications</strong></a></li>
						</ul>
						
					</div>
				</div>
			</div>
		</div>