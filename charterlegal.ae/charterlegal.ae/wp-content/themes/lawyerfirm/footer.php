<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lawyerfirm
 */

$lawyerfirm_options = lawyerfirm_theme_options();

$show_prefooter = $lawyerfirm_options['show_prefooter'];

?>

<footer id="colophon" class="site-footer">


	<?php if ($show_prefooter== 1){ ?>
	    <section class="footer-sec">
	        <div class="container">
	            <div class="row">
	                <?php if (is_active_sidebar('lawyerfirm_footer_1')) : ?>
	                    <div class="col-md-4">
	                        <?php dynamic_sidebar('lawyerfirm_footer_1') ?>
	                    </div>
	                    <?php
	                else: lawyerfirm_blank_widget();
	                endif; ?>
	                <?php if (is_active_sidebar('lawyerfirm_footer_2')) : ?>
	                    <div class="col-md-4">
	                        <?php dynamic_sidebar('lawyerfirm_footer_2') ?>
	                    </div>
	                    <?php
	                else: lawyerfirm_blank_widget();
	                endif; ?>
	                <?php if (is_active_sidebar('lawyerfirm_footer_3')) : ?>
	                    <div class="col-md-4">
	                        <?php dynamic_sidebar('lawyerfirm_footer_3') ?>
	                    </div>
	                    <?php
	                else: lawyerfirm_blank_widget();
	                endif; ?>
	            </div>
	        </div>
	    </section>
	<?php } ?>

		<div class="site-info">
		<p><?php esc_html_e('Powered By WordPress', 'lawyerfirm');
                    esc_html_e(' | ', 'lawyerfirm') ?>
					<span><a target="_blank" rel="nofollow"
                       href="<?php echo esc_url('https://www.flawlessthemes.com/theme/lawyerfirm-best-lawyer-and-attorney-wordpress-theme-ever/'); ?>"><?php esc_html_e('Lawyer Firm WordPress Theme' , 'lawyerfirm'); ?></a></span>
					
					
                </p> 
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
