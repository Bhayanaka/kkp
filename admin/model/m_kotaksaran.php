<?php
class m_kotaksaran extends Database {
	
	//view sejarah
	function viewData($table,$categoryid,$articletype){
		$sql = "SELECT * FROM ".$table." WHERE categoryid='".$categoryid."' AND n_status='1' ";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	function update_status($table_select,$id,$st){
		$query = "UPDATE ".$table_select." SET n_status=".$st." WHERE id =".$id."";
		// pr($query);
		$result = $this->query($query);
		return $result;
	}
}
?>