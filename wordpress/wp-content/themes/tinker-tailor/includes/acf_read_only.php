<?php

/**
 * Function to expose ACF read only option:
 * 
 * @package Deloitte Federal Studio
 * @subpackage Tinker Tailor
 */

add_action('acf/render_field_settings/type=true_false', 'add_readonly_boolean');
  function add_readonly_boolean($field)
  {
      acf_render_field_setting($field, array(
      'label'      => __('Read Only?', 'acf'),
      'instructions'  => '',
      'type'      => 'radio',
      'name'      => 'readonly',
      'choices'    => array(
        1        => __("Yes", 'acf'),
        0        => __("No", 'acf'),
      ),
      'layout'  =>  'horizontal',
    ));
  }
