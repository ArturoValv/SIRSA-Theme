<?php

/*Setup Theme */
if (!function_exists('sirsa_theme_setup')) {

	function sirsa_theme_setup()
	{
		//SEO Titles
		add_theme_support('title-tag');

		//Enable featured images
		add_theme_support('post-thumbnails', array('post', 'page'), 11);

		//Add custom sized images
		add_image_size('square', 350, 350, true);
		add_image_size('portrait', 350, 724, true);
		add_image_size('boxes', 400, 375, true);
		add_image_size('blog', 966, 644, true);
		add_image_size('cover', 1400, 600, true);

		//Habilitar Logo Personalizado
		$defaults = array(
			'height'               => 100,
			'width'                => 400,
			'flex-height'          => true,
			'flex-width'           => true,
			'unlink-homepage-logo' => true,
		);

		add_theme_support('custom-logo', $defaults);

		//Soporte a Tipografias
		add_theme_support('appearance-tools');

		//Soporte a Tamaños de Fuente
		add_theme_support('editor-font-sizes', array(
			array(
				'name' => esc_attr__(
					'Small',
					'sirsa_theme'
				),
				'size' => 12,
				'slug' => 'small'
			),
			array(
				'name' => esc_attr__(
					'Regular',
					'sirsa_theme'
				),
				'size' => 16,
				'slug' => 'regular'
			),
			array(
				'name' => esc_attr__(
					'Medium',
					'sirsa_theme'
				),
				'size' => 18,
				'slug' => 'medium'
			),
			array(
				'name' => esc_attr__(
					'Large',
					'sirsa_theme'
				),
				'size' => 22,
				'slug' => 'large'
			),
			array(
				'name' => esc_attr__(
					'Extra Large',
					'sirsa_theme'
				),
				'size' => 28,
				'slug' => 'xl'
			),
			array(
				'name' => esc_attr__(
					'Huge',
					'sirsa_theme'
				),
				'size' => 32,
				'slug' => 'xl'
			)
		));


		// Soporte a Colores
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __(
						'Primary Color',
						'sirsa_theme'
					),
					'slug'  => 'primary-color',
					'color' => get_theme_mod('primary_color', ''),
				),
				array(
					'name'  => __(
						'Scondary Color',
						'sirsa_theme'
					),
					'slug'  => 'secondary-color',
					'color' => get_theme_mod('secondary_color', ''),
				),
				array(
					'name'  => __(
						'Tertiary Color',
						'sirsa_theme'
					),
					'slug'  => 'tertiary-color',
					'color' => get_theme_mod('tertiary_color', ''),
				),
				array(
					'name'  => __(
						'Light Grey Color',
						'sirsa_theme'
					),
					'slug'  => 'tertiary-color',
					'color' => get_theme_mod('light_grey', ''),
				),
				array(
					'name'  => __(
						'Text Color',
						'sirsa_theme '
					),
					'slug'  => 'text-color',
					'color' => get_theme_mod('text_color', ''),
				),
			)
		);

		register_nav_menus(
			array(
				'main_menu' => esc_html__('Main menu', 'sirsa_theme'),
				'first_footer_menu' => esc_html__('Footer menu 1', 'sirsa_theme'),
				'second_footer_menu' => esc_html__('Footer menu 2', 'sirsa_theme'),
			)
		);
	}
}

add_action('after_setup_theme', 'sirsa_theme_setup');

/**
 * Enqueue scripts and styles.
 *
 *
 * @return void
 */
function sirsa_theme_scripts()
{
	// Load jQuery on the footer to eliminate render-blocking resources.
	wp_scripts()->add_data('jquery', 'group', 1);
	wp_scripts()->add_data('jquery-core', 'group', 1);
	wp_scripts()->add_data('jquery-migrate', 'group', 1);

	// Global stylesheet.
	wp_enqueue_style('swipercss', get_template_directory_uri() . "/build/css/imports/swiper.css", array(), '10.2.0');
	wp_enqueue_style('sirsa-theme-fonts', get_template_directory_uri() . "/assets/fonts/fonts.css", array(), '1.0');
	wp_enqueue_style('sirsa-theme-main-stylesheet', get_template_directory_uri() . "/build/css/main-style.css", array('sirsa-theme-fonts', 'swipercss'), '1.0', 'all');

	// Main JS scripts.
	wp_enqueue_script('swiperjs', get_template_directory_uri() . '/build/js/imports/swiper.js', array(), '10.2.0', true);
	wp_enqueue_script('sirsa-theme-swiper-scripts', get_template_directory_uri() . '/build/js/swiper-scripts.js', array('swiperjs'), '1.0', true);
	wp_enqueue_script('sirsa-theme-main-scripts', get_template_directory_uri() . '/build/js/scripts.js', array('swiperjs', 'sirsa-theme-swiper-scripts'), '1.0', true);

	// Load specific template stylesheet
	if (is_page()) {
		if (!is_front_page() || !is_page_template("page-templates/template-homepage.php")) {
			wp_enqueue_style('sirsa-theme-template-default', get_template_directory_uri() . '/build/css/templates/template-default.css', array(), '1.0');
		}

		switch (get_page_template_slug()) {
			case 'page-templates/template-portfolio.php':
				wp_enqueue_style('sirsa-theme-template-portfolio', get_template_directory_uri() . '/build/css/templates/template-portfolio.css', array(), '1.0', 'all');
				break;
		}
	}

	if (is_home() || is_archive() || is_single()) {
		wp_enqueue_style('sirsa-theme-home', get_template_directory_uri() . "/build/css/templates/home.css", array(), '1.0');
		wp_enqueue_style('sirsa-theme-template-default', get_template_directory_uri() . '/build/css/templates/template-default.css', array(), '1.0');
	}
}
add_action('wp_enqueue_scripts', 'sirsa_theme_scripts');

/*Tamaño de excerpt modificado*/
function sirsa_theme_custom_excerpt_length($length)
{
	return 25;
}
add_filter('excerpt_length', 'sirsa_theme_custom_excerpt_length', 999);


/* Widget Area */
function sirsa_theme_widget_zones()
{
	register_sidebar(array(
		'name' => 'Default Sidebar',
		'id' => 'default_sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<p class="text-center widget__title h5">',
		'after_title' => '</p>'
	));
}

add_action('widgets_init', 'sirsa_theme_widget_zones');

//Enable SVG uploads
function add_file_types_to_uploads($file_types)
{
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes);
	return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

function wp_check_svg($file)
{
	$filetype = wp_check_filetype($file['name']);

	$ext = $filetype['ext'];
	$type = $filetype['type'];

	// Check if uploaded file is a SVG
	if ($type !== 'image/svg+xml' || $ext !== 'svg') {
		return $file;
	}

	// Make sure that the file is being uploaded by a trusted user
	if (!current_user_can('upload_files')) {
		return $file;
	}

	// Use WP_Filesystem to read the contents of the file
	global $wp_filesystem;
	if (empty($wp_filesystem)) {
		require_once(ABSPATH . '/wp-admin/includes/file.php');
		WP_Filesystem();
	}

	$content = $wp_filesystem->get_contents($file['tmp_name']);

	// Use DOMDocument to parse the SVG file
	$doc = new DOMDocument();
	$doc->loadXML($content);

	// Check if the file contains any <script> tags
	$scripts = $doc->getElementsByTagName('script');

	if ($scripts->length > 0) {
		// The file contains <script> tags, which is not allowed
		return $file;
	}

	// The SVG file is safe, so return the original data
	return $file;
}
add_filter('wp_handle_upload_prefilter', 'wp_check_svg');

// Custom Block Categories
function sirsa_blocks_category($categories, $post)
{
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'sirsa-blocks',
				'title' => __('Sirsa Blocks', 'sirsa-blocks'),
			)
		)
	);
}
add_filter('block_categories', 'sirsa_blocks_category', 10, 2);

// Register Block Types
function sirsa_theme_register_acf_block_types()
{
	acf_register_block_type(array(
		'name'              => 'Bloque - Publicaciones, Formulario y Cifras',
		'title'             => __('Bloque - Publicaciones, Formulario y Cifras'),
		'render_template'   => '/blocks/posts-form-settlements/block.php',
		'category'          => 'sirsa-blocks',
		'icon'              => 'welcome-write-blog',
		'mode'				=> 'edit',
		'enqueue_assets' => function () {
			wp_enqueue_style('block-posts-form-settlements-css', get_template_directory_uri() . '/blocks/posts-form-settlements/block.css', array('swipercss'), '1.0');
			wp_enqueue_script('block-posts-form-settlements-js', get_template_directory_uri() . '/blocks/posts-form-settlements/block.js', array('swiperjs'), '1.0', true);
		},
	));

	acf_register_block_type(array(
		'name'              => 'Bloque - Rejilla de Contenido',
		'title'             => __('Bloque - Rejilla de Contenido'),
		'render_template'   => '/blocks/content-grid/block.php',
		'category'          => 'sirsa-blocks',
		'icon'              => 'welcome-write-blog',
		'mode'				=> 'edit',
		'enqueue_assets' => function () {
			wp_enqueue_style('block-content-grid-css', get_template_directory_uri() . '/blocks/content-grid/block.css', array(), '1.0');
		},
	));

	acf_register_block_type(array(
		'name'              => 'Bloque - Áreas de Práctica',
		'title'             => __('Bloque - Áreas de Práctica'),
		'render_template'   => '/blocks/practice-areas/block.php',
		'category'          => 'sirsa-blocks',
		'icon'              => 'welcome-write-blog',
		'mode'				=> 'edit',
		'enqueue_assets' => function () {
			wp_enqueue_style('block-practice-areas-css', get_template_directory_uri() . '/blocks/practice-areas/block.css', array(), '1.0');
		},
	));

	acf_register_block_type(array(
		'name'              => 'Bloque - Estadísticas',
		'title'             => __('Bloque - Estadísticas'),
		'render_template'   => '/blocks/statistics/block.php',
		'category'          => 'sirsa-blocks',
		'icon'              => 'welcome-write-blog',
		'mode'				=> 'edit',
		'enqueue_assets' => function () {
			wp_enqueue_style('block-statistics-css', get_template_directory_uri() . '/blocks/statistics/block.css', array(), '1.0');
			wp_enqueue_script('block-statistics-js', get_template_directory_uri() . '/blocks/statistics/block.js', array(), '1.0', true);
		},
	));

	acf_register_block_type(array(
		'name'              => 'Bloque - Testimonios',
		'title'             => __('Bloque - Testimonios'),
		'render_template'   => '/blocks/testimonials/block.php',
		'category'          => 'sirsa-blocks',
		'icon'              => 'welcome-write-blog',
		'mode'				=> 'edit',
		'enqueue_assets' => function () {
			wp_enqueue_style('block-testimonials-css', get_template_directory_uri() . '/blocks/testimonials/block.css', array('swipercss'), '1.0');
			wp_enqueue_script('block-testimonials-js', get_template_directory_uri() . '/blocks/testimonials/block.js', array('swiperjs'), '1.0', true);
		},
	));

	acf_register_block_type(array(
		'name'              => 'Bloque - Equipo',
		'title'             => __('Bloque - Equipo'),
		'render_template'   => '/blocks/team/block.php',
		'category'          => 'sirsa-blocks',
		'icon'              => 'welcome-write-blog',
		'mode'				=> 'edit',
		'enqueue_assets' => function () {
			wp_enqueue_style('block-team-css', get_template_directory_uri() . '/blocks/team/block.css', array('swipercss'), '1.0');
			wp_enqueue_script('block-team-js', get_template_directory_uri() . '/blocks/team/block.js', array('swiperjs'), '1.0', true);
		},
	));

	acf_register_block_type(array(
		'name'              => 'Bloque - Posts Carrusel',
		'title'             => __('Bloque - Posts Carrusel'),
		'render_template'   => '/blocks/posts-carousel/block.php',
		'category'          => 'sirsa-blocks',
		'icon'              => 'welcome-write-blog',
		'mode'				=> 'edit',
		'enqueue_assets' => function () {
			wp_enqueue_style('block-posts-carousel-css', get_template_directory_uri() . '/blocks/posts-carousel/block.css', array('swipercss'), '1.0');
			wp_enqueue_script('block-posts-carousel-js', get_template_directory_uri() . '/blocks/posts-carousel/block.js', array('swiperjs'), '1.0', true);
		},
	));

	acf_register_block_type(array(
		'name'              => 'Bloque - Cuadrícula de Logos',
		'title'             => __('Bloque - Cuadrícula de Logos'),
		'render_template'   => '/blocks/logos-grid/block.php',
		'category'          => 'sirsa-blocks',
		'icon'              => 'welcome-write-blog',
		'mode'				=> 'edit',
		'enqueue_assets' => function () {
			wp_enqueue_style('block-logos-grid-css', get_template_directory_uri() . '/blocks/logos-grid/block.css', array(), '1.0');
		},
	));

	acf_register_block_type(array(
		'name'              => 'Bloque - Boletín',
		'title'             => __('Bloque - Boletín'),
		'render_template'   => '/blocks/newsletter/block.php',
		'category'          => 'sirsa-blocks',
		'icon'              => 'welcome-write-blog',
		'mode'				=> 'edit',
		'enqueue_assets' => function () {
			wp_enqueue_style('block-newsletter-css', get_template_directory_uri() . '/blocks/newsletter/block.css', array(), '1.0');
		},
	));
}

if (function_exists('acf_register_block_type')) {
	add_action('acf/init', 'sirsa_theme_register_acf_block_types');
}

/* Add ACF Options Page
-------------------------------------------------------------- */
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Template Options',
		'menu_title' => 'Template Options',
		'menu_slug'  => 'template_options',
		'capability' => 'edit_posts',
		'redirect' => false
	));
}

//Color Scheme
require_once get_template_directory() . '/theme-functions/color-scheme.php';

//ACF JSON
function acf_theme_files($path)
{
	return get_stylesheet_directory() . '/acf-json-files';
}
add_filter('acf/settings/save_json', 'acf_theme_files');
