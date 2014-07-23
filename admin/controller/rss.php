<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class rss extends Controller {
	
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
		$this->models = $this->loadModel('m_rss');
		$this->activityHelper = $this->loadModel('activityHelper');
	}
	
	public function index(){
       
		// $data = $this->contentHelper->getData();
		// pr($data);
		// $this->activityHelper->log('surf','insert data program');	
		// return $this->loadView('rss/rss-list');

	}
  
	//update status program
	public function status_rss(){
		global $basedomain;
	    $id=$_GET['id'];
		$status = $_GET['status_rss'];
		if($status =='0'){
			$st = '1';
		}elseif($status =='1'){
			$st = '0';
		}
		$table_select="dtataruang_news_content";
		$data['status']= $this->models->update_status($table_select,$id,$st);
		echo "<script>window.location.href='".$basedomain."rss/rss_view'</script>";	
	}
	
    //view Program
	public function rss_view(){
		// $table_select="dtataruang_news_content";
		// $categoryid="18";
		// $data['result']= $this->models->viewData($table_select,$categoryid);
		// return $this->loadView('rss/rss-list',$data);
		return $this->loadView('rss/rss-list');

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
				$categoryid="18";
				$data['result']= $this->models->viewData_cond_id($table_select,$categoryid,$id);
				// pr($data['result']);	
				return $this->loadView('rss/rss-input',$data);
			}else{
				
				return $this->loadView('rss/rss-input');
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
								deletefile($x['files_hidden'],'rss');
								$files_cover = uploadFile('files','rss'); 
								$data_1["files"]="rss/".$files_cover['filename'];
							}else{
								$data_1["files"]=$_POST['files_hidden'];
							}
							
							// pr($_FILES['files']);
							// $ext = explode('/', $_FILES['files']['type']);
							$category  = "18";
							
						$input_data_rss = $this->models->inputDataFile($x['id'],$x['title'],$x['link'],$data_1["files"],$category,
																			$x['createdate'],$x['postdate'],$x['fromwho'],$x['authorid'],$x['n_status']);
						
						if($input_data_rss['param'] == 'I'){
								$this->activityHelper->log('INSERT RSS',$input_data_rss['id']);	
						}else{
								$this->activityHelper->log('UPDATE RSS',$input_data_rss['id']);	
						}
					}
				}catch (Exception $e){}
		}
		echo "<script>alert('Data Berhasil Disimpan');document.location='rss_view';</script>";
	}
	
	
	public function del_rss(){
		global $basedomain;
	    $id=$_GET['id'];
		$status = '2';
		$table_select="dtataruang_news_content";
		$data['status']= $this->models->delData($table_select,$id,$status);
		$this->activityHelper->log('DELETE RSS',$data['status']);	
		echo "<script>alert('Data Berhasil Dihapus');window.location.href='".$basedomain."rss/rss_view'</script>";	
	}
}

?>
