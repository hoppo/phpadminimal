<!DOCTYPE html>
<?php
    //bring in the functions file to utilise all the useful stuff
    include 'functions.php';
    session_start();
    $_SESSION['table']=$_GET['table'];
    if (isset($_GET['log_out'])) logOut();
?>
<html>
<head>
<title>Table</title>
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
<tr>
</tr>
</thead>
<tbody>

<?php
    include 'db_connect.php';
    //create database connection
    $con = Database::connect('localhost',$_SESSION['database'],$_SESSION['username'],$_SESSION['password']);

    
    //create mysql query
    $query = ('SHOW COLUMNS FROM '.$_SESSION['table']);
    foreach ($con->query($query) as $row)
    {
        echo '<td><b>'.$row[0].'</b></td>';
    }
    
    $sth = $con->prepare('SELECT * FROM '.$_SESSION['table']);
    $sth->execute();
    
    while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach($row as $value) {
            echo "<td>{$value}</td>";
            
        }
        echo "<td>";
        echo '<a class="btn btn-xs" href="read.php?id='.$row['id'].'">Read</a>';
        echo ' ';
        echo '<a class="btn btn-success btn-xs" href="update.php?id='.$row['id'].'">Update</a>';
        echo ' ';
        echo '<a class="btn btn-danger btn-xs" href="delete.php?id='.$row['id'].'">Delete</a>';
        echo "</td>";
        echo "</tr>";
    }
    
    //disconnect from database
    $con = Database::disconnect();
?>

</tbody>
</table>
</body>
</html>

