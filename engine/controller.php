<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class Controller extends Application{
	
	
	var $GETDB = null;
	public function __construct(){
		
		parent::__construct();
		
		$this->loadModel('helper_model');
	}
	
	function index()
	{
		
		global $CONFIG, $LOCALE, $basedomain, $title, $DATA, $app_domain;
		$filePath = APP_CONTROLLER.$this->page.$this->php_ext;
		$pages=$this->page;
		if (file_exists($filePath)){
			
			if ($DATA[$this->configkey]['page']!=='login'){
				
				if (array_key_exists('admin',$CONFIG)) {
					if (!isset($_SESSION['user'])){
						redirect($basedomain.$CONFIG[$this->configkey]['login']);
						exit;
					}
				}
			}
			if ($DATA[$this->configkey]['page']=='login'){
				if ($this->isUserOnline()){
				redirect($CONFIG[$this->configkey]['default_view']);
				exit;
				}
			}
			
			include $filePath;
			
			$createObj = new $this->page();
			
			$content = null;
			if (method_exists($createObj, $this->func)) {
				
				$function = $this->func;
				
				$content = $createObj->$function();
				
			} else {
				
				if ($CONFIG[$this->configkey]['app_debug'] == TRUE) {
					show_error_page($LOCALE[$this->configkey]['error']['debug']); exit;
				} else {
					
					redirect($CONFIG[$this->configkey]['base_url']);
					
				}
				
			}
			
			$masterTemplate = APP_VIEW.'master_template'.$this->php_ext;
			if (file_exists($masterTemplate)){
				
				$title = $this->page;
				
				include $masterTemplate;
			
			}else{
				
				show_error_page($LOCALE[$this->configkey]['error']['missingtemplate']); exit;
			}
			
		}
		
	}
	
	function isUserOnline()
	{
		$session = new Session;
		
		$userOnline = @$_SESSION['user'];
		
		if ($userOnline){
			return $userOnline;
		}else{
			return false;
		}
		
	}
	
	function loadLeftView($fileName, $data="")
	{
		global $CONFIG, $basedomain;
		$php_ext = $CONFIG[$this->configkey]['php_ext'];
		
		if ($data !=''){
			/* Ubah subkey menjadi key utama */
			foreach ($data as $key => $value){
				$$key = $value;
			}
		}
		
		
		/* include file view */
		if (is_file(APP_VIEW.$fileName.$php_ext)) {
			if ($fileName !='') $fileName = $fileName.'.php';
			include APP_VIEW.$fileName;
			
			return ob_get_clean();
		
		}else{
			show_error_page('File not exist');
			return FALSE;
		}
		
		//return TRUE;
	}
	
	
	/* under develope */
	function assign($key, $data)
	{
		return array($key => $data);
	}
	
	function getModelHelper($param=false)
	{
		
		/* 
			Panggil helper model berdasarkan parameter 
			hahahahaha
		*/
		//pr($param);
		
			//$getDB = $this->loadModel('helper_model');
		
		$showFunct = $this->GETDB->getData_sel($param);
		
		if ($showFunct) return $showFunct;
		return false;
	}
	
	function validatePage()
	{
		global $basedomain, $CONFIG, $DATA;
		if (!$this->isUserOnline()){
			
			redirect($basedomain.$CONFIG[$this->configkey]['login']);
			exit;
		}else{
		
			if ($DATA[$this->configkey]['page'] == $CONFIG[$this->configkey]['login']){
				
				redirect($basedomain.$CONFIG[$this->configkey]['default_view']);
				exit;
			}
		}
		
		
	}
	
	public function loadMHelper()
	{
		$this->GETDB = $this->loadModel('helper_model');
		return $this->GETDB;
	}
	
	/*Function Untuk Meload jumlah Data*/
	function loadCountData($table,$categoryid=false,$articletype,$condition=false)

	{
		
		//	memanggil helper model yang sudah ada pada $GETDB
		if (!$this->GETDB)$this->GETDB = new helper_model();
		//	memanggil funtion getCountData yang terdapat pada model helper_model
		$data = $this->GETDB->getCountData($table,$categoryid,$articletype,$condition);
		
		$this->GETDB = null;
		if ($data) return $data;
		return false;
	}
	
	function loadCountData_search($table,$search=false)
	{
		//	memanggil helper model yang sudah ada pada $GETDB
		if (!$this->GETDB)$this->GETDB = new helper_model();
		//	memanggil funtion getCountData yang terdapat pada model helper_model
		$data = $this->GETDB->getCountData_search($table,$search);
		
		$this->GETDB = null;
		if ($data) return $data;
		return false;
	}
	
	function sidebar($table,$content=1, $type=false, $start=0, $limit=5)
	{
		/*
		content = categoryID
		type 	= articleType
		start 	= paging start
		Limit 	= paging limit
		*/
		
		if (!$this->GETDB)$this->GETDB = new helper_model();
		$helper = $this->GETDB->getSidebar($table,$content, $type, $start, $limit);
		if ($helper) return $helper;
		return false;
	}
	
	function notification()
	{
		if(!class_exists('activityHelper')) {$activityHelper = $this->loadModel('activityHelper');}
		else $activityHelper = new activityHelper();
		$helper = $activityHelper->getNotif($_SESSION['user']['id']);
		if ($helper) return $helper;
		return false;
		
		if ($helper) return $helper;
		return false;
	}
	
	function getUser()
	{
		if(!class_exists('userHelper')) {$this->userHelper = $this->loadModel('userHelper');}
		else $this->userHelper = new userHelper();
		
		$userID = $_SESSION['user']['id'];
		$userInfo = $this->userHelper->getListUser($userID);
		if ($userInfo) return $userInfo;
		return false;
	}
}

?>
