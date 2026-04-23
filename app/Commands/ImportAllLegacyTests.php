<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\MockTestModel;
use App\Models\MockTestQuestionModel;
use App\Models\UnitTestModel;
use App\Models\UnitTestQuestionModel;

class ImportAllLegacyTests extends BaseCommand
{
    protected $group       = 'Database';
    protected $name        = 'import:all-tests';
    protected $description = 'Import all mock and unit tests from legacy SQL file';

    public function run(array $params)
    {
        $sqlPath = 'c:\\xampp\\htdocs\\ShivanganiTandonAcademy\\shivanganitandon_old_DB.sql';
        if (!file_exists($sqlPath)) {
            CLI::error("SQL file not found at $sqlPath");
            return;
        }

        $mockTestModel = new MockTestModel();
        $mockQuestionModel = new MockTestQuestionModel();
        $unitTestModel = new UnitTestModel();
        $unitQuestionModel = new UnitTestQuestionModel();

        $handle = fopen($sqlPath, 'r');
        if (!$handle) {
            CLI::error("Could not open SQL file");
            return;
        }

        CLI::write("Cleaning up existing assessment data...");
        $db = \Config\Database::connect();
        $db->table('tbl_mock_test_questions')->truncate();
        $db->table('tbl_mock_tests')->truncate();
        $db->table('tbl_unit_questions')->truncate();
        $db->table('tbl_unit_tests')->truncate();

        $currentTable = '';
        $mockTestMapping = []; // old_id => new_id
        $unitTestMapping = []; // old_id => new_id
        $mockModules = [15, 16]; // Based on my analysis

        CLI::write("Importing legacy data...");

        while (($line = fgets($handle)) !== false) {
            $line = trim($line);
            if (empty($line)) continue;

            if (preg_match('/INSERT INTO `([^`]+)`/i', $line, $matches)) {
                $currentTable = $matches[1];
                continue;
            }

            if (str_starts_with($line, '(') && (str_ends_with($line, '),') || str_ends_with($line, ');'))) {
                $valuesStr = rtrim($line, ',;');
                $values = $this->parseSqlValues($valuesStr);

                if ($currentTable === 'mocktest' && count($values) >= 5) {
                    // (id, course, module, individuals, time_per_question, created_at, updated_at, note)
                    $data = [
                        'title' => $values[1] . ' - ' . $values[2],
                        'duration_minutes' => (int)$values[4],
                        'is_active' => 1
                    ];
                    $newId = $mockTestModel->insert($data);
                    $mockTestMapping[$values[0]] = $newId;
                    CLI::write("Imported Mock Test (legacy ID {$values[0]}): " . $data['title']);
                }

                if ($currentTable === 'module' && count($values) >= 2) {
                    // (id, module, category_id, isactive)
                    $isMock = in_array($values[0], $mockModules) || str_contains(strtolower($values[1]), 'mock');
                    if ($isMock) {
                        $data = [
                            'title' => $values[1],
                            'duration_minutes' => 120, // Default
                            'is_active' => 1
                        ];
                        $newId = $mockTestModel->insert($data);
                        $mockTestMapping['module_' . $values[0]] = $newId;
                        CLI::write("Imported Mock Test from Module (legacy ID {$values[0]}): " . $data['title']);
                    } else {
                        $data = [
                            'test_name' => $values[1],
                            'is_active' => 1
                        ];
                        $newId = $unitTestModel->insert($data);
                        $unitTestMapping[$values[0]] = $newId;
                        CLI::write("Imported Unit Test (legacy ID {$values[0]}): " . $data['test_name']);
                    }
                }

                if ($currentTable === 'mocktestquestions' && count($values) >= 5) {
                    // (id, test_id, questions, options_list, correct_ans, explanation, isactive, created_at, updated_at)
                    $oldTestId = $values[1];
                    if (isset($mockTestMapping[$oldTestId])) {
                        $newTestId = $mockTestMapping[$oldTestId];
                        $data = [
                            'mock_test_id' => $newTestId,
                            'question_text' => $values[2],
                            'options' => $values[3], // Already JSON in legacy
                            'correct_option' => (int)$values[4],
                            'explanation' => $values[5] ?? '',
                            'is_active' => 1
                        ];
                        $mockQuestionModel->insert($data);
                    }
                }

                if ($currentTable === 'questions' && count($values) >= 5) {
                    // (id, test_id, questions, options_list, correct_ans, explanation, isactive)
                    $oldTestId = $values[1];
                    
                    // Check if it's a Mock Test module
                    if (isset($mockTestMapping['module_' . $oldTestId])) {
                        $newTestId = $mockTestMapping['module_' . $oldTestId];
                        $data = [
                            'mock_test_id' => $newTestId,
                            'question_text' => $values[2],
                            'options' => $values[3],
                            'correct_option' => (int)$values[4],
                            'explanation' => $values[5] ?? '',
                            'is_active' => 1
                        ];
                        $mockQuestionModel->insert($data);
                    } elseif (isset($unitTestMapping[$oldTestId])) {
                        $newTestId = $unitTestMapping[$oldTestId];
                        $data = [
                            'unit_test_id' => $newTestId,
                            'question_text' => $values[2],
                            'options' => $values[3],
                            'correct_option' => (int)$values[4],
                            'explanation' => $values[5] ?? '',
                            'is_active' => 1
                        ];
                        $unitQuestionModel->insert($data);
                    }
                }
            }
        }

        fclose($handle);
        CLI::write("Import completed successfully!", 'green');
    }

    private function parseSqlValues($str)
    {
        $str = trim($str, '()');
        $values = [];
        $currentValue = '';
        $inQuote = false;
        $quoteChar = '';
        $escaped = false;

        for ($i = 0; $i < strlen($str); $i++) {
            $char = $str[$i];

            if ($escaped) {
                $currentValue .= $char;
                $escaped = false;
                continue;
            }

            if ($char === '\\') {
                $escaped = true;
                continue;
            }

            if (($char === "'" || $char === '"') && !$inQuote) {
                $inQuote = true;
                $quoteChar = $char;
                continue;
            }

            if ($char === $quoteChar && $inQuote) {
                $inQuote = false;
                $quoteChar = '';
                continue;
            }

            if ($char === ',' && !$inQuote) {
                $values[] = $this->cleanValue($currentValue);
                $currentValue = '';
                continue;
            }

            $currentValue .= $char;
        }

        $values[] = $this->cleanValue($currentValue);
        return $values;
    }

    private function cleanValue($val)
    {
        $val = trim($val);
        if (strtoupper($val) === 'NULL') return null;
        return $val;
    }
}
