<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitTestQuestionModel extends Model
{
    protected $table            = 'tbl_unit_questions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'unit_test_id',
        'question_text',
        'options',
        'correct_option',
        'explanation',
        'is_active'
    ];

    protected $useTimestamps = false; // DB has created_at with default

    /**
     * Get questions for a specific unit test
     */
    public function getByTest($testId)
    {
        return $this->where('unit_test_id', $testId)
                    ->where('is_active', 1)
                    ->findAll();
    }
}
