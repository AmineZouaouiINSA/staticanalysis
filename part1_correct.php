<?php

//Database Connection
$db = pg_connect("host=db dbname=ddss-database-assignment-2 user=ddss-database-assignment-2 password=ddss-database-assignment-2");
if(!$db)
{
	echo "Error : Unable to open database\n";
}

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if (isset($_POST['c_submit']))
{
	if (isset($_POST['c_username'], $_POST['c_password'])) {
		// Prepare the query for execution
		$result = pg_prepare($db, "my_query", 'SELECT * FROM users WHERE username = $1 and password = $2');


		// Execute the prepared query
		$result = pg_execute($db, "my_query", array(filter_var($_POST['c_username'],FILTER_SANITIZE_STRING), filter_var($_POST['c_password'],FILTER_SANITIZE_STRING)));
		if (pg_num_rows($result) > 0) {
			session_start();
			$_SESSION['Logged In'] = TRUE;
			$_SESSION['name'] = $_POST['c_username'];

			header('Location: part2.php');


		} else {
			// Incorrect password
			echo 'Incorrect username and/or password!';
		}


	}

}
include('part1.html');
?>

