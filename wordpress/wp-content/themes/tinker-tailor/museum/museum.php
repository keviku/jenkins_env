<?php

register_post_type(
    'tt_museum',
    array(
    'labels' => array(
      'name' => __('Museum'),
      'singular_name' => __('Museum'),
      'name' => __('Museum'),
      'singular_name' => __('Museum Page'),
      'add_new' => __('Add New Museum Page'),
      'add_new_item' => __('Add New Museum Page'),
      'new_item' => __('New Museum Page'),
      'edit_item' => __('Edit Museum Page'),
      'view_item' => __('View Museum Page'),
      'all_items' => __('All Museum Pages'),
    ),
    'public'      => true,
    'has_archive' => true,
    'show_in_rest' => true, //expose post type to GraphQL
    'hierarchical' => true,
    'rewrite'      => array(
      'slug' => 'museum'
    ),
    'capability_type'     => 'museum',
    'capabilities' => array(
      'read_post' => 'read_museum',
      'read_private_posts' => 'read_private_museums',
      'edit_post' => 'edit_museum',
      'edit_posts' => 'edit_museums',
      'edit_others_posts' => 'edit_others_museums',
      'edit_published_posts' => 'edit_published_museums',
      'publish_posts' => 'publish_museums',
      'delete_post' => 'delete_museum',
    ),
    'supports'     => array(
      'title',
      'editor',
      'thumbnail',
      'excerpt'
    ),
  )
);

//grab custom user roles
require_once('permissions.php');

$editor = get_role('museum_editor');
$editor->add_cap('read_museum');
$editor->add_cap('read_private_museums');
$editor->add_cap('edit_museum');
$editor->add_cap('edit_museums');
$editor->add_cap('edit_others_museums');
$editor->add_cap('edit_published_museums');
$editor->add_cap('publish_museums', false);
$editor->add_cap('delete_museum', false);

$contributor = get_role('museum_contributor');
$contributor->add_cap('read_museum');
$contributor->add_cap('read_private_museums');
$contributor->add_cap('edit_museum');
$contributor->add_cap('edit_museums');
$contributor->add_cap('edit_others_museums', false);
$contributor->add_cap('edit_published_museums', false);
$contributor->add_cap('publish_museums', false);
$contributor->add_cap('delete_museum', false);

$admin = get_role('administrator');
$admin->add_cap('read_museum');
$admin->add_cap('read_private_museums');
$admin->add_cap('edit_museum');
$admin->add_cap('edit_museums');
$admin->add_cap('edit_others_museums');
$admin->add_cap('edit_published_museums');
$admin->add_cap('publish_museums');
$admin->add_cap('delete_museum');
