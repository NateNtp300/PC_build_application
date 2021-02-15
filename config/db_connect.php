<?php

//connect to database
$conn = mysqli_connect('localhost', 'nate', '12345', 'pc_builder');

//ckecks connects
if(!$conn){
    echo 'connection error: ' . mysqli_connect_error();
}

?>