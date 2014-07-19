<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHPAdminimal</title>
<!-- Include the bootstrap stylesheets -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
<link href="css/login.css" rel="stylesheet">
</head>

<body>

<div class="wrapper">
<form class="form-signin" action="" method="post" role="form">
<h2 class="form-signin-heading">PHPAdminimal Login</h2>
<input type="text" class="form-control" name="username" placeholder="Username" required= autofocus>
<input type="password" class="form-control" name="password" placeholder="Password" required>
<br>
<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
</form>
</div>

<?php
    //open session to access session variables
    session_start();
    
    //if username hasn't been set then set it now
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    
    //check if username and password have been set in the session
    //if already set redivert to index.php (log out function to be implemented later)
    if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
        header('Location: index.php');
    }
?>

</body>
</html>