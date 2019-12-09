<?php
    session_start();
    $error="";
    include("connection.php");
    include("header.php");
    if(array_key_exists("departmentid",$_SESSION))
    {
        header("location:departmenthome.php");
    }
    if(isset($_POST['submit']))
    {
        $query = "SELECT * FROM departmentdata WHERE `Name` = '".mysqli_real_escape_string($link, $_POST['name'])."'";
        $result = mysqli_query($link, $query);
        $row=mysqli_fetch_array($result);
        if(isset($row))
        {
            $pass=md5(md5($row['id']).$_POST['password']);
            if($pass==$row['password'])
            {
                $_SESSION['departmentid']=$row['id'];
                header("location:departmenthome.php");
            }
            else
            {
                $error="Account cannot be found";
            }
        }
        else
        {
            $error="Account cannot be found";
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
            <label for="name">Department</label>
            <select class="form-control" name="name">
                <?php
                    $query = "SELECT * FROM departmentdata";
                    $result = mysqli_query($link, $query);
                    while($row=mysqli_fetch_array($result))
                    {
                        echo '<option value="'.$row['name'].'" >'.$row['name'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" password="password" name="password" placeholder="Password" required>
        </div>
        <input type="submit" class="btn btn-outline-success" value="Submit" name="submit">
    </form>
</div>
<?php
    include("footer.php");
?>