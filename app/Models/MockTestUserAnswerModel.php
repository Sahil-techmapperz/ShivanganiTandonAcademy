<?php

namespace App\Models;

use CodeIgniter\Model;

class MockTestUserAnswerModel extends Model
{
    protected $table            = 'tbl_mock_test_user_answers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'mock_test_id',
        'question_id',
        'selected_option',
        'is_correct',
        'user_comment'
    ];

    protected $useTimestamps = false; // Using default CURRENT_TIMESTAMP in DB

    /**
     * Get user answers for a specific test attempt
     */
    public function getUserAnswers($userId, $testId)
    {
        return $this->where('user_id', $userId)
                    ->where('mock_test_id', $testId)
                    ->findAll();
    }
}
