<div class="row">
	<div class="col s12">
		<a href="/admin/?page=category&add" class="add waves-effect waves-light btn-large"><i class="material-icons right">add</i>Add Category</a>
	</div>
</div>
<div class="row">
	<div class="col s12">
		<table class="striped responsive-table">
			<tr>
				<td>#ID</td>
				<td>Name</td>
				<td>Created date</td>
				<td>Actions</td>
			</tr>
			<?php $sql = 'SELECT * FROM news_categories';
	$categories = $db_conn->query($sql);
	if ($categories->num_rows > 0){
		while($category = $categories->fetch_assoc()){
            if (is_array($category)) {
            	if (count($category) != 0) { ?>
		<tr>
			<td><?php echo $category['id']; ?></td>
			<td><?php echo $category['name']; ?></td>
			<td><?php echo date('d-m-Y', strtotime($category['created_at'])); ?></td>
			<td>
				<a href="/admin/?page=category&edit=<?php echo $category['id']; ?>">
					<i class="fa fa-edit"></i>
				</a>
				&nbsp;&nbsp;
				<a href="javascript:void(0);" class="catDelete" data-token="<?php echo get_token('catDelete'); ?>" data-id="<?php echo $category['id']; ?>">
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