<?php

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $conn = new mysqli("localhost", "root", "", "registration");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Welcome, " . $row['name'];
    } else {
        echo "Invalid email or password.";
    }

    $conn->close();

?>
