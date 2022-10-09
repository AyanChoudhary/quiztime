<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);
    $result = mysqli_query($conn,"SELECT * FROM user WHERE user = '$username' and pass='$password'");
    
    
    $_SESSION['username']= $username;
    $_SESSION['password']= $password;

    $row = mysqli_fetch_array($result);
    if ($row['user'] == $username && $row['pass'] == $password )
    {
        header("Location: ../question.php");
    }
    else
    {
        echo "Login failed. Please try again";
    }

?>
