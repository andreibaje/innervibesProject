<?php
get_header(); ?>

	<div id="primary" class="content-area">
		<div class="user-section">
			<div class="user-section-info">
				<img src="http://localhost/innervibes/wordpress/wp-content/uploads/2017/09/login-image.jpg" alt="Login image">
				<span class="bg-with-opacity"></span>
				<div class="user-section-text">
					<p>SURROUND YOURSELF 
						<br>
						WITH GOOD VIBES.
					</p>
					your enviroment influences your experience. 
					make it a positive one.
				</div>
			</div>
			<div class="user-section-form">
				<p class="form-heading">Let the good vibes
					<br>
					invasion begin!
				</p>
				<form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
				    <input type="text" name="user_login" placeholder="Username" id="user_login" class="input" />
				    <input type="text" name="user_email" placeholder="E-Mail" id="user_email" class="input"  />
				    <?php do_action('register_form'); ?>
				    <input type="submit" value="Register" id="register" />
				</form>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
