<?php
/**
 * Help Panel.
 *
 */
?>
<!-- Help file panel -->
<div id="help-panel" class="panel-left visible">
    <div class="panel-aside">
        <h4><?php esc_html_e( 'View Our Bovity Demo', 'bovity' ); ?></h4>
        <p><?php esc_html_e( 'Visit the demo to get more ideas about our theme design And Its Sections.', 'bovity' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://www.avadantathemes.com/demo/bovity-free/' ); ?>" title="<?php esc_attr_e( 'Visit the Demo', 'bovity' ); ?>" target="_blank">
            <?php esc_html_e( 'View Demo', 'bovity' ); ?>
        </a>
    </div><!-- .panel-aside -->
    <div class="panel-aside">
        <h4><?php esc_html_e( 'View Our Documentation Link', 'bovity' ); ?></h4>
        <p><?php esc_html_e( 'New to the WordPress world? Our documentation has step by step procedure to create a beautiful website.', 'bovity' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://www.avadantathemes.com/docs-category/bovity-free/' ); ?>" title="<?php esc_attr_e( 'Visit the Documentation', 'bovity' ); ?>" target="_blank">
            <?php esc_html_e( 'View Documentation', 'bovity' ); ?>
        </a>
    </div><!-- .panel-aside -->

    <div class="panel-aside">
        <h4><?php esc_html_e( 'Support Ticket', 'bovity' ); ?></h4>
        <p><?php printf( __( 'It\'s always a good idea to visit our %1$sKnowledge Base%2$s before you send us a support ticket.', 'bovity' ), '<a href="'. esc_url( 'https://www.avadantathemes.com/documentation/' ) .'" target="_blank">', '</a>' ); ?></p>
        <p><?php esc_html_e( 'If the Knowledge Base didn\'t answer your queries, submit us a support ticket here. Our response time usually is less than a business day, except on the weekends.', 'bovity' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://www.avadantathemes.com/contact/' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'bovity' ); ?>" target="_blank">
            <?php esc_html_e( 'Contact Support', 'bovity' ); ?>
        </a>
    </div><!-- .panel-aside -->

  
</div>