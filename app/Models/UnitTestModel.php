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
}
