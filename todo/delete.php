<?php
    require_once 'connection.php';

    $id=$_GET['id'];
    
    //Delete Query
    $sql = "DELETE FROM todo_list WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('location:view.php');
       } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
       }
?>