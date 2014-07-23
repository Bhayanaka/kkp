<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class kotaksaran extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
		$this->contentHelper = $this->loadModel('contentHelper');
	}
	
	public function index(){
		
		$table_rss="dtataruang_news_content";
		$categoryid_rss="18";
		$articletype_rss="";
		
		$orderby=array('createdate','ASC');
		
		$result_rss= $this->contentHelper->getData_news_content($table_rss,$categoryid_rss,$articletype_rss,$orderby,0,10);
		// pr(	$result_rss);
		$data['rss']=$result_rss;
		
		return $this->loadView('kotaksaran',$data);
	
	}
    
	public function changeData(){
	global $basedomain;
	require_once('engine/recaptchalib.php');
	
	$privatekey = "6LeTiPASAAAAAOFAQGOjgfsTRcb708TzwBaxyC2r";
	$resp = recaptcha_check_answer ($privatekey,
									$_SERVER["REMOTE_ADDR"],
									$_POST["recaptcha_challenge_field"],
									$_POST["recaptcha_response_field"]);
	if (!$resp->is_valid) {
		// What happens when the CAPTCHA was entered incorrectly
		// die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .	"(reCAPTCHA said: " . $resp->error . ")");
		// echo "gagal";
		echo "<script>alert('reCAPTCHA Yang Anda Ketik Salah');</script>";
		redirect($basedomain.'kotaksaran');
	} else {
		
		// echo "Welcome to my homepage!!";
		  
		if(isset($_POST)){
			   
			$x = form_validation($_POST);	
			// pr($x);
			// exit;
			   try
			   {
			   		if(isset($x) && count($x) != 0)
			   		{	
						$x['categoryid'] = '19';
						$x['n_status'] = '1';
						$x['createdate'] = date('Y-m-d H:i:s');
						// exit;
						$change_data_onemap = $this->contentHelper->addData($x);
						
					}
				}catch (Exception $e){}
			}
		echo "<script>alert('Pesan Telah Terkirim');document.location='index';</script>";
		}
	}

    
	
}

?>