<?php 
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $hashed_password = md5($password);
    $conn = new mysqli("localhost", "root", "", "registration");

    if ($conn->connect_error) {
        echo json_encode(["success" => false, "message" => "Database connection failed."]);
        exit;
    }

    $emailCheckSql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($emailCheckSql);

    if ($result->num_rows > 0) {
        echo json_encode(["success" => false, "message" => "Email already exists."]);
    } else {
        $sql = "INSERT INTO user (email, name, password) VALUES ('$email', '$name', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(["success" => true, "message" => $name]);
        } else {
            echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
        }
    }

    $conn->close();
}