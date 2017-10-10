<?php
/*
 *	Main WordPress plugin index page links and admin notices
*/

class WPGO_Simple_Sitemap_Links {

	protected $module_roots;

	/* Main class constructor. */
	public function __construct($module_roots) {

		$this->module_roots = $module_roots;

		add_filter( 'plugin_row_meta', array( &$this, 'plugin_action_links' ), 10, 2 );
		add_filter( 'plugin_action_links', array( &$this, 'plugin_settings_link' ), 10, 2 );
		register_activation_hook( __FILE__, array( &$this, 'set_admin_notice_transient' ) );
		add_action( 'admin_notices', array( &$this, 'admin_notice' ) );
	}

	/* Admin Notice first time plugin is activated. */
	public function admin_notice(){

		/* Only display admin notice if transient exists */
		if( get_transient( 'simple-sitemap-admin-notice' ) ){
			?>
			<div class="updated notice is-dismissible">
				<p>Welcome to Simple Sitemap! To get started right away please visit the plugin <a href="<?php echo get_admin_url() . 'options-general.php?page=simple-sitemap/classes/simple-sitemap-settings.php'; ?>"><strong>settings & documentation</strong></a> page.</p>
			</div>
			<?php
			// might not be needed to do this manually
			delete_transient( 'simple-sitemap-admin-notice' );
		}
	}

	/* Runs only when the plugin is activated. */
	public function set_admin_notice_transient() {
		// set transient to expire after 5 seconds
		set_transient( 'simple-sitemap-admin-notice', true, 5 );
	}

	// Display a Settings link on the main Plugins page
	public function plugin_action_links( $links, $file ) {

		//if ( $file == plugin_basename( __FILE__ ) ) {
		// add a link to pro plugin
		//$links[] = '<a style="color:limegreen;" href="https://wpgoplugins.com/plugins/simple-sitemap-pro/" target="_blank" title="Upgrade to Pro - 100% money back guarantee"><span class="dashicons dashicons-awards"></span></a>';
		//}

		return $links;
	}

	// Display a Settings link on the main Plugins page
	public function plugin_settings_link( $links, $file ) {

		if ( $file == 'simple-sitemap/simple-sitemap.php') {
			$pccf_links = '<a href="' . get_admin_url() . 'options-general.php?page=simple-sitemap/classes/simple-sitemap-settings.php">' . __( 'Getting Started' ) . '</a>';
			array_unshift( $links, $pccf_links );

			$pccf_links = '<a style="color:#60a559;" href="https://wpgoplugins.com/plugins/simple-sitemap-pro/" target="_blank" title="Try Simple Sitemap Pro today - 100% money back guarantee"><b>Upgrade to Pro</b></a>';
			array_push( $links, $pccf_links );
		}

		return $links;
	}

} /* End class definition */