<?php
    session_start();
    include("header.php");
    if(array_key_exists("logout",$_GET))
    {
        session_destroy();
    }
?>
    <h1 id="mainheading">Internship Management System</h1>
    <a href="about.php"><button id="mainbutton1" type="button" class="btn btn-outline-light btn-lg">ABOUT</button></a>
    <a href="contact.php"><button  id="mainbutton2" type="button" class="btn btn-outline-light btn-lg">Contact Admin</button></a>
<?php
    include("footer.php");
?>