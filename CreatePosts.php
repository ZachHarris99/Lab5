<?php
	$user = $_POST["username"];
	$post = $_POST["aPost"];
	$mysqli = new mysqli("mysql.eecs.ku.edu", "z702h657", "eir3aequ", "z702h657");
	$query = "SELECT user_id FROM Users";	
	$validUser = false;

	if($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	if($post == "")
	{
		echo "You left the text field empty!<br>";
	}
	else
	{
		if($result = $mysqli->query($query))
		{
			while ($row = $result->fetch_assoc())
			{
				if ($row["user_id"] == $user)
				{
					$validUser = true;
				}
			}
			$result->free();
			if ($user == "")
			{
				$validUser = false;
			}
		}
		if(!$validUser)
		{
			echo "Sorry. You were not found in the database!<br>";
		}
		else
		{
			$sql = "INSERT INTO Posts (content, author_id) VALUES ('$post','$user')";
			if (mysqli_query($mysqli, $sql)) 
			{
				echo "Your content has been posted!";
			} 
			else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
			}
		}
	}
?>
