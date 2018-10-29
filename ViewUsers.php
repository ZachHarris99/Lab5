<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "z702h657", "eir3aequ", "z702h657");
	$query = "SELECT user_id FROM Users";
	$x = 0;

	if($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	echo "<table style=width:100%>";
	echo "<tr>";
	if($result = $mysqli->query($query))
	{
		while ($row = $result->fetch_assoc())
		{
			echo "<td>".$row["user_id"]."</td>";
			$x += 1;
			if ($x == 7)
			{
				echo "</tr>";
				echo "<tr>";
				$x = 0;
			}
		}
		$result->free();
	}
	echo "</tr>";
	echo "</table>";
	
?>
