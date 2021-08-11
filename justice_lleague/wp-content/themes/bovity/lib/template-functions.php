<?php
    /**
     * Functions which enhance the theme by hooking into WordPress
     *
     * @package Bovity
     */

function bovity_theme_sidebars() {

    // Blog Sidebar

    register_sidebar(array(
        'name' => esc_html__( 'Blog Sidebar', "bovity"),
        'id' => 'main-sidebar', 
        'description' => esc_html__( 'Sidebar on the blog layout.', 'bovity'),
        'before_widget' => '<div id="%1$s" class="blog-widget bovity-sidebar-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="title">',
        'after_title' => '</h3>',
    ));
        

    // Footer Sidebar


    register_sidebars( 4, array(
    'name'          => esc_html__( 'Footer Area %d', 'bovity' ),
    'id'            => 'bovity-footer-area',
    'description'   => esc_html__( 'Added widgets are display at footer widget area.', 'bovity' ),
    'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget' => '</div>', 
        'before_title' => ' <h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );


    register_sidebar(array(
        'name' => esc_html__( 'Top Modal Sidebar', "bovity"),
        'id' => 'modal-sidebar',
        'description' => esc_html__( 'Sidebar for Top Sidebar.', "bovity"),
        'before_widget' => '<div id="%1$s" class="blog-widget sidebar-modal-widget bovity-sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="title">',
        'after_title' => '</h3>',
    ));


        register_sidebar(array(
        'name' => esc_html__( 'Woocomerce Sidebar', "bovity"),
        'id' => 'Woocomerce-sidebar',
        'description' => esc_html__( 'Sidebar For Woocommerce.', "bovity"),
        'before_widget' => '<div id="%1$s" class="blog-widget bovity-sidebar-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="title">',
        'after_title' => '</h3>',
    ));
}
add_action( 'widgets_init', 'bovity_theme_sidebars' );


if( ! function_exists( 'bovity_admin_notice' ) ) :
/**
 * Addmin notice for getting started page
*/
function bovity_admin_notice(){
    global $pagenow;
    $theme_args      = wp_get_theme();
    $meta            = get_option( 'bovity_admin_notice' );
    $name            = $theme_args->__get( 'Name' );
    $current_screen  = get_current_screen();
    
    if( 'themes.php' == $pagenow && !$meta ){
        
        if( $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' ){
            return;
        }

        if( is_network_admin() ){
            return;
        }

        if( ! current_user_can( 'manage_options' ) ){
            return;
        } ?>

        <div class="welcome-message notice notice-info">
            <div class="notice-wrapper">
                <div class="notice-text">
                    <h3><?php esc_html_e( 'Congratulations! For Activating Bovity Theme', 'bovity' ); ?></h3>
                    <p><?php printf( __( '%1$s is now installed and ready to usefor you.Install and Activate Avadanta Companion Plugin to get advantages of Our Theme Homepage', 'bovity' ), esc_html( $name ) ) ; ?></p>
                    <a class="bovity-btn-get-started button button-secondary" href="#" data-name="" data-slug="">
                        <?php
                        printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                            esc_html__( 'Install Avadanta Companon', 'bovity' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                        ?>


                        </a>
                                            <p><?php printf( __( 'Customize Theme', 'bovity' ), esc_html( $name ) ) ; ?></p>

                                            <p><a href="<?php echo esc_url( admin_url( 'themes.php?page=avadanta-getting-started' ) ); ?>" class="button button-primary" style="text-decoration: none;"><?php esc_html_e( 'Getting Started', 'bovity' ); ?></a></p>
                    <p class="dismiss-link"><strong><a href="?bovity_admin_notice=1" class="dismiss-getting"><?php esc_html_e( 'Dismiss', 'bovity' ); ?></a></strong></p>
                </div>
              
            </div>
        </div>
    <?php }
}
endif;
add_action( 'admin_notices', 'bovity_admin_notice' );

if( ! function_exists( 'bovity_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
*/
function bovity_update_admin_notice(){
    if ( isset( $_GET['bovity_admin_notice'] ) && $_GET['bovity_admin_notice'] = '1' ) {
        update_option( 'bovity_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'bovity_update_admin_notice' );


function avadanta_check_plugin() {
  if ( !is_plugin_active('avadanta-companion/avadanta-companion.php') ) {

    add_filter( 'theme_page_templates', 'avadanta_remove_page_template' );
    function avadanta_remove_page_template( $pages_templates ) {
    unset( $pages_templates['main-page.php'] );
    return $pages_templates;
}

  }
}
add_action( 'admin_init', 'avadanta_check_plugin' );


add_action( 'wp_ajax_install_act_plugin', 'avadanta_admin_install_plugin' );

?>