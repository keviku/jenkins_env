<?php 

add_role('museum_editor', 'Museum Editor', array(
    'read' => true,
    'edit_posts' => true,
    'delete_posts' => false,
    'publish_posts' => false,
    'upload_files' => true,
));

add_role('museum_contributor', 'Museum Contributor', array(
    'read' => true,
    'edit_posts' => false,
    'delete_posts' => false,
    'publish_posts' => false,
    'upload_files' => false,
));
