<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class peraturan extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		$this->models = $this->loadModel('m_peraturan');
		$this->activityHelper = $this->loadModel('activityHelper');
	}
	
	public function index()
	{
		// $result_data = $this->models->getData_peraturan();
		$result_data_type_peraturan = $this->models->getData_news_content_type_peraturan();
		// $result_data_user = $this->models->getData_user();
		
		$data['kategori']=$result_data_type_peraturan;
		// $data['user']=$result_data_user;
		// $data['data']=$result_data;
		
		return $this->loadView('peraturan/peraturan-list',$data);
		// return $this->loadView('peraturan/peraturan-list');

	}
    
	function show(){
       
		// $data = $this->contentHelper->getData();
		// pr($data);
		return $this->loadView('home');

	}
	
	function formPeraturan()
	{	
		
		if(isset($_GET))
		{
			$id = form_validation($_GET);
			// pr($id);
			// exit;
			if(isset($id['id']) && count($id)!=0)
			{
			 
				$result_data_id_peraturan = $this->models->getIDData_peraturan($id['id']);
				$result_data_type_peraturan = $this->models->getData_news_content_type_peraturan();
			
		
				$data['kategori']=$result_data_type_peraturan;
		
				$data['edit']=$result_data_id_peraturan;
				
				return $this->loadView('peraturan/peraturan-input',$data);
				
			}else{
			
				$result_data_type_peraturan = $this->models->getData_news_content_type_peraturan();
				
				$data['kategori']=$result_data_type_peraturan;
				return $this->loadView('peraturan/peraturan-input',$data);
				
		    }
			
		}
		
	}
	
	function inputData()
	{	
		if(isset($_POST)){
			global $basedomain;
		   
			$x = form_validation($_POST);	
			
			   try
			   {
			   		if(isset($x) && count($x) != 0)
			   		{
						
						if (!empty($_FILES['image']['name']) ) {
							deletefile($x['image_hidden'],'');
							$files = uploadFile('image','peraturan'); 
							$data["image"]="peraturan/".$files['filename'];
							$OriFilename = $_FILES['image']['name'];		
						}
						else{
							$data["image"]=$_POST['image_hidden'];
							$OriFilename =$_POST['tags_hidden'];
						}
						
						$input_data_peraturan = $this->models->inputData_peraturan($x['id'],$x['title'],$x['deskripsi'],$OriFilename,'1',$x['articletype'],$x['createdate'],$x['postdate'],$x['fromwho'],$x['authorid'],'0',$data["image"]);
						if($input_data_peraturan['param'] == 'I'){
							$this->activityHelper->log('INSERT PERATURAN',$input_data_peraturan['id']);	
						}else{
							$this->activityHelper->log('UPDATE PERATURAN',$input_data_peraturan['id']);	
						}
					}
				}catch (Exception $e){}
				echo "<script>alert('Data Berhasil Disimpan');window.location.href='".$basedomain."peraturan'</script>";
		}
	
	
	}
	
	function change_status()
	{
	
		global $basedomain;
		if(isset($_GET)){
		
               $x = form_validation($_GET);
			  // pr($x);
			   // exit;
			   try
			   {
			   		if(isset($x) && count($x) != 0)
			   		{
					// echo "masukk";
					   $change_status_peraturan=$this->models->change_statusData_peraturan($x['id'],$x['n_status']);
					   
					}
				   	
			   }catch (Exception $e){}
			   
            }
			echo "<script>window.location.href='".$basedomain."peraturan'</script>";
	
	
	}
	
	function delete()
	{
		global $basedomain;
		if(isset($_GET)){
		
               $x = form_validation($_GET);
			   
			   try
			   {
			   		if(isset($x) && count($x) != 0)
			   		{
					
					   $delete_peraturan=$this->models->delData_peraturan($x['id']);
					   $this->activityHelper->log('DELETE PERATURAN',$delete_peraturan);	
					}
				   	
			   }catch (Exception $e){}
			   
            }
			echo "<script>alert('Data Berhasil Dihapus');window.location.href='".$basedomain."peraturan'</script>";
	}
}

?>
