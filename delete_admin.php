<?php 
    session_start();
    include("config.php");
    if(isset($_REQUEST['id'])){
        $id=$_REQUEST['id'];
        $email=$_SESSION['email'];
        $sql="delete FROM users where id=$id and email != '$email'";
        echo $sql;
	    $result = $db->query($sql); 
	    $db->close();
        header("location: admin_dashboard.php");
    }
    else{
        echo "failed to deletee";
    }
    
?>