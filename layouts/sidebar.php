<aside class="sidebar">
	<div class="widget">
		<h2 class="widget-title">Popular</h2>
		<div class="posts-widget">
			<ul>
		<?php 
		$sql = "SELECT * FROM news_posts ORDER BY views DESC LIMIT 4";
		$popular_posts = $db_conn->query($sql);
		if ($popular_posts->num_rows > 0){
			while($popular_post = $popular_posts->fetch_assoc()){
	            if (is_array($popular_post)) {
	            	if (count($popular_post) != 0) {
			?>
				<li>
					<div class="card">
						<div class="card-content">
				          <a href="/?post=<?php echo $popular_post['id']; ?>">
				          	<?php echo $popular_post['title']; ?>
				          </a>
				        </div>
				        <div class="card-action">
				          <a>
		                	<i class="fa fa-clock-o"></i>
							<?php echo date('d-m-Y', strtotime($popular_post['created_at'])); ?>
		                  </a>
		                  <a>
		                	<i class="fa fa-eye"></i>
							<?php echo $popular_post['views']; ?>
		                  </a>
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
	<div class="widget">
		<h2 class="widget-title">Interesting</h2>
		<div class="posts-widget">
			<ul>
		<?php 
		$sql = "SELECT * FROM news_posts ORDER BY views ASC LIMIT 4";
		$interesting_posts = $db_conn->query($sql);
		if ($interesting_posts->num_rows > 0){
			while($interesting_post = $interesting_posts->fetch_assoc()){
	            if (is_array($interesting_post)) {
	            	if (count($interesting_post) != 0) {
			?>
				<li>
					<div class="card">
						<div class="card-content">
				          <a href="/?post=<?php echo $interesting_post['id']; ?>">
				          	<?php echo $interesting_post['title']; ?>
				          </a>
				        </div>
				        <div class="card-action">
				          <a>
		                	<i class="fa fa-clock-o"></i>
							<?php echo date('d-m-Y', strtotime($interesting_post['created_at'])); ?>
		                  </a>
		                  <a>
		                	<i class="fa fa-eye"></i>
							<?php echo $interesting_post['views']; ?>
		                  </a>
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
</aside>