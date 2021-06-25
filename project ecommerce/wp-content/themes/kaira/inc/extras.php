<?php  
/**
 * Extra Functions for kaira.
 *
 * @package kaira
 */
if( ! function_exists( 'kaira_author_bio_cb' ) ) :
/**
 * Author Bio 
*/
function kaira_author_bio_cb(){ 
    if( get_the_author_meta( 'description' ) ){ ?>

      <div class="author-section">
                <h2 class="author-header"><?php esc_html_e('ABOUT THE AUTHOR', 'kaira'); ?></h2>
                <hr>
                <div class="img-holder">
                  <?php echo get_avatar( get_the_author_meta( 'ID' ), 134, '', '', array( 'class' => array('img-responsive', 'img-circle') ) ); ?>
                </div>
                <div class="text-holder">
                  <h3 class="auhtor-name"><?php echo get_the_author(); ?></h3>
                  <?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?>
                </div>
              </div>
        
        
    <?php
    }
}
endif;
add_action( 'kaira_author_bio', 'kaira_author_bio_cb' );

/**
 * Footer Credits
*/
if ( ! function_exists( 'kaira_footer_credit' ) ) :

function kaira_footer_credit(){
    $copyright = esc_html__( 'Copyright ', 'kaira' ).get_bloginfo( 'name' ).' '.date_i18n('Y');
    $text  = '<div class="container"><div class="col-md-4 no-padding"><h2 class="copyright">';
    $text .= $copyright;
    $text .= '</h2></div><div class="col-md-4"><h3 class="powered">'; /* translators: %s: wordpress.org URL */ 
    $text .= sprintf( esc_html__( 'Proudly Powered By %s', 'kaira' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'kaira' ) ) .'" target="_blank">WordPress</a>.' );
    $text .= '</h3></div><div class="col-md-4"><h3 class="designed">';
    $text .=  esc_html__( 'Theme Kaira by ', 'kaira' );
    $text .= '<a href="' . esc_url( 'http://themethread.com/theme/kaira' ) .'" rel="author" target="_blank">' . esc_html__( 'ThemeThread', 'kaira' ) .'</a>. ';
    $text .= '</h3></div></div>';

    echo apply_filters( 'kaira_footer_text', $text ); // WPCS: xss ok
}

add_action( 'kaira_footer', 'kaira_footer_credit' );

endif;

/**
 * Callback function for Homepage Post
*/
if ( ! function_exists( 'kaira_homepage_post_cb' ) ) :

function kaira_homepage_post_cb(){
               
        $qry = new WP_Query( array( 
            'post_type' => 'post',     
        ) );
        
        if( $qry->have_posts() ){
            ?> 
                   
             <?php
                            while( $qry->have_posts() ){
                                $qry->the_post();
        
                                    get_template_part( 'template-parts/content', get_post_format() );                        
                                    
                            }
                        ?>
                    
        <?php             
        }   
        wp_reset_postdata();        
}
add_action( 'kaira_homepages_posts', 'kaira_homepage_post_cb' ); 

endif;


function kaira_header_title() {
	/*
	 * If header text is set to display, let's bail.
	 * hattip:  https://themetry.com/custom-header-text-display-option/
	 */
	if ( display_header_text() ) {
		return;
	}
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	</style>
	<?php	
}