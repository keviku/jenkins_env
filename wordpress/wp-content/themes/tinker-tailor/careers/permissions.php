<?php 

add_role('careers_editor', 'Careers Editor', array(
    'read' => true,
    'edit_posts' => true,
    'delete_posts' => false,
    'publish_posts' => false,
    'upload_files' => true,
));

add_role('careers_contributor', 'Careers Contributor', array(
    'read' => true,
    'edit_posts' => false,
    'delete_posts' => false,
    'publish_posts' => false,
    'upload_files' => false,
));
