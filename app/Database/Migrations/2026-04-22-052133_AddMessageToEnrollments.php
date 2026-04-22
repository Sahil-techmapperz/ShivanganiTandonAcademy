<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMessageToEnrollments extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tbl_enrollments', [
            'message' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'status'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tbl_enrollments', 'message');
    }
}
