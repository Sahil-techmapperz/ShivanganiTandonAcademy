<?php

if (!function_exists('get_setting')) {
    function get_setting($key, $default = '')
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_settings');
        $setting = $builder->where('key_name', $key)->get()->getRow();
        
        return $setting ? $setting->key_value : $default;
    }
}
