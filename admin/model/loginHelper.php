<?php
class loginHelper extends Database {
	
	function goLogin()
	{
		// pr($_POST);
		$username = _p('username');
		$password = _p('password');
		
		// pr($data);		
		
		$sql = "SELECT * FROM user_member WHERE username = '{$username}' AND usertype IN (1,2,3) LIMIT 1";
		// pr($sql);
		$res = $this->fetch($sql);
		// pr($res);
		// exit;
		if ($res){
			$salt = sha1($password.$res['salt']);
			// pr($salt);exit;
			if ($res['password'] == $salt){
				$_SESSION['user'] = $res;
				return true;
			}
		}		
		
		return false;
	}
	
	
}
?>