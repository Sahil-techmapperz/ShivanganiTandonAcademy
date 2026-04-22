<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table            = 'tbl_courses';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['title', 'description', 'duration', 'image'];
}
