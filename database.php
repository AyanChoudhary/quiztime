<?php
    $db_host='localhost';
    $db_username='root';
    $db_pass='Shubham@00';
    $db_name='quiz';

    $query = new mysqli($db_host,$db_username,$db_pass,$db_name);
    if ($query->connect_error) {
    echo $query->mysqli_error;
        exit();
    }
?>
