<?php
require get_template_directory(). '/elementor/elementor-helper.php';

add_action( 'elementor/widgets/widgets_registered', 'lawyerfirm_extra_elementor_widgets' );

function lawyerfirm_extra_elementor_widgets($widgets_manager){
    // We check if the Elementor plugin has been installed / activated.
    if(defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')) {

        require get_template_directory(). '/elementor/lawyerfirm-elementor-blog.php';

    }
}