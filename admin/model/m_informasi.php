<?php
class m_informasi extends Database {
	
	function getData()
	{
		$sql = "SELECT * FROM tbl_news";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	public function getData_news($table,$categoryid=1,$articletype=1,$orderby,$batas=0,$item_per_page=5,$search=0){
		
		$query= "SELECT * FROM ".$table." Where categoryid='".$categoryid."' AND articletype='".$articletype."' AND n_status !='2' ORDER BY ".$orderby[0]." ".$orderby[1]." ";
		$result= $this->fetch($query,1);
	
		return $result;
	}
	
	public function getData_users($table){
		
		$query= "SELECT * FROM ".$table." ORDER BY id ASC";
		// pr($query);
		$result= $this->fetch($query,1);
	//pr($result);
	//	exit;
		return $result;
	}
	
	
	public function getData_opini($table,$categoryid=1,$articletype=1,$orderby,$batas=0,$item_per_page=5,$search=0){
		
		$query= "SELECT * FROM ".$table." Where categoryid='".$categoryid."' AND articletype='".$articletype."' AND n_status !='2' ORDER BY ".$orderby[0]." ".$orderby[1]."";

	// pr($query);
	//exit;
		$result= $this->fetch($query,1);
	//pr($result);
	//exit;
		return $result;
	}
	
	public function getData_agenda($table,$categoryid=1,$articletype=1,$orderby,$batas=0,$item_per_page=5,$search=0){
		
		$query= "SELECT * FROM ".$table." Where categoryid='".$categoryid."' AND articletype='".$articletype."' AND n_status !='2' ORDER BY ".$orderby[0]." ".$orderby[1]."";
		
		$result= $this->fetch($query,1);
	//pr($result);
	//exit;
		return $result;
	}
	
	public function insert_berita($table,$data){
		
		if($data['id']){	
			$query="UPDATE ".$table." SET title='".$data['title']."',brief='".addslashes(html_entity_decode($data['brief']))."',content='".addslashes(html_entity_decode($data['content']))."',image='".$data['image']."',postdate='".$data['postdate']."',fromwho='".$data['fromwho']."',authorid='".$data['authorid']."',n_status='".$data['n_status']."' WHERE id='".$data['id']."'";
			$result['data'] = $this->query($query);
			$result['param'] = 'U';
			$result['id'] = $data['id'];
			
		}else{			
			$query= "INSERT INTO ".$table." (title,brief,content,image,postdate,createdate,categoryid,articletype,fromwho,authorid,n_status) 
					values 
					('{$data ['title']}','".addslashes(html_entity_decode($data ['brief']))."','".addslashes(html_entity_decode($data['content']))."', '{$data ['image']}', '{$data ['postdate']}', '{$data ['createdate']}','{$data ['categoryid']}','{$data ['articletype']}','{$data ['fromwho']}','{$data ['authorid']}','{$data ['n_status']}')";
			$result['data'] = $this->query($query);
			$result['param'] = 'I';
			$query_sel ="SELECT max(id) FROM ".$table."";
			$hasil = $this->fetch($query_sel,1);
			$result['id'] = $hasil[0]['max(id)'];
		}
		return $result;
	}
	
	
	public function insert_opini($table,$data){
		
		if($data ['id']){	
			$query="UPDATE ".$table." SET title='".$data['title']."',brief='".addslashes(html_entity_decode($data['brief']))."',content='".addslashes(html_entity_decode($data['content']))."',image='".$data['image']."',postdate='".$data['postdate']."',fromwho='".$data['fromwho']."',authorid='".$data['authorid']."',n_status='".$data['n_status']."' WHERE id='".$data['id']."'";
			$result['data'] = $this->query($query);
			$result['param'] = 'U';
			$result['id'] = $data['id'];
		}else{			
			$query= "INSERT INTO ".$table." (title,brief,content,image,postdate,createdate,categoryid,articletype,fromwho,authorid,n_status) values ('{$data ['title']}','".addslashes(html_entity_decode($data['brief']))."','".addslashes(html_entity_decode($data['content']))."', '{$data ['image']}', '{$data ['postdate']}', '{$data ['createdate']}','{$data ['categoryid']}','{$data ['articletype']}','{$data ['fromwho']}','{$data ['authorid']}','{$data ['n_status']}')";
			$result['data'] = $this->query($query);
			$result['param'] = 'I';
			$query_sel ="SELECT max(id) FROM ".$table."";
			$hasil = $this->fetch($query_sel,1);
			$result['id'] = $hasil[0]['max(id)'];
		}
		return $result;
	}
	
	public function insert_agenda($table,$data){
		
		if($data ['id']){	
			$query="UPDATE ".$table." SET title='".$data['title']."',brief='".addslashes(html_entity_decode($data['brief']))."',content='".addslashes(html_entity_decode($data['content']))."',image='".$data['image']."',postdate='".$data['postdate']."',fromwho='".$data['fromwho']."',authorid='".$data['authorid']."',n_status='".$data['n_status']."' WHERE id='".$data['id']."'";
			$result['data'] = $this->query($query);
			$result['param'] = 'U';
			$result['id'] = $data['id'];
		}else{			
			$query= "INSERT INTO ".$table." (title,brief,content,image,postdate,createdate,categoryid,articletype,fromwho,authorid,n_status) values ('{$data ['title']}','".addslashes(html_entity_decode($data['brief']))."','".addslashes(html_entity_decode($data['content']))."', '{$data ['image']}', '{$data ['postdate']}', '{$data ['createdate']}','{$data ['categoryid']}','{$data ['articletype']}','{$data ['fromwho']}','{$data ['authorid']}','{$data ['n_status']}')";
			$result['data'] = $this->query($query);
			$result['param'] = 'I';
			$query_sel ="SELECT max(id) FROM ".$table."";
			$hasil = $this->fetch($query_sel,1);
			$result['id'] = $hasil[0]['max(id)'];
		}
		return $result;
	}
	
	
	public function getID($table,$id){
		
		$query= "SELECT * FROM ".$table." Where id=$id";
		//pr($query);
		$result= $this->fetch($query,1);
	//pr($result);
	//	exit;
		return $result;
	}
	
	public function change_status($id,$n_status)
	{
		if($n_status=='0'){
			$query="UPDATE dtataruang_news_content SET n_status='1' WHERE id=".$id."";
		}elseif($n_status=='1'){	
			$query="UPDATE dtataruang_news_content SET n_status='0' WHERE id=".$id."";
		}

		$result = $this->query($query);
		// pr($result);
		// exit;
		return $result;
		
	}
	public function hapus($id)
	{
		$query="UPDATE dtataruang_news_content SET n_status='2' WHERE id=".$id."";
	
		$result= $this->query($query);
		
		return $id;
		
	}
}
?>