<!doctype html>
<?php
session_start();
echo "The order is currently:";
echo "<br>";
$host       = "localhost";
$username   = "root";
$password   = "root";
$dbname     = "test";
$dsn        = "mysql:host=$host;dbname=$dbname";

function escape($html)
{
	return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

$connection = new PDO($dsn, $username, $password, $options);

		$sql = "SELECT username
						FROM users
						WHERE handup = :location
						ORDER BY date ASC";

		$location = 1;
		$statement = $connection->prepare($sql);

		$statement->bindParam(':location', $location, PDO::PARAM_STR);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			echo escape($row["username"]);
			echo "<br>";
		}
		
if (isset($_POST['submit']))
	
{
	
	try 
	{
		$connection = new PDO($dsn, $username, $password, $options);
		$sql = sprintf(
				"UPDATE users SET handup = 0 WHERE username = '%s'", $_POST['removename']
		);
		
		$statement = $connection->prepare($sql);
		$statement->execute($new_user);
	}

	catch(PDOException $error) 
	{
		echo $sql . "<br>" . $error->getMessage();
	}
}
?>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<form method='post'>
	<label for="firstname">Name of Talker: </label>
	<input type="text" name="removename" id="removename"></br>
	<input type="submit" name="submit" value="Submit" id = "submit">
</form>
</body>
</html>