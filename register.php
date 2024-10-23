<?php
$name=$_POST['name'];
$email=$_POST['email'];
$password=md5($_POST['password']);

$conn=new mysqli("local host","root","","registration");

if($conn->connect_error)
{
    die("connection failed..." .$conn->connect_error);
}

$sql= "SELECT * FROM users WHERE email='$email' ";
if($conn->query($sql)->num_rows> 0)
{
    echo "Email already exists!";
}else{
    $sql="INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
}
if($conn->query($sql)==TRUE)
{
    echo "welcome" .$name;
}else{
    echo "ERROR:".$sql . "<br>" .$conn->error;
}

$conn->close();
?>