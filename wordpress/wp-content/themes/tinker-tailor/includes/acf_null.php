<?php

/**
 * Function to check for empty ACF fields and return them as null to avoid conflicting data types
 *
 * @package Deloitte Federal Studio
 * @subpackage Tinker Tailor
 */

if (!function_exists('acf_nullify_empty')) {
    /**
     * Return `null` if an empty value is returned from ACF.
     *
     * @param mixed $value
     * @param mixed $post_id
     * @param array $field
     *
     * @return mixed
     */
    function acf_nullify_empty($value)
    {
        return empty($value) ? null : $value;
    }
}

add_filter('acf/format_value', 'acf_nullify_empty', 100, 3);
