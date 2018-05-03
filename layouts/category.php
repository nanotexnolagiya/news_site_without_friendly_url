<?php
$category_id = intval($_GET['category']);
if (is_int($category_id)):
?>
<div class="row">
<?php $sql = 'SELECT * FROM news_posts WHERE categories_id LIKE '.$category_id.' ORDER BY created_at DESC';
	$posts_category = $db_conn->query($sql);
	if ($posts_category->num_rows > 0){
		while($post_category = $posts_category->fetch_assoc()){
            if (is_array($post_category)) {
            	if (count($post_category) != 0) { ?>

	<div class="col s12 m6">
		<div class="card sticky-action">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="<?php echo $post_category['image']; ?>">
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">
            	<a href="/?post=<?php echo $post_category['id']; ?>">
            		<?php echo $post_category['title']; ?>
            	</a>
            	<i class="material-icons right">more_vert</i>
            </span>
          </div>

          <div class="card-action">
            <a>
            	<i class="fa fa-clock-o"></i>
				<?php echo date('d-m-Y', strtotime($post_category['created_at'])); ?>
            </a>
            <a>
            	<i class="fa fa-eye"></i>
				<?php echo $post_category['views']; ?>
            </a>
          </div>

          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">
            	<?php echo $post_category['title']; ?>
            	<i class="material-icons right">close</i>
            </span>
            <p class="post-excerpt">
				<?php
					mb_internal_encoding("UTF-8");
					$excerpt = mb_substr($post_category['content'], 0, 100);
					echo $excerpt.'..'; 
				?>
			</p>
          </div>
        </div>
	</div>
<?php 
				}
            }
        }
	}else{
    require_once('layouts/404.php');
  }
	?>
</div>
<?php 
else:
	require_once('layouts/404.php');
endif;
?>