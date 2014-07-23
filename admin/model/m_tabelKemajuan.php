<?php
class m_tabelKemajuan extends Database {
	
	//view sejarah
	function viewData($table,$categoryid){
		$sql = "SELECT * FROM ".$table." WHERE categoryid='".$categoryid."' AND n_status='1' ";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	//insert or update sejarah
	function inputData($id,$image,$categoryid,$createdate,$postdate,$fromwho,$authorid,$n_status)
	{
		if($id){
			$query = "UPDATE dtataruang_news_content SET 
					image='".$image."',categoryid='".$categoryid."',createdate='".$createdate."',
					postdate='".$postdate."',fromwho='".$fromwho."',authorid='".$authorid."',n_status='".$n_status."' WHERE id='".$id."'";
		
		}else{
		
			$query = "INSERT INTO dtataruang_news_content (image,categoryid,createdate,postdate,fromwho,authorid,n_status) 
					VALUES ('".$image."','".$categoryid."','".$createdate."','".$postdate."','".$fromwho."','".$authorid."','".$n_status."')";
		}
		// pr($query);
		// exit;
		$result = $this->query($query);
		
	}
}
?>