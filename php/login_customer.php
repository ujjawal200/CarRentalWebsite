<!-- login_customer.php -->
<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM customers WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row["password"])) {
            echo "Login successful as Customer!";
            // Redirect or perform further actions for logged-in customers
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Customer with this email not found";
    }
}

$conn->close();
?>
