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

<?php
    
?>

</tbody>
</table>
</body>
</html>

