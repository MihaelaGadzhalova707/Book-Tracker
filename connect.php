<?php


//Create connection
$conn = new mysqli('localhost', 'root', '', 'books');

// Check connection
if (!$conn) {
    die(mysqli_error($conn));
}

?>