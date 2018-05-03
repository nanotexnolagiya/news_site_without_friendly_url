<?php 
if (isset($_GET['add']) && $_GET['page'] == 'post'):
?>
<div class="row">
	<div class="col s12">
		<form id="postAdd">
			<?php $csrf_token = get_token("postAdd");?>
			<span><b><i><input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>"></i></b></span>
			<div class="input-field">
	          <input id="title" name="title" type="text" class="validate">
	          <label for="title">Title</label>
	        </div>
	         <div class="input-field">
			    <select name="category">
			    	<option selected disabled>Selected category</option>
			      <?php 
			      	$categories = $db_conn->query('SELECT * FROM news_categories');
			      	if ($categories->num_rows > 0){
						while($category = $categories->fetch_assoc()){
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
	        	</textarea>
	        	<label for="content">Content</label>
	        </div>
	        <div class="file-field input-field">
	        	<div class="btn">
			        <span>
			        	Image
			        </span>
			        <input type="file">
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" name="image" type="text" placeholder="Selected image">
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
?>