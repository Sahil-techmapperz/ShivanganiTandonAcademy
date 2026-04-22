<?php

namespace App\Models;

use CodeIgniter\Model;

class LessonModel extends Model
{
    protected $table            = 'tbl_lessons';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['course_id', 'title', 'description', 'type', 'video_id', 'duration', 'sort_order'];
    protected $useTimestamps    = true;
}
