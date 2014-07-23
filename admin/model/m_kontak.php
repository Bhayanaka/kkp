<?php
class m_kontak extends Database {
	

	
	public function getData_kontak(){
		
		$query= "SELECT content,image,id,createdate FROM dtataruang_news_content WHERE categoryid='8' AND articletype='1' AND n_status='1'";
		
		$result= $this->fetch($query,1);
		
		return $result;
	}
	
	function inputData_kontak($id,$createdate,$content){
		
		if($id){
			$query = "UPDATE dtataruang_news_content SET content='".slash($content)."' WHERE categoryid='8' AND articletype='1' AND n_status='1' and id =$id";
			$result['data'] = $this->query($query);
			$result['param'] = 'U';
			$result['id'] = $id;
		}else{
			$query = "INSERT INTO dtataruang_news_content(createdate,content,categoryid,articletype,n_status) VALUES ('".$createdate."','".slash($content)."','8','1','1')";
			$result['data'] = $this->query($query);
			$result['param'] = 'I';
			$query_sel ="SELECT max(id) FROM dtataruang_news_content";
			$hasil = $this->fetch($query_sel,1);
			$result['id'] = $hasil[0]['max(id)'];
		}
		return $result;

	}

	// function updateUserImage ($image=null,$id=false){
		
		// if ($image==null) return false;
		// if (!$id) return false;
		
		// $sql = "UPDATE dtataruang_news_content SET image='kontak/{$image}' WHERE id={$id} LIMIT 1";
		// $kon = $this->query($sql);
		// if ($kon) return true;
		// return false;
	// }
			
}
?>