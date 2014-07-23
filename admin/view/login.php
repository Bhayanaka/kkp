
	<div class="header_login">
			<div>CONTENT MANAGEMENT SYSTEM 
			<br/>Portalsite Direktorat TRLP3K
			</div>			
	</div>
		<img src="<?=$basedomain?>images/header-index.png" style="position:absolute;top:0;right:0;margin:10px"/>
		<div class="login_dashboard">
					
			<form method="post" action="<?=$basedomain?>login/local">
			<div class="lb_login">Username</div><input type="text" name="username" />
				<div class="wrapy"></div>
			<div class="lb_login">Password</div><input type="password" name="password"/><br/><br/>
			
			
		
			<input type="hidden" name="token" value="1" />
			<input type="submit" class="lb_login submit_login" value="Login" />
			</form>
			<br/>
			<br/>
			
