<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'tbl_admins';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['email', 'password', 'full_name'];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $returnType       = 'array'; // Can also be 'object' if preferred
}
