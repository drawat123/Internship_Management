<?php
    session_start();
    if(array_key_exists("adminid",$_SESSION) and isset($_GET['id']))
    {
        include("connection.php");
        $id=$_GET['id'];
        $query="select * from departmentdata where id='$id'";
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_array($result);
        if(isset($_POST['submit']))
        {
            $query="update departmentdata set `Name`='".mysqli_real_escape_string($link,$_POST['name'])."' where id='$id'";
            mysqli_query($link,$query);
            $r1="".$row['password']."";
            $r2="".$_POST['password']."";
            if(strcmp($r1,$r2)!=0)
            {
                $re=$row['id'];
                $query = "UPDATE departmentdata SET password = '".md5(md5($re).$_POST['password'])."' WHERE id = '$re' LIMIT 1";
                mysqli_query($link,$query);
            }
            header("location:adminhome.php");
        }
    }
    else
    {
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link rel="stylesheet" href="/resources/demos/style.css">
</head>
<body>
    <div class="container">
        <form method="post" id="studentcreate">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>"  required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>" required>
            </div>
            
            <input type="submit" class="btn btn-success" name="submit" value="Submit">
        </form>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>