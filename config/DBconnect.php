<?php 
    // connect to database

    $conn = mysqli_connect('localhost:4306','akukwe','physics', 'ninja_pizza');

    // check connection 

    if(!$conn){
        echo 'Connection error:' . mysqli_connect_error();
    }
 ?>