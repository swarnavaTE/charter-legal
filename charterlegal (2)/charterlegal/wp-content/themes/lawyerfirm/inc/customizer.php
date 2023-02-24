<?php
/**
 * lawyerfirm Theme Customizer
 *
 * @package lawyerfirm
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lawyerfirm_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$lawyerfirm_options = lawyerfirm_theme_options();

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'lawyerfirm_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'lawyerfirm_customize_partial_blogdescription',
			)
		);
	}

    $wp_customize->add_setting('lawyerfirm_theme_options[site_title_show]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $lawyerfirm_options['site_title_show'],
            'sanitize_callback' => 'lawyerfirm_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('lawyerfirm_theme_options[site_title_show]',
        array(
            'label' => esc_html__('Show Title & Tagline', 'lawyerfirm'),
            'type' => 'Checkbox',
            'section' => 'title_tagline',

        )
    );
    $wp_customize->add_panel(
        'theme_options',
        array(
            'title' => esc_html__('Theme Options', 'lawyerfirm'),
            'priority' => 2,
        )
    );



  
    $wp_customize->add_section(
        'header_section',
        array(
            'title' => esc_html__( 'Header Section','lawyerfirm' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );

	$wp_customize->add_setting('lawyerfirm_theme_options[header_button_txt]',
	    array(
	        'type' => 'option',
	        'default' => $lawyerfirm_options['header_button_txt'],
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control('lawyerfirm_theme_options[header_button_txt]',
	    array(
	        'label' => esc_html__('Button Text', 'lawyerfirm'),
	        'type' => 'text',
	        'section' => 'header_section',
	        'settings' => 'lawyerfirm_theme_options[header_button_txt]',
	    )
	);
	$wp_customize->add_setting('lawyerfirm_theme_options[header_button_url]',
	    array(
	        'type' => 'option',
	        'default' => $lawyerfirm_options['header_button_url'],
	        'sanitize_callback' => 'lawyerfirm_sanitize_url',
	    )
	);
	$wp_customize->add_control('lawyerfirm_theme_options[header_button_url]',
	    array(
	        'label' => esc_html__('Button Link', 'lawyerfirm'),
	        'type' => 'text',
	        'section' => 'header_section',
	        'settings' => 'lawyerfirm_theme_options[header_button_url]',
	    )
	);

    $wp_customize->add_section(
        'blog_section',
        array(
            'title' => esc_html__( 'Blog Cards','lawyerfirm' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );
    $wp_customize->add_setting('lawyerfirm_theme_options[show_image]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $lawyerfirm_options['show_image'],
            'sanitize_callback' => 'lawyerfirm_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('lawyerfirm_theme_options[show_image]',
        array(
            'label' => esc_html__('Show Featured Image in Blog Cards and Single Posts Page', 'lawyerfirm'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'blog_section',

        )
    );
    $wp_customize->add_setting('lawyerfirm_theme_options[show_blog_date]',
    array(
        'type' => 'option',
        'default'        => true,
        'default' => $lawyerfirm_options['show_blog_date'],
        'sanitize_callback' => 'lawyerfirm_sanitize_checkbox',
    )
);

$wp_customize->add_control('lawyerfirm_theme_options[show_blog_date]',
    array(
        'label' => esc_html__('Show Date Meta in Blog Cards and Single Posts Page', 'lawyerfirm'),
        'type' => 'Checkbox',
        'priority' => 1,
        'section' => 'blog_section',

    )
);

$wp_customize->add_setting('lawyerfirm_theme_options[show_blog_author]',
array(
    'type' => 'option',
    'default'        => true,
    'default' => $lawyerfirm_options['show_blog_author'],
    'sanitize_callback' => 'lawyerfirm_sanitize_checkbox',
)
);

$wp_customize->add_control('lawyerfirm_theme_options[show_blog_author]',
array(
    'label' => esc_html__('Show Author Meta in Blog Cards and Single Posts Page', 'lawyerfirm'),
    'type' => 'Checkbox',
    'priority' => 1,
    'section' => 'blog_section',

)
);

$wp_customize->add_setting('lawyerfirm_theme_options[show_excerpts]',
array(
    'type' => 'option',
    'default'        => true,
    'default' => $lawyerfirm_options['show_excerpts'],
    'sanitize_callback' => 'lawyerfirm_sanitize_checkbox',
)
);

$wp_customize->add_control('lawyerfirm_theme_options[show_excerpts]',
array(
    'label' => esc_html__('Show Excerpts in Blog Cards', 'lawyerfirm'),
    'type' => 'Checkbox',
    'priority' => 1,
    'section' => 'blog_section',

)
);

$wp_customize->add_section(
    'single_post',
    array(
        'title' => esc_html__( 'Single Posts','lawyerfirm' ),
        'panel'=>'theme_options',
        'capability'=>'edit_theme_options',
    )
);
$wp_customize->add_setting('lawyerfirm_theme_options[show_single_sidebar]',
array(
    'type' => 'option',
    'default'        => true,
    'default' => $lawyerfirm_options['show_single_sidebar'],
    'sanitize_callback' => 'lawyerfirm_sanitize_checkbox',
)
);

$wp_customize->add_control('lawyerfirm_theme_options[show_single_sidebar]',
array(
    'label' => esc_html__('Show Sidebar in Single Posts Page', 'lawyerfirm'),
    'type' => 'Checkbox',
    'priority' => 1,
    'section' => 'single_post',

)
);


$wp_customize->add_section(
    'preloader_section',
    array(
        'title' => esc_html__( 'Preloader Section','lawyerfirm' ),
        'panel'=>'theme_options',
        'capability'=>'edit_theme_options',
    )
);
$wp_customize->add_setting('lawyerfirm_theme_options[show_preloader]',
array(
    'type' => 'option',
    'default'        => true,
    'default' => $lawyerfirm_options['show_preloader'],
    'sanitize_callback' => 'lawyerfirm_sanitize_checkbox',
)
);

$wp_customize->add_control('lawyerfirm_theme_options[show_preloader]',
array(
    'label' => esc_html__('Show Pre-Loader', 'lawyerfirm'),
    'type' => 'Checkbox',
    'priority' => 1,
    'section' => 'preloader_section',

)
);




    $wp_customize->add_section(
        'prefooter_section',
        array(
            'title' => esc_html__( 'Prefooter Section','lawyerfirm' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );

    $wp_customize->add_setting('lawyerfirm_theme_options[show_prefooter]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $lawyerfirm_options['show_prefooter'],
            'sanitize_callback' => 'lawyerfirm_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('lawyerfirm_theme_options[show_prefooter]',
        array(
            'label' => esc_html__('Show Prefooter Section', 'lawyerfirm'),
			'description' => esc_html__('Copyright text can be changed in Premium Version only', 'lawyerfirm'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'prefooter_section',

        )
    );
}
add_action( 'customize_register', 'lawyerfirm_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function lawyerfirm_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function lawyerfirm_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lawyerfirm_customize_preview_js() {
	wp_enqueue_script( 'lawyerfirm-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'lawyerfirm_customize_preview_js' );
