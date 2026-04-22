<?php

namespace App\Models;

use CodeIgniter\Model;

class EnrollmentModel extends Model
{
    protected $table            = 'tbl_enrollments';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['user_id', 'course_id', 'progress', 'status', 'message', 'enrolled_at'];
}
