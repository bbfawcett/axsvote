<?php
session_start();

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */

if (isset($_POST['submit']))
	
{
	$_SESSION["name"] = $_POST['firstname'];
	echo "Welcome ";
	echo $_SESSION["name"];
	require "../config.php";
	require "../common.php";
	try 
	{
		$connection = new PDO($dsn, $username, $password, $options);
		$sql = sprintf(
				"INSERT INTO users (username) VALUES ('%s')", $_SESSION["name"]
		);
		
		$statement = $connection->prepare($sql);
		$statement->execute($new_user);
	}

	catch(PDOException $error) 
	{
		echo $sql . "<br>" . $error->getMessage();
	}
	
}

if (isset($_POST['up']))
{
	
	require "../config.php";
	require "../common.php";
	echo "Welcome ";
	echo $_SESSION["name"];
	try 
	{
		$connection = new PDO($dsn, $username, $password, $options);
		$sql = sprintf(
				"UPDATE users SET handup = 1 WHERE username = '%s'", $_SESSION["name"]
		);
		$statement = $connection->prepare($sql);
		$statement->execute($new_user);

	}

	catch(PDOException $error) 
	{
		echo $sql . "<br>" . $error->getMessage();
	}
	
}

if (isset($_POST['down']))
{
	echo "Welcome ";
	echo $_SESSION["name"];
	require "../config.php";
	require "../common.php";

	try 
	{
		$connection = new PDO($dsn, $username, $password, $options);
		$sql = sprintf(
				"UPDATE users SET handup = 0 WHERE username = '%s'", $_SESSION["name"]
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

</br>
<?php
require "../thescript.php";
?>


<script>
    $(function(){
      function loadNum()
      {  
        $('h1.countdown').load('thescript.php');
        setTimeout(loadNum, 1000); // makes it reload every 5 sec
      }
      loadNum(); // start the process...
    });
 </script>
<h2>Select hand up or hand down</h2>

<body onLoad="init()">
<form method="post">
	<input type="submit" name="up" value="Up" id = "up"></br>
	<input type="submit" name="down" value="Down" id = "down">
</form>
</body>

<?php require "templates/footer.php"; ?>