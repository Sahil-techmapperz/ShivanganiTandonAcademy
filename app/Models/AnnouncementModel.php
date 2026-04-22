<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnouncementModel extends Model
{
    protected $table            = 'tbl_announcements';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['title', 'content', 'target_type', 'student_id', 'type', 'created_at'];
}
