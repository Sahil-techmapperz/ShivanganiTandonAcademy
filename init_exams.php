<?php
$mysqli = new mysqli("localhost", "root", "Techm@123", "shivanganitandonacademy");
if ($mysqli->connect_errno) {
    echo "Connection error: " . $mysqli->connect_error;
    exit();
}

// Create tbl_exam_questions
$sql = "CREATE TABLE IF NOT EXISTS tbl_exam_questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lesson_id INT NOT NULL,
    question_text TEXT NOT NULL,
    options TEXT, -- JSON string for MCQs
    correct_option VARCHAR(255),
    question_type ENUM('mcq', 'text') DEFAULT 'mcq',
    points INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (lesson_id) REFERENCES tbl_lessons(id) ON DELETE CASCADE
)";

if ($mysqli->query($sql)) {
    echo "Database initialized successfully.\n";
} else {
    echo "Error creating table: " . $mysqli->error . "\n";
}

$mysqli->close();
?>
进展完成
