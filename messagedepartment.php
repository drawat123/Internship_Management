<?php
    session_start();
    
        include("connection.php");
        $q=$_POST['content'];
        $r=$_SESSION['id'];
        $query="update departmentdata set message=hello";
        $result=mysqli_query($link,$query);
    
?>