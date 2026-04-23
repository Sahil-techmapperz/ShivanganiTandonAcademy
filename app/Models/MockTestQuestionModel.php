<?php

namespace App\Models;

use CodeIgniter\Model;

class MockTestQuestionModel extends Model
{
    protected $table            = 'tbl_mock_test_questions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'mock_test_id',
        'question_text',
        'options',
        'correct_option',
        'explanation',
        'is_active'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Get questions for a specific mock test
     */
    public function getByTest($testId)
    {
        return $this->where('mock_test_id', $testId)
                    ->where('is_active', 1)
                    ->findAll();
    }
}
