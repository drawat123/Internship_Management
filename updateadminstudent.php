<?php
    session_start();
    if(array_key_exists("adminid",$_SESSION)) 
    {
        include("connection.php");
        if(isset($_POST['submit']))
        {
            $token='qwertyuiopzxcvbnm1234567890$/()*';
            $token=str_shuffle($token);
            $token= substr($token,0,10);
            $query="insert into users(`University Roll No`,`Name`,`Father's Name`,`Date Of Birth`,`Email`,`10th Board`,`10th Percentage`,`12th Board`,`12th Percentage`,`Sem1`,`Sem2`,`Sem3`,`Sem4`,`Sem5`,`Sem6`,`Sem7`,`Sem8`,`Branch`,`Current Semester`,`password`) values ('".mysqli_real_escape_string($link,$_POST['roll'])."','".mysqli_real_escape_string($link,$_POST['name'])."','".mysqli_real_escape_string($link,$_POST['fathername'])."','".mysqli_real_escape_string($link,$_POST['dob'])."','".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['10thboard'])."','".mysqli_real_escape_string($link,$_POST['10thpercentage'])."','".mysqli_real_escape_string($link,$_POST['12thboard'])."','".mysqli_real_escape_string($link,$_POST['12thpercentage'])."','".mysqli_real_escape_string($link,$_POST['sem1'])."','".mysqli_real_escape_string($link,$_POST['sem2'])."','".mysqli_real_escape_string($link,$_POST['sem3'])."','".mysqli_real_escape_string($link,$_POST['sem4'])."','".mysqli_real_escape_string($link,$_POST['sem5'])."','".mysqli_real_escape_string($link,$_POST['sem6'])."','".mysqli_real_escape_string($link,$_POST['sem7'])."','".mysqli_real_escape_string($link,$_POST['sem8'])."','".mysqli_real_escape_string($link,$_POST['branch'])."','".mysqli_real_escape_string($link,$_POST['currsem'])."','".mysqli_real_escape_string($link,$_POST['password'])."')";
            if(!mysqli_query($link,$query))
            {
                echo "<p>Could not create account</p>";
            }
            else
            {
                $query = "UPDATE users SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";
                mysqli_query($link,$query);
                header("location:adminhome.php");
            }
        }
    }
    else
    {
        header("location:index.php");
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
    <form method="post">
        <div class="form-group">
            <label for="roll">University Roll Number</label>
            <input type="text" class="form-control" id="roll" name="roll" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="fathername">Father's Name</label>
            <input type="text" class="form-control" id="fathername" name="fathername" required>
        </div>
        <div class="form-group">
            <label for="dob">Date Of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="10thboard">10th Board</label>
            <input type="text" class="form-control" id="10thboard" name="10thboard" required>
        </div>
        <div class="form-group">
            <label for="10thpercentage">10th Percentage</label>
            <input type="text" class="form-control" id="10thpercentage" name="10thpercentage" required>
        </div>
        <div class="form-group">
            <label for="12thboard">12th Board</label>
            <input type="text" class="form-control" id="12thboard" name="12thboard" required>
        </div>
        <div class="form-group">
            <label for="12thpercentage">12th Percentage</label>
            <input type="text" class="form-control" id="12thpercentage" name="12thpercentage" required>
        </div>
        <div class="form-group">
            <label>Semester Percentage</label>
        </div>
        <div class="form-group form-inline">
            <input type="text" class="form-control" style="width:80px;" placeholder="Sem1" name="sem1">
            <input type="text" class="form-control" style="width:80px;margin-left:4%;" placeholder="Sem2" name="sem2">
            <input type="text" class="form-control" style="width:80px;margin-left:4%;" placeholder="Sem3" name="sem3">
            <input type="text" class="form-control" style="width:80px;margin-left:4%;" placeholder="Sem4" name="sem4">
        </div>
        <div class="form-group form-inline">
            <input type="text" class="form-control" style="width:80px;" placeholder="Sem5" name="sem5">
            <input type="text" class="form-control" style="width:80px;margin-left:4%;" placeholder="Sem6" name="sem6">
            <input type="text" class="form-control" style="width:80px;margin-left:4%;" placeholder="Sem7" name="sem7">
            <input type="text" class="form-control" style="width:80px;margin-left:4%;" placeholder="Sem8" name="sem8">
        </div>
        <div class="form-group">
            <label for="branch">Branch</label>
            <input type="text" class="form-control" id="branch" name="branch" required>
        </div>
        <div class="form-group">
            <label for="currsem">Current Semester</label>
            <input type="text" class="form-control" id="cursem" placeholder="eg. Sem 1" name="currsem" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
        </div>
        <button type="submit" class="btn btn-success" name="submit">Submit</button>
        <input type="hidden" name="signup" value="1">
    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>