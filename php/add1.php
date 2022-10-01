<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "Shubham@00", "quiz");
    $result = mysqli_query($conn,"SELECT * FROM user WHERE user='admin' and pass= 'admin'");

    $row = mysqli_fetch_array($result);
    if ($row['user'] === $_SESSION['username'] && $row['pass'] === $_SESSION['password'] ) {
        if (isset($_POST['submit'])) {
            $question_number = $_POST['question_number'] ;
            $question_text = $_POST['question_text'] ;
            $options = [];
            $options['1'] = $_POST['option1'];
            $options['2'] = $_POST['option2'];
            $options['3'] = $_POST['option3'];
            $options['4'] = $_POST['option4'];
            $correct_option = $_POST['correct_option'];
            $points = $_POST['points'];
            $query = "INSERT INTO questions (question_number,text)
            VALUES('".$question_number."','".$question_text."')";
            $insert = mysqli_query($conn,$query);
            if ($insert) {
                foreach ($options as $option =>$value) {
                    if($value !== '') {
                        $is_correct= ($correct_option === $option) ? 1 : 0;

                        $query1 = "INSERT INTO choices (question_number,is_correct,options)
                        VALUES ('$question_number','$is_correct','$value')";
                        $insert1 = mysqli_query($conn,$query1);

                        if($insert1) {
                            continue;
                        }

                        die("error");
                    }
                }
                echo "question successfully added";
            }
        }
    }
    else {
        echo "Only admins are allowed";
    }
?>
