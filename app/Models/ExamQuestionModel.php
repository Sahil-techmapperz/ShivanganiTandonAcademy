<?php

namespace App\Models;

use CodeIgniter\Model;

class ExamQuestionModel extends Model
{
    protected $table            = 'tbl_exam_questions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'lesson_id',
        'question_text',
        'options',
        'correct_option',
        'question_type',
        'points',
        'question_paper'
    ];

    protected $useTimestamps = false; // Using created_at in DB
}
