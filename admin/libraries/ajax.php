<?php 
require_once('functions.php');
$error = json_encode(array(
	'result' => 'false',
	'text' => 'Error'
));
$success = json_encode(array(
	'result' => 'true',
	'text' => 'Success'
));
if (check_token('/admin/', 'catEdit', 'post')) {
	$name = strip_tags($_POST['name']);
	$id = intval($_POST['id']);
	if (is_int($id)) {
		$sql = "UPDATE news_categories SET name = '".$db_conn->real_escape_string($name)."' WHERE id LIKE ".$id;
		if($db_conn->query($sql) === TRUE){
			echo $success;
		}else{
			echo $error;
		}
	}else{
		echo $error;
	}
}elseif(check_token('/admin/', 'catDelete', 'post')){
	$id = intval($_POST['id']);
	if (is_int($id)) {
		$sql = "DELETE FROM news_categories WHERE id LIKE ".$id;
		if($db_conn->query($sql) === TRUE){
			echo $success;
		}else{
			echo $error;
		}
	}else{
		echo $error;
	}
}elseif(check_token('/admin/', 'catDelete', 'post')){
	$id = intval($_POST['id']);
	if (is_int($id)) {
		$sql = "DELETE FROM news_categories WHERE id LIKE ".$id;
		if($db_conn->query($sql) === TRUE){
			echo $success;
		}else{
			echo $error;
		}
	}else{
		echo $error;
	}
}elseif (check_token('/admin/', 'catAdd', 'post')) {
	$name = $db_conn->real_escape_string(strip_tags($_POST['name']));
	$sql = "INSERT INTO news_categories (id, name, created_at, updated_at) VALUES (NULL, '".$name."', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."')";
	if($db_conn->query($sql) === TRUE){
		echo $success;
	}else{
		echo $error;
	}
}elseif(check_token('/admin/', 'postDelete', 'post')){
	$id = intval($_POST['id']);
	if (is_int($id)) {
		$sql = "DELETE FROM news_posts WHERE id LIKE ".$id;
		if($db_conn->query($sql) === TRUE){
			echo $success;
		}else{
			echo $error;
		}
	}else{
		echo $error;
	}
}elseif (check_token('/admin/', 'postEdit', 'post')) {
	$title = $db_conn->real_escape_string(strip_tags($_POST['title']));
	$content = $db_conn->real_escape_string($_POST['content']);
	$image = 'images/'.$_POST['image'];
	$cat = $_POST['category'];
	$id = intval($_POST['id']);
	if (is_int($id)) {
		$sql = "UPDATE news_posts SET title='".$title."', content='".$content."', image='".$image."', categories_id='".$cat."', update_at='".date('Y-m-d H:i:s')."' WHERE id LIKE ".$id;
		if($db_conn->query($sql) === TRUE){
			echo $success;
		}else{
			echo $error;
		}
	}else{
		echo $error;
	}
}elseif (check_token('/admin/', 'postAdd', 'post')) {
	$title = $db_conn->real_escape_string(strip_tags($_POST['title']));
	$content = $db_conn->real_escape_string($_POST['content']);
	$image = 'images/'.$_POST['image'];
	$cat = $_POST['category'];
	$sql = "INSERT INTO news_posts (id, title, content, image, categories_id, views, created_at, updated_at) VALUES (NULL, '".$title."', '".$content."', '".$image."', '".$cat."', 0, '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."')";
	if($db_conn->query($sql) === TRUE){
		echo $success;
	}else{
		echo $error;
	}
}

 ?>