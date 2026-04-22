<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter.com/user_guide/extending/common.html
 */

use App\Models\AdminModel;
use App\Models\TblScoresModel;

if (!function_exists('logged_in_user')) {
    function logged_in_user()
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return null;
        }

        // Ensure only admin can use
        if ($session->get('designation') !== 'admin') {
            return null;
        }

        $id = $session->get('id');

        $model = new AdminModel(); // use your admin table model
        $admin = $model->find($id);

        if (!$admin) {
            return null;
        }

        return [
            'name' => 'Admin',
            'email' => $admin['email'],
        ];
    }
}

if (!function_exists('get_scores')) {
    function get_scores($where = [])
    {
        $model = new TblScoresModel();

        if (!empty($where)) {
            return $model->where($where)->findAll();
        }

        return $model->findAll();
    }
}
