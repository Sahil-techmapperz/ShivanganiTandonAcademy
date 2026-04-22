<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateExamSubmissionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'course_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'title'       => ['type' => 'VARCHAR', 'constraint' => '255'],
            'type'        => ['type' => 'ENUM', 'constraint' => ['quiz', 'exam'], 'default' => 'quiz'],
            'answers'     => ['type' => 'TEXT', 'null' => true],
            'status'      => ['type' => 'ENUM', 'constraint' => ['pending', 'graded'], 'default' => 'pending'],
            'score'       => ['type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_exam_submissions');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_exam_submissions');
    }
}
