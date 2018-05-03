<?php 
ini_set('display_errors','On');
error_reporting('E_ALL');

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'news_1';
$db_conn = new mysqli($host,$username,$password,$database);

if($db_conn->connect_errno){
    echo "Ошибка при подключение к серверу базы данных";
    exit();
}

date_default_timezone_set("Asia/Tashkent");

function is_session_started()

{

    if(php_sapi_name() !== "cli"){

        if(version_compare(phpversion(), "5.4.0", ">="))

            return session_status() === PHP_SESSION_ACTIVE ? true : false;

        else

            return session_id() === "" ? false : true;

    }

    return false;

}

if(!is_session_started()) session_start();

function get_token($name)

{

    $token = uniqid(rand(), true);

    $_SESSION[$name.'_token'] = $token;

    $_SESSION[$name.'_token_time'] = time();

    return $token;

}

/***********************************************************************

 * check_token() checks the validity of the token

 *

 * @return boolean

 */

function check_token($referer, $name, $type)

{

    if(isset($_SESSION[$name.'_token']) && isset($_SESSION[$name.'_token_time'])

    && (($type == "post" && isset($_POST['csrf_token']) && $_SESSION[$name.'_token'] == $_POST['csrf_token'])

    XOR ($type == "get" && isset($_GET['csrf_token']) && $_SESSION[$name.'_token'] == $_GET['csrf_token']))

    && ($_SESSION[$name.'_token_time'] >= (time()-1800))

    && isset($_SERVER['HTTP_REFERER']) && (strstr($_SERVER['HTTP_REFERER'], $referer) !== false))

        return true;

    else

        return false;

}

function is_html($string){
	if(!preg_match('#(?<=<)\w+(?=[^<]*?>)#', $string)){ 
	    return $string;
	}else{
		return strip_tags($string);
	}
}
