<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class tabelKemajuan extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		$this->models = $this->loadModel('m_tabelKemajuan');
		// $this->contentHelper = $this->loadModel('m_profil');
	}
	
    //view sejarah
	function index()
	{
		$table="dtataruang_news_content";
		$categoryid="20";
		$data['result'] = $this->models->viewData($table,$categoryid);
		
		if($data['result']){
			return $this->loadView('tabelKemajuan/tabelKemajuan-input',$data);
		}else{
			return $this->loadView('tabelKemajuan/tabelKemajuan-input',$data);
		}		
		
	}
	//insert or edit sejarah
	public function input(){
		if(isset($_POST)){
			global $basedomain;
			
			$x = form_validation($_POST);	
			try
			   {
			   		if(isset($x) && count($x) != 0)
			   		{
						if (!empty($_FILES['img_strtr']['name']) ) {
							deleteFile($x['img_hidden'],'');
							$files = uploadFile('img_strtr','tabelProgres'); 
							$data["img_strtr"]="tabelProgres/".$files['filename']; 
						}
						else{
							$data["img_strtr"]=$_POST['img_hidden'];
						}
						$input_data_peraturan = $this->models->inputData($x['id'],$data["img_strtr"],$x['categoryid'],
																		$x['createdate'],$x['postdate'],$x['fromwho'],$x['authorid'],$x['n_status']);
					}
				}catch (Exception $e){}
		}
		echo "<script>alert('Data Berhasil Disimpan');</script>";
		redirect($basedomain.'tabelKemajuan');
		
	}
	
}

?>
