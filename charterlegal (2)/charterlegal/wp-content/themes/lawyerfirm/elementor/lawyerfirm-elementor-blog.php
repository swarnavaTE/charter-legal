<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Define our Pt Elementor Call Out settings.
 */
class lawyerfirm_elementor_blog extends Widget_Base {
	/**
	 * Define our get_name settings.
	 */
	public function get_name() {
		return 'Ctea-blog';
	}
	/**
	 * Define our get_title settings.
	 */
	public function get_title() {
		return __( 'Blog', 'lawyerfirm' );
	}
	/**
	 * Define our get_icon settings.
	 */
	public function get_icon() {
		return 'eicon-call-to-action';
	}
	/**
	 * Define our get_categories settings.
	 */
	public function get_categories() {
		return [ 'extra-elementor-widget' ];
	}
	/**
	 * Define our _register_controls settings.
	 */
	protected function register_controls()
    {
        /**
         * Info Box Title and Description Section.
         */
        $this->start_controls_section(
            'lawyerfirm_blog_section',
            [
                'label' => esc_html__('Blog Content', 'lawyerfirm'),
            ]
        );
        $this->add_control(
            'lawyerfirm_blog_category',
            [
                'label' => __('Select', 'lawyerfirm'),
                'type' => Controls_Manager::SELECT2,
                'default' => array(),
                'options' => lawyerfirm_blog_category(),
                'multiple' => true

            ]
        );
        $this->add_control(
            'lawyerfirm_blog_select_count',
            [
                'label' => __('No. Of Category', 'lawyerfirm'),
                'type' => Controls_Manager::NUMBER,
                'default' =>4,
            ]
        );

        $this->end_controls_section();

    }
	/**
	 * Define our Content Display inline settings.
	 */
	protected function add_inline_editing_attributes( $key, $toolbar = 'basic' ) {
		if ( ! Plugin::$instance->editor->is_edit_mode() ) {
			return;
		}
		$this->add_render_attribute( $key, [
			'class' => 'elementor-inline-editing',
			'data-elementor-setting-key' => $key,
		] );
		if ( 'basic' !== $toolbar ) {
			$this->add_render_attribute( $key, [
				'data-elementor-inline-editing-toolbar' => $toolbar,
			] );
		}
	}

	/**
	 * Define our Content Display settings.
	 */
	protected function render() {
		$settings = $this->get_settings();
        $tax = $settings['lawyerfirm_blog_category'];
        $no_of_posts = $settings['lawyerfirm_blog_select_count'];
        $loop = ($no_of_posts<=0)?30:$no_of_posts;
        if($tax){
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => esc_attr($loop),
                'post_status' => 'publish',
                'order' => 'desc',
                'orderby' => 'menu_order date',
                'tax_query' =>
                    array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'id',
                            'terms' => $tax,
                        ),
                    ),
            );
        }
        else{
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => esc_attr($loop),
                'post_status' => 'publish',
                'order' => 'desc',
                'orderby' => 'menu_order date',
            );
        }

        $query = new \WP_Query($args);

         if ($query->have_posts()):
            ?>
            <div class="blog-section section">
                <div class="container">
                    <div class="row">
                        <?php
                        while ($query->have_posts()) : $query->the_post();
                            global $post;
                            $post_format = get_post_format($post->ID);
                            $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                            $image = wp_get_attachment_image_src($post_thumbnail_id, 'hotel-vivanta-blog-thumbnail-img');
                            $content = get_the_content();
  

                            if (!empty($image)) {
                                $image_style = "style='background-image:url(" . esc_url($image[0]) . ")'";
                            } else {
                                $image_style = '';
                            }

                            if($loop>=1) :
                                ?>
                                <div class="col-md-4">
                                    <div class="post-wrap">
                                     
                                    <img src="<?php echo esc_url($image[0]); ?>" alt="" />
                                    <h3><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h3>
                                        <div class="post-review">
                                            <?php
                                            $comment_count = get_comments_number();
                                            $archive_year  = get_the_time('Y');
                                            $archive_month = get_the_time('m');
                                            echo '<div class="entry-meta"><div class="author"><a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'" title="'.esc_attr(get_the_author()).'">';
                                            ?>

                                            <?php echo '<span>'.get_the_author().'</span></a></div>';
                
                                            echo '<div class="date"><a href="'.esc_url(get_month_link($archive_year,$archive_month)).'"><i class="fa fa-clock-o" aria-hidden="true"></i><span>'.esc_html(get_the_date()).'</span></a></div></div>';
                                            ?>
                                            <p class="post-description"><?php echo wp_kses_post(lawyerfirm_get_excerpt(get_the_ID(), 125)); ?></p>
                                            <a href="<?php echo esc_url(get_the_permalink()); ?>" class="btn btn-default"><?php echo esc_html__('Read more', 'lawyerfirm'); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <?php $loop--; endif; endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        <?php endif;
	}
	
}
/*=============Call this every widget ====================*/
Plugin::instance()->widgets_manager->register_widget_type( new lawyerfirm_elementor_blog() );

