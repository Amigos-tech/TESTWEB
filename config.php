<?php
  
    // initializing variables
    $errors = array(); 
    
    // connect to the database
    try{
    $db = mysqli_connect('localhost', 'root', '', 'attendance');
    //echo "sucess";
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>