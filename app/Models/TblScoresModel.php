<?php

namespace App\Models;

use CodeIgniter\Model;

class TblScoresModel extends Model
{
    protected $table = 'tbl_scores';
    protected $primaryKey = 'id';

    protected $allowedFields = ['image'];
}
