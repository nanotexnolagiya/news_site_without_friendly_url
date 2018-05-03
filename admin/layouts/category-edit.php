<?php 
$id = @intval($_GET['edit']);
if (is_int($id) && $_GET['page'] == 'category'):
	$categories = $db_conn->query('SELECT * FROM news_categories WHERE id LIKE '.$id);
	if ($categories->num_rows > 0 && $category = $categories->fetch_assoc()):
?>
<div class="row">
	<div class="col s12">
		<form id="catEdit">
			<?php $csrf_token = get_token("catEdit");?>
			<span><b><i><input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>"></i></b></span>
			<span><b><i><input type="hidden" name="id" value="<?php echo $category['id']; ?>"></i></b></span>
			<div class="input-field">
	          <input id="name" value="<?php echo $category['name']; ?>" name="name" type="text" class="validate">
	          <label for="name">Name</label>
	        </div>
	        <div class="input-field">
	        	<button class="btn waves-effect waves-light" type="submit" name="action">Save
				    <i class="material-icons right">send</i>
				  </button>
	        </div>
		</form>
	</div>
</div>
<?php 
	else:
		require_once('layouts/404.php');
	endif;
else:
	require_once('layouts/404.php');
endif;
?>