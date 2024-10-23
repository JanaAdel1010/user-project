<?php

    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = md5($password);
    $conn = new mysqli("localhost", "root", "", "registration");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if($hashed_password===$row['password'])
        {

        echo "Welcome, " . $row['name'];
    } else {
        echo "Invalid email or password.";
    }
}else{
    echo "Invalid email or password.";
}

    $conn->close();

?>
