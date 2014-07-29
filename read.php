<?php
    session_start();
    require 'db_connect.php';
    $con = Database::connect('localhost',$_SESSION['database'],$_SESSION['username'],$_SESSION['password']);
    $sql = "SELECT * FROM ".$_SESSION['table']." where id = ".$_GET['id'];
    
    $query = $con->prepare( $sql );
    $query->execute();

    echo '<table>';
    
    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        if($tableheader == false) {
            echo '<tr>';
            foreach($row as $key=>$value) {
                echo "<th>{$key}</th>";
            }
            echo '</tr>';
            $tableheader = true;
        }
        echo "<tr>";
        foreach($row as $value) {
            echo "<td>{$value}</td>";
        }
        echo "</tr>";
    }
    
    echo '</table>';
    
    Database::disconnect();
    
?>

