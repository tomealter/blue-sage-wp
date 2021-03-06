<?php

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php') ) . '</a></p></div>';
	});
	
	add_filter('template_include', function($template) {
		return get_stylesheet_directory() . '/static/no-timber.html';
	});
	
	return;
}

Timber::$dirname = array('templates', 'views');

class StarterSite extends TimberSite {

	function __construct() {
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		parent::__construct();
	}

	function register_post_types() {
		
	}

	function register_taxonomies() {
		//this is where you can register custom taxonomies
	}

	function add_to_context( $context ) {
		$context['foo'] = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::get_context();';
		$context['menu'] = new TimberMenu();
		$context['main_menu'] = new TimberMenu('main');
		$context['site'] = $this;
		$project_args = array('post_type' => 'project');
    $context['projects'] = Timber::get_posts($project_args);
		return $context;
	}

	function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own functions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter('myfoo', new Twig_SimpleFilter('myfoo', array($this, 'myfoo')));
		return $twig;
	}

}

function add_theme_scripts() {
	// wp_enqueue_style( 'styles', get_template_directory_uri() . '/css/fonts.css', array(), '1.1', 'all');
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/css/styles.css', array(), '1.1', 'all');
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/scripts.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'gallery', get_template_directory_uri() . '/js/gallery.js', array ( 'jquery' ), 1.1, true);
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

new StarterSite();


// Remove content editor
add_action( 'init', function() {
    remove_post_type_support( 'project', 'editor' );
}, 99);

add_action( 'init', function() {
    remove_post_type_support( 'page', 'editor' );
}, 99);

//code.jquery.com/jquery-1.12.4.min.js

// Options Page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

add_filter( 'timber_context', 'mytheme_timber_context'  );

function mytheme_timber_context( $context ) {
    $context['options'] = get_fields('option');
    return $context;
}