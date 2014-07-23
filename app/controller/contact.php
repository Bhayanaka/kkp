<?php

class contact extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		global $basedomain, $CONFIG;
		// $this->loadmodule();
		// if (!$this->isUserOnline()){
			
			// redirect($basedomain.$CONFIG['default']['login']);
		// }
	}
	public function loadmodule()
	{
		// $this->models = $this->loadModel('m_seismic');
	}
	
	public function index(){
	
		
		return $this->loadView('contact');
		
	}
    
	
}

?>
