<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAccessibleTestModel extends Model
{
    protected $table            = 'tbl_user_accessible_tests';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'allowed_categories',
        'allowed_mock_tests'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Get access record for a user
     */
    public function getByUser($userId)
    {
        return $this->where('user_id', $userId)->first();
    }

    /**
     * Check if a user has access to a specific mock test
     */
    public function hasMockTestAccess($userId, $testId)
    {
        $access = $this->getByUser($userId);
        if (!$access || empty($access['allowed_mock_tests'])) {
            return false;
        }

        $allowed = explode(',', $access['allowed_mock_tests']);
        return in_array($testId, $allowed);
    }
}
