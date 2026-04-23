<?php
namespace App\Models;
use CodeIgniter\Model;

class UnitTestUserAnswerModel extends Model
{
    protected $table            = 'tbl_unit_test_user_answers';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'user_id',
        'unit_test_id',
        'question_id',
        'selected_option',
        'is_correct'
    ];
}
