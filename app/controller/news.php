<?php

class news extends Controller {
	
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
		
		global $CONFIG;
		$data = "";
		// $data['news'] = $this->models->getNews();
		// if ($data){
			// foreach ($data['news'] as $key => $val){
			
				// $data['news'][$key]['encodeUri'] = $val['friendlyUrl'].$CONFIG['uri']['extension'];
				
			// }
		// }
		// pr($data);
		return $this->loadView('read', $data);
		
	}
	
	function read()
	{
		global $DATA;
		// pr($DATA);
		
		$myUri = $DATA['default']['uri']['det'];
		// $read['read'] = $this->models->readNews($myUri);
		// pr($read);
		
		return $this->loadView('read',$read);
	}
    
	
}

?>
