<?php

register_post_type(
  'tt_job_post',
  array(
    'labels' => array(
      'name' => __('Job Posts'),
      'singular_name' => __('Job Post'),
      'add_new' => __('Add New'),
      'add_new_item' => __('Add New Job Post'),
      'new_item' => __('New Job Post'),
      'edit_item' => __('Edit Job Post'),
      'view_item' => __('View Job Post'),
      'all_items' => __('All Job Posts'),
    ),
    'public'      => true,
    'has_archive' => true,
    'show_in_menu' => 'edit.php?post_type=tt_careers',
    'show_in_rest' => true, //expose post type to GraphQL
    'hierarchical' => true,
    'rewrite'      => array(
      'slug' => 'careers/jobs'
    ),
    'capability_type'     => 'job_posting',
    'capabilities' => array(
      'read_post' => 'read_job_posting',
      'read_private_posts' => 'read_private_job_postings',
      'edit_post' => 'edit_job_posting',
      'edit_posts' => 'edit_job_postings',
      'edit_others_posts' => 'edit_others_job_postings',
      'edit_published_posts' => 'edit_published_job_postings',
      'publish_posts' => 'publish_job_postings',
      'delete_post' => 'delete_job_posting',
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
$editor->add_cap('read_job_posting');
$editor->add_cap('read_private_job_postings');
$editor->add_cap('edit_job_posting');
$editor->add_cap('edit_job_postings');
$editor->add_cap('edit_others_job_postings');
$editor->add_cap('edit_published_job_postings');
$editor->add_cap('publish_job_postings', false);
$editor->add_cap('delete_job_posting', false);

$contributor = get_role('careers_contributor');
$contributor->add_cap('read_job_posting');
$contributor->add_cap('read_private_job_postings');
$contributor->add_cap('edit_job_posting');
$contributor->add_cap('edit_job_postings');
$contributor->add_cap('edit_others_job_postings', false);
$contributor->add_cap('edit_published_job_postings', false);
$contributor->add_cap('publish_job_postings', false);
$contributor->add_cap('delete_job_posting', false);

$admin = get_role('administrator');
$admin->add_cap('read_job_posting');
$admin->add_cap('read_private_job_postings');
$admin->add_cap('edit_job_posting');
$admin->add_cap('edit_job_postings');
$admin->add_cap('edit_others_job_postings');
$admin->add_cap('edit_published_job_postings');
$admin->add_cap('publish_job_postings');
$admin->add_cap('delete_job_posting');
