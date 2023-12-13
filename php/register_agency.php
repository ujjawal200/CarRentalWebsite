<!-- register_agency.php -->
<?php
include 'db.php';

function isEmailUnique($email)
{
    global $conn;
    $sql = "SELECT * FROM car_rental_agencies WHERE email = '$email'";
    $result = $conn->query($sql);
    return $result->num_rows === 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Check if email is unique
    if (!isEmailUnique($email)) {
        echo "Error: Email is already registered.";
    } else {
        // Insert new agency if email is unique
        $sql = "INSERT INTO car_rental_agencies (name, email, password) VALUES ('$name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
