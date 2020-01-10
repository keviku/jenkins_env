<?php

register_post_type(
    'tt_artifacts',
    array(
        'labels' => array(
            'name' => __('Artifacts'),
            'singular_name' => __('Artifact'),
            'add_new' => __('Add New'),
            'add_new_item' => __('Add New Artifact'),
            'new_item' => __('New Artifact'),
            'edit_item' => __('Edit Artifact'),
            'view_item' => __('View Artifact'),
            'all_items' => __('All Artifacts'),
        ),
        'public'      => true,
        'has_archive' => true,
        'show_in_menu' => 'edit.php?post_type=tt_museum',
        'show_in_rest' => true, //expose post type to GraphQL
        'hierarchical' => true,
        'rewrite'      => array(
            'slug' => 'museum/artifact'
        ),
        'capability_type'     => 'artifact',
        'capabilities' => array(
            'read_post' => 'read_artifact',
            'read_private_posts' => 'read_private_artifacts',
            'edit_post' => 'edit_artifact',
            'edit_posts' => 'edit_artifacts',
            'edit_others_posts' => 'edit_others_artifacts',
            'edit_published_posts' => 'edit_published_artifacts',
            'publish_posts' => 'publish_artifacts',
            'delete_post' => 'delete_artifact',
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
$editor->add_cap('read_artifact');
$editor->add_cap('read_private_artifacts');
$editor->add_cap('edit_artifact');
$editor->add_cap('edit_artifacts');
$editor->add_cap('edit_others_artifacts');
$editor->add_cap('edit_published_artifacts');
$editor->add_cap('publish_artifacts', false);
$editor->add_cap('delete_artifact', false);

$contributor = get_role('museum_contributor');
$contributor->add_cap('read_artifact');
$contributor->add_cap('read_private_artifacts');
$contributor->add_cap('edit_artifact');
$contributor->add_cap('edit_artifacts');
$contributor->add_cap('edit_others_artifacts', false);
$contributor->add_cap('edit_published_artifacts', false);
$contributor->add_cap('publish_artifacts', false);
$contributor->add_cap('delete_artifact', false);

$admin = get_role('administrator');
$admin->add_cap('read_artifact');
$admin->add_cap('read_private_artifacts');
$admin->add_cap('edit_artifact');
$admin->add_cap('edit_artifacts');
$admin->add_cap('edit_others_artifacts');
$admin->add_cap('edit_published_artifacts');
$admin->add_cap('publish_artifacts');
$admin->add_cap('delete_artifact');
