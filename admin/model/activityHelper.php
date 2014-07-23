<?php
class activityHelper extends Database {
	
	var $session;
	var $db;
	var $user;
	
	function __construct()
	{
		
		$this->prefix = "code";
		// $this->db = $db;
		// $this->session = $db->sessi->get_session();
		// $this->user = $_SESSION['user'];
	}
	
	function log($page=true, $activity=true)
	{
		
		// pr($_SESSION);
		$sql = "SELECT id FROM {$this->prefix}_activity WHERE activityValue = '{$page}' LIMIT 1";
		// pr($sql);
		$res = $this->fetch($sql);
		// pr($res);
		if ($res){
			
			$date = date('Y-m-d H:i:s');
			$ipcource = $_SERVER["REMOTE_ADDR"];
			$userid = intval($_SESSION['user']['id']);
			// pr($userid);
			
			$ins = "INSERT INTO  {$this->prefix}_activity_log (userid, activityId, activityDesc, source, datetimes,n_status)
					VALUES ({$userid}, {$res['id']}, '{$activity}', '{$ipcource}', '{$date}', 1)";
			// pr($ins);
			$result = $this->query($ins);
			// pr($result);
			// exit;
		}
	}
	
	function getNotif($id=false)
	{
		$query = "SELECT log.*,ca.activityValue,ca.activityId FROM code_activity_log log LEFT JOIN code_activity ca 
					ON log.activityId=ca.id WHERE log.userid!={$id} AND log.n_status != 0 ORDER BY datetimes DESC LIMIT 5";
		$result = $this->fetch($query,1);
		foreach($result as $key=>$res){
			$sql = "SELECT username FROM user_member WHERE id = {$res['userid']}";
			$user = $this->fetch($sql);
			$result[$key]['username'] = $user['username'];
			
			if($res['activityId']==1)$table="dtataruang_news_content";
			elseif($res['activityId']==2)$table="dtataruang_news_content_norma";
			elseif($res['activityId']==3)$table="dtataruang_news_content_peraturan";
			elseif($res['activityId']==4)$table="dtataruang_news_content_product";
			elseif($res['activityId']==5)$table="dtataruang_news_content_program";
			elseif($res['activityId']==6)$table="dtataruang_news_content_sig";
			elseif($res['activityId']==7)$table="dtataruang_news_content_sig";
			elseif($res['activityId']==8)$table="user_member";
			
			$sql = "SELECT title FROM {$table} WHERE id = {$res['activityDesc']}";
			$title = $this->fetch($sql);
			$result[$key]['title'] = $title['title'];
		}
		if ($result) return $result;
		return false;
	}
	
}
?>