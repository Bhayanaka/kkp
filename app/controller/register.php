<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class register extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
		$this->contentHelper = $this->loadModel('contentHelper');
		$this->userHelper = $this->loadModel('userHelper');
	}
	
	public function index(){
		
		// pr($_SESSION);

		$table_rss="dtataruang_news_content";
		$categoryid_rss="18";
		$articletype_rss="";
		
		$orderby=array('createdate','ASC');
		
		$result_rss= $this->contentHelper->getData_news_content($table_rss,$categoryid_rss,$articletype_rss,$orderby,0,10);
		// pr(	$result_rss);
		$data['rss']=$result_rss;
		
		return $this->loadView('register',$data);
	
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

    function login()
    {

    	global $basedomain;


    	$login = $this->userHelper->goLogin($data);
    	redirect($basedomain);

    }

    function doregister()
    {
    	global $basedomain;

    	$data['name'] = _p('name');
    	$data['email'] = _p('email');
    	$data['password'] = _p('password');

    	
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
			echo "<script>alert('CAPTCHA Yang Anda Ketik Salah');</script>";
			redirect($basedomain.'login');
		} else {
			
			$register = $this->userHelper->registerMember($data);
			
		}

    	
    	redirect($basedomain);
    }

    function validate()
    {

    	$dataView = array();
        $data = _g('ref');
        
        // exit;
        // logFile($data);
        if ($data){

            $decode = unserialize(decode($data));
           
            // check if token is valid
            // pr($decode);exit;
            $getToken = $this->userHelper->getEmailToken($decode['email']);

            if ($getToken['token']==$decode['token']){

                
                // is valid, then create account and set status to validate

                $updateAccount = $this->userHelper->updateUserStatus($decode['email']);

                if ($updateAccount){

                    
                    $dataView['validate'] = 'Validate account success';
                    

                }else{
                    
                    $dataView['validate'] = 'Validate account error';
                    logFile('update n_status user failed');
                }

            }else{

                // invalid token
                $dataView['validate'] = 'Validate account error';
                logFile('token mismatch');
            }

            

        }
        
        return $this->loadView('register',$dataView);
    }
	
}

?>