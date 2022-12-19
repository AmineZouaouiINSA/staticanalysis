<?php
session_start();

if (!$_SESSION['Logged In']) //When you re not authenticated
{
    header('Location: index.php');
}
else {
    echo '  Welcome you are logged in as ' . $_SESSION['name'];
    echo "<br>" ;
    echo "<br>" ;
}

//Database Connection
$db = pg_connect("host=db dbname=ddss-database-assignment-2 user=ddss-database-assignment-2 password=ddss-database-assignment-2");
if(!$db)
{
    echo "Error : Unable to open database\n";
}
//Initial query conditions and parameters
$query_condition = "";
$params = array();

//Title field
if (!empty($_POST['v_name']))
{
    array_push($params,$_POST['v_name']);
    echo "Title is set = ".$_POST['v_name'] ;
    echo "<br>";
    $query_condition.= "WHERE title = $".count($params)." " ;
    echo "Query now = ".$query_condition;
    echo "<br>";


}

//Author field
if (!empty($_POST['v_author']))
{
    if (count($params) >0 )
    {
        array_push($params,$_POST['v_author']);
        echo "Author is set = ".$_POST['v_author'] ;
        echo "<br>";
        $query_condition.= "AND authors = $".count($params)." ";
        echo "Query now = ".$query_condition;
        echo "<br>";

    }
    else {
        array_push($params,$_POST['v_author']);
        echo "Author is set = ".$_POST['v_author'] ;
        echo "<br>";
        $query_condition.= "WHERE authors = $".count($params)." ";
        echo "Query now = ".$query_condition;
        echo "<br>";

    }
}

//Category field
if (!empty($_POST['v_category_id']))
{
    if (count($params) >0 )
    {
        array_push($params,$_POST['v_category_id']);
        echo "Category is set = ".$_POST['v_category_id'] ;
        echo "<br>";
        $query_condition.= "AND category = $".count($params)." ";
        echo "Query now = ".$query_condition;
        echo "<br>";

    }
    else {
        array_push($params,$_POST['v_category_id']);
        echo "Category is set = ".$_POST['v_category_id'] ;
        echo "<br>";
        $query_condition.= "WHERE category = $".count($params)." ";
        echo "Query now = ".$query_condition;
        echo "<br>";

    }
}

//Price minimum field
if (!empty($_POST['v_pricemin']))
{
    if (count($params) >0 )
    {
        array_push($params,$_POST['v_pricemin']);
        echo "Priceminimum is set = ".$_POST['v_pricemin'] ;
        echo "<br>";
        $query_condition.= "AND price >= $".count($params)." ";
        echo "Query now = ".$query_condition;
        echo "<br>";

    }
    else {
        array_push($params,$_POST['v_pricemin']);
        echo "Priceminimum is set = ".$_POST['v_pricemin'] ;
        echo "<br>";
        $query_condition.= "WHERE price >= $".count($params)." ";
        echo "Query now = ".$query_condition;
        echo "<br>";

    }
}

//Price max field
if (!empty($_POST['v_pricemax']))
{
    if (count($params) >0 )
    {
        array_push($params,$_POST['v_pricemax']);
        echo "Pricemax is set = ".$_POST['v_pricemax'] ;
        echo "<br>";
        $query_condition.= "AND price <= $".count($params)." ";
        echo "Query now = ".$query_condition;
        echo "<br>";

    }
    else {
        array_push($params,$_POST['v_pricemax']);
        echo "Pricemax is set = ".$_POST['v_pricemax'] ;
        echo "<br>";
        $query_condition.= "WHERE price <= $".count($params)." ";
        echo "Query now = ".$query_condition;
        echo "<br>";

    }
}


////////////////////// ADVANCED
///
////////////////////// SEARCH FIELD EMPTY

//Search for anywhere
if (!empty($_POST['v_search_input']) and empty($_POST['v_search_field']))
{
    //Match any words
    if ($_POST['v_radio_match'] == "any")
    {
        if (count($params) >0 )
        {
            array_push($params,$_POST['v_search_input']);
            echo "v_search_input is set = ".$_POST['v_search_input'] ;
            echo "<br>";
            $query_condition.= "AND title like $".count($params)." "
                ."OR authors like $".count($params)." "
                ."OR description like $".count($params)." "
                ."OR keywords like $".count($params)." "
                ."OR notes like $".count($params)." ";

            echo "Query now = ".$query_condition;
            echo "<br>";

        }
        else {
            array_push($params,$_POST['v_search_input']);
            echo "v_search_input is set = ".$_POST['v_search_input'] ;
            echo "<br>";
            $query_condition.= "WHERE title like $".count($params)." "
                ."OR authors like $".count($params)." "
                ."OR description like $".count($params)." "
                ."OR keywords like $".count($params)." "
                ."OR notes like $".count($params)." ";
            echo "Query now = ".$query_condition;
            echo "<br>";

        }
    }

    //Match all words
    if ($_POST['v_radio_match'] == "all")
    {
        if (count($params) >0 )
        {
            array_push($params,$_POST['v_search_input']);
            echo "c_search_input is set = ".$_POST['v_search_input'] ;
            echo "<br>";
            $query_condition.= "AND title = $".count($params)." "
                ."OR authors = $".count($params)." "
                ."OR description = $".count($params)." "
                ."OR keywords = $".count($params)." "
                ."OR notes = $".count($params)." ";
            echo "Query now = ".$query_condition;
            echo "<br>";

        }
        else {
            array_push($params,$_POST['v_search_input']);
            echo "c_search_input is set = ".$_POST['v_search_input'] ;
            echo "<br>";
            $query_condition.= "WHERE title = $".count($params)." "
                ."OR authors = $".count($params)." "
                ."OR description = $".count($params)." "
                ."OR keywords = $".count($params)." "
                ."OR notes = $".count($params)." ";
            echo "Query now = ".$query_condition;
            echo "<br>";

        }
    }


    //Match exact phrase
    if ($_POST['c_radio_match'] == "phrase")
    {
        if (count($params) >0 )
        {
            array_push($params,$_POST['v_search_input']);
            echo "c_search_input is set = ".$_POST['v_search_input'] ;
            echo "<br>";
            $query_condition.= "AND title = $".count($params)." "
                ."OR authors = $".count($params)." "
                ."OR description = $".count($params)." "
                ."OR keywords = $".count($params)." "
                ."OR notes = $".count($params)." ";
            echo "Query now = ".$query_condition;
            echo "<br>";

        }
        else
        {
            array_push($params,$_POST['v_search_input']);
            echo "c_search_input is set = ".$_POST['v_search_input'] ;
            echo "<br>";
            $query_condition.= "WHERE title = $".count($params)." "
                ."OR authors = $".count($params)." "
                ."OR description = $".count($params)." "
                ."OR keywords = $".count($params)." "
                ."OR notes = $".count($params)." ";
            echo "Query now = ".$query_condition;
            echo "<br>";

        }
    }
}


////////////////////// SEARCH FIELD NOT EMPTY

//Search for the chosen search field
if (!empty($_POST['v_search_input']) and !empty($_POST['v_search_field']))
{
    //Match any words
    if ($_POST['c_radio_match'] == "any")
    {
        if (count($params) >0 )
        {
            array_push($params,$_POST['v_search_input']);
            echo "c_search_input is set = ".$_POST['v_search_input'] ;
            echo "<br>";
            $query_condition.= "AND ".$_POST['v_search_field']. " like $".count($params)." ";
            echo "Query now = ".$query_condition;
            echo "<br>";

        }
        else {
            array_push($params,$_POST['v_search_input']);
            echo "c_search_input is set = ".$_POST['v_search_input'] ;
            echo "<br>";
            $query_condition.= "WHERE ".$_POST['v_search_field']. " like $".count($params)." ";
            echo "Query now = ".$query_condition;
            echo "<br>";

        }
    }

    //Match all words
    if ($_POST['v_radio_match'] == "all")
    {
        if (count($params) >0 )
        {
            array_push($params,$_POST['v_search_input']);
            echo "c_search_input is set = ".$_POST['v_search_input'] ;
            echo "<br>";
            $query_condition.= "AND ".$_POST['v_search_field']." = $".count($params)." ";
            echo "Query now = ".$query_condition;
            echo "<br>";

        }
        else {
            array_push($params,$_POST['v_search_input']);
            echo "c_search_input is set = ".$_POST['v_search_input'] ;
            echo "<br>";
            $query_condition.= "WHERE ".$_POST['v_search_field']." = $".count($params)." ";
            echo "Query now = ".$query_condition;
            echo "<br>";

        }
    }

    //Match exact phrase
    if ($_POST['v_radio_match'] == "phrase")
    {
        if (count($params) >0 )
        {
            array_push($params,$_POST['v_search_input']);
            echo "c_search_input is set = ".$_POST['v_search_input'] ;
            echo "<br>";
            $query_condition.= "AND ".$_POST['v_search_field']." = $".count($params)." ";
            echo "Query now = ".$query_condition;
            echo "<br>";

        }
        else {
            array_push($params,$_POST['v_search_input']);
            echo "c_search_input is set = ".$_POST['v_search_input'] ;
            echo "<br>";
            $query_condition.= "WHERE ".$_POST['v_search_field']." = $".count($params)." ";
            echo "Query now = ".$query_condition;
            echo "<br>";

        }
    }
}

//////////////////////////////// DATE
///
if (!empty($_POST['v_sp_d']))
{
    if ($_POST['v_sp_d'] == "custom" )
    {
        if (!empty($_POST["v_sp_date_range"]) && $_POST['v_sp_date_range'] != -1) {
            if (count($params) > 0) {
                array_push($params, filter_var("-".$_POST['v_sp_date_range'], FILTER_SANITIZE_STRING));
                $query_condition .= "AND book_date WHERE to_timestamp(date) < NOW() - INTERVAL '" . count($params) . "'" . " ";
            } else {
                array_push($params, filter_var("-".$_POST['v_sp_date_range'], FILTER_SANITIZE_STRING));
                $query_condition .= "WHERE book_date WHERE to_timestamp(date) < NOW() - INTERVAL '" . count($params) . "'" . " ";
            }
        }
        else{
            echo("<center><p>Write the fields properly</p></center>");
        }
    }
    if($_POST['v_sp_d'] == "specific" )
    {
        if (!empty($_POST["v_sp_start_month"]) && !empty($_POST["v_sp_start_day"]) && !empty($_POST["v_sp_start_year"]) && !empty($_POST["v_sp_end_month"]) && !empty($_POST["v_sp_end_day"]) && !empty($_POST["v_sp_end_year"]))
        {
            $start_date = $_POST['v_sp_start_year'] . "-" . $_POST["v_sp_start_month"] . "-" . $_POST["v_sp_start_day"];
            $end_date = $_POST["v_sp_end_year"] . "-" . $_POST["v_sp_end_month"] . "-" . $_POST["v_sp_end_day"];
            if (count($params) > 0) {
                array_push($params, filter_var($start_date, FILTER_SANITIZE_STRING));
                array_push($params, filter_var($end_date, FILTER_SANITIZE_STRING));
                $query_condition .= "AND book_date BETWEEN $" . (count($params) - 1) . " AND $" . count($params) . " ";
            } else {
                array_push($params, filter_var($start_date, FILTER_SANITIZE_STRING));
                array_push($params, filter_var($end_date, FILTER_SANITIZE_STRING));
                $query_condition .= "WHERE book_date BETWEEN $" . (count($params) - 1) . " AND $" . count($params) . " ";
            }
        }
        else{
            echo("<center><p>Write the fields properly</p></center>");
        }
    }
}
/*if (!empty($_POST['c_sp_d']))
{
    if ($_POST['c_sp_d'] == "custom" )
    {
        if (count($params) >0 )
        {
            echo "Author is set = ".$_POST['c_author'] ;
            echo "<br>";
            array_push($params,filter_var($_POST['c_author'],FILTER_SANITIZE_STRING));
            $query_condition.= "AND authors = $".count($params)." ";
            echo "Query now = ".$query_condition;
            echo "<br>";
        }
        else {
            echo "Author is set = ".$_POST['c_author'] ;
            echo "<br>";
            array_push($params,filter_var($_POST['c_author'],FILTER_SANITIZE_STRING));
            $query_condition.= "WHERE authors = $". count($params)." ";
            echo "Query now = ".$query_condition;
            echo "<br>";
        }
    }
    if ($_POST['c_sp_d'] == "specific" )
    {
        if (count($params) >0 )
        {
            echo "Author is set = ".$_POST['c_author'] ;
            echo "<br>";
            array_push($params,filter_var($_POST['c_author'],FILTER_SANITIZE_STRING));
            $query_condition.= "AND authors = $".count($params)." ";
            echo "Query now = ".$query_condition;
            echo "<br>";
        }
        else {
            echo "Author is set = ".$_POST['c_author'] ;
            echo "<br>";
            array_push($params,filter_var($_POST['c_author'],FILTER_SANITIZE_STRING));
            $query_condition.= "WHERE authors = $". count($params)." ";
            echo "Query now = ".$query_condition;
            echo "<br>";
        }
    }
}*/





//////////////////////////////// EXECUTION

//Query preparation,execcution
if (!empty($query_condition))
{
    // Prepare the query for execution
    echo "The Final Query = SELECT * FROM books ". $query_condition;
    echo "<br>";
    $query = "SELECT * FROM books " .$query_condition;
    $result = pg_query_params($db, $query,$params);

    if (pg_num_rows($result) > 0)
    {
        while($row = pg_fetch_row($result))
        {
            echo ' Result : Title : ' . $row[0] . ' Author ' . $row[1] . ' Category ' . $row[2] ;
            echo "<br>" ;
        }
        echo "<br>" ;

    }
    else
    {
        echo 'No results';
        echo "<br>" ;
    }
}
else
{
    echo "Empty research fields";
}

include('part3.html');
?>