<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTypeToLessonsTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tbl_lessons', [
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'default'    => 'video',
                'after'      => 'description'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tbl_lessons', 'type');
    }
}
