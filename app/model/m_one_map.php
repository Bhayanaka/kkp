<?php
class m_one_map extends Database {
	
	public function getData_news($table,$categoryid=1,$articletype=1,$id=false){
		
		$query= "SELECT * FROM ".$table." Where categoryid='".$categoryid."' AND articletype='".$articletype."' AND n_status='1'";
		// pr($query);
		// exit;
		$result= $this->fetch($query,1);
		
		return $result;
	}
}
?>