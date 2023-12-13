<?php
include("db.php");

// Perform logic to fetch booked cars for the agency from the database
// Return the data as JSON or other suitable format

// Example:
$bookedCars = [
    ["customer_name" => "John Doe", "model" => "Car1", "start_date" => "2023-01-01", "duration" => 3],
    // Add more booked cars as needed
];

header("Content-Type: application/json");
echo json_encode($bookedCars);
exit();
?>
