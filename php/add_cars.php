<!-- add_cars.php -->
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';

session_start();

// Check if the user is logged in as a car rental agency
if (!isset($_SESSION["user_type"]) || $_SESSION["user_type"] !== "agency") {
    header("Location: /./html/login_agency.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model = $_POST["model"];
    $number = $_POST["number"];
    $seating = $_POST["seating"];
    $rent = $_POST["rent"];
    $agency_id = $_SESSION["user_id"]; // Use the agency's user ID from the session

    $sql = "INSERT INTO available_cars (model, number, seating_capacity, rent_per_day, agency_id) VALUES ('$model', '$number', '$seating', '$rent', '$agency_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Car added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request method";
}

$conn->close();
?>
