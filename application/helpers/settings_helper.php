<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function get_setting($key) {
    $CI =& get_instance();
    $CI->load->database();

    $row = $CI->db
        ->get_where('settings', ['setting_key' => $key])
        ->row();

    return $row ? $row->setting_value : '';
}
