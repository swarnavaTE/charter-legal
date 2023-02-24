<?php
if (!function_exists('lawyerfirm_theme_options')) :
    function lawyerfirm_theme_options()
    {
        $defaults = array(

            //banner section
            'header_button_txt' => '',
            'header_button_url' => '',
            'site_title_show' => '1',
            
            'show_image' => '1',
            'show_blog_author' => '1',
            'show_blog_date' => '1',
            'show_excerpts' => '1',
            
            'show_single_sidebar' => '1',
            'show_preloader' => '1',


            'show_prefooter' => 1,


        );

        $options = get_option('lawyerfirm_theme_options', $defaults);

        //Parse defaults again - see comments
        $options = wp_parse_args($options, $defaults);

        return $options;
    }
endif;
