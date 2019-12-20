<?php
/**
 * The Worx Theme Customizer
 *
 * @package The_Worx
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function the_worx_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'the_worx_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'the_worx_customize_partial_blogdescription',
		) );
	}

	$wp_customize->add_panel(
		'the_worx_theme_options',
		array(
			'priority'        => 5,
			'capability'      => 'edit_theme_options',
			'theme_supports'  => '',
			'title'           => __( 'The Worx Homepage Options', 'the-worx' ),
			'description'     => __( 'Theme Settings', 'the-worx' ),
		)
	);

	 /**
	  * Top bar message settings Section
	  *
	  * @since  1.0.0
	  */
	$wp_customize->add_section(
		'topbar_message_section',
		array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'priority'       => 10,
			'title'          => __( 'Topbar Message Section', 'the-worx' ),
			'description'    => __( 'Topbar Options version 1.0.0', 'the-worx' ),
			'panel'          => 'the_worx_theme_options',
		)
	);

	 /**
	  * Enable topbar message settings Section
	  *
	  * @since  1.0.0
	  */
	$wp_customize->add_setting(
		'enable_topbar',
		array(
			'default'   => '',
			'transport' => 'refresh',
		)
	);

	// Enable topbar message Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'enable_topbar_control',
			array(
				'label'       => __( 'Topbar Message Option', 'the-worx' ),
				'section'     => 'topbar_message_section',
				'settings'    => 'enable_topbar',
				'type'        => 'checkbox',
				'description' => 'Enable Topbar',
			)
		)
	);

	/**
	* Topbar color settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_setting(
		'topbar_color',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Topbar color Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'topbar_color_control',
			array(
				'label'       => __( 'Topbar Color Option', 'the-worx' ),
				'section'     => 'topbar_message_section',
				'settings'    => 'topbar_color',
				'type'        => 'color',
				'description' => 'Topbar color',
			)
		)
	);

	/**
	* Topbar message settings
	*
	* @since  1.0.0
	*/
	 $wp_customize->add_setting(
		'topbar_message',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Topbar color Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'topbar_message_control',
			array(
				'label'       => __( 'Topbar Message Option', 'the-worx' ),
				'section'     => 'topbar_message_section',
				'settings'    => 'topbar_message',
				'type'        => 'text',
				'description' => 'Topbar message',
			)
		)
	);


	/**
	  * Slider settings Section
	  *
	  * @since  1.0.0
	  */
	$wp_customize->add_section(
		'slider_section',
		array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'priority'     => 10,
			'title'      => __( 'Top Slider Section', 'the-worx' ),
			'description'  => __( 'Slider Options version 1.0.0', 'the-worx' ),
			'panel'      => 'the_worx_theme_options',
		)
	);

	for ( $i = 1; $i <= 5; $i++ ) :

		// Slider Setting.
		$wp_customize->add_setting(
			'slider_' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Slider Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				'slider_' . $i . '_control',
				array(
					'label'       => 'Slider Image ' . $i,
					'section'     => 'slider_section',
					'settings'    => 'slider_' . $i,
					'type'      => 'image',
					'description' => 'Add image for slider ' . $i,
				)
			)
		);

		 /**
		  * Slider message position settings Section
		  *
		  * @since  1.0.0
		  */
		$wp_customize->add_setting(
			'slider_text_position_' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Slider message position Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'slider_text_position_' . $i . '_control',
				array(
					'label'       => __( 'Slider message position', 'the-worx' ),
					'section'     => 'slider_section',
					'settings'    => 'slider_text_position_' . $i,
					'description' => 'Text alignment ' . $i,
					'type'      => 'select',
					'choices' => array(
						'left' => 'left',
						'center' => 'center',
						'right' => 'right',
					),
				)
			)
		);

		 /**
		  * Slider header message settings Section
		  *
		  * @since  1.0.0
		  */
		$wp_customize->add_setting(
			'slider_header_' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Slider header message Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'slider_header_' . $i . '_control',
				array(
					'label'       => __( 'Slider header message', 'the-worx' ),
					'section'     => 'slider_section',
					'settings'    => 'slider_header_' . $i,
					'type'        => 'text',
					'description' => 'Add message for slider ' . $i,
				)
			)
		);

		 /**
		  * Slider subheader message settings Section
		  *
		  * @since  1.0.0
		  */
		$wp_customize->add_setting(
			'slider_subheader_' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Slider subheader message Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'slider_subheader_' . $i . '_control',
				array(
					'label'       => __( 'Slider subheader', 'the-worx' ),
					'section'     => 'slider_section',
					'settings'    => 'slider_subheader_' . $i,
					'type'        => 'text',
					'description' => 'Add subheader for slider ' . $i,
				)
			)
		);

		 /**
		  * Slider button text settings Section
		  *
		  * @since  1.0.0
		  */
		$wp_customize->add_setting(
			'slider_btn_text_' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Slider button text Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'slider_btn_text_' . $i . '_control',
				array(
					'label'       => __( 'Slider button text', 'the-worx' ),
					'section'     => 'slider_section',
					'settings'    => 'slider_btn_text_' . $i,
					'type'        => 'text',
					'description' => 'Button text for slider' . $i,
				)
			)
		);

		 /**
		  * Slider link or page settings Section
		  *
		  * @since  1.0.0
		  */
		$wp_customize->add_setting(
			'slider_btn_link_' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Slider link or page Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'slider_btn_link_' . $i . '_control',
				array(
					'label'       => __( 'Slider Button Link', 'the-worx' ),
					'section'     => 'slider_section',
					'settings'    => 'slider_btn_link_' . $i,
					'type'        => 'dropdown-pages',
					'description' => 'Slider button link',
				)
			)
		);

		// Slider Mobile Setting.
		$wp_customize->add_setting(
			'slider_mobile_' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Slider Mobile Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'slider_mobile_' . $i . '_control',
				array(
					'label'       => 'Slider Mobile Image ' . $i,
					'section'     => 'slider_section',
					'settings'    => 'slider_mobile_' . $i,
					'type'        => 'image',
					'description' => 'Add image for slider ' . $i,
				)
			)
		);

	endfor;

	/**
	* Enable topbar message settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_setting(
		'enable_hero_popup',
		array(
			'default'   => '',
			'transport' => 'refresh',
		)
	);

	// Enable topbar message Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'enable_hero_popup_control',
			array(
				'label'       => __( 'Pop up Option', 'the-worx' ),
				'section'     => 'slider_section',
				'settings'    => 'enable_hero_popup',
				'type'        => 'checkbox',
				'description' => 'Enable Hero Image Pop Up',
			)
		)
	);

	/**
	* Top Slider pop up 3 descriptions settings Section
	*
	* @since  1.0.0
	*/
	for ( $a = 1; $a <= 3; $a++ ) :
		/**
			* Top Slider pop up 3 Descriptions title settings
			*
			* @since  1.0.0
			*/
		$wp_customize->add_setting(
			'top_slider_description_title_' . $a,
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Slider descriptions title Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'top_slider_description_title_' . $a . '_control',
				array(
					'label'       => 'Top slider popup description Title #' . $a,
					'section'     => 'slider_section',
					'settings'    => 'top_slider_description_title_' . $a,
					'type'        => 'text',
					'description' => 'Add Title for top popup discrption #' . $a,
				)
			)
		);

		/**
		* Top Slider popup 3 Description messages settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'top_slider_description_message' . $a,
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Top Slider popup description message Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'top_slider_description_message' . $a . '_control',
				array(
					'label'       => 'Top slider popup description message #' . $a,
					'section'     => 'slider_section',
					'settings'    => 'top_slider_description_message' . $a,
					'type'        => 'text',
					'description' => 'Add message for top popup discrption #' . $a,
				)
			)
		);

	endfor;

	/**
	* CTA Popup button text settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_setting(
		'cta_popup_btn_text',
		array(
			'default'   => '',
			'transport' => 'refresh',
		)
	);

	// Popup button text Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'cta_popup_btn_text_control',
			array(
				'label'       => 'CTA Popup Button Text',
				'section'     => 'slider_section',
				'settings'    => 'cta_popup_btn_text',
				'type'        => 'text',
				'description' => 'Add Top CTA Popup button Text',
			)
		)
	);

		/**
		* CTA Popup link settings Section
		*
		* @since  1.0.0
		*/
	$wp_customize->add_setting(
		'cta_popup_btn_link',
		array(
			'default'   => '',
			'transport' => 'refresh',
		)
	);

	// CTA Popup link Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'cta_popup_btn_link_control',
			array(
				'label'       => 'CTA Popup Link',
				'section'     => 'slider_section',
				'settings'    => '	',
				'type'        => 'text',
				'description' => 'Ex: https://yourlink.com',
			)
		)
	);

		/**
	* About Me settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_section(
		'about_me_section',
		array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'priority'     => 10,
			'title'      => __( 'About Me Section', 'the_worx' ),
			'description'  => __( 'About Me Section Options version 1.0.0', 'the_worx' ),
			'panel'      => 'the_worx_theme_options',
		)
	);

	/**
	* About Me header settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_setting(
		'about_me_header',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// About Me header Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'about_me_header_control',
			array(
				'label'       => __( 'About Me header', 'the_worx' ),
				'section'     => 'about_me_section',
				'settings'    => 'about_me_header',
				'type'      => 'text',
				'description' => 'About Me header',
			)
		)
	);

	/**
	 * About Me message settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'about_me_message',
		array(
			'default'   => '',
			'transport' => 'refresh',
		)
	);

	// About Me message Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'about_me_message_control',
			array(
				'label'       => __( 'About Me message', 'the_worx' ),
				'section'     => 'about_me_section',
				'settings'    => 'about_me_message',
				'type'        => 'textarea',
				'description' => 'Add About Me message',
			)
		)
	);

	// Github button text control.
	$wp_customize->add_setting(
		'github_btn_text',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Github button text Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'github_btn_text_control',
			array(
				'label'       => __( 'Github Button Text', 'the_worx' ),
				'section'     => 'about_me_section',
				'settings'    => 'github_btn_text',
				'type'        => 'text',
				'description' => 'Add Github button Text ',
			)
		)
	);

	// About Me github button link Setting.
	$wp_customize->add_setting(
		'github_btn_link',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// About Me github button link Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'github_btn_link_control',
			array(
				'label'       => __( 'Github Profile Button Link', 'the_worx' ),
				'section'     => 'about_me_section',
				'settings'    => 'github_btn_link',
				'type'        => 'text',
				'description' => 'Example: https://github.com/user',
			)
		)
	);
	

	/**
	* Our Services settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_section(
		'services_section',
		array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'priority'     => 10,
			'title'      => __( 'Our Services Section', 'the_worx' ),
			'description'  => __( 'Our Services Section Options version 1.0.0', 'the_worx' ),
			'panel'      => 'the_worx_theme_options',
		)
	);

	// Service Section Background image Setting.
	$wp_customize->add_setting(
		'services_background_image',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Service Section Background image Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'services_background_image_control',
			array(
				'label'       => 'Services Section Background Image ' . $i,
				'section'     => 'services_section',
				'settings'    => 'services_background_image',
				'type'      => 'image',
				'description' => 'Add Background image for Services Section ' . $i,
			)
		)
	);

	/**
	* Services Section header settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_setting(
		'our_services_title',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Services Section header Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'our_services_title_control',
			array(
				'label'       => __( 'Services Section Header ', 'the_worx' ),
				'section'     => 'services_section',
				'settings'    => 'our_services_title',
				'type'      => 'text',
				'description' => 'Add Service Section Header',
			)
		)
	);

			/**
	* Services Section header settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_setting(
		'our_services_subtitle',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Services Section header Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'our_services_subtitle_control',
			array(
				'label'       => __( 'Services Section Sub-Header ', 'the_worx' ),
				'section'     => 'services_section',
				'settings'    => 'our_services_subtitle',
				'type'      => 'text',
				'description' => 'Add Service Section Sub-Header',
			)
		)
	);

	/**
	* Our Services card. Loop for 3 descriptions settings Section
	*
	* @since  1.0.0
	*/
	for ( $i = 1; $i <= 3; $i++ ):

		/**
		* Services header settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'our_services_title_' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Services header Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'our_services_title_' . $i . '_control',
				array(
					'label'       => __( 'Our Services Title #' . $i, 'the_worx' ),
					'section'     => 'services_section',
					'settings'    => 'our_services_title_' . $i,
					'type'      => 'text',
					'description' => 'Add Service title #' . $i,
				)
			)
		);

		/**
		* Services Price settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'our_services_price_' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Services Price Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'our_services_price_' . $i . '_control',
				array(
					'label'       => __( 'Our Services Price #' . $i, 'the_worx' ),
					'section'     => 'services_section',
					'settings'    => 'our_services_price_' . $i,
					'type'      => 'text',
					'description' => 'Add Service Price #' . $i,
				)
			)
		);

		/**
		* Service Description 1 settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'service_' . $i . '_description_1',
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Service Description 1 Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'service_' . $i . '_description_1_control',
				array(
					'label'       => __( 'Service ' . $i . ' Description 1', 'the_worx' ),
					'section'     => 'services_section',
					'settings'    => 'service_' . $i . '_description_1',
					'type'        => 'text',
					'description' => 'Add single Description for service #' . $i,
				)
			)
		);

		/**
		* Service Description 2 settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'service_' . $i . '_description_2',
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Service Description 2 Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'service_' . $i . '_description_2_control',
				array(
					'label'       => __( 'Service ' . $i . ' Description 2', 'the_worx' ),
					'section'     => 'services_section',
					'settings'    => 'service_' . $i . '_description_2',
					'type'        => 'text',
					'description' => 'Add single Description for service #' . $i,
				)
			)
		);

		/**
		* Service Description 3 settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'service_' . $i . '_description_3',
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Service Description 3 Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'service_' . $i . '_description_3_control',
				array(
					'label'       => __( 'Service ' . $i . ' Description 3', 'the_worx' ),
					'section'     => 'services_section',
					'settings'    => 'service_' . $i . '_description_3',
					'type'        => 'text',
					'description' => 'Add single Description for service #' . $i,
				)
			)
		);

		/**
		* Service Description 4 settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'service_' . $i . '_description_4',
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Service Description 4 Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'service_' . $i . '_description_4_control',
				array(
					'label'       => __( 'Service ' . $i . ' Description 4', 'the_worx' ),
					'section'     => 'services_section',
					'settings'    => 'service_' . $i . '_description_4',
					'type'        => 'text',
					'description' => 'Add single Description for service #' . $i,
				)
			)
		);

		/**
		* Service Description 5 settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'service_' . $i . '_description_5',
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Service Description 5 Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'service_' . $i . '_description_5_control',
				array(
					'label'       => __( 'Service ' . $i . ' Description 5', 'the_worx' ),
					'section'     => 'services_section',
					'settings'    => 'service_' . $i . '_description_5',
					'type'        => 'text',
					'description' => 'Add single Description for service #' . $i,
				)
			)
		);

		/**
		* Service Description 6 settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'service_' . $i . '_description_6',
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Service Description 6 Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'service_' . $i . '_description_6_control',
				array(
					'label'       => __( 'Service ' . $i . ' Description 6', 'the_worx' ),
					'section'     => 'services_section',
					'settings'    => 'service_' . $i . '_description_6',
					'type'        => 'text',
					'description' => 'Add single Description for service #' . $i,
				)
			)
		);

	endfor;

	/**
	 * Footer settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_section(
		'footer_section',
		array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'priority'     => 10,
			'title'      => __( 'Footer Section', 'the-worx' ),
			'description'  => __( 'Footer Section Options version 1.0.0', 'the-worx' ),
			'panel'      => 'the_worx_theme_options',
		)
	);

	/**
	 * Footer footer Menu title settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_menu_title',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer footer Menu Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_menu_title_control',
			array(
				'label'       => __( 'Footer Menu Section Title', 'the-worx' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_menu_title',
				'type'      => 'text',
				'description' => 'Footer Menu Section Title',
			)
		)
	);

	/**
	 * Footer social title settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_social_title',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer social  Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_social_title_control',
			array(
				'label'       => __( 'Footer Social Section Title', 'the-worx' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_social_title',
				'type'      => 'text',
				'description' => 'Footer Social Section Title',
			)
		)
	);

	/**
	 * Footer linkedin setting
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_social_linkedin',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer social linkedin Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_social_linkedin_control',
			array(
				'label'       => __( 'linkedin Icon Link', 'the-worx' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_social_linkedin',
				'type'      => 'text',
				'description' => 'Example: https://linkedin.com/user',
			)
		)
	);

	// Footer social Github link Setting.
	$wp_customize->add_setting(
		'footer_social_github',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer social Github Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_social_github_control',
			array(
				'label'       => __( 'Github Icon Link', 'the-worx' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_social_github',
				'type'      => 'text',
				'description' => 'Example: https://github.com/user',
			)
		)
	);

	/**
	 * Footer Contact Info title settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_contact_title',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer Contact Info Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_contact_title_control',
			array(
				'label'       => __( 'Footer Contact Info Section Title', 'the-worx' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_contact_title',
				'type'      => 'text',
				'description' => 'Footer Contact Info Section Title',
			)
		)
	);

	/**
	 * Footer contact email title settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_contact_email_title',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer contact email title Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_contact_email_title_control',
			array(
				'label'       => __( 'Footer Contact Email Title', 'the-worx' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_contact_email_title',
				'type'      => 'text',
				'description' => 'Footer Contact Email label',
			)
		)
	);

	/**
	 * Footer Contact Email settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_contact_email',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer Contact Email Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_contact_email_control',
			array(
				'label'       => __( 'Footer Contact Email', 'the-worx' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_contact_email',
				'type'      => 'text',
				'description' => 'Example: youremail@gmail.com',
			)
		)
	);

	/**
	 * Footer contact Phone title settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_phone_title',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer contact Phone title Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_phone_title_control',
			array(
				'label'       => __( 'Footer Contact Phone Title', 'the-worx' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_phone_title',
				'type'      => 'text',
				'description' => 'Footer Contact Phone number label',
			)
		)
	);

	/**
	 * Footer Contact Phone Number settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_phone',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer Contact Phone Number Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_phone_control',
			array(
				'label'       => __( 'Footer Contact Phone Number', 'the-worx' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_phone',
				'type'      => 'text',
				'description' => 'Example: 9514992154',
			)
		)
	);

	/**
	 * Footer Address 1 title settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_address_1',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer Address 1 title Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_address_1_control',
			array(
				'label'       => __( 'Footer Address 1', 'the-worx' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_address_1',
				'type'      => 'text',
				'description' => 'Example: 12140 Yourstreet Ave.',
			)
		)
	);
	
	/**
	 * Footer Address 2 title settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_address_2',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer Address 2 title Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_address_2_control',
			array(
				'label'       => __( 'Footer Address 2', 'the-worx' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_address_2',
				'type'      => 'text',
				'description' => 'Example: Los Angeles, CA',
			)
		)
	);

}




add_action( 'customize_register', 'the_worx_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function the_worx_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function the_worx_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function the_worx_customize_preview_js() {
	wp_enqueue_script( 'the-worx-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'the_worx_customize_preview_js' );
