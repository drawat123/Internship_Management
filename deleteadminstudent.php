<?php
    session_start();
    if(array_key_exists("adminid",$_SESSION) and isset($_GET['id']))
    {
        include("connection.php");
        $id=$_GET['id'];
        $query="DELETE FROM users WHERE id='$id'";
        $result=mysqli_query($link,$query);
        header("location:adminhome.php");
    }
?>