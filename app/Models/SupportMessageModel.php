<?php

namespace App\Models;

use CodeIgniter\Model;

class SupportMessageModel extends Model
{
    protected $table            = 'tbl_support_messages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['support_request_id', 'sender_id', 'sender_role', 'message'];

    // Dates
    protected $useTimestamps = false; // Manually handled by DB default
}
