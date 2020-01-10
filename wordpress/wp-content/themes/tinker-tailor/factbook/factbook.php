<?php

add_role('factbook_editor', 'Factbook Editor', array(
    'read' => true,
    'edit_posts' => true,
    'delete_posts' => false,
    'publish_posts' => false,
    'upload_files' => true,
));

add_role('factbook_contributor', 'Factbook Contributor', array(
    'read' => true,
    'edit_posts' => false,
    'delete_posts' => false,
    'publish_posts' => false,
    'upload_files' => false,
));

register_post_type(
    'tt_factbook',
    array(
        'labels'      => array(
            'name'          => __('Factbook'),
            'singular_name' => __('Factbook'),
        ),
        'public'      => true,
        'has_archive' => true,
        'show_in_rest' => true, //expose post type to GraphQL
        'hierarchical' => true,
        'rewrite'      => array(
            'slug' => 'factbook'
        ),
        'capability_type'     => 'factbook',
        'capabilities' => array(
            'read_post' => 'read_factbook',
            'read_private_posts' => 'read_private_factbook',
            'edit_post' => 'edit_factbook',
            'edit_posts' => 'edit_factbook',
            'edit_others_posts' => 'edit_others_factbook',
            'edit_published_posts' => 'edit_published_factbook',
            'publish_posts' => 'publish_factbook',
            'delete_post' => 'delete_factbook',
        ),
        'menu_icon' => '/wp-content/uploads/2019/11/icon.jpg', // 16px16
        'supports'     => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt'
        ),
    )
);

$editor = get_role('factbook_editor');
$editor->add_cap('read_factbook');
$editor->add_cap('read_private_factbook');
$editor->add_cap('edit_factbook');
$editor->add_cap('edit_factbook');
$editor->add_cap('edit_others_factbook');
$editor->add_cap('edit_published_factbook');
$editor->add_cap('publish_factbook', false);
$editor->add_cap('delete_factbook', false);

$contributor = get_role('factbook_contributor');
$contributor->add_cap('read_factbook');
$contributor->add_cap('read_private_factbook');
$contributor->add_cap('edit_factbook');
$contributor->add_cap('edit_factbook');
$contributor->add_cap('edit_others_factbook', false);
$contributor->add_cap('edit_published_factbook', false);
$contributor->add_cap('publish_factbook', false);
$contributor->add_cap('delete_factbook', false);

$admin = get_role('administrator');
$admin->add_cap('read_factbook');
$admin->add_cap('read_private_factbook');
$admin->add_cap('edit_factbook');
$admin->add_cap('edit_factbook');
$admin->add_cap('edit_others_factbook');
$admin->add_cap('edit_published_factbook');
$admin->add_cap('publish_factbook');
$admin->add_cap('delete_factbook');
