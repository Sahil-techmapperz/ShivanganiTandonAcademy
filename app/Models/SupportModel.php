<?php

namespace App\Models;

use CodeIgniter\Model;

class SupportModel extends Model
{
    protected $table            = 'tbl_support_requests';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['user_id', 'subject', 'message', 'admin_reply', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
