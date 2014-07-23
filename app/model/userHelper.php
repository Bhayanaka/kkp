<?php
class userHelper extends Database {
	
	function getEmailToken($email)
	{
		$sql = "SELECT token  FROM user_member WHERE email = '{$email}' AND usertype =0 AND n_status = 2 LIMIT 1";
		// pr($sql);
		$res = $this->fetch($sql);
		if ($res) return $res;
		return false;
	}

	function updateUserStatus($email)
	{
		$sql = "UPDATE user_member SET n_status = 1 WHERE email = '{$email}' AND n_status = 2 LIMIT 1";
		// pr($sql);
		$res = $this->query($sql);
		if ($res) return $res;
		return false;
	}


	function comment($contentid=null, $comment=null)
	{

		$userid = $_SESSION['member']['id'];
		$date = date('Y-m-d H:i:s');

		$query = "INSERT INTO dtataruang_news_content_comment (userid,contentid,comment,`date`,n_status) 
					VALUES ({$userid}, '{$contentid}', ".addslashes(html_entity_decode($comment))."' , '{$date}',1)";
		// pr($query);
		// exit;
		$result = $this->query($query);
		if ($result) return true;
		return false;
		 
	}

	function count_comment()
	{
		$query = "SELECT COUNT(*) as total FROM dtataruang_news_content_comment WHERE n_status='1'";
		$result = $this->fetch($query);
		return $result; 
	}

	function get_all_comment($start=0,$end=5)
	{
		$query = "SELECT * FROM dtataruang_news_content_comment WHERE n_status='1' ORDER BY date DESC LIMIT {$start},{$end}";
		$result = $this->fetch($query,1);
		foreach ($result as $key => $value) {
			$result[$key]['date'] = date2Ind($value['date']);
		}
		return $result; 
	}

	function registerMember($data=array())
	{

		global $basedomain;

		$name = $data['name'];
		$email = $data['email'];
		$passTmp = $data['password'];

		$salt = "m3mb312";
		$password = sha1($passTmp.$salt);
		$tmp['email'] = $email;
		$tmp['token'] = sha1($email);
		// $Tmptoken = serialize($tmp);
		$token = encode(serialize($tmp));

		$query = "INSERT INTO user_member (name,email,password,usertype,salt,n_status,token) 
					VALUES ('{$name}','{$email}','{$password}',0,'{$salt}',2,'{$tmp['token']}')";
		// pr($query);
		// exit;
		$result = $this->query($query);
		if ($result){

			
			$html = "Hi !";
			$html .= "Member yang terhormat, <br>Email Anda yaitu, ".$email." sudah didaftarkan pada sistem kkp. Untuk mengaktifkan account kkp Anda, silahkan klik link aktivasi <br><a href='".$basedomain."register/validate/?ref=".$token."'>berikut ini</a>Jika link di atas tidak dapat diklik, silahkan copy-paste link tersebut ke browser Anda.<br>Salam,";
			sendMail($email,'[ NOTIFICATIONS ]', $html);
		
			// sleep(1);
			// echo 'mail sent';exit;
			return true;
		}

		return false;
	}


	function goLogin()
	{
		// pr($_POST);
		$email = _p('email');
		$password = _p('password');
		
		// pr($data);		
		$data['status'] = false;
		
		$sql = "SELECT *  FROM user_member WHERE email = '{$email}' AND usertype =0 AND n_status = 1 LIMIT 1";
		// pr($sql);
		$res = $this->fetch($sql);
		// pr($res);
		// exit;
		if ($res){
			
			
			$salt = sha1($password.$res['salt']);
			// pr($res['password']);
			// pr($salt);
			if ($res['password'] == $salt){
				
				$loginCount = $res['login_count'] +1;
				$lastLogin = date('Y-m-d H:i:s');
				
				$sqlu = "UPDATE user_member SET last_login = '{$lastLogin}' ,login_count = {$loginCount} WHERE id = {$res['id']} LIMIT 1";
				$result = $this->query($sqlu);
				
				$_SESSION['member'] = $res;
				// $this->set_session->set_session($res);
				// $data['data'] = $res;
				// $data['status'] = true;
				
				return true;
			}
		}		
		
		return $data;
	}
	

	

}
?>