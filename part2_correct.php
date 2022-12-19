<?php
//session_start();
//Still to do modify the table with text input value
//Made Part 2 available after login
session_start();
// We need to use sessions, so you should always start sessions using the below code.
if (!$_SESSION['Logged In']) //When you re not authenticated
{
    header('Location: index.php');
}


//Database Connection
$db = pg_connect("host=db dbname=ddss-database-assignment-2 user=ddss-database-assignment-2 password=ddss-database-assignment-2");
if(!$db)
{
    echo "Error : Unable to open database\n";
}
if ( isset($_POST['c_btnsubmit'],$_POST['c_text']) )
{
    $p1 = 'Correct';
    // Prepare the query for execution
    $result = pg_prepare($db, "my_query", 'INSERT INTO messages (author, message) values ($1,$2)');
    // Execute the prepared query
    $result = pg_execute($db, "my_query", array($p1,$_POST['c_text']));

    echo 'You wrote this Text in the database :  ' . htmlspecialchars($_POST['c_text']);
    echo "<br>" ;

    /*$r2 = pg_query($db,"SELECT * FROM messages " );
    $row = pg_fetch_row($r2);


    //Db data
    //$r2 = pg_query($db,"SELECT * FROM messages WHERE author = '{$p1}' " );
    while($row = pg_fetch_row($r2))
    {
        echo 'Author:' . $row[0] . 'msg' . $row[1] ;
        echo "<br>" ;
    }*/




}
include("part2.php");
?>
