<?php
class userHelper extends Database {
	
	function __construct()
	{
		$this->salt = "codekir-v0.3";
	}
	
	function getListUser($id=false)
	{
		
		$filter = "";
		if ($id){
			$filter = " AND id = {$id}";
		}
		
		$sql = "SELECT * FROM user_member WHERE n_status = 1 {$filter}";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	function addUser()
	{
		$nama = _p('nama');
		$username = _p('username');
		$password = _p('password');
		$email = _p('email');
		$level = _p('level');
		
		$encryptPass = sha1($password.$this->salt);
		
		$sql = "INSERT INTO user_member (name, email, username, password, usertype, salt, n_status) VALUES 
				('{$nama}','{$email}', '{$username}', '{$encryptPass}', {$level}, '{$this->salt}', 1)";
		$res = $this->query($sql);
		
		if ($res){
			
			$sql = "SELECT id FROM user_member ORDER by id DESC LIMIT 1";
			$res = $this->fetch($sql);
			if ($res['id']) return $res['id'];
		}
		
		return false;
	}
	
	function updateUserImage($image=null,$id=false)
	{
		
		if ($image==null) return false;
		if (!$id) return false;
		
		$sql = "UPDATE user_member SET image_profile = '{$image}' WHERE id = {$id} LIMIT 1";
		// pr($sql);
		$res = $this->query($sql);
		if ($res) return true;
		return false;
	}
	
	function deleteUser($id=false)
	{
		if (!$id) return false;
		$sql = "UPDATE user_member SET n_status = 2 WHERE id = {$id} LIMIT 1";
		$res = $this->query($sql);
		if ($res) return true;
		return false;
	}
	
	function updateUserProfile($data=false,$userid)
	{
		// if (!$data) return false;
		
		// $count = count($data);
		// if ($count<=0) return false;
		// pr($data);
		// exit;
		$password = _p('password');
		
		$arrayField = array('name','email','usertype');
		foreach ($_POST as $key => $val){
			if (in_array($key, $arrayField)){
				if ($val!=''){
					$newArr[] = "{$key} = "."'{$val}'";
				}
			}
		}
		// pr($newArr);
		// exit;
		$sql = "SELECT salt FROM user_member WHERE id = {$userid}";
		
		$res = $this->fetch($sql);
		
		if ($res){
			$encryptPass = sha1($password.$res['salt']);
		}else{
			$encryptPass = sha1($password.$this->salt);
		}
		
		
		if ($password!=""){
			$newArr[] = "password = '{$encryptPass}'";
		}
		
		$field = implode(',',$newArr);
		// pr($field);
	
		$sql = "UPDATE user_member SET {$field} WHERE id = {$userid} LIMIT 1";
		// pr($sql);
		// exit;
		$res = $this->query($sql);
		if ($res) return $userid;
		return false;
	}
}
?>