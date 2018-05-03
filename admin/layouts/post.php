<div class="row">
	<div class="col s12">
		<a href="/admin/?page=post&add" class="add waves-effect waves-light btn-large"><i class="material-icons right">add</i>Add Post</a>
	</div>
</div>
<div class="row">
	<div class="col s12">
		<table class="striped responsive-table">
			<tr>
				<td>#ID</td>
				<td>Image</td>
				<td>Title</td>
				<td>Category</td>
				<td>Views</td>
				<td>Created</td>
				<td>Actions</td>
			</tr>
			<?php $sql = 'SELECT * FROM news_posts';
	$posts = $db_conn->query($sql);
	if ($posts->num_rows > 0){
		while($post = $posts->fetch_assoc()){
            if (is_array($post)) {
            	if (count($post) != 0) {
            		$category = $db_conn->query('SELECT * FROM news_categories WHERE id = '.$post['categories_id']);
            		$cat = @$category->fetch_assoc();
            	 ?>
		<tr>
			<td><?php echo $post['id']; ?></td>
			<td><img src="../<?php echo $post['image']; ?>" style="width: 100px;"></td>
			<td><?php echo $post['title']; ?></td>
			<td><?php echo $cat['name']; ?></td>
			<td><?php echo $post['views']; ?></td>
			<td><?php echo date('d-m-Y', strtotime($post['created_at'])); ?></td>
			<td>
				<a href="/admin/?page=post&edit=<?php echo $post['id']; ?>">
					<i class="fa fa-edit"></i>
				</a>
				&nbsp;&nbsp;
				<a href="javascript:void(0);" class="postDelete" data-token="<?php echo get_token('postDelete'); ?>" data-id="<?php echo $post['id']; ?>">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>
<?php 
				}
            }
        }
	}
	?>
		</table>
	</div>
</div>