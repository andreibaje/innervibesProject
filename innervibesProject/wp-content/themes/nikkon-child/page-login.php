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
				<?php
					if ( ! is_user_logged_in() ) { // Display WordPress login form:
					    $args = array(
					        'redirect' => home_url(), 
					        'form_id' => 'loginform',
					        'placeholder_username' => __( 'Username' ),
					        'label_password' => __( 'Password' ),
					        'label_remember' => __( 'Remember me' ),
					        'label_log_in' => __( 'Login' ),
					        'remember' => true
					    );
					    wp_login_form( $args );
					} else { // If logged in:
					    wp_loginout( home_url() ); // Display "Log Out" link.
					    echo " | ";
					    wp_register('', ''); // Display "Site Admin" link.
					}
				?>
				<p class="no-account">Don’t have an account? Click <a href="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>">here</a> to signup.</p>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
