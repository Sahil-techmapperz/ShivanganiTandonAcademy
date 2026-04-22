<?php
$mysqli = new mysqli("localhost", "root", "Techm@123", "shivanganitandonacademy");
if ($mysqli->connect_errno) {
    echo "Connection error: " . $mysqli->connect_error;
    exit();
}

// Check if file_path exists
$result = $mysqli->query("SHOW COLUMNS FROM tbl_exam_submissions LIKE 'file_path'");
$exists = ($result->num_rows > 0);

if (!$exists) {
    if ($mysqli->query("ALTER TABLE tbl_exam_submissions ADD COLUMN file_path VARCHAR(255) DEFAULT NULL AFTER answers")) {
        echo "Database schema updated successfully (file_path added).\n";
    } else {
        echo "Error adding column: " . $mysqli->error . "\n";
    }
} else {
    echo "Column file_path already exists.\n";
}

$mysqli->close();
?>
进展完成
