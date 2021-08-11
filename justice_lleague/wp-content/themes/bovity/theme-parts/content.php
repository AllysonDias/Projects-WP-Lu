<?php 
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bovity
 */
?>

<div class="col-lg-6 col-md-6">
    <div class="blog-card">
        <?php if(has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
        </a>
        <?php endif; ?>
        <div class="blog-content">
            <ul>
               <?php bovity_posted_on(); ?>
               <li>/</li>
               <?php bovity_posted_by(); ?>
               
            </ul>
            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
            <a href="<?php the_permalink(); ?>" class="more-blog">
                <i class="fa fa-long-arrow-right"></i>
                <?php echo esc_html__('Read More','bovity'); ?>
            </a>
        </div>
    </div>
</div>