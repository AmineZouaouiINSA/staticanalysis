<?php

//Database Connection
$db = pg_connect("host=db dbname=ddss-database-assignment-2 user=ddss-database-assignment-2 password=ddss-database-assignment-2");

if(!$db)
{
	echo "Error : Unable to open database\n";
}


// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( isset($_POST['v_username'], $_POST['v_password']) ) {

	// Prepare a query for execution
	$param1 = $_POST['v_username'];
	$param2 = $_POST['v_password'];
	$result = pg_query($db, "SELECT * FROM users WHERE username = '{$param1}' and password = '{$param2}'") ;

// Execute the prepared query.  Note that it is not necessary to escape
	if (pg_num_rows($result) > 0)
	{
		session_start();
		$_SESSION['Logged In'] = TRUE;
		$_SESSION['name'] = $_POST['v_username'];

		header('Location: part2.php');
		echo 'Welcome ' . $_SESSION['name'] . ' you were successfully connected'. '!';
		echo "<br>" ;
		var_dump($_SESSION);
	}
	else
	{
		// Incorrect password
		echo 'Incorrect username and/or password!';
	}


}
include('part1.html');
?>

