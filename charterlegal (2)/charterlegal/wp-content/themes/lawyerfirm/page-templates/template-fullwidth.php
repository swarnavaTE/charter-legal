<?php
/**
 *
 * Template Name: Fullwidth Template

 *
 * @package lawyerfirm
 */
get_header();
?>
<div class="fullwidth-page section">
<?php if ( have_posts() ) : ?>

<?php while ( have_posts() ) : ?>
  <?php the_post(); ?>
    <?php the_content();?>
<?php endwhile;

endif; ?>
</div>


<?php

get_footer();
