<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $conn = new mysqli("localhost", "root","", "registration");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $emailCheckSql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($emailCheckSql);

    if ($result->num_rows > 0) {
        echo "Email already exists. Please choose a different email.";
    } else {
        $sql = "INSERT INTO user (email, name, password) VALUES ('$email', '$name', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
