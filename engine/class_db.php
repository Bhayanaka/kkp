<?php 

/* Class Name = Database
 * Variabel Input : query, result, connect, numRec
 * Variabel Input Type : Protected
 * Created By : Ovan Cop
 * Class Desc : Kumpulan fungsi database (db helper)
 */

class Database
{
	protected $var_query = null;
	protected $var_result = null;
	protected $var_connect = null;
	protected $var_numRec = null;
	protected $config = array();
	protected $dbConfig = array();
	protected $keyconfig = null;
	
	public function __construct() {
		
		global $CONFIG, $dbConfig; 
		$this->config = $CONFIG;
		$this->dbConfig = $dbConfig;
		
		if (array_key_exists('default',$CONFIG)) $this->keyconfig = 'default';
		if (array_key_exists('admin',$CONFIG)) $this->keyconfig = 'admin';
		if (array_key_exists('dashboard',$CONFIG)) $this->keyconfig = 'dashboard';
		if (array_key_exists('services',$CONFIG))$this->keyconfig = 'services';
		
		// pr($this->config);
		/* Open connection */
		// $this->open_connection();
		
	}
	
	function setKey()
	{
		global $CONFIG;
		if (array_key_exists('default',$CONFIG)) $this->keyconfig = 'default';
		if (array_key_exists('admin',$CONFIG)) $this->keyconfig = 'admin';
		if (array_key_exists('dashboard',$CONFIG)) $this->keyconfig = 'dashboard';
		if (array_key_exists('services',$CONFIG))$this->keyconfig = 'services';
	}
	
	public function open_connection() {
		
		global $CONFIG, $dbConfig;
		// pr($dbConfig);
		$this->config = $CONFIG;
		$this->dbConfig = $dbConfig;
		$this->setKey();
		if ((is_array($this->dbConfig)) and ($this->dbConfig !=''))
		{
			
			if ($this->dbConfig['server'] !=''){
				
				$db_status = 1;
				
			}else{
				
				$this->db_error('Server not defined');
				exit;
			}
			
			switch ($this->dbConfig['server'])
			{
				case 'mysql':
				{
					
					if ($this->config[$this->keyconfig]['app_status'] == 'Production'){
						$connect = @mysql_connect($this->dbConfig['host'], $this->dbConfig['user'], $this->dbConfig['pass']) or die ($this->db_error('Connection error'));
					
					}else{
						$connect = mysql_connect($this->dbConfig['host'], $this->dbConfig['user'], $this->dbConfig['pass']) or die ($this->db_error('Connection error'));
					}
					
					
					if ($connect){
					
						if ($this->config[$this->keyconfig]['app_status'] == 'Production'){
							@mysql_select_db($this->dbConfig['name'], $connect) or die ($this->db_error('No Database Selected'));	
						
						}else{
							mysql_select_db($this->dbConfig['name'], $connect) or die ($this->db_error('No Database Selected'));
						}
						
						return $connect;
					
					}else{
					
						return false;
					}
				}
				break;
				
				default :
				{
					$this->db_error('Database not configure, please check database server configure');
				}
				break;
			}
		}
	}
	
        
        /*
         * fungsi query digunakan untuk menjalankan query seperti insert, update atau query yang tidak diperlukan nilai kembalian
         */
	public function query($data)
	{
                // cek server database yang dipakai
		$this->open_connection();
		switch ($this->dbConfig['server'])
		{
                    case 'mysql':
                        if ($this->config[$this->keyconfig]['app_status'] == 'Production'){
                                
								$securityLevel = $this->config[$this->keyconfig]['security'];
								
								switch ($securityLevel)
								{
									case 'medium':
										$strQuery = strpos($data,'DELETE');
									break;
								}
								
								
								$this->var_query = @mysql_query($data);
								

                        }else{
                                $this->var_query = mysql_query($data) or die ($this->error($data));
                        }
                        break;
                    
                }
		$this->close_connection();
		return $this->var_query;
	}
	


	public function fetch($data=false, $bool=false)
	{
		$this->open_connection();
		if (!$data) return false;
		
		$this->var_result = $this->query($data) or die ($this->error($data));
		switch ($this->dbConfig['server'])
		{
                    case 'mysql':
                        if ($bool == true){			
                                if ($this->num_rows($data)){

                                        while ($data = mysql_fetch_assoc($this->var_result)){
                                                $dataArray[] = $data;
                                        }
                                        return $dataArray;
                                }else{
                                        return false;
                                }
                        }else{
                                return mysql_fetch_assoc($this->var_result);
                        }
                        break;
                    
                }
		$this->close_connection();
	}
        
        /* fungsi yang digunakan untuk execute query pada oracle secara otomatis akan di commit
         * jika fungsi ini dijalankan maka data yang di input tidak akan bisa di rollback kembali
         * ini sudah ketentuan dari API oracle-nya 
         */
	
	
	public function fetch_field($data)
	{
		$this->var_result = $data;
		
		return mysql_fetch_field($this->var_result);
	}
	
	public function num_rows($data)
	{
		$this->open_connection();
		$this->var_result = $this->query($data) or die ($this->error($data));
		$this->var_numRec = mysql_num_rows($this->var_result);
		$this->close_connection();
		return $this->var_numRec;
	}
	
	public function insert_id()
	{
		return mysql_insert_id();
		
	}
	
	public function close_connection()
	{
		
		switch ($this->dbConfig['server'])
		{
			case 'mysql':
				return mysql_close($this->open_connection());
				break;
		   
		}
		
	}
	
	public function free_result($result)
	{
		return mysql_free_result($result);
	}
	
	public function real_escape_string($data)
	{
		return mysql_real_escape_string($data);
	}
	
	public function error($data)
	{
		if ($this->config[$this->keyconfig]['app_status'] == 'Production'){
			$message = 'Your query error, please check again';
			return $message;
		}else{
			
			switch ($this->dbConfig['server'])
			{
				case 'mysql':
					return mysql_error();
					break;
				
			}
			
		}
		
	}
	
	function db_error($mesg)
	{
		
		if ($mesg !='') {
			$mesg = $mesg;
			
		}else{
			$mesg = "Message error not defined";
		}
		
		print ($mesg);
		return false;
		
	}
	
	function log($index="surf", $data)
	{
		$activityValue = clean($data);
		$sql = "SELECT id FROM code_activity WHERE activityValue = '{$activityValue}' LIMIT 1";
		$res = $this->fetch($sql);
		if ($res){
			$ins = "INSERT INTO code_activity_log (userid, activityId, activityDesc, source, datetimes, n_status)
					VALUES ()";
		}
	}
	
	
}


?>
