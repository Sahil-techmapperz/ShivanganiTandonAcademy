<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLessonProgressTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'course_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'lesson_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['user_id', 'lesson_id']);
        $this->forge->createTable('tbl_lesson_progress');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_lesson_progress');
    }
}
