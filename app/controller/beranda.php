<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class beranda extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
		$this->models = $this->loadModel('frontend');
		$this->contentHelper = $this->loadModel('contentHelper');
	}
	
	public function index(){
        
		$var = 'masuk';
		global $basedomain;
		$orderby=array('createdate','ASC');
		$result_data = $this->contentHelper->getData_news_content('dtataruang_news_content','17','',$orderby,'0','5');
		// pr($result_data);
		$data['data']=$result_data;
		$data['text'] = $this->contentHelper->getRunText();
		$data['tabel'] = $this->contentHelper->getTabel();
		return $this->loadView('beranda',$data);
		
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
