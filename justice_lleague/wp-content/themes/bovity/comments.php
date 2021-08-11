<?php
/* Do not allow direct access to the file.
 * The template file for displaying the comments and comment form for the
 * Twenty Twenty theme.
 *
 * @package Bovity
 */

if (!defined("ABSPATH")) {
    exit();
}

if (post_password_required()) {
    return;
}
?>

<div class="wgs comments mb-md-0">
    <?php
 if (have_comments()): ?>
        <h3 class="wgs-heading mb-0">
            <?php
   $bovity_comment_count = get_comments_number();
   if ("1" === $bovity_comment_count) {
       printf(
           esc_html__('One thought on &ldquo;%1$s&rdquo;', "bovity"),
           "<span>" . esc_html(get_the_title()) . "</span>"
       );
   } else {
       printf(
           esc_html(
               _nx(
                   '%1$s thought on &ldquo;%2$s&rdquo;',
                   '%1$s thoughts on &ldquo;%2$s&rdquo;',
                   $bovity_comment_count,
                   "comments title",
                   "bovity"
               )
           ),
           number_format_i18n($bovity_comment_count),
           "<span>" . esc_html(get_the_title()) . "</span>"
       );
   }
   ?>
        </h3>
        <?php the_comments_navigation(); ?>

        
            <?php wp_list_comments(array(
       "style" => "ol",
       "short_ping" => true,
   )); ?>
        

        <?php
  the_comments_navigation();
  if (!comments_open()): ?>     
    <p class="no-comments"><?php esc_html_e(
     "Comments are closed.",
     "bovity"
 ); ?></p>
            <?php endif;
  endif;

 comment_form();
 ?>

</div>