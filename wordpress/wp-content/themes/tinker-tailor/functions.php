<?php

/**
 *
 * @package Deloitte Federal Studio
 * @subpackage Tinker Tailor
 */

function tt_theme_setup()
{
    add_theme_support('post-thumbnails');
    /**
     * register nav menus
     */
    register_nav_menus(
      array(
      'cia-header-primary'   => __('Primary Menu', 'Tinker Tailor'),
      'cia-header-secondary' => __('Secondary Menu', 'Tinker Tailor'),
      'global-header'   => __('Global Header', 'Tinker Tailor'),
      'global-footer' => __('Global Footer', 'Tinker Tailor'),
      'careers-header' => __('Careers Header', 'Tinker Tailor')
    )
  );
    // Register news post type.
    require_once 'news/news.php';
    // Register careers post type.
    require_once 'careers/careers.php';
    // Register job listing post type
    require_once 'careers/job-listings.php';
    // Register factbook post type.
    require_once 'factbook/factbook.php';
    // Register museum post types
    require_once 'museum/museum.php';
    require_once 'museum/artifact.php';
    require_once 'museum/exhibit.php';

}
add_action('after_setup_theme', 'tt_theme_setup');

require_once 'includes/acf_null.php';

//recurisvely add acf fields to post object
if (! defined('ABSPATH')) {
    exit;
}
require_once 'includes/acf_recursive.php';
add_action('after_setup_theme', array( 'ACF_To_REST_API_Recursive', 'init' ));

//add acf fields to post objects
add_filter('acf/rest_api/post/get_fields', function ($data) {
    if (! empty($data)) {
        array_walk_recursive($data, 'get_fields_recursive');
    }

    return $data;
});

//recursive function
function get_fields_recursive($item)
{
    if (is_object($item)) {
        $item->acf = array();
        if ($fields = get_fields($item)) {
            $item->acf = $fields;
            array_walk_recursive($item->acf, 'get_fields_recursive');
        }
    }
}

/**
 * Trigger a rebuild of the gatsby develop server
 * By making a POST request to the Gatsby Service
 */
function fireFunctionOnSave($post_id)
{
    if (wp_is_post_revision($post_id) || wp_is_post_autosave($post_id)) {
        return;
    }
    try {
        $gatsby_url = $_ENV["GATSBY_URL"] ?: 'http://gatsby:8080/__refresh';
        $response = Requests::post($gatsby_url);
    } catch (Exception $e) {
        echo 'Gatsby fefresh railed with exception ', $e, "\n";
    }
}

add_action('save_post', 'fireFunctionOnSave');

# Trigger Jenkins Rebuild to produce gatsby static files
function triggerJenkinsBuild($post_id)
{
  if (wp_is_post_revision($post_id) || wp_is_post_autosave($post_id)) {
    return;
  }
  try {

 #   $gatsby_jenkins = 'https://mark:11c0eb525f30ce0f82b25573c6be5abdfd@jenkins.g200.digitalstudio.io/job/G200_Gatsby_Rebuild/build?llihjvo2384ufo8dhf98w0ufe';
    $gatsby_jenkins = 'https://test:${key}@${JENKINS_URL}/job/"${BUILD_NAME}"/build?${API_TOKEN}';
    $response = Requests::post($gatsby_jenkins);

   


  } catch (Exception $e) {

    echo 'Gatsby build ', $e, "\n";
  }
}

add_action('save_post', 'triggerJenkinsBuild');
