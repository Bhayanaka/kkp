<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class slideshow extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
		$this->contentHelper = $this->loadModel('contentHelper');
		$this->models = $this->loadModel('m_slide');
		$this->activityHelper = $this->loadModel('activityHelper');
	}
	
	public function index(){
       
		// $data = $this->contentHelper->getData();
		// pr($data);
		// $this->activityHelper->log('surf','insert data program');	
		// return $this->loadView('slideshow/slideshow-list');

	}
  
	//update status program
	public function status_slide(){
		global $basedomain;
	    $id=$_GET['id'];
		$status = $_GET['status_slide'];
		if($status =='0'){
			$st = '1';
		}elseif($status =='1'){
			$st = '0';
		}
		$table_select="dtataruang_news_content";
		$data['status']= $this->models->update_status($table_select,$id,$st);
		echo "<script>window.location.href='".$basedomain."slideshow/slide_view'</script>";	
	}
	
    //view Program
	public function slide_view(){
		// $table_select="dtataruang_news_content";
		// $table_user="user_member";
		// $categoryid="17";
		// $data['result']= $this->models->viewData($table_select,$categoryid);
		// $data['user']= $this->models->viewUser($table_user);
		// pr($data['result']);
		// pr($data['user']);
		// return $this->loadView('slideshow/slideshow-list',$data);
		return $this->loadView('slideshow/slideshow-list');

	}
	
	public function add()
	{
	
		//SIG Peta Pola Ruang = 12
		if(isset($_GET))
		{
			$id = form_validation($_GET);
			if(isset($id['id']) && count($id)!=0)
			{	
				$id = $id['id'];
				// echo $id; 
				$table_select="dtataruang_news_content";
				$categoryid="17";
				$data['result']= $this->models->viewData_cond_id($table_select,$categoryid,$id);
				// pr($data['result']);	
				return $this->loadView('slideshow/slideshow-input',$data);
			}else{
				
				return $this->loadView('slideshow/slideshow-input');
			}	
		}
	}
	
	public function inputData(){
		if(isset($_POST)){
			// pr($_POST);
			// exit;
			$x = form_validation($_POST);	
			try
			   {
			   		if(isset($x) && count($x) != 0)
			   		{
							if(!empty($_FILES['files']['name'])){	
								$files_cover = uploadFile('files','slideshow'); 
								$data_1["files"]="slideshow/".$files_cover['filename'];
								$ext = explode('/', $_FILES['files']['type']);
								$typeFile = $ext[0];
							
							}else{
								$data_1["files"] = $_POST['files_hidden'];
								$typeFile = $_POST['tags_hidden'];
							}
							// pr($data_1["files"]);
							// pr($_FILES['files']);
							// exit;
							$category  = "17";
							
						$input_data_slide= $this->models->inputDataFile($x['id'],$x['title'],$data_1["files"],$category,$typeFile,
																			$x['createdate'],$x['postdate'],$x['fromwho'],$x['authorid'],$x['n_status'],
																			$x['link']);
						if($input_data_slide['param'] == 'I'){
							$this->activityHelper->log('INSERT SLIDE',$input_data_slide['id']);	
						}else{
							$this->activityHelper->log('UPDATE SLIDE',$input_data_slide['id']);	
						}
					}
				}catch (Exception $e){}
		}
		echo "<script>alert('Data Berhasil Disimpan');document.location='slide_view';</script>";
	}
	
	
	public function del_slide(){
		global $basedomain;
	    $id=$_GET['id'];
		$status = '2';
		$table_select="dtataruang_news_content";
		$data['status']= $this->models->delData($table_select,$id,$status);
		$this->activityHelper->log('DELETE SLIDE',$data['status']);	
		echo "<script>alert('Data Berhasil Dihapus');window.location.href='".$basedomain."slideshow/slide_view'</script>";	
	}
}

?>
