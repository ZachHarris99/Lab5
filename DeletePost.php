<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "z702h657", "eir3aequ", "z702h657");
	$query = "SELECT post_id, content, author_id FROM Posts";
	$id = -1;

	if($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	if($result = $mysqli->query($query))
	{
		while ($row = $result->fetch_assoc())
		{
			$id = $row["post_id"];
			if ($_POST[$id] == 'yes')
			{
				$delPost = "DELETE FROM Posts WHERE post_id=$id";
				if($mysqli->query($delPost) === true)
				{
					echo "Post with post_id = $id successfully deleted!<br>";
				}
			}
		}
		$result->free();
	}
?>
