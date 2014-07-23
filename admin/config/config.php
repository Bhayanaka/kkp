<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

define ('APP_CONTROLLER', APPPATH.'controller/');
define ('APP_VIEW', APPPATH.'view/');
define ('APP_MODELS', APPPATH.'model/');

/* Konfigurasi APP */

$CONFIG['admin']['app_server'] = TRUE;
$CONFIG['admin']['app_status'] = 'Development';
$CONFIG['admin']['app_debug'] = TRUE;
$CONFIG['admin']['app_underdevelopment'] = FAlSE;
$CONFIG['admin']['php_ext'] = '.php';
$CONFIG['admin']['default_view'] = 'home';
$CONFIG['admin']['login'] = 'login';


$CONFIG['admin']['app_url'] = 'http://localhost/kkp/';
$CONFIG['admin']['base_url'] = 'http://localhost/kkp/admin/';
$CONFIG['admin']['root_path'] = $_SERVER['DOCUMENT_ROOT'].'/admin';

$CONFIG['admin']['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/kkp/public_assets/';

$CONFIG['admin']['max_filesize'] = 2097152;

$CONFIG['admin']['css'] = APPPATH.'css/';
$CONFIG['admin']['images'] = APPPATH.'images/';
$CONFIG['admin']['js'] = APPPATH.'js/';
$CONFIG['admin']['fileignore'] = array('application/x-httpd-php' ,'application/x-javascript', 'text/x-sql');

$basedomain = $CONFIG['admin']['base_url'];
$app_domain = $CONFIG['admin']['app_url'];
$basedomainpath = $CONFIG['admin']['app_url'];

/* Konfigurasi DB */

$dbConfig['host'] = '127.0.0.1';
$dbConfig['user'] = 'root';
$dbConfig['pass'] = '';
$dbConfig['name'] = 'db_dirtrlp3k';
$dbConfig['server'] = 'mysql';


?>
