
<!-- Posts by categories start -->
<div class="posts-by-category">
	<div class="row">
<?php 
$sql = "SELECT * FROM news_categories ORDER BY id ASC LIMIT 4";
$categories = $db_conn->query($sql);
if ($categories->num_rows > 0){
			while($category = $categories->fetch_assoc()){
	            if (is_array($category)) {
	            	if (count($category) != 0) {
?>
		<div class="col s12 m6">
			<h2><?php echo $category['name']; ?></h2>
			<div class="category-posts">
				<ul>
			<?php 
		$sql = 'SELECT * FROM news_posts WHERE categories_id LIKE '.$category['id'].' ORDER BY created_at DESC LIMIT 3';
		$posts_category = $db_conn->query($sql);
		if ($posts_category->num_rows > 0){
			while($post_category = $posts_category->fetch_assoc()){
	            if (is_array($post_category)) {
	            	if (count($post_category) != 0) {
			?>
					<li>
						<div class="card horizontal">
					      <div class="card-image">
					        <img src="<?php echo $post_category['image']; ?>">
					      </div>
					      <div class="card-stacked">
					        <div class="card-content">
					          <a href="/?post=<?php echo $post_category['id']; ?>">
					          	<?php echo $post_category['title']; ?>
					          </a>
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

					      </div>
					    </div>
					</li>

		<?php 
					}
	            }
	        }
		}
		?>
				</ul>
			</div>
		</div>
<?php 
			}
        }
    }
}
?>			
	</div>
</div>
<!-- Posts by categories end -->

<!-- Latest Posts start -->
<div class="latest-posts">
	<div class="row">
<?php $sql = "SELECT * FROM news_posts ORDER BY created_at DESC LIMIT 3";
		$latest_posts = $db_conn->query($sql);
		if ($latest_posts->num_rows > 0){
			while($latest_post = $latest_posts->fetch_assoc()){
	            if (is_array($latest_post)) {
	            	if (count($latest_post) != 0) { ?>
		<div class="col s12 m4">
			<div class="card sticky-action">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="<?php echo $latest_post['image']; ?>">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">
                	<a href="/?post=<?php echo $latest_post['id']; ?>">
                		<?php echo $latest_post['title']; ?>
                	</a>
                	<i class="material-icons right">more_vert</i>
                </span>
              </div>

              <div class="card-action">
                <a>
                	<i class="fa fa-clock-o"></i>
					<?php echo date('d-m-Y', strtotime($latest_post['created_at'])); ?>
                </a>
                <a>
                	<i class="fa fa-eye"></i>
					<?php echo $latest_post['views']; ?>
                </a>
              </div>

              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">
                	<?php echo $latest_post['title']; ?>
                	<i class="material-icons right">close</i>
                </span>
                <p class="post-excerpt">
					<?php
						mb_internal_encoding("UTF-8");
						$excerpt = mb_substr($latest_post['content'], 0, 100);
						echo $excerpt.'..'; 
					?>
				</p>
              </div>
            </div>
		</div>
<?php 		}
        }
    }
}?>
	</div>
</div>
<!-- Latest posts end -->