<?php
/**
 * Bovity functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Bovity
 */

if( ! defined( 'ABSPATH' ) )
{
    exit;
}

define('BOVITY_THEME_DIR', get_template_directory());
define('BOVITY_THEME_URI', get_template_directory_uri());
/**
 * Custom Header feature.
 */
require( BOVITY_THEME_DIR . '/theme-setup.php');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bovity_content_width() {

    $GLOBALS['content_width'] = apply_filters( 'bovity_content_width', 696 );
}
add_action( 'after_setup_theme', 'bovity_content_width', 0 ); 

$theme = wp_get_theme();

require( BOVITY_THEME_DIR .'/lib/customizer/customizer-alpha-color-picker/class-bovity-customize-alpha-color-control.php');

require( BOVITY_THEME_DIR . '/lib/breadcrumb/breadcrumbs-trail.php');

require( BOVITY_THEME_DIR . '/lib/enqueue-scripts.php');

require( BOVITY_THEME_DIR . '/lib/template-functions.php');

require(BOVITY_THEME_DIR . '/lib/template-tags.php');

require(BOVITY_THEME_DIR . '/lib/plugin-activator/class-tgm-plugin-activation.php');

require(BOVITY_THEME_DIR . '/lib/plugin-activator/hook-tgm.php');

require(BOVITY_THEME_DIR . '/lib/bovity-typography.php');

require(BOVITY_THEME_DIR . '/lib/customizer/bovity_customizer_sections.php');

require ( BOVITY_THEME_DIR . '/lib/customizer/bovity-customizer.php' );

require ( BOVITY_THEME_DIR . '/lib/custom-header.php' );

require ( BOVITY_THEME_DIR . '/lib/getting-started/getting-started.php' );

require ( BOVITY_THEME_DIR . '/lib/upgrade/class-customize.php' );

require ( BOVITY_THEME_DIR . '/lib/breadcrumb/bovity-breadcrumbs.php' );

require ( BOVITY_THEME_DIR . '/lib/theme-colors.php' );




add_action( 'wp_ajax_install_act_plugin', 'bovity_admin_install_plugin' );

function bovity_admin_install_plugin() {     
    /**
     * Install Plugin.
     */
    include_once ABSPATH . '/wp-admin/includes/file.php';
    include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

    if ( ! file_exists( WP_PLUGIN_DIR . '/avadanta-companion' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'avadanta-companion' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }

    // Activate plugin.
    if ( current_user_can( 'activate_plugin' ) ) {
        $result = activate_plugin( 'avadanta-companion/avadanta-companion.php' );
    }
}