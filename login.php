<?php
header('Content-Type: application/json');

$email = $_POST['email'];
$password = $_POST['password'];
$hashed_password = md5($password);

$conn = new mysqli("localhost", "root", "", "registration");

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed."]);
    exit;
}

$sql = "SELECT * FROM user WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($hashed_password === $row['password']) {
        echo json_encode(["success" => true, "message" => $row['name']]);
    } else {
        echo json_encode(["success" => false, "message" => "Invalid email or password."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid email or password."]);
}

$conn->close();
?>
