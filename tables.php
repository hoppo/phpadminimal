<!DOCTYPE html>
<?php
    //bring in the functions file to utilise all the useful stuff
    include 'functions.php';
    session_start();
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

List of tables

<?php
    include 'db_connect.php';
    $_SESSION['database'] = $_GET['db'];
    
    $con = Database::connect('localhost',$_SESSION['database'],$_SESSION['username'],$_SESSION['password']);
    
    $query = ('SHOW TABLES');
    
    foreach($con->query($query)as $row)
    {
        echo '<tr><td>';
        echo '<a href="table.php?table='.$row[0].'">'.$row[0].'</a>';
        echo '</td></tr>';
    }
    
?>

</tbody>
</table>
</body>
</html>

