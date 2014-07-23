<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class gallery extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
		// $this->models = $this->loadModel('frontend');
	}
	
	public function index(){
        
		$var = 'masuk';
		pr($var);
		// exit;
		return $this->loadView('agenda');

	}
     
	public function foto(){
        
		$var = 'foto';
		pr($var);
		exit;
		return $this->loadView('agenda');

	}
	
	public function video(){
        
		$var = 'video';
		pr($var);
		// exit;
		return $this->loadView('agenda');

	}
	
	public function tangkap(){
		if(isset($_POST)){
			// validasi value yang masuk
		   $x = form_validation($_POST);
		   
		   $data['input'] = $this->models->inputData($x['id'],$x['nama'],$x['alamat']);
		   
		   /* tampung kembalian data dari fungsi yang dipanggil */
			//$data['frontend'] = $this->models->get_data_desc();
		   if($data['input'])
		   {
			   //return $this->loadView('display');
			   global $CONFIG;
			   redirect($CONFIG['default']['base_url']."display");
		   }else {
			   echo "gagal";
		   }
		   
		   //pr($x);
		}
	}
	
}

?>
