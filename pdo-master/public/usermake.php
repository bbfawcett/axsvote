<!doctype html>

<?php
session_start();
?>

<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<h2>Add a user</h2>

<form method="post" action="/pdo-master/public/create.php">
	<label for="firstname">Name</label>
	<input type="text" name="firstname" id="firstname"></br>
	<input type="submit" name="submit" value="Submit" id = "submit">
</form>
</body>
</html>