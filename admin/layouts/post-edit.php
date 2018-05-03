<?php 
$id = @intval($_GET['edit']);
if (is_int($id) && $_GET['page'] == 'post'):
	$posts = $db_conn->query('SELECT * FROM news_posts WHERE id LIKE '.$id);
	if ($posts->num_rows > 0 && $post = $posts->fetch_assoc()):
?>
<div class="row">
	<div class="col s12">
		<form id="postEdit">
			<?php $csrf_token = get_token("postEdit");?>
			<span><b><i><input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>"></i></b></span>
			<span><b><i><input type="hidden" name="id" value="<?php echo $post['id']; ?>"></i></b></span>
			<div class="input-field">
	          <input id="title" value="<?php echo $post['title']; ?>" name="title" type="text" class="validate">
	          <label for="title">Title</label>
	        </div>
	         <div class="input-field">
			    <select name="category">
			      <?php 
			      	$categories = $db_conn->query('SELECT * FROM news_categories');
			      	if ($categories->num_rows > 0){
						while($category = $categories->fetch_assoc()){
							if ($post['categories_id'] == $category['id']) {
								echo '<option value="'.$category['id'].'" selected>'.$category['name'].'</option>';
								continue;
							}
			      ?>
			      	<option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
			      <?php 
					  }
					}
			       ?>
			    </select>
			    <label>Categories</label>
			  </div>
	        <div class="input-field">
	        	<textarea id="content" name="content" class="materialize-textarea">
	        		<?php echo $post['content']; ?>
	        	</textarea>
	        	<label for="content">Content</label>
	        </div>
	        <div class="file-field input-field">
	        	<div class="btn" style="background: transparent;box-shadow: none;border-bottom: 1px solid #9e9e9e;">
			        <span>
			        	<img src="../<?php echo $post['image']; ?>" style="width:100px;">
			        </span>
			        <input type="file">
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" name="image" type="text" value="<?php echo str_replace('images/', '', $post['image']); ?>">
			      </div>
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