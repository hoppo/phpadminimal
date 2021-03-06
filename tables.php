<!DOCTYPE html>
<?php
    //bring in the functions file to utilise all the useful stuff
    include 'functions.php';
    session_start();
    //set session variables to reflect selections
    $_SESSION['database'] = $_GET['db'];
    //table variable set to null as no table selected yet
    $_SESSION['table'] = null;
    if (isset($_GET['log_out'])) logOut();
?>
<html>
<head>
<title>Tables</title>
<meta charset="utf-8">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
<link href="login.css" rel="stylesheet">
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
<td><b>Table</b></td>
</tr>

<?php
    //include database classes
    include 'db_connect.php';
    //create database connection
    $con = Database::connect('localhost',$_SESSION['database'],$_SESSION['username'],$_SESSION['password']);
    //make query
    $query = ('SHOW TABLES');
    //parse query result into a table
    foreach($con->query($query)as $row)
    {
        echo '<tr><td>';
        echo '<a href="table.php?table='.$row[0].'">'.$row[0].'</a>';
        echo '</td></tr>';
    }
    //disconnect from database
    $con = Database::disconnect();
?>

</tbody>
</table>
</body>
</html>

