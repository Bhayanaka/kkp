<?php

class specimen extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		global $basedomain, $CONFIG;
		$this->loadmodule();
		// if (!$this->isUserOnline()){
			
			// redirect($basedomain.$CONFIG['default']['login']);
		// }
	}
	public function loadmodule()
	{
		// $this->models = $this->loadModel('contentHelper');
	}
	
	public function index(){
	
		
		return $this->loadView('specimen');
		
	}
    
	function listSpecimen()
	{
		// $getNews = $this->models->getNews();
		if ($getNews){
			print json_encode(array('status'=>true,'data'=>$getNews));
		}else{
			print json_encode(array('status'=>false));
		}
			
		exit;
	}
	
	function ada()
	{
		echo 'masuk';
		pr($_GET);
	}
	
}

?>
