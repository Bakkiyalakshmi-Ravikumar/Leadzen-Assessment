<?php
require_once 'connection.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $id=$_POST['id'];
    echo $id;
    $task = $_POST['task'];
    $desc = $_POST['desc'];
    $status = 'incomplete';
    if(isset($_POST['status'])){
        $status='completed';
    }
        $sql = "UPDATE todo_list SET task='$task', description='$desc', status='$status' WHERE id='$id'";
        if ($conn->query($sql) === true) {
            header('location:view.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}
?>