<?php

namespace App\Models;

use CodeIgniter\Model;

class MockTestModel extends Model
{
    protected $table            = 'tbl_mock_tests';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'title',
        'course_id',
        'module_id',
        'duration_minutes',
        'note',
        'is_active'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Get mock tests for a user based on permissions
     */
    public function getAccessibleTests($userId)
    {
        $db = \Config\Database::connect();
        $access = $db->table('tbl_user_accessible_tests')
                     ->where('user_id', $userId)
                     ->get()
                     ->getRowArray();

        if (!$access || empty($access['allowed_mock_tests'])) {
            return [];
        }

        $ids = explode(',', $access['allowed_mock_tests']);
        return $this->whereIn('id', $ids)
                    ->where('is_active', 1)
                    ->findAll();
    }
}
