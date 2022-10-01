<?php
session_start();
$conn = mysqli_connect("localhost", "root", "Shubham@00", "quiz");
$result = mysqli_query($conn,"SELECT * FROM user WHERE user='".$_SESSION['username']."' and pass= '".$_SESSION['password']."'");    

    $row = mysqli_fetch_array($result);
    if ($row['user'] === $_SESSION['username'] && $row['pass'] === $_SESSION['password'] )
    {
		$question_number = $_GET['question_number'];
		$q = "question_number".$question_number;
		$a = "submit".$_SESSION[$q];
		$options=$_GET['answer'];
		if(isset($_POST[$a]))
{
    $query = "SELECT * from choices where question_number=".$question_number."";
	$insert = mysqli_query($conn,$query);
	$queryx = "SELECT options from choices where is_correct=1 and question_number=".$question_number;
	$insert1 = mysqli_query($conn,$queryx);
	$quer="SELECT points from questions where question_number=".$question_number;
	$insert2 = mysqli_query($conn,$quer);
    if((bool) $insert === true && (bool) $insert1 === true) {
		
			if($options === $queryx)
			{
			$query1 = "INSERT INTO result
			VALUES (".$_SESSION['username'].",".$question_number.",1,$insert2)";
			}
			else
			{
				$query1 = "INSERT INTO result
			VALUES ('".$_SESSION['username']."',".$question_number.",1,0)";
			}

			$final=mysqli_query($conn,$query1);

		
		header("Location: ../question.php");
		echo "Submitted Succesfully";
        exit;
		   
    }
}}

	


?>
