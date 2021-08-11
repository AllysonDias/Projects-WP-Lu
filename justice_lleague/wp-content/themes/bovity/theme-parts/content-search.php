<div class="col-lg-6 col-md-6">
    <div class="blog-card">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
        </a>
        <div class="blog-content">
            <ul>
               <?php bovity_posted_on(); ?>
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