<?php

register_post_type(
    'tt_exhibits',
    array(
      'labels' => array(
            'name'          => __('Exhibits'),
            'singular_name' => __('Exhibit'),
            'name' => __('Exhibits'),
            'singular_name' => __('Exhibit'),
            'add_new' => __('Add New'),
            'add_new_item' => __('Add New Exhibit'),
            'new_item' => __('New Exhibit'),
            'edit_item' => __('Edit Exhibit'),
            'view_item' => __('View Exhibit'),
            'all_items' => __('All Exhibits'),
        ),
        'public'      => true,
        'has_archive' => true,
        'show_in_menu' => 'edit.php?post_type=tt_museum',
        'show_in_rest' => true, //expose post type to GraphQL
        'hierarchical' => true,
        'rewrite'      => array(
            'slug' => 'museum/exhibit'
        ),
        'capability_type'     => 'exhibit',
        'capabilities' => array(
            'read_post' => 'read_exhibit',
            'read_private_posts' => 'read_private_exhibits',
            'edit_post' => 'edit_exhibit',
            'edit_posts' => 'edit_exhibits',
            'edit_others_posts' => 'edit_others_exhibits',
            'edit_published_posts' => 'edit_published_exhibits',
            'publish_posts' => 'publish_exhibits',
            'delete_post' => 'delete_exhibit',
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
$editor->add_cap('read_exhibit');
$editor->add_cap('read_private_exhibits');
$editor->add_cap('edit_exhibit');
$editor->add_cap('edit_exhibits');
$editor->add_cap('edit_others_exhibits');
$editor->add_cap('edit_published_exhibits');
$editor->add_cap('publish_exhibits', false);
$editor->add_cap('delete_exhibit', false);

$contributor = get_role('museum_contributor');
$contributor->add_cap('read_exhibit');
$contributor->add_cap('read_private_exhibits');
$contributor->add_cap('edit_exhibit');
$contributor->add_cap('edit_exhibits');
$contributor->add_cap('edit_others_exhibits', false);
$contributor->add_cap('edit_published_exhibits', false);
$contributor->add_cap('publish_exhibits', false);
$contributor->add_cap('delete_exhibit', false);

$admin = get_role('administrator');
$admin->add_cap('read_exhibit');
$admin->add_cap('read_private_exhibits');
$admin->add_cap('edit_exhibit');
$admin->add_cap('edit_exhibits');
$admin->add_cap('edit_others_exhibits');
$admin->add_cap('edit_published_exhibits');
$admin->add_cap('publish_exhibits');
$admin->add_cap('delete_exhibit');
