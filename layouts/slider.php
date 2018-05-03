<?php if (empty($_GET)): ?>
<!-- Slider section start -->
<div class="section-slider">
	<div class="row">
		<div class="col s12 m8">
			<div class="active-post-img">
				<img src="images/test.png" class="responsive-img" />
			</div>
		</div>
		<div class="col s12 m4">
			<div class="slider-posts">
				<ul id="slider-posts">
					<?php 
				$sql = "SELECT * FROM news_posts ORDER BY created_at DESC LIMIT 3";
				$latest_posts = $db_conn->query($sql);
				if ($latest_posts->num_rows > 0){
					$i = 0;
					while($latest_post = $latest_posts->fetch_assoc()){
			            if (is_array($latest_post)) {
			            	if (count($latest_post) != 0) {
			            		$i++;
					?>
					<li class="<?php echo ($i == 1 ? 'active' : '');?>" data-src="<?php echo $latest_post['image']; ?>">
						<div class="card">
							<div class="card-content">
					          <a href="/?post=<?php echo $latest_post['id']; ?>">
					          	<?php echo $latest_post['title']; ?>
					          </a>
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
	</div>
</div>
<!-- Slider section end -->
<?php endif; ?>