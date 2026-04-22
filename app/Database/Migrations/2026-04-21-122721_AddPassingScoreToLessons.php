<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPassingScoreToLessons extends Migration
{
    public function up()
    {
        // Add passing_score to tbl_lessons
        $this->forge->addColumn('tbl_lessons', [
            'passing_score' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
                'after'      => 'duration'
            ]
        ]);

        // Add total_points to tbl_results
        $this->forge->addColumn('tbl_results', [
            'total_points' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 100,
                'after'      => 'score'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tbl_lessons', 'passing_score');
        $this->forge->dropColumn('tbl_results', 'total_points');
    }
}
