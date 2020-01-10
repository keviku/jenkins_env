<?php

register_post_type(
    'tt_news',
    array(
        'labels'      => array(
            'name'          => __('News'),
            'singular_name' => __('News Article'),
        ),
        'public'      => true,
        'has_archive' => true,
        'show_in_rest' => true, //expose post type to GraphQL
        'hierarchical' => true,
        'rewrite'      => array(
            'slug' => 'news'
        ),
        'supports'     => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt'
        ),
    )
);
