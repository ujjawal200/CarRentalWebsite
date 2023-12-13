<!-- login_agency.php -->
<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM car_rental_agencies WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row["password"])) {
            echo "Login successful as Car Rental Agency!";
            // Redirect or perform further actions for logged-in agencies
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Agency with this email not found";
    }
}

$conn->close();
?>
