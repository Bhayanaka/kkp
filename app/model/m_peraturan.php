<?php
/* contoh models */

class m_peraturan extends Database {
	
	// getdata content berdasarkan limitnya
	public function getData_news_content_type_peraturan(){
		
		$query= "SELECT * FROM dtataruang_news_content_type_peraturan";
		
		$result= $this->fetch($query,1);
		
		return $result;
	}
	
}
?>
