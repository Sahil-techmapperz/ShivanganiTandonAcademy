<?php

namespace App\Models;

use CodeIgniter\Model;

class ExamSubmissionModel extends Model
{
    protected $table            = 'tbl_exam_submissions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id', 
        'course_id', 
        'title', 
        'type', 
        'answers', 
        'file_path',
        'status', 
        'score', 
        'created_at', 
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
