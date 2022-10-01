<?php

    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = mysqli_connect("localhost", "root", "Shubham@00", "quiz");
    $result = ("INSERT INTO user values ('$username','$password',0)");
    if((bool) mysqli_query($conn,$result) === true)
    {
        echo "$username, You have Successfully registered";
        header("Location: ../index.php");
        exit;
    }

echo "registration failed";

?>
