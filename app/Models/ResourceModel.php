<?php

namespace App\Models;

use CodeIgniter\Model;

class ResourceModel extends Model
{
    protected $table            = 'tbl_lesson_resources';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['lesson_id', 'file_name', 'file_type', 'file_path', 'file_size'];
    protected $useTimestamps    = false;
}
