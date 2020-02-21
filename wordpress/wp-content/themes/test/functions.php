<?php
/**
 * test functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package test
 */

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function test_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on test, use a find and replace
		 * to change 'test' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'test', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'test' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'test_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}

add_action( 'after_setup_theme', 'test_setup' );
        $USERNAME = getenv('USERNAME');
        $TOKEN = getenv('TOKEN');
        $URL = getenv('URL');
        $JOB = getenv('JOB');
        $ID = getenv('ID');

	function fireFunctionOnSave($post_id)
	{
	    if (wp_is_post_revision($post_id) || wp_is_post_autosave($post_id)) {
	        return;
	    }
	    try {
	      //  $gatsby_url = $_ENV["GATSBY_URL"] ?: 'http://gatsby:8080/__refresh';
		$USERNAME = getenv('USERNAME');
                $TOKEN = getenv('TOKEN');
		$URL = getenv('URL');
		$JOB = getenv('JOB');
		$ID = getenv('ID');
                $gatsby_url = 'http://'.$USERNAME.':'.$TOKEN.'@'.$URL.'/job/'.$JOB.'/build?'.$ID;
//		$gatsby_url = 'http://'{$USERNAME}':'{$TOKEN}'@'{$URL}'/job/'{$JOB}'/build?'{$ID};    
		$response = Requests::post($gatsby_url);
		
//		echo getenv($gatsby_url);
//		echo getenv('TOKEN');
	    } catch (Exception $e) {
	        echo 'Gatsby fefresh railed with exception ', $e, "\n";
	    }
	}

add_action('save_post', 'fireFunctionOnSave');


