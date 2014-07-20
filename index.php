<!DOCTYPE html>
<?php
    require 'functions.php';
    
    //start a session to store variables
    session_start();
    if (isset($_GET['log_out'])) logOut();
    //set database and table variable to null as none selected yet
    $_SESSION['database'] = null;
    $_SESSION['table'] = null;
    //If no one is logged in, i.e. username and password are not set divert to login page to acquire login credentials
    if (!isset($_SESSION['username']) || !isset($_SESSION['password'])){
        header('Location: login.php');
    }
?>

<html>
<head>
<title>PHPAdminimal</title>
<meta charset="utf-8">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
</head>

<body>

<?php
    //include navbar code
    require($DOCUMENT_ROOT . "navbar.html");
?>

<table class="table table-striped table-bordered table-condensed table-hover">
<thead>
<tr></tr>
</thead>
<tbody>
<tr>
<td><b>Database Name</b></td>
</tr>

<?php
    //include the database connection classes
    include 'db_connect.php';
    //return a database connection object from calling mysqlconnect from the database class
    //nb this function does not connect to any table, it is essentially a mysql login to
    //allow us to gather a list of the available useful databases
    $con = Database::mysqlConnect('localhost',$_SESSION['username'],$_SESSION['password']);
    //create mysql query to return a list of the available databases to that user by filtering
    //out the ones that are of no interest to the general user
    $query = $con->query( "SELECT schema_name FROM information_schema.schemata WHERE schema_name NOT IN ('information_schema', 'mysql', 'performance_schema')" );
    //iterate through the returned query and print list of databases to the page
    while( ( $db = $query->fetchColumn( 0 ) ) !== false )
    {
        echo '<tr><td>';
        echo '<a href="tables.php?db='.$db.'">'.$db.'</a>';
        echo '</td></tr>';
    }
    //close the database connection
    $con = Database::disconnect();
?>

</tbody>
</table>
</body>
</html>

