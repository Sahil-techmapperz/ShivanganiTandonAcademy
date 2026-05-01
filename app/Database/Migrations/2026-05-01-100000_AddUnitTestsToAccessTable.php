<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUnitTestsToAccessTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tbl_user_accessible_tests', [
            'allowed_unit_tests' => [
                'type'    => 'TEXT',
                'null'    => true,
                'after'   => 'allowed_mock_tests',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tbl_user_accessible_tests', 'allowed_unit_tests');
    }
}
