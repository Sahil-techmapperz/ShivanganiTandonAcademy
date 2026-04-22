<?php

namespace App\Models;

use CodeIgniter\Model;

class QueryFormModel extends Model
{
    protected $table = 'query_forms';

    protected $allowedFields = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'query',
        'created_at'
    ];
}
