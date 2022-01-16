<?php

    include 'connect.php';

    //We use GET method, so we can get access to the parameteres from the database
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $sql="delete from `book` where id=$id";
        $result=mysqli_query($conn, $sql);
        
        if($result){
            header('location:home.php');
        } else {
            die(mysqli_error($conn));
        }
    }

?>