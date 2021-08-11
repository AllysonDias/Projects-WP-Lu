<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bovity
 */
get_header();

$bovity_header_show_blog = get_theme_mod("bovity_header_show_blog", 0);
if ($bovity_header_show_blog == 0) {
    bovity_breadcrumbs();
}
?>
        <div class="blog-page-area pt-100 pb-70">
            <div class="container">
                <div class="row">
			<?php
   $bovity_blog_layout = get_theme_mod(
       "bovity_blog_temp_layout",
       "rightsidebar"
   );

   if ($bovity_blog_layout == "leftsidebar") {
       get_sidebar();
       $bovity_float = 8;
   } elseif ($bovity_blog_layout == "fullwidth") {
       $bovity_float = 12;
   } elseif ($bovity_blog_layout == "rightsidebar") {
       $bovity_float = 8;
   } else {
       $bovity_blog_layout = "rightsidebar";
       $bovity_float = 8;
   }
   ?>
			<div class="col-lg-<?php echo $bovity_float; ?>">
				<div class="row">
					<?php if (have_posts()):
         if (!is_home() && is_front_page()): ?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<?php endif;

         /* Start the Loop */
         while (have_posts()):
             the_post();
             /*
              * Include the Post-Type-specific template for the content.
              * If you want to override this in a child theme, then include a file
              * called content-___.php (where ___ is the Post Type name) and that will be used instead.
              */
             get_template_part("theme-parts/content", get_post_type());
         endwhile;
     else:
         get_template_part("theme-parts/content", "none");
     endif; ?>
						
					<?php the_posts_pagination(); ?>
                </div>
               </div>
                <?php if ($bovity_blog_layout == "rightsidebar") {
                    get_sidebar();
                } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
