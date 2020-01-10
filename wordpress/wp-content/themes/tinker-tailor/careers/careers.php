<?php


register_post_type(
  'tt_careers',
  array(
    'labels'      => array(
      'name'          => __('Careers'),
      'singular_name' => __('Careers Pages'),
      'add_new' => __('Add New Career Page'),
      'add_new_item' => __('Add New Career Page'),
      'new_item' => __('New Career Page'),
      'edit_item' => __('Edit Career Page'),
      'view_item' => __('View Career Page'),
      'all_items' => __('All Career Pages'),
    ),
    'public'      => true,
    'has_archive' => true,
    'show_in_rest' => true, //expose post type to GraphQL
    'hierarchical' => true,
    'rewrite'      => array(
      'slug' => 'careers'
    ),
    'capability_type'     => 'career',
    'capabilities' => array(
      'read_post' => 'read_career',
      'read_private_posts' => 'read_private_careers',
      'edit_post' => 'edit_career',
      'edit_posts' => 'edit_careers',
      'edit_others_posts' => 'edit_others_careers',
      'edit_published_posts' => 'edit_published_careers',
      'publish_posts' => 'publish_careers',
      'delete_post' => 'delete_career',
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

$editor = get_role('careers_editor');
$editor->add_cap('read_career');
$editor->add_cap('read_private_careers');
$editor->add_cap('edit_career');
$editor->add_cap('edit_careers');
$editor->add_cap('edit_others_careers');
$editor->add_cap('edit_published_careers');
$editor->add_cap('publish_careers', false);
$editor->add_cap('delete_career', false);

$contributor = get_role('careers_contributor');
$contributor->add_cap('read_career');
$contributor->add_cap('read_private_careers');
$contributor->add_cap('edit_career');
$contributor->add_cap('edit_careers');
$contributor->add_cap('edit_others_careers', false);
$contributor->add_cap('edit_published_careers', false);
$contributor->add_cap('publish_careers', false);
$contributor->add_cap('delete_career', false);

$admin = get_role('administrator');
$admin->add_cap('read_career');
$admin->add_cap('read_private_careers');
$admin->add_cap('edit_career');
$admin->add_cap('edit_careers');
$admin->add_cap('edit_others_careers');
$admin->add_cap('edit_published_careers');
$admin->add_cap('publish_careers');
$admin->add_cap('delete_career');
