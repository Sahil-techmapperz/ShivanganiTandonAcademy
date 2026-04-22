<?php

namespace App\Models;

use CodeIgniter\Model;

class LessonProgressModel extends Model
{
    protected $table            = 'tbl_lesson_progress';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['user_id', 'course_id', 'lesson_id', 'created_at'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; // No updated_at field
}
