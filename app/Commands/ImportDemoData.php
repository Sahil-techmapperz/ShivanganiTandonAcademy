<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class ImportDemoData extends BaseCommand
{
    protected $group       = 'Custom';
    protected $name        = 'import:demo-tests';
    protected $description = 'Imports demo mock and unit test data from legacy schema.';

    public function run(array $params)
    {
        $db = \Config\Database::connect();

        // 1. IMPORT MOCK TEST
        CLI::write("Importing Mock Test...");
        $mockTestData = [
            'id'               => 1,
            'course_id'        => 1, // Mapping to EA Course
            'title'            => 'Part 3 - Practice Exam',
            'duration_minutes' => 120,
            'note'             => 'Practice exam for Part 3 of the EA course.',
            'is_active'        => 1
        ];
        $db->table('tbl_mock_tests')->ignore(true)->insert($mockTestData);
        $mockId = 1;

        // 2. IMPORT MOCK QUESTIONS (Sample of 30)
        CLI::write("Importing Mock Questions...");
        $questions = [
            [
                'mock_test_id'   => $mockId,
                'question_text'  => 'A frivolous income tax return is one that does not include enough information to figure the correct tax or that contains certain information clearly showing that the tax that was reported is substantially incorrect. If a taxpayer files a frivolous return, which penalty applies specifically to the taxpayer for the frivolous return?',
                'options'        => json_encode(["$5,000 frivolous return penalty, applied in addition to any other applicable penalty or penalties", "$50 for failure to supply the taxpayer's Social Security number", "$100 for the failure to furnish the tax shelter registration number", "20% of the underpayment, reduced for those items for which there was adequate disclosure made"]),
                'correct_option' => 0,
                'explanation'    => '',
                'is_active'      => 1
            ],
            [
                'mock_test_id'   => $mockId,
                'question_text'  => 'John Bright recently passed the Special Enrollment Examination and is advertising for his business. Which of the following presentations will violate the Circular 230 rules for advertising?',
                'options'        => json_encode(["John Bright, admitted to practice before the Internal Revenue Service", "John Bright, Certified Enrolled Agent", "John Bright, enrolled to represent taxpayers before the Internal Revenue Service", "John Bright, enrolled to practice before the Internal Revenue Service"]),
                'correct_option' => 1,
                'explanation'    => '',
                'is_active'      => 1
            ],
            [
                'mock_test_id'   => $mockId,
                'question_text'  => 'The IRS has the burden of proof for any factual issue in a court proceeding if the taxpayer has:',
                'options'        => json_encode(["cooperated with all reasonable requests by the IRS for information regarding the preparation and related tax treatment of any item reported on the return.", "cooperated with all reasonable requests by the IRS for information regarding the preparation and related tax treatment of any item reported on the return.", "provided credible evidence relating to the issue in a court proceeding.", "All of the answer choices are correct."]),
                'correct_option' => 3,
                'explanation'    => '',
                'is_active'      => 1
            ],
            [
                'mock_test_id'   => $mockId,
                'question_text'  => 'Ray was suspended from practice for 4 months by the Internal Revenue Service. Which of the following is Ray permitted to do during the period of suspension?',
                'options'        => json_encode(["Sign a consent to extend the statute of limitations for the assessment and collection of tax", "Sign closing agreements regarding tax liabilities", "Represent taxpayers before the IRS with respect to returns Ray did not prepare", "Appear as a witness for the taxpayer"]),
                'correct_option' => 3,
                'explanation'    => '',
                'is_active'      => 1
            ],
            [
                'mock_test_id'   => $mockId,
                'question_text'  => 'What is the penalty if you understate your income tax because you show negligence (i.e., failure to keep adequate books and records) or disregard of the rules or regulations?',
                'options'        => json_encode(["25% of the underpayment", "20% of the underpayment", "$500", "$50"]),
                'correct_option' => 1,
                'explanation'    => '',
                'is_active'      => 1
            ]
        ];
        
        foreach($questions as $q) {
            $db->table('tbl_mock_test_questions')->insert($q);
        }

        // 3. IMPORT UNIT TEST
        CLI::write("Importing Unit Test...");
        $unitTestData = [
            'id'        => 1,
            'module_id' => 1,
            'unit_id'   => 1,
            'test_name' => 'Income and Assets - Knowledge Check',
            'is_active' => 1
        ];
        $db->table('tbl_unit_tests')->ignore(true)->insert($unitTestData);
        $unitId = 1;

        // 4. IMPORT UNIT QUESTIONS
        CLI::write("Importing Unit Questions...");
        $unitQuestions = [
            [
                'unit_test_id'   => $unitId,
                'question_text'  => 'John is a furniture maker and carpenter. He makes half of his income as an employee of Concept Designs, Inc. He sells a house for $90,000. What is the amount and character of gain?',
                'options'        => json_encode(["$20,000 ordinary gain", "$30,000 short-term capital gain", "$30,000 ordinary gain", "$20,000 short-term capital gain"]),
                'correct_option' => 2,
                'explanation'    => 'Gain is treated as ordinary income because property was held for sale in trade or business.',
                'is_active'      => 1
            ],
            [
                'unit_test_id'   => $unitId,
                'question_text'  => 'What is an individual\'s basis in inherited property if a federal estate tax return does not have to be filed?',
                'options'        => json_encode(["The property's alternate valuation date", "The property's adjusted basis to the decedent at the date of death", "The property's fair market value at the date of death", "The property's fair market value at the date of death"]),
                'correct_option' => 2,
                'explanation'    => 'Usually its fair market value at the date of death.',
                'is_active'      => 1
            ]
        ];

        foreach($unitQuestions as $uq) {
            $db->table('tbl_unit_questions')->insert($uq);
        }

        CLI::write("Demo data import completed!", 'green');
    }
}
