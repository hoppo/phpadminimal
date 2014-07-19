<?php
    
    function logOut()
    {
        session_unset();
        session_destroy();
        header('location: login.php');
        exit();
    }

?>