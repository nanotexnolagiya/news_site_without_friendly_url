<?php 
ini_set('display_errors','Off');
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

function is_html($string){
	if(!preg_match('#(?<=<)\w+(?=[^<]*?>)#', $string)){ 
	    return $string;
	}else{
		return strip_tags($string);
	}
}