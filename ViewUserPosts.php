<?php
	$user = $_POST["selection"];
	
	$mysqli = new mysqli("mysql.eecs.ku.edu", "z702h657", "eir3aequ", "z702h657");
	$query = "SELECT post_id, content, author_id FROM Posts";

	if($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	echo "<table style=width:100%>";
	echo "<tr><td>User</td><td>Post ID</td><td>Content</td></tr>";
	if($result = $mysqli->query($query))
	{
		while ($row = $result->fetch_assoc())
		{
			if ($row["author_id"] == $user)
			{
				echo "<tr>";
				echo "<td>".$row["author_id"]."</td>";
				echo "<td>".$row["post_id"]."</td>";
				echo "<td>".$row["content"]."</td>";
				echo "</tr>";
			}
		}
		$result->free();
	}
	echo "</table>";
?>
