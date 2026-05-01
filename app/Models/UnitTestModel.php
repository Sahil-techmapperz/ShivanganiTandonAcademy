<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitTestModel extends Model
{
    protected $table            = 'tbl_unit_tests';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'test_name',
        'module_id',
        'unit_id',
        'is_active'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Get unit tests by unit
     */
    public function getByUnit($unitId)
    {
        return $this->where('unit_id', $unitId)
                    ->where('is_active', 1)
                    ->findAll();
    }

    /**
     * Get unit tests accessible to a specific user based on admin-granted permissions
     */
    public function getAccessibleTests($userId)
    {
        $db = \Config\Database::connect();
        $access = $db->table('tbl_user_accessible_tests')
                     ->where('user_id', $userId)
                     ->get()
                     ->getRowArray();

        if (!$access || empty($access['allowed_unit_tests'])) {
            return [];
        }

        $ids = explode(',', $access['allowed_unit_tests']);
        return $this->whereIn('id', $ids)
                    ->where('is_active', 1)
                    ->findAll();
    }
}
