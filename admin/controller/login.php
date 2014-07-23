<?php

class login extends Controller {
	
	var $models = FALSE;
	var $sessi = null;
	
	public function __construct()
	{
		$this->loadmodule();
		
	}
	public function loadmodule()
	{
		$this->loginHelper = $this->loadModel('loginHelper');
		
		
	}
	
	
	
	public function index()
	{
		global $CONFIG;
		
		return $this->loadView('login');
	}
	
	function local()
	{
		global $CONFIG,$basedomain;
		if (_p('token')){
			
			echo $this->loadView('login-loader');
			
			$getUser = $this->loginHelper->goLogin();
			
			if ($getUser){
				redirect($basedomain.$CONFIG['admin']['default_view']);
			}else{
				redirect($basedomain.$CONFIG['admin']['login']);
			}
			
			exit;
		}
		
		return $this->loadView('login');
	}
	
	function register()
	{
		$data['username'] = _p('username');
		$data['password'] = _p('password');
		
		$getUser = $this->models->createUser($data);
		if ($getUser){
			return true;
		}
		return false;
	}
  
}

?>
