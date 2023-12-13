<?php
include("db.php");

// Perform logic to fetch available cars from the database
// Return the data as JSON or other suitable format

// Example:
$cars = [
    ["model" => "Car1", "number" => "ABC123", "capacity" => 5, "rent" => 50],
    ["model" => "Car2", "number" => "XYZ456", "capacity" => 4, "rent" => 60],
    // Add more cars as needed
];

header("Content-Type: application/json");
echo json_encode($cars);
exit();
?>
