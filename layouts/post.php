<?php 
$id = intval($_GET['post']);
if (is_int($id)):
	$post_obj = $db_conn->query('SELECT * FROM news_posts WHERE id LIKE '.$id.'');
	if ($post_obj->num_rows > 0 && $post = $post_obj->fetch_assoc()):
		$views = intval($post['views']) + 1;
		$db_conn->query("UPDATE news_posts SET views = '".$views."' WHERE id = ".$id);
?>
<article>
	<div class="post-image">
		<img src="<?php echo $post['image']; ?>" class="responsive-img">
	</div>
	<div class="post-content">
		<h3 class="post-title">
			<a href="javascript:void(0);">
				<?php echo $post['title']; ?>
			</a>
		</h3>
		<div class="post-meta">
			<ul>
				<li class="post-date">
					<i class="fa fa-clock-o"></i>
					<?php echo date('d-m-Y', strtotime($post['created_at'])); ?>
				</li>
				<li class="post-views">
					<i class="fa fa-eye"></i>
					<?php echo $post['views']; ?>
				</li>
			</ul>
		</div>
		<p class="post-excerpt">
			<?php echo $post['content']; ?>
		</p>
	</div>
</article>
<?php 
	else:
		require_once('layouts/404.php');
	endif;
else:
	require_once('layouts/404.php');
endif;
?>