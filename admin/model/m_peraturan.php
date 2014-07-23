<?php
class m_peraturan extends Database {
	

	
	public function getData_news_content_type_peraturan(){
		
		$query= "SELECT * FROM dtataruang_news_content_type_peraturan";
		
		$result= $this->fetch($query,1);
		
		return $result;
	}
	
	// public function getData_kategori(){
		
		// $query= "SELECT * FROM dtataruang_news_content_type_peraturan";
		
		// $result= $this->fetch($query,1);
		
		// return $result;
	// }
	
	public function getData_peraturan()
	{
		$sql = "SELECT * FROM dtataruang_news_content_peraturan WHERE n_status='1' or n_status='0'";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	
	public function getData_user()
	{
		$sql = "SELECT * FROM user_member WHERE n_status='1'";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	public function getIDData_peraturan($id)
	{
		$sql = "SELECT * FROM dtataruang_news_content_peraturan WHERE id=".$id."";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	
	public function inputData_peraturan($id,$title,$deskripsi,$OriFilename,$categoryid,$articletype,$createdate,$postdate,$fromwho,$authorid,$n_status,$image)
	{
		if($id){
		 
			$query= "UPDATE dtataruang_news_content_peraturan SET title='".$title."',deskripsi='".slash($deskripsi)."', tags = '".$OriFilename."' ,categoryid='".$categoryid."',articletype='".$articletype."',createdate='".$createdate."',postdate='".$postdate."',fromwho='".$fromwho."',authorid='".$authorid."',files='".$image."' WHERE id='".$id."'";
			$result['data'] = $this->query($query);
			$result['param'] = 'U';
			$result['id'] = $id;
		}else{
		
			$query= "INSERT INTO dtataruang_news_content_peraturan (title,deskripsi,tags,categoryid,articletype,createdate,postdate,fromwho,authorid,n_status,files) VALUES ('".$title."','".slash($deskripsi)."','".$OriFilename."','".$categoryid."','".$articletype."','".$createdate."','".$postdate."','".$fromwho."','".$authorid."','".$n_status."','".$image."')";
			$result['data'] = $this->query($query);
			$result['param'] = 'I';
			$query_sel ="SELECT max(id) FROM dtataruang_news_content_peraturan";
			$hasil = $this->fetch($query_sel,1);
			$result['id'] = $hasil[0]['max(id)'];
		}
		return $result;
	}
	
	function updateUserImage($image=null,$id=false)
	{
		
		if ($image==null) return false;
		if (!$id) return false;
		
		$sql = "UPDATE dtataruang_news_content_peraturan SET files = 'peraturan/{$image}' WHERE id = {$id} LIMIT 1";
		
		$res = $this->query($sql);
		if ($res) return true;
		return false;
	}
	
	public function delData_peraturan($id)
	{
		$query="UPDATE dtataruang_news_content_peraturan SET n_status='2' WHERE id=".$id."";
	
		$result = $this->query($query);
		
		return $id;
		
	}
	
	public function change_statusData_peraturan($id,$status)
	{
		if($status=='0'){
			$query="UPDATE dtataruang_news_content_peraturan SET n_status='1' WHERE id=".$id."";
		}elseif($status=='1'){	
			$query="UPDATE dtataruang_news_content_peraturan SET n_status='0' WHERE id=".$id."";
		}
		$result = $this->query($query);
		
		return $result;
		
	}
	
	
}
?>