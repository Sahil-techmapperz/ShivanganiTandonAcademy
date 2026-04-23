<?php

function parseSqlValues($str)
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
            $currentValue .= $char; // Keep the backslash for now? 
            // Actually, for SQL values, we might want to unescape later.
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
            $values[] = trim($currentValue);
            $currentValue = '';
            continue;
        }

        $currentValue .= $char;
    }

    $values[] = trim($currentValue);
    return $values;
}

$line = "(1, 1, 'Which of the following is correct regarding the filing ...', '[\"The individual ...\", \"Option 2\"]', 0, 'Explanation', 1, '2026-01-05', '0000-00-00')";
print_r(parseSqlValues($line));
