<?php

namespace App\Models;

use CodeIgniter\Model;

class ResultModel extends Model
{
    protected $table            = 'tbl_results';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['user_id', 'subject', 'score', 'exam_date'];
}
