<?php

namespace App\Models;

use CodeIgniter\Model;

class InquiryModel extends Model
{
    protected $table = 'inquiries';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'first_name',
        'last_name',
        'mobile',
        'current_status',
        'area_of_interest',
        'query'
    ];
}
