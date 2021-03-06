<?php if ( !is_front_page() ) : ?>
    <?php if ( !get_theme_mod( 'nikkon-page-remove-titlebar' ) ) : ?>
    
        <header class="entry-header">
            
            <?php if ( is_home() ) :
                $blog_page_id = get_option( 'page_for_posts' );  ?>
                
                <?php echo '<h3 class="entry-title">' . get_page( $blog_page_id )->post_title . '</h3>'; ?>
            
            <?php elseif ( is_archive() ) : ?>
                
                <h3 class="entry-title"><?php the_archive_title(); ?></h3>
                <?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
            
            <?php elseif ( is_search() ) : ?>
                
                <h3 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'nikkon' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
            
            <?php elseif ( is_singular() ) : ?>
                
                <?php echo '<h3 class="entry-title">' . get_the_title( get_the_ID() ) . '</h3>'; ?>
                
            <?php elseif ( nikkon_is_woocommerce_activated() ) : ?>
                
                <?php if ( is_shop() ) :
                    $shop_id = get_option( 'woocommerce_shop_page_id' ); ?>
                    
                    <?php echo '<h3 class="entry-title">' . get_page( $shop_id )->post_title . '</h3>'; ?>
                <?php endif; ?>
            
            <?php else : ?>
                
                <h3 class="entry-title"><?php the_title(); ?></h3>
                
            <?php endif; ?>
            
            <?php if ( ! is_front_page() ) : ?>
        
    	        <?php if ( function_exists( 'bcn_display' ) ) : ?>
    		        <div class="breadcrumbs">
    		            <?php bcn_display(); ?>
    		        </div>
    	        <?php endif; ?>
    	        
    	    <?php endif; ?>
            
        </header><!-- .entry-header -->
    
    <?php endif; ?>
<?php endif; ?>