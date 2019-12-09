<?php
    session_start();
    $error="";
    include("header.php");
    include("connection.php");
    if(array_key_exists("adminid",$_SESSION))
    {
        header("location:adminhome.php");
    }
    if(isset($_POST['submit']))
    {
        $query = "SELECT * FROM admin WHERE `name` = '".mysqli_real_escape_string($link, $_POST['name'])."'";
        $result = mysqli_query($link, $query);
        $row=mysqli_fetch_array($result);
        if(isset($row))
        {
            echo "hello";
                $pass=md5(md5($row['id']).$_POST['password']);
                if($pass==$row['password'])
                {
                    $_SESSION['adminid']=$row['id'];
                    header("location:adminhome.php");
                }
                else
                {
                    $error="Account not found";
                }
            }
            else
            {
                $error="Account not found";
            }
    }
?>
<div class="container" id="logincontainer">
<div id="error"><?php
                    if($error!=""){echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}
                    //if($success!=""){echo '<div class="alert alert-success" role="alert">'.$success.'</div>';}
    ?>
    <form method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="email" name="name" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-outline-success" name="submit">Login</button>
    </form>
</div>
<?php
    include("footer.php");
?>