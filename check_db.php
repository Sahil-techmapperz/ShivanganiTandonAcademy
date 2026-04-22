<?php
$mysqli = new mysqli("localhost", "root", "", "shivangani_academy");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$result = $mysqli->query("DESCRIBE tbl_lessons");
while ($row = $result->fetch_assoc()) {
    print_r($row);
}
$mysqli->close();
?>
进展完成
