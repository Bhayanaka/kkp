<?php
class m_profil extends Database {
	
	//view sejarah
	function viewData_sejarah($table,$categoryid,$articletype){
		$sql = "SELECT * FROM ".$table." WHERE categoryid='".$categoryid."' AND articletype='".$articletype."' AND n_status='1' ";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	//insert or update sejarah
	function inputData_sejarah($id,$title,$content,$image,$categoryid,$articletype,$createdate,$postdate,$fromwho,$authorid,$n_status,$img_hidden)
	{
		if($id){
			$query = "UPDATE dtataruang_news_content SET 
					title='".$title."',content='".addslashes(html_entity_decode($content))."',image='".$image."',categoryid='".$categoryid."',articletype='".$articletype."',
					createdate='".$createdate."',postdate='".$postdate."',fromwho='".$fromwho."',authorid='".$authorid."',n_status='".$n_status."' WHERE id='".$id."'";
		
		}else{
		
			$query = "INSERT INTO dtataruang_news_content (title,content,image,categoryid,articletype,createdate,postdate,fromwho,authorid,n_status) 
					VALUES ('".$title."','".addslashes(html_entity_decode($content))."','".$image."','".$categoryid."','".$articletype."','".$createdate."','".$postdate."','".$fromwho."','".$authorid."','".$n_status."')";
		}
		// pr($query);
		// exit;
		$result = $this->query($query);
		
	}
	
	//view struktur organisasi
	function viewData_struktur($table,$categoryid,$articletype){
		$sql = "SELECT * FROM ".$table." WHERE categoryid='".$categoryid."' AND articletype='".$articletype."' AND n_status='1' ";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	//insert or update struktur organisasi
	function inputData_struktur($id,$title,$content,$image,$categoryid,$articletype,$createdate,$postdate,$fromwho,$authorid,$n_status,$img_hidden)
	{
		if($id){
			$query= "UPDATE dtataruang_news_content SET 
					title='".$title."',content='".addslashes(html_entity_decode($content))."',image='".$image."',categoryid='".$categoryid."',articletype='".$articletype."',
					createdate='".$createdate."',postdate='".$postdate."',fromwho='".$fromwho."',authorid='".$authorid."',n_status='".$n_status."' WHERE id='".$id."'";
		
		}else{
		
			$query= "INSERT INTO dtataruang_news_content (title,content,image,categoryid,articletype,createdate,postdate,fromwho,authorid,n_status) 
					VALUES ('".$title."','".addslashes(html_entity_decode($content))."','".$image."','".$categoryid."','".$articletype."','".$createdate."','".$postdate."','".$fromwho."','".$authorid."','".$n_status."')";
		}
			$result = $this->query($query);
		
	}
	
	//view tupoksi
	function viewData_tupoksi($table,$categoryid,$articletype){
		$sql = "SELECT * FROM ".$table." WHERE categoryid='".$categoryid."' AND articletype='".$articletype."' AND n_status='1' ";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	//insert or update tupoksi
	function inputData_tupoksi($id,$title,$content,$categoryid,$articletype,$createdate,$postdate,$fromwho,$authorid,$n_status)
	{
		if($id){
			$query= "UPDATE dtataruang_news_content SET 
					title='".$title."',content='".addslashes(html_entity_decode($content))."',categoryid='".$categoryid."',articletype='".$articletype."',
					createdate='".$createdate."',postdate='".$postdate."',fromwho='".$fromwho."',authorid='".$authorid."',n_status='".$n_status."' WHERE id='".$id."'";
		
		}else{
		
			$query= "INSERT INTO dtataruang_news_content (title,content,categoryid,articletype,createdate,postdate,fromwho,authorid,n_status) 
					VALUES ('".$title."','".addslashes(html_entity_decode($content))."','".$categoryid."','".$articletype."','".$createdate."','".$postdate."','".$fromwho."','".$authorid."','".$n_status."')";
		}
		// pr($query);
		// exit;
		$result = $this->query($query);
		
	}
	
	
	
	
}
?>