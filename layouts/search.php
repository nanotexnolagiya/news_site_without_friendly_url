<?php 
if (strlen($_GET['s']) > 2):

$search_in = strip_tags($_GET['s']);
$search_out = $db_conn->real_escape_string($search_in);
?>
<div class="row">
<?php $sql = "SELECT * FROM news_posts WHERE title LIKE '%".$search_out."%' OR content LIKE '%".$search_out."%'";
	$posts_search = $db_conn->query($sql);
	if ($posts_search->num_rows > 0){
		while($post_search = $posts_search->fetch_assoc()){
            if (is_array($post_search)) {
            	if (count($post_search) != 0) { ?>
	<div class="col s12 m6">
		<div class="post-image">
				<img src="<?php echo $post_search['image']; ?>" class="responsive-img" />
			</div>
			<div class="post-content">
				<h3 class="post-title">
					<a href="/?post=<?php echo $post_search['id']; ?>">
						<?php echo $post_search['title']; ?>
					</a>
				</h3>
				<div class="post-meta">
					<ul>
						<li class="post-date">
							<i class="fa fa-clock-o"></i>
							<?php echo date('d-m-Y', strtotime($post_search['created_at'])); ?>
						</li>
						<li class="post-views">
							<i class="fa fa-eye"></i>
							<?php echo $post_search['views']; ?>
						</li>
					</ul>
				</div>
				<p class="post-excerpt">
					<?php
						mb_internal_encoding("UTF-8");
						$excerpt = mb_substr($post_search['content'], 0, 40);
						echo $excerpt.'..'; 
					?>
				</p>
			</div>
	</div>
<?php 
				}
            }
        }
	}
	?>
</div>
<?php 
else:
	require_once('layouts/404.php');
endif;
?>