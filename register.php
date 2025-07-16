<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email    = $_POST["email"];
    $phone    = $_POST["phone"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, phone, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $phone, $password);

    if ($stmt->execute()) {
        echo "Registration successful. <a href='login.php'>Login</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<form method="post">
    <h2>Register</h2>
    Username: <input type="text" name="username" required><br>
    Email:    <input type="email" name="email" required><br>
    Phone:    <input type="text" name="phone" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>
