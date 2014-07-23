<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class user extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		global $app_domain;
		
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
		$this->userHelper = $this->loadModel('userHelper');
	}
	
	public function index(){
       
		// $data['listuser'] = $this->userHelper->getListUser();
		// pr($data);
		// return $this->loadView('user/user-list',$data);
		return $this->loadView('user/user-list');

	}
    
	
	function show(){
       
		// $data = $this->contentHelper->getData();
		// pr($data);
		return $this->loadView('home');

	}
	
	function add(){
       
		global $basedomain;
		
		if (_p('token')){
			
			// upload image 
			$uploadImage['status'] = false;
			if ($_FILES['image']['name']!="")$uploadImage = uploadFile('image','user');
			
			
			$addUser = $this->userHelper->addUser();
			if ($uploadImage['status']){
				
				$updateUser = $this->userHelper->updateUserImage($uploadImage['filename'],$addUser);
			}
			
			if ($addUser) redirect($basedomain.'user');
			exit;
		}
		
		
		return $this->loadView('user/user-input');

	}
	
	
	function edit()
	{
		global $basedomain, $app_domain;;
		$userid = intval(_g('id'));
		$data['listuser'] = $this->userHelper->getListUser($userid);
		// pr($app_domain);
		
		if (_p('token')){
			
			// upload image 
			
			$uploadImage['status'] = false;
			if ($_FILES['image']['name']!="")$uploadImage = uploadFile('image','user');
			
			// pr($_POST['token']);
			// exit;
			$dataarr = array();
			
			$userid = intval(_p('id'));
			// echo $userid;
			// exit;
			$addUser = $this->userHelper->updateUserProfile($dataarr,$userid);
			if ($uploadImage['status']){
				
				// pr($uploadImage);
				// pr($addUser);
				$updateUser = $this->userHelper->updateUserImage($uploadImage['filename'],$addUser);
			}
			// exit;
			if ($addUser) redirect($basedomain.'user');
			exit;
		}
		
		return $this->loadView('user/user-edit',$data);
	}
	
	
	function delete()
	{
		// $id = intval(_p('id'));
		global $basedomain;
		$id = intval(_g('id'));
		// exit;
		if ($id>0){
			$del = $this->userHelper->deleteUser($id);
			echo "<script>alert('Data Berhasil Dihapus');window.location.href='".$basedomain."user'</script>";
			// if ($del){
				// print json_encode(array('status'=>true));
			// }else{
				// print json_encode(array('status'=>false));
			// }
		}
			
		// redirect($basedomain.'user');
		// exit;
	}
}

?>
