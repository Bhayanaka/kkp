<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class gallery extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
			$this->m_gallery = $this->loadModel('m_gallery');
			$this->activityHelper = $this->loadModel('activityHelper');
	}
	
	public function index(){
       // global $basedomain;
		// return $this->loadView('gallery/informasi_gallery_foto_list',$data);
		
		//$data['menu'] = $this->loadView('berita/informasi-berita-menu');
		
		//return $this->loadView('gallery/informasi-berita-list',$data);
		// return $this->loadView('gallery/informasi_gallery_foto_list');

	}
    
	function informasi_gallery_foto_list(){

	global $basedomain;
	// echo $basedomain;
	// exit;
	// echo $basedomain;
	// exit;
		
	// $table="dtataruang_news_content";
	// $tableUsers="user_member";
	// $categoryid="6";
	// $articletype="2";
	// $orderby=array('postdate','DESC');
	
	// $result_data = $this->m_gallery->getData_gallery($table,$categoryid,$articletype);
	// $result_user = $this->m_gallery->getData_users($tableUsers);
	
	// $data = $this->contentHelper->getData();
	// $data['data']=$result_data;
	// $data['user']=$result_user;
	// $data['url']=$basedomain."gallery/informasi_gallery_foto_list/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
	// $data['new-button'] = 'berita-new';
	// $data['menu'] = $this->loadView('berita/informasi-berita-menu');
		
		
	// return $this->loadView('gallery/informasi_gallery_foto_list',$data);
	return $this->loadView('gallery/informasi_gallery_foto_list');

	}
	
	function informasi_gallery_foto_input()
	{
		global $basedomain;
		
		$data['url']=$basedomain."gallery/informasi_gallery_foto_input/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		$data['new-button'] = 'berita-new';
		$data['menu'] = $this->loadView('berita/informasi-berita-menu');
		
		
		return $this->loadView('gallery/informasi_gallery_foto_input',$data);
	}
	
	function informasi_gallery_foto_edit()
	{
		global $basedomain;
		$id=$_GET['id'];
		$table="dtataruang_news_content";
		$categoryid="6";
		$gallerytype="1";
		$articletype="2";
		$orderby=array('postdate','DESC');
		
		$result_data = $this->m_gallery->getData_gallery_edit($id,$table,$categoryid,$articletype,$gallerytype);
		$data['album'] = $this->m_gallery->getAlbum($id,$categoryid,$articletype);
		$data['data']=$result_data['gallery'];
		$data['data1']=$result_data['cover'];
		$data['url']=$basedomain."gallery/informasi_gallery_foto_edit/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		$data['new-button'] = 'berita-new';
		$data['menu'] = $this->loadView('berita/informasi-berita-menu');
		
		
		return $this->loadView('gallery/informasi_gallery_foto_edit',$data);
	}
	
	function informasi_gallery_foto_submit()
	{
	
		global $basedomain;
	
		$data=form_validation($_POST);
		$table="dtataruang_news_content";
		$data["judul_gallery"];
		$data["tglfoto"];
		$data["categoryid"]=6;
		$data["articletype"]=2;
		$data["createdate"]= date('Y-m-d H:i:s');
		$data["fromwho"]=$_SESSION ['user']['usertype'];
		$data ["authorid"]=$_SESSION ['user']['id'];
		
		if (!empty($_FILES['image']['name']) ) {
		$upload = uploadFile("image","gallery/foto");
		$data ["image"]=$upload['filename'];
		}if (!empty($_FILES['image2']['name']) ) {
		$upload2 = uploadFile("image2","gallery/foto");
		$data ["image2"]=$upload2['filename'];
		}if (!empty($_FILES['image3']['name']) ) {
		$upload3 = uploadFile("image3","gallery/foto");
		$data ["image3"]=$upload3['filename'];
		}if (!empty($_FILES['image4']['name']) ) {
		$upload4 = uploadFile("image4","gallery/foto");
		$data ["image4"]=$upload4['filename'];
		}
		//pr($data);
	
		$result_data = $this->m_gallery->input_data_foto($table,$data);
		$this->activityHelper->log('INSERT GALLERY FOTO',$result_data['id']);	
		echo"<script>alert('Data Berhasil Disimpan');window.location.href='".$basedomain."gallery/informasi_gallery_foto_list'</script>";
		
		
	}
	
	function informasi_gallery_foto_edit_submit()
	{
		
			global $basedomain;
		$data=form_validation($_POST);
		$table="dtataruang_news_content";
		$data["judul_gallery"];
		$data["tglfoto"];
		$data["categoryid"]=6;
		$data["articletype"]=2;
		$data["createdate"]= date('Y-m-d H:i:s');
		$data["fromwho"]=$_SESSION ['user']['usertype'];
		$data ["authorid"]=$_SESSION ['user']['id'];
		
		
		if (!empty($_FILES['imagecover']['name']) ) {
		$upload = uploadFile("imagecover","gallery/foto");
		$data ["imagecover"]=$upload['filename'];
		
		}if (!empty($_FILES['image']['name']) ) {
		$upload = uploadFile("image","gallery/foto");
		$data ["image"]=$upload['filename'];
		
		}if (!empty($_FILES['image2']['name']) ) {
		$upload2 = uploadFile("image2","gallery/foto");
		$data ["image2"]=$upload2['filename'];
		}if (!empty($_FILES['image3']['name']) ) {
		$upload3 = uploadFile("image3","gallery/foto");
		$data ["image3"]=$upload3['filename'];
		}
		
		$result_data = $this->m_gallery->input_data_foto_edit($table,$data);
		$this->activityHelper->log('UPDATE GALLERY FOTO',$result_data['id']);	
		echo"<script>alert('Data Berhasil Disimpan');window.location.href='".$basedomain."gallery/informasi_gallery_foto_list'</script>";
		
		
	}
	
	function informasi_gallery_video_submit()
	{
		
			global $basedomain;
		// date_default_timezone_set('Asia/Jakarta');
		// pr($_POST);
		$data=form_validation($_POST);
		$table="dtataruang_news_content";
		$data["namavideo"];
		$data["tglvideo"];
		$data["categoryid"]=7;
		$data["articletype"]=2;
		$data["createdate"]= date('Y-m-d H:i:s');
		$data["fromwho"]=$_SESSION ['user']['usertype'];
		$data ["authorid"]=$_SESSION ['user']['id'];
		
		if (!empty($_FILES['video']['name']) ) {
		$upload = uploadFile("video","gallery/video");
		$data ["video"]="gallery/video/".$upload['filename'];
		}
		// pr($_FILES);
		
		// pr($data);
		// exit;
		$result_data = $this->m_gallery->input_data_video($table,$data);
		$this->activityHelper->log('INSERT GALLERY VIDEO',$result_data['id']);	
		echo"<script>alert('Data Berhasil Disimpan');window.location.href='".$basedomain."gallery/informasi_gallery_video_list'</script>";	
	}
	
	
	function addGallery()
	{
		$data['menu'] = $this->loadView('berita/informasi-berita-menu');
		
		return $this->loadView('gallery/informasi-gallery-foto-input',$data);
	}
	
	function edit()
	{
	
	}
	
	function informasi_gallery_foto_delete()
	{
	global $basedomain;
	$id=$_GET['id'];
		
		$result_data = $this->m_gallery->delete_data_foto($id);
		$this->activityHelper->log('DELETE GALLERY FOTO',$result_data);
	
		echo"<script>alert('Data Berhsil Dihapus');window.location.href='".$basedomain."gallery/informasi_gallery_foto_list'</script>";
	
	}
	
	function informasi_gallery_foto_delete_foto()
	{
	global $basedomain;
	$id=$_GET['id'];
	$id_glr=$_GET['id_glr'];
	$get_file = $this->m_gallery->getFile($id);
		deleteFile($get_file[0]['files'],'');
		$result_data = $this->m_gallery->delete_data_foto_satu($id);
		
		redirect($basedomain."gallery/informasi_gallery_foto_edit/?id=$id_glr");
		// echo"<script>window.location.href='".$basedomain."gallery/informasi_gallery_foto_edit/?id='$id_glr''</script>";
	
	}
	
	function informasi_gallery_foto_publish()
	{
	global $basedomain;
	$id=$_GET['id'];
	$n_status=$_GET['n_status'];
	
	//pr($n_status);
		$result_data = $this->m_gallery->publish_data_foto($id,$n_status);
		echo"<script>window.location.href='".$basedomain."gallery/informasi_gallery_foto_list'</script>";
	
	}
	
	function informasi_gallery_video_list()
	{
		// global $basedomain;
		
		// $table="dtataruang_news_content";
		// $tableUsers="user_member";
		// $categoryid="7";
		// $articletype="2";
		// $orderby=array('postdate','DESC');
       
		// $result_data = $this->m_gallery->getData_video($table,$categoryid,$articletype,$orderby);
		// $result_user = $this->m_gallery->getData_users($tableUsers);
		// $data = $this->contentHelper->getData();
		// $data['data']=$result_data;
		// $data['user']=$result_user;
		
		// $data['url']=$basedomain."gallery/informasi_gallery_video_list/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		// $data['new-button'] = 'berita-new';
		// $data['menu'] = $this->loadView('berita/informasi-berita-menu');
		
		
		// return $this->loadView('gallery/informasi_gallery_video_list',$data);
		return $this->loadView('gallery/informasi_gallery_video_list');
		
	}
	
	function informasi_gallery_video_edit()
	{
		global $basedomain;
		$id=$_GET['id'];
		$table="dtataruang_news_content";
		$categoryid="7";
		$articletype="2";
		$orderby=array('postdate','DESC');
       
		$result_data = $this->m_gallery->getData_video_edit($id,$table,$categoryid,$articletype,$orderby);
		// $data = $this->contentHelper->getData();
		$data['data']=$result_data;
		$data['url']=$basedomain."gallery/informasi_gallery_video_edit/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		$data['new-button'] = 'berita-new';
		$data['menu'] = $this->loadView('berita/informasi-berita-menu');
		
		
		return $this->loadView('gallery/informasi_gallery_video_edit',$data);
	}
	
	function informasi_gallery_video_input()
	{
		global $basedomain;
		
		$data['url']=$basedomain."gallery/informasi_gallery_video_input/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		$data['new-button'] = 'berita-new';
		$data['menu'] = $this->loadView('berita/informasi-berita-menu');
		
		
		return $this->loadView('gallery/informasi_gallery_video_input',$data);
	}
	
	function informasi_gallery_video_publish()
	{
	global $basedomain;
	$id=$_GET['id'];
	$n_status=$_GET['n_status'];
	//pr($id);
		$result_data = $this->m_gallery->publish_data_video($id,$n_status);
		echo"<script>window.location.href='".$basedomain."gallery/informasi_gallery_video_list'</script>";
	
	}
	
	function informasi_gallery_video_edit_submit()
	{
	global $basedomain;
	$data=form_validation($_POST);
		
		if (!empty($_FILES['video']['name']) ) {
			deleteFile($data[video_hidden],'');
			$upload = uploadFile("video","gallery/video");
			$data["video"]="gallery/video/".$upload['filename'];
		}else{
			$data["video"]= $data['video_hidden'];
		}
	
		$result_data = $this->m_gallery->publish_data_video_edit_submit($data);
		$this->activityHelper->log('UPDATE GALLERY VIDEO',$result_data['id']);
		echo"<script>alert('Data Berhasil Disimpan');window.location.href='".$basedomain."gallery/informasi_gallery_video_list'</script>";
	
	}
	
	function informasi_gallery_video_delete()
	{
	global $basedomain;
	$id=$_GET['id'];
	//pr($id);
		$result_data = $this->m_gallery->delete_data_video($id);
		$this->activityHelper->log('DELETE GALLERY VIDEO',$result_data);
		echo"<script>alert('Data Berhasil Dihapus');window.location.href='".$basedomain."gallery/informasi_gallery_video_list'</script>";
	
	}
}

?>
