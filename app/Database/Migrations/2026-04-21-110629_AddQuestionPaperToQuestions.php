<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddQuestionPaperToQuestions extends Migration
{
    public function up()
    {
        $fields = [
            'question_paper' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'after'      => 'points'
            ],
        ];
        $this->forge->addColumn('tbl_exam_questions', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('tbl_exam_questions', 'question_paper');
    }
}
