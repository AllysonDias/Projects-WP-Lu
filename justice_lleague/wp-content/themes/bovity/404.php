<?php
/**
 * The template for displaying the 404 template in the Bovity theme.
 *
 * @package WordPress
 * @subpackage Bovity
 */

get_header();
$bovity_404_image = get_theme_mod(
    "404_background_image",
    BOVITY_THEME_URI . "/resources/images/404.jpg"
);
$bovity_404_title = get_theme_mod("bovity_404_title_settings", "404");

$bovity_404_subtitle = get_theme_mod(
    "bovity_404_subtitle",
    "Oops! Page Not Found"
);
$bovity_404_textarea = get_theme_mod(
    "bovity_404_textarea",
    "The page you are looking for might have been removed had its name changed or is temporarily unavailable."
);
$bovity_404_button = get_theme_mod("bovity_404_button", "Return To Home");
$bovity_404_button_url = get_theme_mod("bovity_404_button_url", "#");
?>
<div class="error-area" style="background-image: url('<?php echo esc_url(
    $bovity_404_image
); ?>');">
			<div class="d-table">
				<div class="d-table-cell">
					<div class="error-content">
						<h1><?php echo esc_html($bovity_404_title); ?></h1>
						<h3><?php echo esc_html($bovity_404_subtitle); ?></h3>
						<p><?php echo esc_html($bovity_404_textarea); ?></p>
						<a href="<?php echo esc_url($bovity_404_button_url
    						  ); ?>" class="default-btn active page-btn">
							<?php echo esc_html($bovity_404_button); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
<?php get_footer();
?>
