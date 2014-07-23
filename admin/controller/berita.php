<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class berita extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
		$this->informasi = $this->loadModel('m_informasi');
		$this->activityHelper = $this->loadModel('activityHelper');
	}
	
	public function index(){
	
		global $basedomain;
		
		// $table="dtataruang_news_content";
		// $tableUsers="user_member";
		
		// $categoryid="4";
		// $articletype="1";
		// $orderby=array('postdate','DESC');
       
		// $result_data = $this->informasi->getData_news($table,$categoryid,$articletype,$orderby);
		// $result_user = $this->informasi->getData_users($tableUsers);
		
		// $data = $this->contentHelper->getData();
		// $data['data']=$result_data;
		// $data['user']=$result_user;
		// $data['url']=$basedomain."berita/informasi-berita-list/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		// $data['new-button'] = 'berita-new';
		// $data['menu'] = $this->loadView('berita/informasi-berita-menu');
		
		
		return $this->loadView('berita/informasi-berita-list',$data);

	}
	
	function add()
	{
	
		global $basedomain;	
		$table="dtataruang_news_content";
		if(isset($_GET))
		{
			$data = form_validation($_GET);
			
			// pr($id);
			// exit;
			if(isset($data['id']) && count($data)!=0)
			{
				//$id=$_GET ['id'];
				$data ['data']= $this->informasi->getID($table,$data['id']);
				$data['menu'] = $this->loadView('berita/informasi-berita-menu');
				return $this->loadView('berita/informasi-berita-input',$data);
		
			}else{
				$data['menu'] = $this->loadView('berita/informasi-berita-menu');
				return $this->loadView('berita/informasi-berita-input',$data);
				
		    }
			
		}
		
	}
	
	function add_aksi()
	{
		global $basedomain;	
		if(isset($_POST)){
			
			// exit;
			$data = form_validation($_POST);	
			try
			   {
			   		if(isset($data) && count($data) != 0)
			   		{
						$table="dtataruang_news_content";
						$data["categoryid"]=4;
						$data["articletype"]=1;
						$data["createdate"]= date('Y-m-d H:i:s');
						$data["fromwho"]=$_SESSION ['user']['usertype'];
						$data ["authorid"]=$_SESSION ['user']['id'];	
						
						if(!empty($_FILES['image']['name'])){	
							deleteFile($_POST['image_hidden'],'berita');
							$files = uploadFile('image','berita'); 
							$data["image"]="berita/".$files['filename'];
						}else{
							$data["image"]=$_POST['image_hidden'];
						}	
					$result_data = $this->informasi->insert_berita($table,$data);
					if($result_data['param'] == 'I'){
						$this->activityHelper->log('INSERT BERITA',$result_data['id']);	
					}else{
						$this->activityHelper->log('UPDATE BERITA',$result_data['id']);	
						}
					}
					
				}catch (Exception $e){}
		}
		redirect($basedomain.'berita');
	}
	
	
	function change_status()
	{
	
		global $basedomain;
		if(isset($_GET)){
		
               $data = form_validation($_GET);
			   
			   try
			   {
			   		if(isset($data['id']) && count($data) != 0)
			   		{
					
					$ganti= $this->informasi->change_status($data['id'],$data['n_status']);
					   //$change_status_peraturan=$this->models->change_statusData_peraturan($x['id'],$x['status']);
					  // pr($ganti);
					   // exit;
					}
				   	
			   }catch (Exception $e){}
			   
            }
			echo "<script>window.location.href='".$basedomain."berita'</script>";
	
	
	}
	
	function delete()
	{
	global $basedomain;
		if(isset($_GET)){
		
               $data = form_validation($_GET);
			   
			   try
			   {
			   		if(isset($data['id']) && count($data) != 0)
			   		{
					
					   $hapus=$this->informasi->hapus($data['id']);
					   
					   $this->activityHelper->log('DELETE BERITA',$hapus);	
					}
				   	
			   }catch (Exception $e){}
			   
            }
			echo "<script>alert('Data Berhasil Dihapus');window.location.href='".$basedomain."berita'</script>";
	}
}

?>
