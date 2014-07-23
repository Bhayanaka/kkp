<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class program extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		$this->models = $this->loadModel('m_program');
		$this->contentHelper = $this->loadModel('contentHelper');
		$this->activityHelper = $this->loadModel('activityHelper');
	}
	
	public function index(){
       
		// $data = $this->contentHelper->getData();
		// pr($data);
		return $this->loadView('home');

	}
	
	//=======update begin=======//
    //view Program
	public function program_view(){
        $table_select="dtataruang_news_content_program";
		if(isset($_GET)){
		
			if(isset($_GET['type']) && count($_GET['type'])!=0)
			{
				$type=$_GET['type'];
			}else{
			
				$type=1;
				
			}
		}
		$table = "dtataruang_news_content_type_program";
		$data['type'] = $this->models->viewData_type_program($table);
		$data['result']= $this->models->viewData_program($table_select,$type);
		return $this->loadView('program/program-list',$data);

	}
	
	public function changeData(){
	
	if(isset($_POST)){
			   
			$x = form_validation($_POST);	
			// pr($x);
			// pr($_FILES);
			   try
			   {
			   		if(isset($x) && count($x) != 0)
			   		{
						
						if (!empty($_FILES['image']['name']) ) {
							deletefile($x['image_hidden'],'');
							$files = uploadFile('image','program'); 
							// pr($files); 
							$data["image"]="program/".$files['filename']; 
						}
						else{
							$data["image"]=$_POST['image_hidden'];
						}	
						// $articel_type = '4';
						$n_status = '1';
						// echo "image".$data["image"];
						// exit;
						$change_data_onemap = $this->models->changeData_onemap($x['id'],$x['title'],$x['content'],$data["image"],$x['articletype'],$x['createdate'],$x['postdate'],$x['fromwho'],$x['authorid'],
															$n_status);
						
						if($change_data_onemap['param'] == 'I'){
							$this->activityHelper->log('INSERT PROGRAM',$change_data_onemap['id']);	
						}else{
							$this->activityHelper->log('UPDATE PROGRAM',$change_data_onemap['id']);	
						}
						
					}
				}catch (Exception $e){}
		}
		echo "<script>alert('Data Berhasil Disimpan');document.location='program_view/?type=".$change_data_onemap['articel_type']."';</script>";
	}
	
	
	//=======update end=======
	
	//update status program
	public function status_program(){
		global $basedomain;
	    $id=$_GET['id'];
		$status = $_GET['status_program'];
		if($status =='0'){
			$st = '1';
		}elseif($status =='1'){
			$st = '0';
		}
		$table_select="dtataruang_news_content_program";
		$data['status']= $this->models->update_status($table_select,$st,$id);
		echo "<script>window.location.href='".$basedomain."program/program_view'</script>";	
	}
	
	
	//insert or update program
	public function addprogram()
	{
		//SIG Peta Pola Ruang = 12
		if(isset($_GET))
		{
			$id = form_validation($_GET);
			if(isset($id['id']) && count($id)!=0)
			{	
				$id = $id['id'];
				// $categoryid="14";
				$table="dtataruang_news_content_type_program";
				$data['type'] = $this->models->viewData_type_program($table);
				
				$table_category="dtataruang_news_content_category_product";
				$data['category'] = $this->models->viewData_category_program($table_category);
				
				
				$table_select="dtataruang_news_content_program";
				$table_select_join="dtataruang_news_content_repo";
				$data['result']= $this->models->viewData_program_cond_id($table_select,$id);	
				$gallerytype = "5";
				$thumbnail_repo_naskah="Naskah Akademis";
				$thumbnail_peta_pola="Peta Pola Ruang";
				$thumbnail_peta_struktur="Peta Struktur Ruang";
				$thumbnail_dok_final="Dokumen Final";
				
				$otherid = $data['result'][0]['id'];
				$data['repo_naskah'] = $this->models->viewData_program_repo_naskah($table_select_join,$otherid,$gallerytype,$thumbnail_repo_naskah);
				$data['repo_pola'] = $this->models->viewData_program_repo_pola($table_select_join,$otherid,$gallerytype,$thumbnail_peta_pola);
				$data['repo_struktur'] = $this->models->viewData_program_repo_struktur($table_select_join,$otherid,$gallerytype,$thumbnail_peta_struktur);
				$data['repo_final'] = $this->models->viewData_program_repo_final($table_select_join,$otherid,$gallerytype,$thumbnail_dok_final);
				
				$data['lokasi']= $this->contentHelper->getDataLokasi();
				$data['kabupaten']= $this->contentHelper->getChildLoc($data['result'][0]['id_provinsi']);	
				// pr($data['repo']);
				return $this->loadView('program/program-input',$data);
			}else{
				// echo "tambah";
				$table="dtataruang_news_content_type_program";
				$data['type'] = $this->models->viewData_type_program($table);
				
				$table_category="dtataruang_news_content_category_product";
				$data['category'] = $this->models->viewData_category_program($table_category);
				$data['lokasi']= $this->contentHelper->getDataLokasi();
				return $this->loadView('program/program-input',$data);
			}	
		}
	}
	
	//insert or edit sejarah
	public function input_program(){
		if(isset($_POST)){
			// pr($_POST);
			// exit;
			$x = form_validation($_POST);	
			try
			   {
			   		if(isset($x) && count($x) != 0)
			   		{
							if(!empty($_FILES['cover']['name'])){
								deleteFile($x['cover_hidden'],'program');	
								$files_cover = uploadFile('cover','program'); 
								$data_1["cover"]="program/".$files_cover['filename'];
							}else{
								$data_1["cover"]=$_POST['cover_hidden'];
							}
							
							if(!empty($_FILES['naskah']['name'])){
								deleteFile($x['naskah_hidden'],'program');
								$files_naskah = uploadFile('naskah','program'); 
								$OriFilename1 = $_FILES['naskah']['name'];	
								$data_2["naskah"]="program/".$files_naskah['filename'];
							}else{
								$data_2["naskah"]=$_POST['naskah_hidden'];
								$OriFilename1 = $_POST['naskah_tags_hidden'];
							}
							
							if(!empty($_FILES['peta_pola']['name'])){
								deleteFile($x['peta_pola_hidden'],'program');
								$files_peta_pola = uploadFile('peta_pola','program'); 
								$data_3["peta_pola"]="program/".$files_peta_pola['filename'];
							}else{
								$data_3["peta_pola"]=$_POST['peta_pola_hidden'];
							}
							
							if(!empty($_FILES['peta_struktur']['name'])){
								deleteFile($x['peta_struktur_hidden'],'program');
								$files_peta_struktur = uploadFile('peta_struktur','program'); 
								$data_4["peta_struktur"]="program/".$files_peta_struktur['filename'];
							}else{
								$data_4["peta_struktur"]=$_POST['peta_struktur_hidden'];
							}

							if(!empty($_FILES['dokfinal']['name'])){
								deleteFile($x['dokfinal_tags_hidden'],'program');
								$files_peta_struktur = uploadFile('dokfinal','program'); 
								$data_5["dokfinal"]="program/".$files_peta_struktur['filename'];
								$OriFilename2 = $_FILES['dokfinal']['name'];	
							}else{
								$data_5["dokfinal"]=$_POST['dokfinal_hidden'];
								$OriFilename2 = $_POST['dokfinal_tags_hidden'];
							}	
							
							$provinsi = explode("_", $x['provinsi']);
							$id_provinsi = $provinsi[0];
							$kabupaten = explode("_", $x['kabupaten']);
							$id_kabupaten = $kabupaten[0];
							// exit;
						$input_data_program = $this->models->inputData_program($x['id'],$x['title'],$x['content'],$x['lampiran'],$x['jml_hal'],$data_1["cover"],$data_2["naskah"],$data_3["peta_pola"],$data_4["peta_struktur"],$data_5["dokfinal"],$x['category'],$x['type_program'],
																					$x['tahun'],$x['createdate'],$x['postdate'],$x['fromwho'],$x['authorid'],$x['n_status'],$x['id_repo_0'],$x['id_repo_1'],$x['id_repo_2'],$x['id_repo_3'],$id_provinsi,$id_kabupaten,$x['kecamatan'],
																					$OriFilename1,$OriFilename2);
						if($input_data_program['param'] == 'I'){
							$this->activityHelper->log('INSERT PROGRAM',$input_data_program['id']);	
						}else{
							$this->activityHelper->log('UPDATE PROGRAM ',$input_data_program['id']);	
						}
					}
				}catch (Exception $e){}
		}
		echo "<script>alert('Data Berhasil Disimpan');document.location='program_view';</script>";
	}
	
	//update status publish or unpublished program
	public function del_program(){
		global $basedomain;
	    $id=$_GET['id'];
		$status = '2';
		$gallerytype = "5";
		$table_select="dtataruang_news_content_program";
		$table_select_repo="dtataruang_news_content_repo";
		$data['status']= $this->models->delData_Program($table_select,$id,$status,$table_select_repo,$gallerytype);
		$this->activityHelper->log('DELETE  PROGRAM ',$data['status']);
		echo "<script>alert('Data Berhasil Dihapus');window.location.href='".$basedomain."program/program_view'</script>";	
	}
	
	
}

?>
