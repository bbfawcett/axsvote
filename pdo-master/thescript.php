<?php
echo "Your hand is currently ";
$connection = new PDO($dsn, $username, $password, $options);

		$sql = "SELECT handup 
						FROM users
						WHERE username = :location";

		$location = $_SESSION["name"];

		$statement = $connection->prepare($sql);
		$statement->bindParam(':location', $location, PDO::PARAM_STR);
		$statement->execute();

		$result = $statement->fetchAll();
foreach ($result as $row) {
	$check = escape($row["handup"]);
}
if($check == 1){
echo "up";
} else {
echo "down";
}
?>