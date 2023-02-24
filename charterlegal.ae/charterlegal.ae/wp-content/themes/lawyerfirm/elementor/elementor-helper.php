<?php
namespace Elementor;
function extra_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'extra-elementor-widget',

        [
            'title'  => 'Extra Elementor Widgets',
            'icon' => 'font'
        ],
        1
    );
}
add_action('elementor/init','Elementor\extra_elementor_init');