<!-- Footer start -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<div class="footer-menu">
						<ul>
							<li><a href="/" class="flow-text">Home</a></li>
					<?php 
						$categories = $db_conn->query("SELECT * FROM news_categories");
				        while($category = $categories->fetch_assoc()){
				            if (is_array($category)) {
				            	if (count($category) != 0) {
				            		echo '<li><a href="/?category='.$category['id'].'" class="flow-text">'.$category['name'].'</a></li>';
				            	}
				            }
				        }
					?>
						</ul>
					</div>
				</div>
				<div class="col s12 m6">
					<div class="copyright">
						&copy; Copyright 2018
					</div>
				</div>
				<div class="col s12 m6">
					<div class="created-by right">
						@nanotexnolagiya
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer end -->

</body>
<?php $db_conn->close(); ?>
<!-- Scripts -->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<!-- Scripts end -->
</html>