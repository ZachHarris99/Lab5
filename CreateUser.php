<?php
	$user = $_POST["username"];
	$mysqli = new mysqli("mysql.eecs.ku.edu", "z702h657", "eir3aequ", "z702h657");
	$query = "SELECT user_id FROM Users";	
	$alreadySaved = false;

	if($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	if($user == "")
	{
		echo "You left the text field empty!<br>";
	}
	else
	{
		echo "Welcome user ".$user."!<br>";
		if($result = $mysqli->query($query))
		{
			while ($row = $result->fetch_assoc())
			{
				if ($row["user_id"] == $user)
				{
					$alreadySaved = true;
				}
			}
			$result->free();
		}
		if($alreadySaved)
		{
			echo "You're already in the database!<br>";
		}
		else
		{
			$sql = "INSERT INTO Users (user_id) VALUES ('$user')";
			if (mysqli_query($mysqli, $sql)) 
			{
				echo "You have been successfully stored!";
			} 
			else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
			}
		}
	}
?>
