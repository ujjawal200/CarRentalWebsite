<!-- register_customer.php -->
<?php
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($email) || empty($password)) {
        die("All fields are required");
    }

    // Hash the password (use a more secure method in production)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Database insertion
    $sql = "INSERT INTO customers (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $name, $email, $hashedPassword);
        $stmt->execute();

        echo "Registration successful!";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>
