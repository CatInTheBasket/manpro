<?php
/**
 * VW Writer Blog Theme Customizer
 *
 * @package VW Writer Blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_writer_blog_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_writer_blog_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-writer-blog' ),
	    'description' => __( 'Description of what this panel does.', 'vw-writer-blog' ),
	) );

	$wp_customize->add_section( 'vw_writer_blog_left_right', array(
    	'title'      => __( 'General Settings', 'vw-writer-blog' ),
		'priority'   => 30,
		'panel' => 'vw_writer_blog_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_writer_blog_theme_options',array(
        'default' => __('Right Sidebar','vw-writer-blog'),
        'sanitize_callback' => 'vw_writer_blog_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_writer_blog_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','vw-writer-blog'),
        'section' => 'vw_writer_blog_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-writer-blog'),
            'Right Sidebar' => __('Right Sidebar','vw-writer-blog'),
            'One Column' => __('One Column','vw-writer-blog'),
            'Three Columns' => __('Three Columns','vw-writer-blog'),
            'Four Columns' => __('Four Columns','vw-writer-blog'),
            'Grid Layout' => __('Grid Layout','vw-writer-blog')
        ),
	) );

	$wp_customize->add_section( 'vw_writer_blog_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-writer-blog' ),
		'priority'   => 30,
		'panel' => 'vw_writer_blog_panel_id'
	) );

	$wp_customize->add_setting('vw_writer_blog_mail_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_writer_blog_mail_text',array(
		'label'	=> __('Add Text','vw-writer-blog'),
		'section'=> 'vw_writer_blog_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_writer_blog_mail',array(
		'label'	=> __('Add Mail Address','vw-writer-blog'),
		'section'=> 'vw_writer_blog_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_writer_blog_call_text',array(
		'label'	=> __('Add Text','vw-writer-blog'),
		'section'=> 'vw_writer_blog_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_writer_blog_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_writer_blog_call',array(
		'label'	=> __('Add Phone Number','vw-writer-blog'),
		'section'=> 'vw_writer_blog_topbar',
		'type'=> 'text'
	));
    
	//Slider
	$wp_customize->add_section( 'vw_writer_blog_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-writer-blog' ),
		'priority'   => null,
		'panel' => 'vw_writer_blog_panel_id'
	) );

	$wp_customize->add_setting('vw_writer_blog_slider_arrows',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_writer_blog_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','vw-writer-blog'),
       'section' => 'vw_writer_blog_slidersettings',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_writer_blog_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_writer_blog_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_writer_blog_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-writer-blog' ),
			'description' => __('Slider image size (1500 x 600)','vw-writer-blog'),
			'section'  => 'vw_writer_blog_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Featured Articals
	$wp_customize->add_section( 'vw_writer_blog_articles_section' , array(
    	'title'      => __( 'Featured Articles', 'vw-writer-blog' ),
		'priority'   => null,
		'panel' => 'vw_writer_blog_panel_id'
	) );

	$wp_customize->add_setting('vw_writer_blog_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_writer_blog_section_title',array(
		'label'	=> __('Section Title','vw-writer-blog'),
		'section'=> 'vw_writer_blog_articles_section',
		'setting'=> 'vw_writer_blog_section_title',
		'type'=> 'text'
	));	

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_writer_blog_featured_articles',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_writer_blog_sanitize_choices',
	));
	$wp_customize->add_control('vw_writer_blog_featured_articles',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Articles','vw-writer-blog'),
		'description' => __('Image size (270 x 345)','vw-writer-blog'),
		'section' => 'vw_writer_blog_articles_section',
	));
	
	//Footer Text
	$wp_customize->add_section('vw_writer_blog_footer',array(
		'title'	=> __('Footer','vw-writer-blog'),
		'description'=> __('This section will appear in the footer','vw-writer-blog'),
		'panel' => 'vw_writer_blog_panel_id',
	));	
	
	$wp_customize->add_setting('vw_writer_blog_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_writer_blog_footer_text',array(
		'label'	=> __('Copyright Text','vw-writer-blog'),
		'section'=> 'vw_writer_blog_footer',
		'setting'=> 'vw_writer_blog_footer_text',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'vw_writer_blog_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Writer_Blog_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Writer_Blog_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Writer_Blog_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Writer Pro Theme', 'vw-writer-blog' ),
					'pro_text' => esc_html__( 'Upgrade Pro', 'vw-writer-blog' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/themes/wordpress-themes-for-writers/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-writer-blog-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-writer-blog-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Writer_Blog_Customize::get_instance();