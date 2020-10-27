<?php 
    require 'config.php';

    if($_GET){
        $id = $_GET['id'];
        $sql = "DELETE FROM todo WHERE id = '$id'";
        $pdoStatement = $connection->prepare($sql);
        $result= $pdoStatement->execute();
        if($result){
            echo "<script>alert('Deleted successfully');
            window.location.href = 'index.php';
            </script>";
        }
    }
?>