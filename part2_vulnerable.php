<?php

//Same as part2 correct
// We need to use sessions, so you should always start sessions using the below code.
session_start();
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

if ( isset($_POST['v_btnsubmit'],$_POST['v_text']) )
{
    $p1 = 'Vuln';
    $p2 = $_POST['v_text'];
    // Prepare the query for execution
    //$result = pg_prepare($db, "my_query", 'INSERT INTO messages (author, message) values ($1,$2)');
    $result = pg_query($db, "INSERT INTO messages (author, message) values ('$p1','$p2')") ;

    echo 'You wrote this Text in the database :  ' . $_POST['v_text'];
    echo "<br>" ;




    //Db data
    /*$r2 = pg_query($db,"SELECT * FROM messages WHERE author = '{$p1}' " );
    while($row = pg_fetch_row($r2))
    {
        echo 'Author:' . $row[0] . 'msg' . $row[1] ;
        echo "<br>" ;
    }*/

}
include("part2.php");
?>

