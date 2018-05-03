<?php 
if (isset($_GET['add']) && $_GET['page'] == 'category'):
?>
<div class="row">
	<div class="col s12">
		<form id="catAdd">
			<?php $csrf_token = get_token("catAdd");?>
			<span><b><i><input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>"></i></b></span>
			<div class="input-field">
	          <input id="name" name="name" type="text" class="validate">
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
?>