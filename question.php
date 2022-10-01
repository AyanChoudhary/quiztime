<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "Shubham@00", "quiz");
	
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>QuizTime</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <div class="container">
        <p class="question">
		<?php
			$query = mysqli_query($conn,"SELECT question_number,text from questions");
			$w=1;
			while($row = mysqli_fetch_array($query)) {
				?>
				<p><?php echo $row['text']?></p>
				<form method = "POST" action="php/question1.php?question_number=<?php echo $row['question_number']?>&answer=<?php echo $row1['options']?>">
					<?php
					$a = "question_number".$row['question_number'];
					$_SESSION[$a]= $row['question_number'];
						$query1 = mysqli_query($conn,"SELECT options from choices where question_number=".$row['question_number']);
						while($row1=mysqli_fetch_array($query1)){
							
						
					?>

					<p>
						<input type="radio" name=<?php echo "option".$row['question_number'].$w?> value=<?php echo "option".$row['question_number'].$w?>><?php echo $row1['options']?></input>
					</p>
				

				<?php
					$w++;	
					}
				?>
				<input type ="submit" name="<?php echo 'submit'.$row['question_number'];?>" value="submit answer">
				</form>
		<?php
			}
		?>

		</p>

        <a href="leaderboard.php">Leader Board</a>
		<?php
			$result = mysqli_query($conn,"SELECT * FROM user WHERE user='admin' and pass= 'admin'");    

			$row = mysqli_fetch_array($result);
			if ($row['user'] === $_SESSION['username'] && $row['pass'] === $_SESSION['password'] )
			{
				?><a href="add.php">Add Questions</a>
			<?php
			}
			?>
    </div>
</body>
</html>
