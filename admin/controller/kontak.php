<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class kontak extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
		 $this->models = $this->loadModel('m_kontak');
		 $this->activityHelper = $this->loadModel('activityHelper');
	}
	
	public function index(){
       
		$data['isi']= $this->models->getData_kontak();
	   
		$data['menu'] = $this->loadView('berita/informasi-berita-menu');
		
		return $this->loadView('kontak',$data);

	}
    
	function inputData() 
	{
		if (isset($_POST)){
			$x = form_validation($_POST);
			
			try {
			
				if (isset($x) && count($x) !=0) {
				
				// $uploadImage['status'] = false;
				// if ($_FILES['image']['name']!="")$uploadImage = uploadFile('image','kontak');
				/*if (!empty($_FILES['image']['name']) ) {
							$files = uploadFile('image','kontak'); 
							$data["image"]="kontak/".$files['filename']; 
						}
						else{
							$data["image"]=$_POST['img_hidden'];
						}*/
				// $input_data_kontak = $this->models->inputData_kontak($x['id'],$x['createdate'],$x['content'],$data["image"]);
				$input_data_kontak = $this->models->inputData_kontak($x['id'],$x['createdate'],$x['content']);
				if($input_data_kontak['param'] == 'I'){
						$this->activityHelper->log('INSERT KONTAK',$input_data_kontak['id']);	
					}else{
						$this->activityHelper->log('UPDATE KONTAK',$input_data_kontak['id']);	
					}
				}
			} catch (Exception $e) {}
		}
		echo "<script>alert('Data Berhasil Disimpan');document.location='index';</script>";
	}
	
	
}

?>
