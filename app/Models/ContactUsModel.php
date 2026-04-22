<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactUsModel extends Model
{
    protected $table = 'start_your_cma_journey_in_usa';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'email',
        'phone',
        'location',
        'profession',
        'created_at'
    ];
}
